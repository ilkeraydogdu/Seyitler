# Seyitler Kimya Sanayi A.Ş. — Enterprise Web Portalı & Dinamik CMS

![PHP Version](https://img.shields.io/badge/PHP-8.2%2B%20%7C%208.3%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0%2B-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.4-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![Architecture](https://img.shields.io/badge/Architecture-Clean%20MVC%20%26%20Zero--Leak-0AA64D?style=for-the-badge)
![Security](https://img.shields.io/badge/Security-BruteForce%20RateLimit%20%7C%20CSRF%20%7C%20XSS%20Shield-crimson?style=for-the-badge)

1991 yılından bu yana sağlık sektöründe güvenilir medikal flaster, yara örtüsü ve cerrahi bant üreticisi olan **Seyitler Kimya Sanayi A.Ş.** için geliştirilmiş; yüksek performanslı, çok dilli (TR / EN / AR), kurumsal standartlarda güvenlik kalkanına sahip, tam dinamik CMS destekli web platformu.

---

## 🏛️ Proje Künyesi & İletişim

* **Kurum:** Seyitler Kimya Sanayi A.Ş.
* **Proje Geliştiricisi & Mimarı:** İlker Aydoğdu
* **Tasarım & Dijital Ajans:** [Pofuduk Dijital](https://pofudukdijital.com)
* **Web Sitesi:** [https://pofudukdijital.com](https://pofudukdijital.com)
* **Altyapı & Mühendislik:** Kasaba Works

---

## 🚀 Öne Çıkan Mimari Özellikler

### 1. Saf & Hafif MVC Mimarisi (Zero Bloatware)
* Ağır üçüncü parti bağımlılıklar ve hantal framework'ler yerine **temiz, yüksek verimli ve bakımı kolay saf PHP MVC** altyapısı.
* Merkezi rota yöneticisi (`App\Core\Router`) ile RESTful ve SEO dostu temiz URL yapısı.
* Güvenli ve tekil veritabanı bağlantısı (`App\Core\Database`) üzerinden PDO prepared statements ile SQL Injection koruması.

### 2. Tam Dinamik Çok Dilli İçerik (TR / EN / AR)
* Tüm sayfalar, ürünler, kategoriler, teknik tablolar, kurumsal belgeler ve haberler **Türkçe**, **İngilizce** ve **Arapça (RTL Uyumlu)** olarak dinamik veritabanına bağlıdır.
* Akıllı oturum, çerez ve tarayıcı dil algılama altyapısı (`App\Core\I18n`).

### 3. Yönetim Portalı (/podmin)
* **Çift Kimlik Doğrulamalı Giriş:** Tek kompakt giriş kutusundan ister `kullanıcı adı` (`admin`), ister `e-posta` (`admin@seyitler.com`) ile güvenli oturum açma.
* **Akıllı Güvenlik Kilidi:** 5 kez ardışık hatalı denemede IP bazlı 15 dakikalık brute-force kilit mekanizması (`RateLimiter`).
* **Kapsamlı İçerik Yönetimi:**
  * Ürün Kataloğu & Varyant / Teknik Şartname Yönetimi (36 medikal ürün)
  * Kategori Yönetimi (11 ana ve alt kategori)
  * Yatırımcı İlişkileri & Faaliyet Raporları (PDF doküman yükleme ve kategorilendirme)
  * Haberler, Fuarlar & Duyurular Yönetimi (Medya, YouTube / video ve harici link desteği)
  * Kurumsal Sayfalar (Hakkımızda, Ar-Ge, Faaliyet Alanları, KVKK, Çerez Politikası)
  * Gelen İletişim Mesajları & Güvenli Talep Yönetimi
  * Çok Dilli Sözlük & Dinamik Çeviriler
  * Site Logo, Negatif Logo, Favicon, İletişim Bilgileri ve Sayaç Ayarları

### 4. Kurumsal Düzey Siber Güvenlik Kalkanı
* **CSRF Token:** Tüm POST işlemlerinde benzersiz, zaman damgalı kriptografik token doğrulaması (`App\Core\Csrf`).
* **XSS Sanitization:** Tüm kullanıcı girdileri ve parametreler `htmlspecialchars` ve özel sanitize filtrelerinden geçer.
* **Katı Sunucu Kalkanı (`.htaccess`):**
  * Gizli dosyalar (`.env`, `.git`, `.sql`, `.bak`) doğrudan engellenir (403 Forbidden).
  * Hassas dizin listeleme (`Options -Indexes`) tamamen kapalıdır.
  * X-Content-Type-Options: nosniff
  * X-Frame-Options: SAMEORIGIN
  * X-XSS-Protection: 1; mode=block
  * Referrer-Policy: strict-origin-when-cross-origin
* **Güvenlik Politikası:** RFC 9116 standartlarına uygun `/.well-known/security.txt` dosyası.

### 5. Google & Arama Motoru Optimizasyonu (SEO)
* Otomatik **`sitemap.xml`** ve **`robots.txt`** mimarisi.
* Sayfa bazlı dinamik **Canonical URL** ve **Hreflang** alternatif dil etiketleri.
* Sosyal medya önizlemeleri için **Open Graph** ve **Twitter Cards** meta verileri.
* Google Zengin Sonuçları için **Schema.org JSON-LD (MedicalBusiness & Product)** yapılandırılmış verisi.

---

## 📂 Dizin Yapısı

```text
seyitler.com/
├── app/
│   ├── Controllers/          # Ön yüz controller sınıfları (Home, Product, Investor, vb.)
│   │   └── Admin/            # Yönetim paneli controller sınıfları (/podmin)
│   ├── Core/                 # Çekirdek kütüphaneler (Router, Auth, Database, Csrf, RateLimiter, Seo, View, vb.)
│   ├── Models/               # Veritabanı modelleri (Product, Category, News, InvestorDocument, vb.)
│   └── Views/                # Arayüz şablonları (PHTML / PHP şablon motoru)
│       ├── admin/            # Yönetim paneli görünümleri
│       ├── layouts/          # Ana layout ve admin layout dosyaları
│       └── partials/         # Header, Footer, Topbar ve ortak bileşenler
├── assets/
│   ├── css/                  # CSS dosyaları ve Swiper stilleri
│   ├── images/               # WebP & SVG optimize edilmiş ürün ve kurumsal görseller
│   └── js/                   # Vanilla JavaScript etkileşimleri ve Swiper konfigürasyonu
├── config/
│   ├── app.php               # Uygulama genel konfigürasyonu
│   └── database.php          # Veritabanı PDO bağlantı ayarları
├── SQL/
│   └── seyitler_db.sql       # Projenin eksiksiz MySQL veritabanı yedeği (36 ürün, ayarlar, admin vb.)
├── .htaccess                 # Apache güvenlik ve mod_rewrite yönlendirme kuralları
├── .gitignore                # Git versiyon kontrolü dışlama kuralları
├── humans.txt                # Ekip ve geliştirici künye bilgisi
├── index.php                 # Uygulama giriş noktası ve rota tanımları
├── README.md                 # Proje dokümantasyonu
├── robots.txt                # Arama motoru robot direktifleri
└── sitemap.xml               # Otomatik arama motoru site haritası
```

---

## 🛠️ Kurulum ve Çalıştırma

### Gereksinimler
* **PHP:** 8.2 veya üzeri (`pdo_mysql`, `mbstring`, `fileinfo` modülleri aktif)
* **Web Sunucusu:** Apache 2.4+ (`mod_rewrite` ve `mod_headers` aktif)
* **Veritabanı:** MySQL 8.0+ veya MariaDB 10.5+

### 1. Projeyi Klonlayın
```bash
git clone https://github.com/ilkeraydogdu/Seyitler.git
cd Seyitler
```

### 2. Veritabanını İçe Aktarın
MySQL sunucunuzda `seyitler_db` adında bir veritabanı oluşturun ve `SQL/seyitler_db.sql` dosyasını içe aktarın:
```bash
mysql -u root -p -e "CREATE DATABASE seyitler_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
mysql -u root -p seyitler_db < SQL/seyitler_db.sql
```

### 3. Veritabanı Ayarlarını Yapılandırın
`config/database.php` dosyasını açıp kendi sunucu bilgilerinizi girin:
```php
return [
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',
    'port'      => 3306,
    'database'  => 'seyitler_db',
    'username'  => 'root',
    'password'  => 'sifreniz',
    'charset'   => 'utf8mb4',
];
```

### 4. Yönetim Paneline Giriş Yapın
Tarayıcınızdan aşağıdaki adresi açın:
* **Giriş URL:** `http://localhost/seyitler.com/podmin/login`
* **Kullanıcı Adı veya E-posta:** `admin` veya `admin@seyitler.com`
* **Güvenlik Şifresi:** `Seyitler2026!`

*(Giriş yaptıktan sonra şifrenizi ve bilgilerinizi `/podmin/settings` üzerinden değiştirebilirsiniz).*

---

## 📄 Telif Hakkı ve Lisans

Bu proje **Seyitler Kimya Sanayi A.Ş.** için özel olarak geliştirilmiştir. Tüm hakları saklıdır.

* **Tasarım & Yazılım:** [Pofuduk Dijital](https://pofudukdijital.com) & [İlker Aydoğdu](https://github.com/ilkeraydogdu)
* **Copyright:** © 2026 Seyitler Kimya Sanayi A.Ş. — Powered by Pofuduk Dijital
