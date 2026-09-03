<?php

namespace App\Core;

class RateLimiter
{
    /**
     * Check if the action is currently locked out for this IP.
     */
    public static function isLocked(string $action, ?string $ip = null): bool
    {
        $ip = $ip ?: ($_SERVER['REMOTE_ADDR'] ?? '127.0.0.1');
        $now = time();
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT `locked_until` FROM `rate_limits` WHERE `ip_address` = :ip AND `action` = :act LIMIT 1");
        $stmt->execute([':ip' => $ip, ':act' => $action]);
        $lockedUntil = (int)$stmt->fetchColumn();

        return $lockedUntil > $now;
    }

    /**
     * Record a failed attempt and increment hit counter.
     * Returns remaining attempts left before lockout.
     */
    public static function hit(string $action, ?string $ip = null, int $maxAttempts = 5, int $decaySeconds = 900): int
    {
        $ip = $ip ?: ($_SERVER['REMOTE_ADDR'] ?? '127.0.0.1');
        $now = time();
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT * FROM `rate_limits` WHERE `ip_address` = :ip AND `action` = :act LIMIT 1");
        $stmt->execute([':ip' => $ip, ':act' => $action]);
        $record = $stmt->fetch();

        if ($record) {
            // If previous lockout expired or decay window passed, reset counter
            if (($now - $record['first_attempt']) > $decaySeconds && $record['locked_until'] <= $now) {
                $uStmt = $db->prepare("UPDATE `rate_limits` SET `hits` = 1, `first_attempt` = :now, `last_attempt` = :now, `locked_until` = 0 WHERE `id` = :id");
                $uStmt->execute([':now' => $now, ':id' => $record['id']]);
                return max(0, $maxAttempts - 1);
            }

            $newHits = $record['hits'] + 1;
            if ($newHits >= $maxAttempts) {
                $lockedUntil = $now + $decaySeconds;
                $uStmt = $db->prepare("UPDATE `rate_limits` SET `hits` = :hits, `last_attempt` = :now, `locked_until` = :lock WHERE `id` = :id");
                $uStmt->execute([':hits' => $newHits, ':now' => $now, ':lock' => $lockedUntil, ':id' => $record['id']]);
                return 0;
            } else {
                $uStmt = $db->prepare("UPDATE `rate_limits` SET `hits` = :hits, `last_attempt` = :now WHERE `id` = :id");
                $uStmt->execute([':hits' => $newHits, ':now' => $now, ':id' => $record['id']]);
                return max(0, $maxAttempts - $newHits);
            }
        } else {
            $iStmt = $db->prepare("INSERT INTO `rate_limits` (`ip_address`, `action`, `hits`, `first_attempt`, `last_attempt`, `locked_until`) VALUES (:ip, :act, 1, :now1, :now2, 0)");
            $iStmt->execute([':ip' => $ip, ':act' => $action, ':now1' => $now, ':now2' => $now]);
            return max(0, $maxAttempts - 1);
        }
    }

    /**
     * Get remaining attempts before lockout.
     */
    public static function remainingAttempts(string $action, ?string $ip = null, int $maxAttempts = 5, int $decaySeconds = 900): int
    {
        $ip = $ip ?: ($_SERVER['REMOTE_ADDR'] ?? '127.0.0.1');
        $now = time();
        $db = Database::getInstance();

        $stmt = $db->prepare("SELECT * FROM `rate_limits` WHERE `ip_address` = :ip AND `action` = :act LIMIT 1");
        $stmt->execute([':ip' => $ip, ':act' => $action]);
        $record = $stmt->fetch();

        if (!$record) {
            return $maxAttempts;
        }

        if ($record['locked_until'] > $now) {
            return 0;
        }

        if (($now - $record['first_attempt']) > $decaySeconds) {
            return $maxAttempts;
        }

        return max(0, $maxAttempts - (int)$record['hits']);
    }

    /**
     * Check and record an attempt (legacy compatible).
     */
    public static function attempt(string $action, ?string $ip = null, int $maxAttempts = 5, int $decaySeconds = 900): bool
    {
        if (self::isLocked($action, $ip)) {
            return false;
        }
        return true;
    }

    /**
     * Reset attempts for this action and IP.
     */
    public static function reset(string $action, ?string $ip = null): void
    {
        $ip = $ip ?: ($_SERVER['REMOTE_ADDR'] ?? '127.0.0.1');
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM `rate_limits` WHERE `ip_address` = :ip AND `action` = :act");
        $stmt->execute([':ip' => $ip, ':act' => $action]);
    }

    /**
     * Get remaining lock seconds.
     */
    public static function retryAfter(string $action, ?string $ip = null): int
    {
        $ip = $ip ?: ($_SERVER['REMOTE_ADDR'] ?? '127.0.0.1');
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT `locked_until` FROM `rate_limits` WHERE `ip_address` = :ip AND `action` = :act LIMIT 1");
        $stmt->execute([':ip' => $ip, ':act' => $action]);
        $lockedUntil = (int)$stmt->fetchColumn();

        $remaining = $lockedUntil - time();
        return $remaining > 0 ? $remaining : 0;
    }
}
