<?php

namespace App\Core;

class Router
{
    protected static array $routes = [];
    protected static ?\Closure $notFoundHandler = null;

    public static function get(string $path, $handler): void
    {
        self::addRoute('GET', $path, $handler);
    }

    public static function post(string $path, $handler): void
    {
        self::addRoute('POST', $path, $handler);
    }

    public static function addRoute(string $method, string $path, $handler): void
    {
        $normalizedPath = '/' . trim($path, '/');
        if ($normalizedPath === '') {
            $normalizedPath = '/';
        }

        // {param} parametrelerini regex grubuna dönüştür
        $regex = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[^/]+)', $normalizedPath);
        $regex = '#^' . $regex . '$#';

        self::$routes[] = [
            'method'  => strtoupper($method),
            'path'    => $normalizedPath,
            'regex'   => $regex,
            'handler' => $handler,
        ];
    }

    public static function setNotFoundHandler(callable $handler): void
    {
        self::$notFoundHandler = \Closure::fromCallable($handler);
    }

    public static function dispatch(Request $request): void
    {
        $method = $request->getMethod();
        $path   = $request->getPath();

        foreach (self::$routes as $route) {
            if ($route['method'] !== $method) {
                continue;
            }

            if (preg_match($route['regex'], $path, $matches)) {
                $params = [];
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $params[$key] = $value;
                    }
                }

                $handler = $route['handler'];

                // Closure handler
                if ($handler instanceof \Closure) {
                    call_user_func($handler, $request, ...array_values($params));
                    return;
                }

                // Controller@action string syntax
                if (is_string($handler) && str_contains($handler, '@')) {
                    [$class, $action] = explode('@', $handler, 2);
                    if (class_exists($class)) {
                        $controller = new $class();
                        if (method_exists($controller, $action)) {
                            $controller->$action($request, ...array_values($params));
                            return;
                        }
                    }
                }

                // [ControllerClass, 'action'] array syntax
                if (is_array($handler) && count($handler) === 2) {
                    [$class, $action] = $handler;
                    if (class_exists($class)) {
                        $controller = new $class();
                        if (method_exists($controller, $action)) {
                            $controller->$action($request, ...array_values($params));
                            return;
                        }
                    }
                }

                throw new \RuntimeException("Rota yöneticisi geçersiz veya bulunamadı: " . json_encode($handler));
            }
        }

        // 404 handler
        if (self::$notFoundHandler !== null) {
            call_user_func(self::$notFoundHandler, $request);
            return;
        }

        // Default to PageController@notFound if exists
        if (class_exists('App\Controllers\PageController')) {
            (new \App\Controllers\PageController())->notFound($request);
            return;
        }

        Response::status(404);
        echo "404 Sayfa Bulunamadı";
    }
}
