/**
 * Seyitler Kimya - Enterprise Multi-language (i18n) Engine
 * Full support for Turkish (tr), English (en), and Arabic (ar) with RTL and SEO URL synchronization
 */

const I18N_CONFIG = {
    tr: {
        lang_name: 'Türkçe',
        dir: 'ltr',
        site_title: 'Seyitler Kimya - Sağlık Üretiyoruz'
    },
    en: {
        lang_name: 'English',
        dir: 'ltr',
        site_title: 'Seyitler Kimya - We Produce Healthcare'
    },
    ar: {
        lang_name: 'عربي',
        dir: 'rtl',
        site_title: 'سييتلر كيميا - نصنع الرعاية الصحية'
    }
};

const LANG_CONFIG = [
    { code: 'tr', name: 'Türkçe' },
    { code: 'en', name: 'English' },
    { code: 'ar', name: 'عربي' }
];

const PHRASE_MAP = {
    "Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Seyitler Kimya - We Produce Healthcare",
        "ar": "سييتلر كيميا - نصنع الرعاية الصحية"
    },
    "Sağlık Üretiyoruz": {
        "en": "We Produce Healthcare",
        "ar": "نصنع الرعاية الصحية"
    },
    "Üretimde Güç, Kalitede İstikrar": {
        "en": "Power in Production, Stability in Quality",
        "ar": "القوة في الإنتاج، والاستقرار في الجودة"
    },
    "Sağlıkta Güvenin Global Adı": {
        "en": "The Global Name of Trust in Healthcare",
        "ar": "الاسم العالمي للثقة في الرعاية الصحية"
    },
    "Yerli Güç, Küresel Güven": {
        "en": "Domestic Power, Global Trust",
        "ar": "قوة محلية، وثقة عالمية"
    },
    "Bilimle Üreten, Doğaya Saygı Duyan Bir Marka": {
        "en": "A Brand Producing with Science, Respecting Nature",
        "ar": "علامة تجارية تنتج بالعلم وتحترم الطبيعة"
    },
    "Bilimle Üretmek, Güvenle Büyümek": {
        "en": "Producing with Science, Growing with Trust",
        "ar": "الإنتاج بالعلم، والنمو بالثقة"
    },
    "Bilimsel Güç, Yerli İnovasyonla Buluşuyor": {
        "en": "Scientific Power Meets Domestic Innovation",
        "ar": "القوة العلمية تلتقي بالابتكار المحلي"
    },
    "Ar-Ge ile Geleceği Şekillendiriyoruz": {
        "en": "Shaping the Future with R&D",
        "ar": "نشكل المستقبل من خلال البحث والتطوير"
    },
    "1991 yılından bu yana sağlık sektöründe üretim gücümüzü kalite anlayışımızla birleştirerek Türkiye’nin en köklü ve en güçlü medikal üretim tesislerinden biri olmanın gururunu yaşıyoruz.": {
        "en": "Since 1991, we combine our production strength with quality in the healthcare sector, being proud to be one of Turkey's most established and strongest medical manufacturing facilities.",
        "ar": "منذ عام 1991، نجمع بين قدراتنا الإنتاجية وأعلى معايير الجودة في قطاع الرعاية الصحية، ونفخر بكوننا أحد أعرق وأقوى المصانع الطبية في تركيا."
    },
    "1991 yılından beri medikal plaster, yara bakım ve ilk yardım ürünlerinde Türkiye’nin öncü üreticisi.": {
        "en": "Turkey's leading manufacturer of medical plasters, wound care, and first aid products since 1991.",
        "ar": "الشركة الرائدة في تركيا في تصنيع اللواصق الطبية ومنتجات العناية بالجروح والإسعافات الأولية منذ عام 1991."
    },
    "Seyitler Kimya Sanayi A.Ş. olarak, Manisa’daki merkez üretim kampüsümüzde, 17.257 m² kapalı alanda faaliyet gösteriyor; alanında uzman çalışanımız ile yüksek hacimli siparişleri karşılayabilecek altyapımız sayesinde üretimde sürekliliği, verimliliği ve güvenilirliği bir arada sunuyoruz.": {
        "en": "As Seyitler Kimya Sanayi A.Ş., we operate in an enclosed area of 17,257 m² at our central manufacturing campus in Manisa; thanks to our expert staff and infrastructure capable of meeting high-volume orders, we provide continuity, efficiency, and reliability in production.",
        "ar": "بصفتنا شركة سييتلر كيميا، نعمل في مساحة مغلقة تبلغ 17,257 مترًا مربعًا في مجمع الإنتاج الرئيسي في مانيسا؛ وبفضل موظفينا الخبراء وبنيتنا التحتية القادرة على تلبية الطلبات الكبيرة، نقدم الاستمرارية والكفاءة والموثوقية في الإنتاج معًا."
    },
    "Bünyemizde; Ar-Ge uzmanlarından proje ekiplerine, distribütör destek birimlerinden ihracat departmanına kadar uzanan güçlü bir organizasyon yapısı bulunuyor.": {
        "en": "Our organization features a strong structure ranging from R&D specialists and project teams to distributor support units and export departments.",
        "ar": "تضم بنيتنا هيكلًا تنظيميًا قويًا يمتد من خبراء البحث والتطوير وفرق المشاريع إلى وحدات دعم الموزعين وقسم التصدير."
    },
    "Ürün portföyümüzde plasterler, yara örtüleri, ilk yardım bantları, katı tıbbi yara ürünleri ve plaster-yakı grubu yer alıyor; bu alanlarda Türkiye’de sektör lideri konumunda bulunuyoruz.": {
        "en": "Our product portfolio includes plasters, wound dressings, first aid strips, solid medical wound products, and capsicum plaster groups; we hold a market-leading position in Turkey in these fields.",
        "ar": "تشمل مجموعة منتجاتنا اللواصق الطبية وضمادات الجروح وأشرطة الإسعافات الأولية ومنتجات الجروح الطبية واللواصق الحرارية؛ ونحتل مكانة رائدة في هذا القطاع في تركيا."
    },
    "Toplamda 30 farklı ürün üretirken bunların 17’sini, kendi markalarımız altında pazara sunuyoruz. Aynı anda hem kendi markamız hem de iş ortaklarımız için üretim gerçekleştirebilen bir altyapıya sahibiz.": {
        "en": "While manufacturing 30 distinct products in total, we offer 17 of them to the market under our proprietary brands. We possess the infrastructure to manufacture for both our own brand and our business partners simultaneously.",
        "ar": "بينما ننتج 30 منتجًا مختلفًا في المجموع، نقدم 17 منها إلى السوق تحت علاماتنا التجارية الخاصة. لدينا بنية تحتية قادرة على الإنتاج لعلامتنا التجارية وشركائنا في نفس الوقت."
    },
    "Üretim hattımız, son teknolojiyle donatılmış modern makine parkurundan oluşuyor. Bu altyapı, birçok uluslararası firmanın da ulaşamadığı ölçekte yüksek kapasite ve teknik donanım sunuyor.": {
        "en": "Our production line consists of state-of-the-art modern machinery. This infrastructure offers high capacity and technical capability at a scale achieved by few international firms.",
        "ar": "يتكون خط الإنتاج لدينا من أحدث الآلات الحديثة المتطورة. توفر هذه البنية التحتية قدرة إنتاجية عالية ومعدات تقنية بمستوى قلما تصل إليه الشركات الدولية."
    },
    "Üretim süreçlerimiz; ISO 13485, GMP ve ülke bazlı kalite sertifikaları ile destekleniyor.": {
        "en": "Our manufacturing processes are supported by ISO 13485, GMP, and country-specific quality certifications.",
        "ar": "عمليات الإنتاج لدينا مدعومة بشهادات ISO 13485 و GMP وشهادات الجودة المعتمدة دولياً."
    },
    "Her siparişin kalite standartlarını, teslimat öncesinde, ülke gerekliliklerine göre özelleştirebiliyoruz.": {
        "en": "We can customize the quality standards of each order according to national requirements prior to delivery.",
        "ar": "يمكننا تخصيص معايير الجودة لكل طلب وفقاً لمتطلبات كل دولة قبل التسليم."
    },
    "Seyitler Kimya olarak, borsada işlem gören kurumsal yapımızla yatırımcılar için güvenilir bir marka konumundayız.": {
        "en": "As Seyitler Kimya, with our publicly traded corporate structure on the stock exchange, we stand as a trusted brand for investors.",
        "ar": "بصفتنا سييتلر كيميا، وبفضل هيكلنا المؤسسي المدرج في البورصة، نعد علامة تجارية موثوقة للمستثمرين."
    },
    "Bizim için ihracat, üretimi sınırların ötesine taşımaktan fazlasıdır — bilimi, kaliteyi ve insan sağlığını dünyanın her noktasına ulaştırma sorumluluğudur.": {
        "en": "For us, export is more than taking manufacturing beyond borders — it is the responsibility to deliver science, quality, and human health to every corner of the world.",
        "ar": "بالنسبة لنا، التصدير أكثر من مجرد نقل الإنتاج عبر الحدود — إنه مسؤولية إيصال العلم والجودة وصحة الإنسان إلى كل نقطة في العالم."
    },
    "51 ülkeye ürün sağlayabilecek üretim kapasitesine sahip global ölçekte faaliyet gösteren profesyonel bir üretim tesisiyiz.": {
        "en": "We are a professional manufacturing facility operating on a global scale with the production capacity to supply products to 51 countries.",
        "ar": "نحن منشأة تصنيع احترافية تعمل على نطاق عالمي بقدرة إنتاجية تتيح تزويد 51 دولة بالمنتجات."
    },
    "İhracat gerçekleştirdiğimiz ülke sayını 3 katına çıkarabilecek potansiyelimizle “Güçlü Oyuncu” pozisyonumuzu, her geçen gün daha da sağlamlaştırıyoruz.": {
        "en": "With the potential to triple the number of export destination countries, we strengthen our 'Strong Player' position every day.",
        "ar": "بفضل إمكاناتنا لمضاعفة عدد دول التصدير إلى 3 أضعاف، نعزز مكانتنا كـ 'لاعب قوي' يوماً بعد يوم."
    },
    "Global pazarda; kendi kulvarımızda fark yaratmaya, kullanıcı deneyimini hem son tüketici hem de distribütörler nezdinde en üst seviyede tutmaya devam ediyoruz.": {
        "en": "In the global market, we continue to make a difference in our field and maintain the highest level of user experience for both end consumers and distributors.",
        "ar": "في السوق العالمية، نواصل إحداث فرق في مجالنا والحفاظ على أعلى مستويات تجربة المستخدم لكل من المستهلكين والموزعين."
    },
    "ANASAYFA": {
        "en": "HOME",
        "ar": "الرئيسية"
    },
    "KURUMSAL": {
        "en": "ABOUT US",
        "ar": "من نحن"
    },
    "ÜRÜNLER": {
        "en": "PRODUCTS",
        "ar": "المنتجات"
    },
    "Yatırımcı İlişkileri": {
        "en": "Investor Relations",
        "ar": "علاقات المستثمرين"
    },
    "YATIRIMCI İLİŞKİLERİ": {
        "en": "INVESTOR RELATIONS",
        "ar": "علاقات المستثمرين"
    },
    "AR-GE ve İNOVASYON": {
        "en": "R&D and INNOVATION",
        "ar": "البحث والتطوير والابتكار"
    },
    "AR-GE VE İNOVASYON": {
        "en": "R&D AND INNOVATION",
        "ar": "البحث والتطوير والابتكار"
    },
    "FAALİYET ALANLARI": {
        "en": "FIELDS OF ACTIVITY",
        "ar": "مجالات النشاط"
    },
    "İLETİŞİM": {
        "en": "CONTACT",
        "ar": "اتصل بنا"
    },
    "Haritada Gör": {
        "en": "View on Map",
        "ar": "عرض على الخريطة"
    },
    "Mail Gönder": {
        "en": "Send Email",
        "ar": "إرسال بريد"
    },
    "Linkler": {
        "en": "Quick Links",
        "ar": "روابط سريعة"
    },
    "Son Haberler": {
        "en": "Latest News",
        "ar": "آخر الأخبار"
    },
    "Bilgi Toplumu Hizmetleri": {
        "en": "Information Society Services",
        "ar": "خدمات مجتمع المعلومات"
    },
    "KVKK Aydınlatma Metni": {
        "en": "Privacy & Data Protection (KVKK)",
        "ar": "بيان الخصوصية وحماية البيانات"
    },
    "Çerez Politikası": {
        "en": "Cookie Policy",
        "ar": "سياسة ملفات تعريف الارتباط"
    },
    "Anasayfa": {
        "en": "Home",
        "ar": "الرئيسية"
    },
    "Kurumsal": {
        "en": "About Us",
        "ar": "من نحن"
    },
    "Ürünlerimiz": {
        "en": "Our Products",
        "ar": "منتجاتنا"
    },
    "İncele": {
        "en": "Explore",
        "ar": "استكشف"
    },
    "Daha Fazla": {
        "en": "Learn More",
        "ar": "المزيد"
    },
    "Daha Fazla Bilgi": {
        "en": "Learn More",
        "ar": "المزيد من المعلومات"
    },
    "Detaylı Bilgi": {
        "en": "Details",
        "ar": "تفاصيل"
    },
    "Gönder": {
        "en": "Send",
        "ar": "إرسال"
    },
    "Mesajı Gönder": {
        "en": "Send Message",
        "ar": "إرسال الرسالة"
    },
    "Özellikler": {
        "en": "Features",
        "ar": "المميزات"
    },
    "Tablo": {
        "en": "Specifications Table",
        "ar": "جدول المواصفات"
    },
    "Tüm Ürünler": {
        "en": "All Products",
        "ar": "جميع المنتجات"
    },
    "Ürün Kategorilerimiz": {
        "en": "Product Categories",
        "ar": "أقسام المنتجات"
    },
    "İlgili Ürünler": {
        "en": "Related Products",
        "ar": "منتجات ذات صلة"
    },
    "17.257 m²": {
        "en": "17,257 m²",
        "ar": "17,257 م²"
    },
    "Kapalı Alanda Modern Üretim Tesisi": {
        "en": "Modern Production Facility in Indoor Area",
        "ar": "منشأة إنتاج حديثة في مساحة مغلقة"
    },
    "30": {
        "en": "30",
        "ar": "30"
    },
    "Farklı Ürün Üretimi": {
        "en": "Different Product Lines",
        "ar": "خطوط إنتاج مختلفة"
    },
    "51": {
        "en": "51",
        "ar": "51"
    },
    "Ülkeye Ürün Sağlayabilecek Üretim Kapasitesi": {
        "en": "Export Capacity to 51 Countries",
        "ar": "طاقة إنتاجية للتصدير إلى 51 دولة"
    },
    "Tıbbi Plaster": {
        "en": "Medical Plaster",
        "ar": "لاصق طبي"
    },
    "Enjeksiyon Serisi": {
        "en": "Injection Series",
        "ar": "سلسلة الحقن"
    },
    "Yara Bakımı": {
        "en": "Wound Care",
        "ar": "العناية بالجروح"
    },
    "Cilt Kaplayıcı Şerit & Göz Pedleri": {
        "en": "Skin Closure Strips & Eye Pads",
        "ar": "أشرطة إغلاق الجلد وضمادات العين"
    },
    "İlk Yardım Bantları": {
        "en": "First Aid Strips",
        "ar": "أشرطة الإسعافات الأولية"
    },
    "Diyaliz Setleri": {
        "en": "Dialysis Sets",
        "ar": "مجموعات غسيل الكلى"
    },
    "Isı Bantları": {
        "en": "Heat Patches",
        "ar": "أشرطة حرارية"
    },
    "Kompres & Tampon": {
        "en": "Compress & Tampon",
        "ar": "ضمادات وسدادات"
    },
    "Krem": {
        "en": "Cream",
        "ar": "كريم"
    },
    "Hemostatic Serisi": {
        "en": "Hemostatic Series",
        "ar": "سلسلة وقف النزيف"
    },
    "Silikonlu Ürünler": {
        "en": "Silicone Products",
        "ar": "منتجات السيليكون"
    },
    "Ölçü": {
        "en": "Size",
        "ar": "المقاس"
    },
    "En": {
        "en": "Width",
        "ar": "العرض"
    },
    "Boy": {
        "en": "Length",
        "ar": "الطول"
    },
    "Yükseklik": {
        "en": "Height",
        "ar": "الارتفاع"
    },
    "Kutu İçi Adet": {
        "en": "Box Qty",
        "ar": "العدد في العلبة"
    },
    "Koli İçi Adet": {
        "en": "Case Qty",
        "ar": "العدد في الكرتون"
    },
    "PDF Dokümanı": {
        "en": "PDF Document",
        "ar": "ملف PDF"
    },
    "Bu ürün için teknik ölçü tablosu bulunmamaktadır.": {
        "en": "No technical specification table available for this product.",
        "ar": "لا يوجد جدول مواصفات فنية متوفر لهذا المنتج."
    },
    "Bu kategori altında döküman bulunmamaktadır.": {
        "en": "No documents available in this category.",
        "ar": "لا توجد مستندات متوفرة في هذا القسم."
    },
    "Dökümanlarda ara...": {
        "en": "Search documents...",
        "ar": "البحث في المستندات..."
    },
    "Hakkımızda": {
        "en": "About Us",
        "ar": "من نحن"
    },
    "Tarihçe": {
        "en": "History",
        "ar": "تاريخ الشركة"
    },
    "Misyon ve Vizyon": {
        "en": "Mission & Vision",
        "ar": "الرؤية والرسالة"
    },
    "Değerler": {
        "en": "Our Values",
        "ar": "قيمنا"
    },
    "Değerlerimiz": {
        "en": "Our Values",
        "ar": "قيمنا"
    },
    "Organizasyon": {
        "en": "Organization",
        "ar": "الهيكل التنظيمي"
    },
    "Organizasyon Yapısı": {
        "en": "Organizational Structure",
        "ar": "الهيكل التنظيمي"
    },
    "Sürdürülebilirlik": {
        "en": "Sustainability",
        "ar": "الاستدامة"
    },
    "İnsan Kaynakları": {
        "en": "Human Resources",
        "ar": "الموارد البشرية"
    },
    "Başkanın Mesajı": {
        "en": "Chairman's Message",
        "ar": "رسالة رئيس مجلس الإدارة"
    },
    "Yönetim Şeması": {
        "en": "Management Chart",
        "ar": "المخطط الإداري"
    },
    "Bize Yazın": {
        "en": "Write to Us",
        "ar": "راسلنا"
    },
    "İhtiyaçlarınızı anlatın": {
        "en": "Tell us your requirements",
        "ar": "أخبرنا باحتياجاتك"
    },
    "Kısa bir özet paylaşın, sizi doğru ekibe yönlendirelim.": {
        "en": "Share a brief summary, we will direct you to the right team.",
        "ar": "شاركنا ملخصاً موجزاً وسنوجهك إلى الفريق المناسب."
    },
    "Tüm bilgiler KVKK ve GDPR standartlarında saklanır.": {
        "en": "All information is stored under KVKK and GDPR standards.",
        "ar": "يتم حفظ جميع المعلومات وفقاً لمعايير الخصوصية."
    },
    "En geç bir iş günü içinde dönüş yapıyoruz.": {
        "en": "We reply within one business day at the latest.",
        "ar": "نقوم بالرد خلال يوم عمل واحد كحد أقصى."
    },
    "Ad Soyad": {
        "en": "Full Name",
        "ar": "الاسم الكامل"
    },
    "Kurumsal E-posta": {
        "en": "Corporate Email",
        "ar": "البريد الإلكتروني للعمل"
    },
    "Telefon": {
        "en": "Phone",
        "ar": "الهاتف"
    },
    "Konu": {
        "en": "Subject",
        "ar": "الموضوع"
    },
    "Mesaj": {
        "en": "Message",
        "ar": "الرسالة"
    },
    "Bizi Ziyaret Edin": {
        "en": "Visit Us",
        "ar": "تفضل بزيارتنا"
    },
    "Fabrika ve Genel Merkez": {
        "en": "Factory & Headquarters",
        "ar": "المصنع والمقر الرئيسي"
    },
    "Ana üretim kampüsü ve genel merkezimiz.": {
        "en": "Our main production campus and headquarters.",
        "ar": "مجمع الإنتاج الرئيسي ومقرنا العام."
    },
    "Google Haritalar'da Aç": {
        "en": "Open in Google Maps",
        "ar": "فتح في خرائط جوجل"
    },
    "Bizimle İletişime Geçin": {
        "en": "Contact Us",
        "ar": "تواصل معنا"
    },
    "1. Kişisel Verilerin Toplanma Yöntemi ve Hukuki Sebebi": {
        "en": "1. Method and Legal Basis of Collecting Personal Data",
        "ar": "1. طريقة جمع البيانات الشخصية والأساس القانوني"
    },
    "2. Kişisel Verilerin İşlenme Amaçları": {
        "en": "2. Purposes of Processing Personal Data",
        "ar": "2. أغراض معالجة البيانات الشخصية"
    },
    "3. İşlenen Kişisel Verilerin Aktarımı": {
        "en": "3. Transfer of Processed Personal Data",
        "ar": "3. نقل البيانات الشخصية المعالجة"
    },
    "4. Veri Sahibinin Hakları": {
        "en": "4. Rights of the Data Subject",
        "ar": "4. حقوق صاحب البيانات"
    },
    "5. İletişim": {
        "en": "5. Contact",
        "ar": "5. اتصل بنا"
    },
    "KİŞİSEL VERİLERİN KORUNMASI VE İŞLENMESİ AYDINLATMA METNİ": {
        "en": "PERSONAL DATA PROTECTION AND PROCESSING CLARIFICATION TEXT",
        "ar": "بيان توضيحي بشأن حماية ومعالجة البيانات الشخصية"
    },
    "Seyitler Kimya Sanayi A.Ş. (\"Şirket\") olarak, 6698 sayılı Kişisel Verilerin Korunması Kanunu (\"KVKK\") kapsamında veri sorumlusu sıfatıyla, kişisel verilerinizin güvenliğine ve gizliliğine azami önem vermekteyiz.": {
        "en": "As Seyitler Kimya Sanayi A.Ş. (\"Company\"), in our capacity as data controller under the Law on the Protection of Personal Data No. 6698 (\"KVKK\"), we attach utmost importance to the security and privacy of your personal data.",
        "ar": "بصفتنا شركة سييتلر كيميا لصناعة المواد الكيميائية مساهمة مقفلة (\"الشركة\")، بصفتنا مراقب بيانات بموجب قانون حماية البيانات الشخصية رقم 6698 (\"KVKK\")، نولي أقصى درجات الأهمية لأمان وخصوصية بياناتكم الشخصية."
    },
    "Kişisel verileriniz, Şirketimiz tarafından sunulan ürün ve hizmetlerden sizleri faydalandırmak için gerekli çalışmaların iş birimlerimiz tarafından yapılması amacıyla toplanmaktadır.": {
        "en": "Your personal data is collected for the purpose of carrying out necessary work by our business units to benefit you from the products and services offered by our Company.",
        "ar": "يتم جمع بياناتكم الشخصية بهدف تنفيذ الأعمال اللازمة من قبل وحدات أعمالنا لتمكينكم من الاستفادة من المنتجات والخدمات التي تقدمها شركتنا."
    },
    "Toplanan kişisel verileriniz, KVKK'nın 8. ve 9. maddelerinde belirtilen kişisel veri işleme şartları ve amaçları çerçevesinde aktarılabilecektir.": {
        "en": "Your collected personal data may be transferred within the framework of personal data processing conditions and purposes specified in Articles 8 and 9 of the KVKK.",
        "ar": "يجوز نقل بياناتكم الشخصية المجمعة في إطار شروط وأغراض معالجة البيانات الشخصية المحددة في المادتين 8 و 9 من قانون KVKK."
    },
    "KVKK'nın 11. maddesi uyarınca veri sahipleri haklarına sahiptir.": {
        "en": "In accordance with Article 11 of the KVKK, data subjects have rights.",
        "ar": "وفقاً للمادة 11 من قانون KVKK، يتمتع أصحاب البيانات بحقوق قانونية."
    },
    "Haklarınızı kullanmak için Şirketimizin kurumsal web sitesinde yer alan iletişim kanalları üzerinden bizimle iletişime geçebilirsiniz.": {
        "en": "To exercise your rights, you can contact us through the contact channels available on our corporate website.",
        "ar": "لممارسة حقوقكم، يمكنكم التواصل معنا عبر قنوات الاتصال المتاحة على موقعنا الإلكتروني المؤسسي."
    },
    "KVKK Başvuru Formu": {
        "en": "KVKK Application Form",
        "ar": "نموذج طلب حماية البيانات"
    },
    "İletişim formları, iş başvuru süreçleri ve e-posta yazışmaları yoluyla,": {
        "en": "Through contact forms, job application processes, and email correspondence,",
        "ar": "من خلال نماذج الاتصال وعمليات التقديم على الوظائف والمراسلات عبر البريد الإلكتروني،"
    },
    "İş başvuru ve insan kaynakları süreçlerinin yürütülmesi,": {
        "en": "Execution of job application and human resources processes,",
        "ar": "إدارة عمليات التوظيف والموارد البشرية،"
    },
    "İletişim faaliyetlerinin yürütülmesi ve taleplerin yanıtlanması,": {
        "en": "Conducting communication activities and responding to requests,",
        "ar": "إجراء أنشطة التواصل والرد على الاستفسارات،"
    },
    "Bilgi güvenliği süreçlerinin planlanması ve denetimi,": {
        "en": "Planning and audit of information security processes,",
        "ar": "تخطيط ومراقبة عمليات أمن المعلومات،"
    },
    "Hukuki ve ticari güvenliğin temini amacıyla işlenmektedir.": {
        "en": "Processed to ensure legal and commercial security.",
        "ar": "تتم المعالجة لضمان الأمان القانوني والتجاري."
    },
    "Yetkili kamu kurum ve kuruluşlarına, kanuni yükümlülükler doğrultusunda,": {
        "en": "To authorized public institutions and organizations in line with legal obligations,",
        "ar": "إلى المؤسسات والهيئات العامة المصرح لها بموجب الالتزامات القانونية،"
    },
    "Hizmet aldığımız iş ortakları, tedarikçiler ve danışmanlara aktarılabilir.": {
        "en": "May be transferred to business partners, suppliers, and consultants from whom we receive services.",
        "ar": "يجوز نقلها إلى شركاء العمل والموردين والاستشاريين الذين نتلقى منهم الخدمات."
    },
    "Kişisel verilerinizin işlenip işlenmediğini öğrenme,": {
        "en": "Learn whether your personal data is processed,",
        "ar": "معرفة ما إذا كانت بياناتكم الشخصية تخضع للمعالجة أم لا،"
    },
    "İşlenmişse buna ilişkin bilgi talep etme,": {
        "en": "Request information if it has been processed,",
        "ar": "طلب معلومات بشأنها إذا كانت قد عولجت،"
    },
    "İşlenme amacını ve amacına uygun kullanılıp kullanılmadığını öğrenme,": {
        "en": "Learn the purpose of processing and whether it is used appropriately,",
        "ar": "معرفة الغرض من المعالجة وما إذا كانت تُستخدم بما يتفق مع الغرض،"
    },
    "Eksik veya yanlış işlenmişse düzeltilmesini isteme,": {
        "en": "Request correction if processed incompletely or inaccurately,",
        "ar": "طلب تصحيحها إذا كانت معالجة بشكل ناقص أو غير دقيق،"
    },
    "KVKK şartları çerçevesinde silinmesini veya yok edilmesini isteme.": {
        "en": "Request deletion or destruction within the framework of KVKK conditions.",
        "ar": "طلب مسحها أو إتلافها في إطار شروط قانون حماية البيانات."
    },
    "1. Çerez Nedir?": {
        "en": "1. What is a Cookie?",
        "ar": "1. ما هي ملفات تعريف الارتباط؟"
    },
    "2. Kullanılan Çerez Türleri": {
        "en": "2. Types of Cookies Used",
        "ar": "2. أنواع ملفات تعريف الارتباط المستخدمة"
    },
    "3. Çerezlerin Kullanım Amaçları": {
        "en": "3. Purposes of Using Cookies",
        "ar": "3. أغراض استخدام ملفات تعريف الارتباط"
    },
    "4. Çerez Tercihlerinin Yönetimi": {
        "en": "4. Managing Cookie Preferences",
        "ar": "4. إدارة تفضيلات ملفات تعريف الارتباط"
    },
    "ÇEREZ POLİTİKASI": {
        "en": "COOKIE POLICY",
        "ar": "سياسة ملفات تعريف الارتباط"
    },
    "Seyitler Kimya Sanayi A.Ş. (\"Şirket\") olarak, web sitemizi (\"Sitemiz\") ziyaret edenlerin gizliliğini korumak ve kullanıcı deneyimini iyileştirmek amacıyla çerezler (cookies) kullanmaktayız. İşbu Çerez Politikası, hangi tür çerezlerin kullanıldığını ve kullanıcıların bu konudaki tercihlerini nasıl yönetebileceğini açıklamaktadır.": {
        "en": "As Seyitler Kimya Sanayi A.Ş. (\"Company\"), we use cookies to protect the privacy of visitors to our website (\"Our Site\") and to improve the user experience. This Cookie Policy explains what types of cookies are used and how users can manage their preferences.",
        "ar": "بصفتنا شركة سييتلر كيميا (\"الشركة\")، نستخدم ملفات تعريف الارتباط لحماية خصوصية زوار موقعنا (\"موقعنا\") وتحسين تجربة المستخدم. توضح سياسة ملفات تعريف الارتباط هذه أنواع الملفات المستخدمة وكيفية إدارة المستخدمين لتفضيلاتهم."
    },
    "Çerezler, bir web sitesini ziyaret ettiğinizde tarayıcınız aracılığıyla cihazınıza (bilgisayar, akıllı telefon, tablet) depolanan küçük metin dosyalarıdır. Çerezler, web sitesinin daha verimli çalışmasını sağlamak, kişiselleştirilmiş bir deneyim sunmak ve site sahiplerine bilgi sağlamak amacıyla yaygın olarak kullanılır.": {
        "en": "Cookies are small text files stored on your device (computer, smartphone, tablet) via your browser when you visit a website. Cookies are widely used to make websites work more efficiently, provide a personalized experience, and provide information to site owners.",
        "ar": "ملفات تعريف الارتباط هي ملفات نصية صغيرة يتم تخزينها على جهازك (الكمبيوتر، الهاتف الذكي، الجهاز اللوحي) عبر متصفحك عند زيارة موقع ويب. تُستخدم ملفات تعريف الارتباط على نطاق واسع لجعل مواقع الويب تعمل بكفاءة أكبر وتوفير تجربة مخصصة وتزويد مالكي المواقع بالمعلومات."
    },
    "Zorunlu Çerezler:Sitenin temel işlevlerini yerine getirmesi için gerekli olan çerezlerdir (örneğin oturum yönetimi, güvenlik).": {
        "en": "Mandatory Cookies: Cookies necessary for the site to perform its basic functions (e.g. session management, security).",
        "ar": "ملفات تعريف الارتباط الإلزامية: ملفات ضرورية لأداء الموقع لوظائفه الأساسية (مثل إدارة الجلسة والأمان)."
    },
    "Performans ve Analiz Çerezleri:Sitenin nasıl kullanıldığını anlamamıza yardımcı olan, ziyaretçi sayıları ve trafik kaynaklarını analiz eden çerezlerdir.": {
        "en": "Performance and Analytics Cookies: Cookies that help us understand how the site is used, analyzing visitor numbers and traffic sources.",
        "ar": "ملفات الأداء والتحليلات: ملفات تساعدنا على فهم كيفية استخدام الموقع وتحليل أعداد الزوار ومصادر الحركة."
    },
    "İşlevsel Çerezler:Dil seçimi gibi tercihlerinizin hatırlanmasını sağlayan ve siteyi daha kolay kullanmanıza imkan veren çerezlerdir.": {
        "en": "Functional Cookies: Cookies that allow preferences such as language selection to be remembered and enable easier use of the site.",
        "ar": "ملفات تعريف الارتباط الوظيفية: ملفات تتيح تذكر تفضيلاتك مثل اختيار اللغة وتمكينك من استخدام الموقع بسهولة أكبر."
    },
    "Hedefleme ve Reklam Çerezleri:İlgi alanlarınıza göre size özel içerik ve reklamlar sunmak amacıyla kullanılan çerezlerdir.": {
        "en": "Targeting and Advertising Cookies: Cookies used to deliver tailored content and advertisements based on your interests.",
        "ar": "ملفات الاستهداف والإعلانات: ملفات تُستخدم لتقديم محتوى وإعلانات مخصصة وفقاً لاهتماماتك."
    },
    "Çerezler aşağıdaki amaçlarla kullanılmaktadır:": {
        "en": "Cookies are used for the following purposes:",
        "ar": "تُستخدم ملفات تعريف الارتباط للأغراض التالية:"
    },
    "Sitemizin düzgün ve güvenli çalışmasını sağlamak,": {
        "en": "Ensure proper and secure operation of our site,",
        "ar": "ضمان عمل موقعنا بشكل صحيح وآمن،"
    },
    "Sitemizin performansını analiz etmek ve iyileştirmek,": {
        "en": "Analyze and improve the performance of our site,",
        "ar": "تحليل وتحسين أداء موقعنا الإلكتروني،"
    },
    "Ziyaretçilerin tercihlerini hatırlayarak kullanım kolaylığı sağlamak,": {
        "en": "Provide ease of use by remembering visitors' preferences,",
        "ar": "توفير سهولة الاستخدام من خلال تذكر تفضيلات الزوار،"
    },
    "Kullanıcılarımıza daha uygun içerik ve hizmetler sunmak.": {
        "en": "Deliver more relevant content and services to our users.",
        "ar": "تقديم محتوى وخدمات أكثر ملاءمة لمستخدمينا."
    },
    "Çoğu tarayıcı çerezleri otomatik olarak kabul eder. Ancak, tarayıcı ayarlarınızı değiştirerek çerezleri reddedebilir veya cihazınıza çerez kaydedildiğinde uyarı alabilirsiniz. Çerezleri devre dışı bırakmanız halinde, Sitemizin bazı özelliklerinin tam olarak çalışmayabileceğini hatırlatmak isteriz.": {
        "en": "Most browsers automatically accept cookies. However, you can refuse cookies or be alerted when cookies are sent to your device by modifying your browser settings. If you disable cookies, please note that some features of our Site may not function fully.",
        "ar": "تقبل معظم المتصفحات ملفات تعريف الارتباط تلقائيًا. ومع ذلك، يمكنك رفضها أو تلقي تنبيه عند حفظ ملف على جهازك عن طريق تغيير إعدادات المتصفح. يرجى ملاحظة أنه في حال تعطيل الملفات، قد لا تعمل بعض ميزات موقعنا بشكل كامل."
    },
    "Tarayıcınızın \"Ayarlar\" veya \"Seçenekler\" bölümünden çerez tercihlerinizi yönetebilirsiniz.": {
        "en": "You can manage your cookie preferences from the \"Settings\" or \"Options\" section of your browser.",
        "ar": "يمكنك إدارة تفضيلات ملفات تعريف الارتباط من قسم \"الإعدادات\" أو \"الخيارات\" في متصفحك."
    },
    "Çerez Politikası ile ilgili her türlü soru ve görüşünüz için bizimle iletişime geçebilirsiniz.": {
        "en": "You can contact us for any questions and opinions regarding the Cookie Policy.",
        "ar": "يمكنكم التواصل معنا لأي أسئلة أو استفسارات تتعلق بسياسة ملفات تعريف الارتباط."
    },
    "Yatırımcı i̇lişkileri": {
        "en": "Investor Relations",
        "ar": "علاقات المستثمرين"
    },
    "Ar-ge ve i̇novasyon": {
        "en": "R&D and Innovation",
        "ar": "البحث والتطوير والابتكار"
    },
    "Faali̇yet alanlari": {
        "en": "Fields of Activity",
        "ar": "مجالات النشاط"
    },
    "İleti̇şi̇m": {
        "en": "Contact",
        "ar": "اتصل بنا"
    },
    "Ürünler": {
        "en": "Products",
        "ar": "المنتجات"
    },
    "Faaliyet Alanları": {
        "en": "Fields of Activity",
        "ar": "مجالات النشاط"
    },
    "Haberler": {
        "en": "News",
        "ar": "الأخبار"
    },
    "Değerli İş Ortaklarımız,": {
        "en": "Dear Business Partners,",
        "ar": "شركاؤنا الأعزاء،"
    },
    "Başkanın Mesajı (Chairman / General Manager’s Message)": {
        "en": "Chairman / General Manager's Message",
        "ar": "رسالة رئيس مجلس الإدارة / المدير العام"
    },
    "Prof.Dr. Mehmet Faysal GÖKALP": {
        "en": "Prof. Dr. Mehmet Faysal GÖKALP",
        "ar": "أ. د. محمد فيصل غوكالب"
    },
    "Yönetim Kurulu Başkanı / Genel Müdür": {
        "en": "Chairman of the Board / General Manager",
        "ar": "رئيس مجلس الإدارة / المدير العام"
    },
    "Seyitler Kimya A.Ş.": {
        "en": "Seyitler Kimya A.Ş.",
        "ar": "شركة سييتلر كيميا المساهمة"
    },
    "Saygılarımla,": {
        "en": "Best Regards,",
        "ar": "مع خالص التحيات والتقدير،"
    },
    "Seyitler Kimya olarak, Türkiye’nin medikal cihaz üretim gücünü bilimsel inovasyonla buluşturduğumuz 30 yılı aşkın bir yolculuğun gururunu yaşıyoruz.": {
        "en": "As Seyitler Kimya, we take pride in a journey of more than 30 years where we unite Turkey's medical device manufacturing power with scientific innovation.",
        "ar": "بصفتنا سييتلر كيميا، نفخر بمسيرة تمتد لأكثر من 30 عامًا نجمع فيها بين قدرات تصنيع الأجهزة الطبية في تركيا والابتكار العلمي."
    },
    "Manisa Turgutlu’daki tesislerimizde geliştirdiğimiz ürünler, yalnızca ulusal pazarda değil, dünya çapında sağlık profesyonellerinin güvenini kazanmıştır.": {
        "en": "The products we develop in our facilities in Manisa Turgutlu have earned the trust of healthcare professionals not only in the national market, but worldwide.",
        "ar": "المنتجات التي نطورها في منشآتنا في مانيسا تورغوتلو كسبت ثقة المتخصصين في الرعاية الصحية ليس فقط في السوق الوطنية، بل في جميع أنحاء العالم."
    },
    "Her projemizde “bilimden ürüne, üründen sağlığa” yaklaşımını benimsiyor; üretim teknolojilerimizi sürekli geliştirerek ülkemizin katma değerli üretim hedeflerine katkı sağlıyoruz.": {
        "en": "In every project, we adopt the approach 'from science to product, from product to health'; by constantly developing our production technologies, we contribute to our country's value-added production targets.",
        "ar": "في كل مشروع، نتبنى نهج 'من العلم إلى المنتج، ومن المنتج إلى الصحة'؛ ومن خلال التطوير المستمر لتقنيات الإنتاج لدينا، نساهم في أهداف الإنتاج ذات القيمة المضافة."
    },
    "Ar-Ge merkezimiz, TÜBİTAK ve TÜSEB destekli projeleriyle yeni nesil tıbbi yapışkan teknolojileri geliştirirken; ihracat ağımız, yerli üretimi global sahneye taşımaktadır.": {
        "en": "While our R&D center develops next-generation medical adhesive technologies with projects supported by TÜBİTAK and TÜSEB; our export network carries domestic production to the global stage.",
        "ar": "بينما يطور مركز البحث والتطوير لدينا تقنيات لواصق طبية من الجيل الجديد بمشاريع مدعومة من TÜBİTAK و TÜSEB؛ تنقل شبكة التصدير لدينا الإنتاج المحلي إلى الساحة العالمية."
    },
    "Geleceğe dair vizyonumuz nettir: inovasyon, sürdürülebilirlik ve insan odaklı üretim ilkeleriyle her geçen gün daha güçlü bir Seyitler Kimya inşa etmek.": {
        "en": "Our vision for the future is clear: to build a stronger Seyitler Kimya every day with the principles of innovation, sustainability, and human-oriented production.",
        "ar": "رؤيتنا للمستقبل واضحة: بناء شركة سييتلر كيميا أكثر قوة يومًا بعد يوم بمبادئ الابتكار والاستدامة والإنتاج المرتكز على الإنسان."
    },
    "Üretime emek veren tüm ekip arkadaşlarımıza, iş ortaklarımıza ve bizi tercih eden sağlık profesyonellerine içten teşekkürlerimi sunarım.": {
        "en": "I express my sincere gratitude to all our team members who contribute to production, our business partners, and healthcare professionals who choose us.",
        "ar": "أتقدم بخالص شكري وامتناني لجميع زملائنا في الفريق وشركائنا التجاريين ومختصي الرعاية الصحية الذين يفضلون منتجاتنا."
    },
    "Seyitler Kimya’da sürdürülebilirlik, yalnızca çevre politikası değil; üretim anlayışımızın temelidir.": {
        "en": "At Seyitler Kimya, sustainability is not just an environmental policy; it is the cornerstone of our manufacturing philosophy.",
        "ar": "في سييتلر كيميا، الاستدامة ليست مجرد سياسة بيئية؛ بل هي أساس فلسفتنا الإنتاجية."
    },
    "Her ürün, her proses ve her yatırım; enerji verimliliği, atık yönetimi ve çalışan sağlığı kriterleri dikkate alınarak planlanır.": {
        "en": "Every product, process, and investment is planned considering energy efficiency, waste management, and employee health criteria.",
        "ar": "يتم التخطيط لكل منتج وكل عملية وكل استثمار مع مراعاة معايير كفاءة الطاقة وإدارة النفايات وصحة الموظفين."
    },
    "Üretim tesislerimizde kullanılan sistemler; düşük emisyonlu hot-melt teknolojileri, geri dönüştürülebilir ambalaj malzemeleri ve atık azaltma odaklı üretim planları ile desteklenir.": {
        "en": "Systems used in our manufacturing facilities are supported by low-emission hot-melt technologies, recyclable packaging materials, and waste-reduction-oriented production plans.",
        "ar": "الأنظمة المستخدمة في منشآت الإنتاج مدعومة بتقنيات الصهر الساخن منخفضة الانبعاثات، ومواد التغليف القابلة لإعادة التدوير، وخطط تقليل النفايات."
    },
    "Bu sayede hem üretim verimliliği artar, hem de çevresel ayak izimiz en aza indirilir.": {
        "en": "In this way, both production efficiency increases and our environmental footprint is minimized.",
        "ar": "بهذه الطريقة، تزداد كفاءة الإنتاج ويتم تقليل بصمتنا البيئية إلى أدنى حد."
    },
    "Etik üretim, sadece çevreyle değil, insanla da ilgilidir.": {
        "en": "Ethical production is not only about the environment, but also about people.",
        "ar": "الإنتاج الأخلاقي لا يتعلق بالبيئة فحسب، بل بالإنسان أيضاً."
    },
    "Seyitler Kimya, eşitlikçi çalışma ilkeleri, güvenli iş ortamı ve kadın istihdamını destekleyen politikalarıyla kurumsal sorumluluğunu her kademede sürdürür.": {
        "en": "Seyitler Kimya maintains its corporate responsibility at every level with egalitarian working principles, a safe working environment, and policies supporting women's employment.",
        "ar": "تحافظ سييتلر كيميا على مسؤوليتها المؤسسية على كل المستويات من خلال مبادئ العمل العادلة وبيئة العمل الآمنة والسياسات الداعمة لتوظيف المرأة."
    },
    "Sürdürülebilirlik yaklaşımımız, “bilimsel üretim – sosyal sorumluluk – çevresel duyarlılık” üçgeni üzerine kuruludur.": {
        "en": "Our sustainability approach is built on the triangle of 'scientific production – social responsibility – environmental sensitivity'.",
        "ar": "يقوم نهج الاستدامة لدينا على مثلث 'الإنتاج العلمي - المسؤولية الاجتماعية - الوعي البيئي'."
    },
    "Çünkü biz inanıyoruz ki; gerçek yenilik, sadece teknolojiyle değil, değerlerle mümkündür.": {
        "en": "Because we believe that true innovation is possible not only with technology, but with values.",
        "ar": "لأننا نؤمن بأن الابتكار الحقيقي ممكن ليس بالتكنولوجيا وحدها، بل بالقيم والمبادئ."
    },
    "Güven": {
        "en": "Trust",
        "ar": "الثقة"
    },
    "Yenilikçilik": {
        "en": "Innovation",
        "ar": "الابتكار"
    },
    "Sorumluluk": {
        "en": "Responsibility",
        "ar": "المسؤولية"
    },
    "Mükemmellik": {
        "en": "Excellence",
        "ar": "التميز"
    },
    "Şeffaflık": {
        "en": "Transparency",
        "ar": "الشفافية"
    },
    "Tüm süreçlerimizde dürüstlük, kalite ve güveni esas alıyoruz.": {
        "en": "We base all our processes on honesty, quality, and trust.",
        "ar": "نعتمد الصدق والجودة والثقة أساساً في جميع عملياتنا."
    },
    "Ar-Ge ve teknolojiyi merkeze alarak sürekli gelişimi destekliyoruz.": {
        "en": "We support continuous development by centering on R&D and technology.",
        "ar": "ندعم التطوير المستمر من خلال وضع البحث والتطوير والتكنولوجيا في المركز."
    },
    "İnsana, topluma ve çevreye karşı sorumluluğumuzun bilincindeyiz.": {
        "en": "We are aware of our responsibility towards people, society, and the environment.",
        "ar": "نحن ندرك مسؤوليتنا تجاه الإنسان والمجتمع والبيئة."
    },
    "Ürün ve hizmetlerimizde uluslararası kalite standartlarını hedefliyoruz.": {
        "en": "We target international quality standards in our products and services.",
        "ar": "نستهدف أعلى معايير الجودة الدولية في منتجاتنا وخدماتنا."
    },
    "Faaliyetlerimizi açık, izlenebilir ve hesap verebilir şekilde yürütüyoruz.": {
        "en": "We conduct our operations openly, traceably, and accountably.",
        "ar": "ندير عملياتنا وأنشطتنا بطريقة شفافة وقابلة للتتبع والمساءلة."
    },
    "İnsan Kaynakları Politikamız": {
        "en": "Our Human Resources Policy",
        "ar": "سياسة الموارد البشرية لدينا"
    },
    "Seyitler Kimya olarak, başarımızın en önemli kaynağının çalışanlarımız olduğuna inanıyoruz.": {
        "en": "As Seyitler Kimya, we believe that the most important source of our success is our employees.",
        "ar": "بصفتنا سييتلر كيميا، نؤمن بأن أهم مصدر لنجاحنا هو موظفونا."
    },
    "Açık Pozisyonlar": {
        "en": "Open Positions",
        "ar": "الوظائف المتاحة"
    },
    "Güncel pozisyonlarımıza aşağıdaki bağlantıdan ulaşabilir, başvurunuzu kolayca iletebilirsiniz.": {
        "en": "You can reach our current positions via the link below and submit your application easily.",
        "ar": "يمكنكم الاطلاع على وظائفنا الحالية من خلال الرابط أدناه وإرسال طلبكم بسهولة."
    },
    "Kariyer.net Üzerinden Başvur": {
        "en": "Apply via Kariyer.net",
        "ar": "التقديم عبر Kariyer.net"
    },
    "Özgeçmişinizi İletin": {
        "en": "Submit Your CV",
        "ar": "أرسل سيرتك الذاتية"
    },
    "Genel başvuru için özgeçmişinizi doğrudan insan kaynakları departmanımıza iletebilirsiniz.": {
        "en": "For general applications, you can send your CV directly to our human resources department.",
        "ar": "للتقديم العام، يمكنك إرسال سيرتك الذاتية مباشرة إلى قسم الموارد البشرية."
    },
    "Cilde dost yapışkan": {
        "en": "Skin-friendly adhesive",
        "ar": "لاصق لطيف على البشرة"
    },
    "Cilt dostu yapışkan": {
        "en": "Skin-friendly adhesive",
        "ar": "لاصق لطيف على البشرة"
    },
    "Güçlü yapışma": {
        "en": "Strong adhesion",
        "ar": "التصاق قوي"
    },
    "Güçlü yapışkan ve sızdırmaz yapı": {
        "en": "Strong adhesive and leak-proof structure",
        "ar": "لاصق قوي وهيكل مانع للتسرب"
    },
    "Güçlü yapışma, elde kolay yırtılabilir": {
        "en": "Strong adhesion, easily tearable by hand",
        "ar": "التصاق قوي، سهل التمزيق باليد"
    },
    "Güçlü yapışma, elle kolayca yırtılabilir": {
        "en": "Strong adhesion, easily tearable by hand",
        "ar": "التصاق قوي، سهل التمزيق باليد"
    },
    "Güçlü, güvenilir sabitleme": {
        "en": "Strong, reliable fixation",
        "ar": "تثبيت قوي وموثوق"
    },
    "Bakteri ve virüslere karşı etkili bariyer": {
        "en": "Effective barrier against bacteria and viruses",
        "ar": "حاجز فعال ضد البكتيريا والفيروسات"
    },
    "Su geçirmez poliüretan film": {
        "en": "Waterproof polyurethane film",
        "ar": "غشاء بولي يوريثان مقاوم للماء"
    },
    "Hava geçirgen non-woven taşıyıcı": {
        "en": "Air-permeable non-woven backing",
        "ar": "قماش غير منسوج منفذ للهواء"
    },
    "Hava geçirgen nonwoven taşıyıcı": {
        "en": "Air-permeable nonwoven backing",
        "ar": "قماش غير منسوج منفذ للهواء"
    },
    "Hava geçirgen ve suya dayanıklı": {
        "en": "Air-permeable and water-resistant",
        "ar": "منفذ للهواء ومقاوم للماء"
    },
    "Hava geçirgen, esnek ipek kumaş taşıyıcı": {
        "en": "Air-permeable, flexible silk fabric backing",
        "ar": "قماش حريري مرن ومنفذ للهواء"
    },
    "Hava geçirgen, suya dayanıklı şeffaf taşıyıcı": {
        "en": "Air-permeable, water-resistant transparent backing",
        "ar": "حامل شفاف منفذ للهواء ومقاوم للماء"
    },
    "Elastik non-woven taşıyıcı": {
        "en": "Elastic non-woven backing",
        "ar": "قماش غير منسوج مرن"
    },
    "Elastik nonwoven taşıyıcı": {
        "en": "Elastic nonwoven backing",
        "ar": "قماش غير منسوج مرن"
    },
    "Elastik nonwoven, vücut konturuna uyum sağlar": {
        "en": "Elastic nonwoven adapts to body contours",
        "ar": "قماش مرن يتكيف مع ثنايا الجسم"
    },
    "Enine esneyebilir ve esnek yapı": {
        "en": "Transversely stretchable and flexible structure",
        "ar": "قابل للتمدد العرضي ومرن"
    },
    "Enine esneyebilir ve esnektir": {
        "en": "Transversely stretchable and flexible",
        "ar": "مرن وقابل للتمدد العرضي"
    },
    "Şeffaf poliüretan film": {
        "en": "Transparent polyurethane film",
        "ar": "غشاء بولي يوريثان شفاف"
    },
    "Şeffaf polietilen taşıyıcı": {
        "en": "Transparent polyethylene backing",
        "ar": "حامل بولي إيثيلين شفاف"
    },
    "Şeffaf ve su geçirmez": {
        "en": "Transparent and waterproof",
        "ar": "شفاف ومقاوم للماء"
    },
    "Şeffaf ve su geçirmez film taşıyıcı": {
        "en": "Transparent and waterproof film backing",
        "ar": "غشاء شفاف ومقاوم للماء"
    },
    "Şeffaf, su geçirmez taşıyıcı": {
        "en": "Transparent, waterproof backing",
        "ar": "حامل شفاف ومقاوم للماء"
    },
    "Şeffaf, su geçirmez, nefes alabilir film": {
        "en": "Transparent, waterproof, breathable film",
        "ar": "غشاء شفاف، مقاوم للماء، وقابل للتنفس"
    },
    "Göz çevresi anatomisine uygun tasarım": {
        "en": "Design anatomically suited for the eye contour",
        "ar": "تصميم ملائم تشريحياً لمنطقة العين"
    },
    "Göz anatomisine uygun ergonomik tasarım": {
        "en": "Ergonomic design suitable for eye anatomy",
        "ar": "تصميم مريح يتوافق مع تشريح العين"
    },
    "Hipoalerjenik yapışkan": {
        "en": "Hypoallergenic adhesive",
        "ar": "لاصق مضاد للحساسية"
    },
    "Hipoalerjenik ve hava geçirgen": {
        "en": "Hypoallergenic and air-permeable",
        "ar": "مضاد للحساسية ومنفذ للهواء"
    },
    "Hipoalerjenik, cildi tahriş etmez": {
        "en": "Hypoallergenic, does not irritate the skin",
        "ar": "مضاد للحساسية، لا يسبب تهيج البشرة"
    },
    "Hassas ciltlere uygundur": {
        "en": "Suitable for sensitive skin",
        "ar": "مناسب للبشرة الحساسة"
    },
    "Hassas ciltler için hipoalerjenik yapışkan": {
        "en": "Hypoallergenic adhesive for sensitive skin",
        "ar": "لاصق مضاد للحساسية للبشرة الحساسة"
    },
    "Hassas ve kırılgan ciltlere uygun silikon yapışkan": {
        "en": "Silicone adhesive suitable for fragile skin",
        "ar": "لاصق سيليكون للبشرة الحساسة والهشة"
    },
    "Acısız ve travmasız çıkarma": {
        "en": "Painless and atraumatic removal",
        "ar": "إزالة غير مؤلمة وبدون إصابة"
    },
    "Yeniden konumlandırılabilir": {
        "en": "Repositionable",
        "ar": "قابل لتغيير الموضع"
    },
    "Yumuşak silikon temas tabakası": {
        "en": "Soft silicone contact layer",
        "ar": "طبقة تلامس سيليكونية ناعمة"
    },
    "Yüksek emici ped": {
        "en": "High absorbent pad",
        "ar": "وسادة عالية الامتصاص"
    },
    "Yüksek emici merkezi ped": {
        "en": "High absorbent central pad",
        "ar": "وسادة مركزية عالية الامتصاص"
    },
    "Yüksek emici basınç pedi": {
        "en": "High absorbent pressure pad",
        "ar": "وسادة ضغط عالية الامتصاص"
    },
    "Ekstra emici bası pedi ile polietilen taşıyıcı": {
        "en": "Polyethylene backing with extra absorbent pressure pad",
        "ar": "حامل بولي إيثيلين مع وسادة ضغط فائقة الامتصاص"
    },
    "Ekstra emici basınç pedli polietilen taşıyıcı": {
        "en": "Polyethylene backing with extra absorbent pressure pad",
        "ar": "حامل بولي إيثيلين مع وسادة ضغط فائقة الامتصاص"
    },
    "Ekstra emici ped kanı emer ve kanamayı durdurmak için basınç uygular": {
        "en": "Extra absorbent pad absorbs blood and applies pressure to halt bleeding",
        "ar": "وسادة فائقة الامتصاص تمتص الدم وتضغط لوقف النزيف"
    },
    "Yaraya yapışmayan emici ped": {
        "en": "Non-adherent absorbent pad",
        "ar": "وسادة ماصة غير لاصقة بالجرح"
    },
    "Yaraya yapışmayan ped": {
        "en": "Non-adherent pad",
        "ar": "وسادة غير لاصقة بالجرح"
    },
    "Işık geçirmez orta ped": {
        "en": "Light-blocking central pad",
        "ar": "وسادة مركزية مانعة للضوء"
    },
    "Kapsaisin içeren ısıtıcı formül": {
        "en": "Warming formula containing Capsaicin",
        "ar": "تركيبة مسخنة تحتوي على الكابسايسين"
    },
    "Derinlemesine ve uzun süreli sıcaklık hissi": {
        "en": "Deep and long-lasting warming sensation",
        "ar": "إحساس دافئ عميق وطويل الأمد"
    },
    "Kas ve eklem rahatlatıcı etki": {
        "en": "Muscle and joint soothing effect",
        "ar": "تأثير مهدئ للعضلات والمفاصل"
    },
    "Gözenekli taşıyıcı cildin nefes almasını sağlar": {
        "en": "Porous backing allows skin to breathe",
        "ar": "حامل مسامي يسمح للبشرة بالتنفس"
    },
    "Röntgen ışınlarını geçirir (X-ray geçirgen)": {
        "en": "X-ray permeable",
        "ar": "منفذ للأشعة السينية (X-ray)"
    },
    "X-ray geçirgen": {
        "en": "X-ray permeable",
        "ar": "منفذ للأشعة السينية"
    },
    "Cerrahi kesiler ve yaralar için güvenli kapatma": {
        "en": "Secure closure for surgical incisions and wounds",
        "ar": "إغلاق آمن للشقوق الجراحية والجروح"
    },
    "Cerrahi dikiş ve zımbalara alternatif / destek": {
        "en": "Alternative / support for surgical sutures and staples",
        "ar": "بديل / داعم للغرز الجراحية والدبابيس"
    },
    "Güçlendirilmiş poliamid iplikler ile yüksek gerilme direnci": {
        "en": "High tensile strength with reinforced polyamide filaments",
        "ar": "مقاومة شد عالية مع خيوط بولي أميد مقواة"
    },
    "Minimal skar (iz) oluşumu": {
        "en": "Minimal scar formation",
        "ar": "تقليل تكوّن الندبات إلى أدنى حد"
    },
    "Dünyanın en büyük sağlık ve medikal fuarlarından biri olan WHX Dubai 2026 (World Health Expo)’da yenilikçi ürünlerimiz ve global vizyonumuzla yer alacağız.": {
        "en": "We will take part in WHX Dubai 2026 (World Health Expo), one of the world's largest healthcare and medical fairs, with our innovative products and global vision.",
        "ar": "سنشارك في معرض WHX دبي 2026، أحد أكبر المعارض الطبية في العالم، بمنتجاتنا المبتكرة ورؤيتنا العالمية."
    },
    "Dünyanın en büyük medikal fuarlarından biri olan MEDICA Düsseldorf 2025’te yer alacağımızı gururla duyuruyoruz.": {
        "en": "We proudly announce that we will participate in MEDICA Düsseldorf 2025, one of the world's largest medical exhibitions.",
        "ar": "نعلن بفخر مشاركتنا في معرض ميديكا دوسلدورف 2025، أحد أكبر المعارض الطبية في العالم."
    },
    "Dünya Seyitler'i Tercih Ediyor!": {
        "en": "The World Chooses Seyitler!",
        "ar": "العالم يختار سييتلر!"
    },
    "Distribütör Ekosistemine Katılın": {
        "en": "Join our Distributor Ecosystem",
        "ar": "انضم إلى شبكة موزعينا"
    },
    "Adres": {
        "en": "Address",
        "ar": "العنوان"
    },
    "E-posta": {
        "en": "Email",
        "ar": "البريد الإلكتروني"
    },
    "Kalite": {
        "en": "Quality",
        "ar": "الجودة"
    },
    "Keşfet": {
        "en": "Discover",
        "ar": "اكتشف"
    },
    "Kutu İçi": {
        "en": "Box Qty",
        "ar": "في العلبة"
    },
    "Koli İçi": {
        "en": "Case Qty",
        "ar": "في الكرتون"
    },
    "Katalogdaki konfigürasyona göre": {
        "en": "According to catalog configuration",
        "ar": "وفقاً لمواصفات الكتالوج"
    },
    "50–100 adet": {
        "en": "50–100 pcs",
        "ar": "50–100 قطعة"
    },
    "English": {
        "en": "English",
        "ar": "English"
    },
    "Türkçe": {
        "en": "Türkçe",
        "ar": "Türkçe"
    },
    "عربي": {
        "en": "عربي",
        "ar": "عربي"
    },
    "Farklı ÜrünÜretimi": {
        "en": "Different Product Lines",
        "ar": "خطوط إنتاج مختلفة"
    },
    "Kapalı AlandaModern Üretim Tesisi": {
        "en": "Modern Production Facility in Indoor Area",
        "ar": "منشأة إنتاج حديثة في مساحة مغلقة"
    },
    "DistribütörEkosistemine Katılın": {
        "en": "Join our Distributor Ecosystem",
        "ar": "انضم إلى شبكة موزعينا"
    },
    "Dünya Seyitler'iTercih Ediyor!": {
        "en": "The World Chooses Seyitler!",
        "ar": "العالم يختار سييتلر!"
    },
    "Ar-Ge ile GeleceğiŞekillendiriyoruz": {
        "en": "Shaping the Future with R&D",
        "ar": "نشكل المستقبل من خلال البحث والتطوير"
    },
    "Derma Pore": {
        "en": "Derma Pore",
        "ar": "ديرما بور"
    },
    "Dermafix Plus": {
        "en": "Dermafix Plus",
        "ar": "ديرمافيكس بلس"
    },
    "Maxipore Dress": {
        "en": "Maxipore Dress",
        "ar": "ماكسيبور دريس"
    },
    "Maxipore I.V. (Nonwoven)": {
        "en": "Maxipore I.V. (Nonwoven)",
        "ar": "ماكسيبور آي في (غير منسوج)"
    },
    "Maxipore PU Dress": {
        "en": "Maxipore PU Dress",
        "ar": "ماكسيبور بي يو دريس"
    },
    "Maxifix": {
        "en": "Maxifix",
        "ar": "ماكسيفيكس"
    },
    "Novafilm": {
        "en": "Novafilm",
        "ar": "نوفافيلم"
    },
    "Novafilm I.V.": {
        "en": "Novafilm I.V.",
        "ar": "نوفافيلم آي في"
    },
    "Novapore": {
        "en": "Novapore",
        "ar": "نوفابور"
    },
    "Novapore Pad": {
        "en": "Novapore Pad",
        "ar": "نوفابور باد"
    },
    "Novapore Şerit": {
        "en": "Novapore Strip",
        "ar": "شريط نوفابور"
    },
    "Novatape": {
        "en": "Novatape",
        "ar": "نوفاتيب"
    },
    "Nova-Silk": {
        "en": "Nova-Silk",
        "ar": "نوفا-سيلك"
    },
    "Nova-Trans": {
        "en": "Nova-Trans",
        "ar": "نوفا-ترانس"
    },
    "Novafix": {
        "en": "Novafix",
        "ar": "نوفافيكس"
    },
    "Novaped": {
        "en": "Novaped",
        "ar": "نوفابيد"
    },
    "Novacaps": {
        "en": "Novacaps",
        "ar": "نوفاكابس"
    },
    "Octacare": {
        "en": "Octacare",
        "ar": "أوكتاكير"
    },
    "Octa-Care": {
        "en": "Octa-Care",
        "ar": "أوكتا-كير"
    },
    "Octamed": {
        "en": "Octamed",
        "ar": "أوكتاميد"
    },
    "Unipore": {
        "en": "Unipore",
        "ar": "يونيبور"
    },
    "Unipore Band": {
        "en": "Unipore Band",
        "ar": "شريط يونيبور"
    },
    "Uniplast": {
        "en": "Uniplast",
        "ar": "يونيپلاست"
    },
    "Sanitas": {
        "en": "Sanitas",
        "ar": "سانيتاس"
    },
    "Seyitler Topplast": {
        "en": "Seyitler Topplast",
        "ar": "سييتلر توب بلاست"
    },
    "Seyitler Capsicum": {
        "en": "Seyitler Capsicum",
        "ar": "سييتلر كابسايسين"
    },
    "Hareketle uyumlu, nem yönetimi sağlayan su geçirmez şeffaf film": {
        "en": "Waterproof transparent film providing moisture management and movement conformity",
        "ar": "غشاء شفاف مقاوم للماء يوفر إدارة الرطوبة ويتوافق مع الحركة"
    },
    "Hareketle uyumlu, nem yönetimi sağlayan şeffaf su geçirmez film": {
        "en": "Transparent waterproof film providing moisture management and movement conformity",
        "ar": "غشاء شفاف مقاوم للماء يوفر إدارة الرطوبة ويتوافق مع الحركة"
    },
    "Hareketle uyumlu, su geçirmez şeffaf film taşıyıcı": {
        "en": "Waterproof transparent film backing conforming to movement",
        "ar": "حامل غشائي شفاف مقاوم للماء ومتوافق مع الحركة"
    },
    "Hareketle uyumlu, su geçirmez şeffaf film ve non-adherent ped": {
        "en": "Movement conforming, waterproof transparent film and non-adherent pad",
        "ar": "غشاء شفاف مقاوم للماء مع وسادة غير لاصقة متوافقة مع الحركة"
    },
    "Hassas ciltler için hipoalerjenik yapışkanlı kâğıt cerrahi plaster.": {
        "en": "Hypoallergenic adhesive paper surgical plaster for sensitive skin.",
        "ar": "لاصق جراحي ورقي بمادة لاصقة مضادة للحساسية للبشرة الحساسة."
    },
    "Hassas ciltler için nazik ve güvenli yapışma": {
        "en": "Gentle and secure adhesion for sensitive skin",
        "ar": "التصاق لطيف وآمن للبشرة الحساسة"
    },
    "Hassas ciltler için nazik ve güvenli yapışma, hipoalerjenik": {
        "en": "Gentle and secure adhesion for sensitive skin, hypoallergenic",
        "ar": "التصاق لطيف وآمن للبشرة الحساسة، مضاد للحساسية"
    },
    "Hava ve neme geçirgen": {
        "en": "Permeable to air and moisture",
        "ar": "منفذ للهواء والرطوبة"
    },
    "Hava ve su buharına yüksek geçirgenlik": {
        "en": "High permeability to air and water vapor",
        "ar": "نفاذية عالية للهواء وبخار الماء"
    },
    "Hemodiyaliz bası bandı": {
        "en": "Hemodialysis pressure tape",
        "ar": "شريط ضغط لغسيل الكلى"
    },
    "Hemodiyaliz sonrası ve kanamanın devam ettiği enjeksiyonlarda kullanılan hemostatik bası bandajı.": {
        "en": "Hemostatic pressure bandage used after hemodialysis and injections where bleeding continues.",
        "ar": "ضمادة ضغط لوقف النزيف تُستخدم بعد غسيل الكلى وفي الحقن التي يستمر فيها النزيف."
    },
    "Hemodiyaliz sonrası ve kanamanın devam ettiği enjeksiyonlarda kullanılan hemostatik basınç bandajı.": {
        "en": "Hemostatic pressure bandage used after hemodialysis and injections where bleeding continues.",
        "ar": "ضمادة ضغط لوقف النزيف تُستخدم بعد غسيل الكلى وفي الحقن التي يستمر فيها النزيف."
    },
    "Kanı emen ve kanamayı durdurmak için bası uygulayan ped": {
        "en": "Pad that absorbs blood and applies pressure to stop bleeding",
        "ar": "وسادة تمتص الدم وتضغط لإيقاف النزيف"
    },
    "Kolay uygulanabilir": {
        "en": "Easy to apply",
        "ar": "سهل الاستخدام والتطبيق"
    },
    "Kolay uygulanabilir tasarım": {
        "en": "Easy-to-apply design",
        "ar": "تصميم سهل الاستخدام والتطبيق"
    },
    "Kolay ve düz, çift yönde yırtılabilir": {
        "en": "Easy and straight bidirectional tearing",
        "ar": "سهل ومستقيم التمزيق في كلا الاتجاهين"
    },
    "Kolay, düz ve çift yönlü yırtılabilir": {
        "en": "Easy, straight, bidirectional tearing",
        "ar": "سهل ومستقيم التمزيق في كلا الاتجاهين"
    },
    "I.V. kateter bölgelerini ve yaraları korumak, cilt üzerine cihaz tespiti ve nemli iyileşme ortamı sağlamak için şeffaf film örtü.": {
        "en": "Transparent film dressing to protect I.V. catheter sites and wounds, secure devices on the skin, and provide a moist healing environment.",
        "ar": "ضمادة غشائية شفافة لحماية مواقع القسطرة الوريدية والجروح وتثبيت الأجهزة الطبية وتوفير بيئة شفاء رطبة."
    },
    "1991 Yılında kurulan firmanın odak noktası, sağlık hizmeti sunanlara ve hastalara yüksek kaliteli çözümler sunan ve CE, ISO 9001, ISO 13485 ve GMP standartlarına uygun tıbbi plaster ürünleri geliştirmektir.": {
        "en": "Founded in 1991, the company's focus is to develop medical plaster products compliant with CE, ISO 9001, ISO 13485, and GMP standards, providing high-quality solutions to healthcare providers and patients.",
        "ar": "تأسست الشركة عام 1991، ويرتكز عملها على تطوير منتجات اللواصق الطبية المتوافقة مع معايير CE و ISO 9001 و ISO 13485 و GMP لتقديم حلول عالية الجودة لمقدمي الرعاية الصحية والمرضى."
    },
    "1991’den bu yana sağlık sektöründe kalite, güven ve sürdürülebilir üretim anlayışıyla yol alan Seyitler Kimya, 35. kuruluş yılında yenilenen ürün portföyü ve güçlü Ar-Ge altyapısıyla yeni bir büyüme dönemine adım atıyor.": {
        "en": "Seyitler Kimya, advancing in the healthcare sector since 1991 with quality, trust, and sustainable manufacturing, enters a new era of growth in its 35th year with a renewed product portfolio and robust R&D infrastructure.",
        "ar": "تتقدم سييتلر كيميا في قطاع الرعاية الصحية منذ عام 1991 بجودة وثقة وإنتاج مستدام، وتدخل حقبة جديدة من النمو في عامها الـ 35 بمحفظة منتجات متجددة وبنية تحتية قوية للبحث والتطوير."
    },
    "Seyitler Kimya, yerli üretim gücünü uluslararası kalite standartlarıyla buluşturarak, dünya çapında güvenilir bir tedarikçi konumuna ulaşmıştır.": {
        "en": "By uniting domestic manufacturing power with international quality standards, Seyitler Kimya has achieved the position of a trusted supplier worldwide.",
        "ar": "من خلال الجمع بين قوة الإنتاج المحلي ومعايير الجودة الدولية، أصبحت سييتلر كيميا موردًا موثوقًا به على مستوى العالم."
    },
    "Bugün ürünlerimiz; Avrupa, Orta Doğu, Kuzey Afrika ve Orta Asya’daki 17’den fazla ülkede sağlık profesyonelleri tarafından tercih edilmektedir.": {
        "en": "Today our products are preferred by healthcare professionals in more than 17 countries across Europe, the Middle East, North Africa, and Central Asia.",
        "ar": "واليوم يفضل منتجاتنا المتخصصون في الرعاية الصحية في أكثر من 17 دولة في أوروبا والشرق الأوسط وشمال أفريقيا وآسيا الوسطى."
    },
    "Küresel büyüme stratejimizin temelinde; bilimsel üretim, esnek lojistik ve güçlü iş ortaklıkları yer alır. Her ülkenin medikal regülasyonlarına uygunluk (CE, ISO 13485, UTS, GBTU vb.) süreçleri dikkatle yürütülür.": {
        "en": "At the core of our global growth strategy lie scientific production, flexible logistics, and strong partnerships. Compliance with each country's medical regulations (CE, ISO 13485, UTS, GBTU, etc.) is carefully conducted.",
        "ar": "يرتكز جوهر استراتيجيتنا للنمو العالمي على الإنتاج العلمي واللوجستيات المرنة والشراكات القوية. وتتم متابعة الامتثال للأنظمة الطبية في كل بلد (CE, ISO 13485, UTS, GBTU إلخ) بعناية."
    },
    "Distribütör ve iş ortaklarımıza, sadece ürün değil; teknik dokümantasyon, eğitim, test ve satış sonrası destek sağlayarak uzun vadeli iş birliği modelleri sunuyoruz.": {
        "en": "We offer long-term cooperation models to our distributors and business partners by providing not only products, but also technical documentation, training, testing, and after-sales support.",
        "ar": "نقدم لنظرائنا وموزعينا وشركائنا نماذج تعاون طويلة الأجل من خلال توفير التوثيق الفني والتدريب والاختبار والدعم الفني بالإضافة إلى المنتجات."
    },
    "Distribütör ve iş ortaklarımıza, sadece ürün değil; teknik dokümantasyon, eğitim, test ve satış sonrası destek sağlayarak uzun vadeli iş birliği modelleri sunuyoruz. Seyitler Kimya, “Made in Türkiye” markasını sağlık teknolojilerinde ileriye taşımak hedefiyle, partnerleri ile düzenli uluslararası fuarlarda ev sahipliği yapmaktadır.Bu katılımlar, global sahnede Türk medikal sektörünün inovasyon gücünü temsil etmektedir.": {
        "en": "We offer long-term cooperation models to our distributors and partners. With the goal of advancing the 'Made in Türkiye' brand in health technologies, Seyitler Kimya regularly hosts with partners at international fairs. These participations represent the innovative power of the Turkish medical sector on the global stage.",
        "ar": "نقدم نماذج تعاون طويلة الأجل لموزعينا وشركائنا. بهدف تعزيز علامة 'صنع في تركيا' في التقنيات الصحية، تستضيف سييتلر كيميا فعاليات مشتركة في المعارض الدولية، مما يعكس قوة الابتكار في القطاع الطبي التركي على الساحة العالمية."
    },
    "Her yeni ülke, sadece bir pazar değil; bilimsel iş birliği ve güven köprüsü anlamına gelir.": {
        "en": "Each new country is not just a market, but a bridge of scientific cooperation and trust.",
        "ar": "كل دولة جديدة ليست مجرد سوق، بل هي جسر للتعاون العلمي والثقة المتبادلة."
    },
    "Her yeni ülke, sadece bir pazar değil; bilimsel iş birliği ve güven köprüsü anlamına gelir. Bizim için ihracat, üretimi sınırların ötesine taşımaktan fazlasıdır — bilimi, kaliteyi ve insan sağlığını dünyanın her noktasına ulaştırma sorumluluğudur.": {
        "en": "Each new country is not just a market, but a bridge of scientific cooperation and trust. For us, export is more than taking manufacturing beyond borders — it is the responsibility to deliver science, quality, and human health to every corner of the world.",
        "ar": "كل بلد جديد ليس مجرد سوق، بل جسر للتعاون العلمي والثقة. بالنسبة لنا، التصدير أكثر من مجرد إنتاج عابر للحدود — إنه مسؤولية إيصال العلم والجودة وصحة الإنسان إلى العالم."
    },
    "Seyitler Kimya olarak, borsada işlem gören kurumsal yapımızla yatırımcılar için güvenilir bir marka konumundayız. Yurt içinde DMO ihaleleri ve yetkili distribütörler aracılığıyla yurt dışında ise bayiler, brokerlar, traderlar ve medikal distribütörler üzerinden satış faaliyetlerimizi yürütüyoruz. Ürünlerimiz, sadece iş ortaklarımız aracılığıyla son kullanıcıya ve ihtiyaç duyulan yerlere ulaşıyor.": {
        "en": "As Seyitler Kimya, with our publicly traded corporate structure on the stock exchange, we stand as a trusted brand for investors. Domestically through DMO tenders and authorized distributors, and internationally via dealers, brokers, traders, and medical distributors, we conduct our sales activities. Our products reach end users and needed facilities exclusively through our partners.",
        "ar": "بصفتنا سييتلر كيميا، وبفضل هيكلنا المؤسسي المدرج في البورصة، نعد علامة موثوقة للمستثمرين. محلياً عبر مناقصات DMO والموزعين المعتمدين، ودولياً عبر الوكلاء والتجار وموزعي الأجهزة الطبية، ندير أنشطة المبيعات لتصل المنتجات إلى المستخدم النهائي عبر شركائنا فقط."
    },
    "Her bir çalışanımız, üretim süreçlerinde yüksek verimlilik ve kaliteyi sağlamak üzere eğitiliyor; görev tanımları net şekilde belirlenirken sorumluluk alanları, kurumsal yapımızla uyumlu şekilde yapılandırılıyor. Operatörlerimiz, makine parkurumuzu etkin şekilde kullanarak uluslararası standartlara uygun üretim gerçekleştiriyor.": {
        "en": "Each of our employees is trained to ensure high efficiency and quality in manufacturing processes; job descriptions are clearly defined while areas of responsibility are aligned with our corporate structure. Our operators effectively utilize our machinery to manufacture in accordance with international standards.",
        "ar": "يتم تدريب كل موظف لدينا لضمان الكفاءة العالية والجودة في عمليات الإنتاج؛ ويتم تحديد المهام بوضوح ومواءمة المسؤوليات مع الهيكل المؤسسي، مما يتيح تشغيل الآلات بفعالية وفقاً للمعايير الدولية."
    },
    "Her proje, “Bilimden ürüne, üründen sağlığa” prensibiyle yürütülür — çünkü inovasyon, Seyitler Kimya’da sadece bir hedef değil, şirket kültürünün merkezidir.": {
        "en": "Every project is conducted on the principle 'from science to product, from product to health' — because at Seyitler Kimya, innovation is not just a goal, but the core of company culture.",
        "ar": "يتم تنفيذ كل مشروع على مبدأ 'من العلم إلى المنتج، ومن المنتج إلى الصحة' — لأن الابتكار في سييتلر كيميا ليس مجرد هدف، بل هو جوهر ثقافة الشركة."
    },
    "Her ürün, mühendislik bilgisiyle insan sağlığına dokunma misyonunu bir araya getirir.": {
        "en": "Every product brings together engineering expertise with the mission of touching human health.",
        "ar": "يجمع كل منتج بين الخبرة الهندسية ومهمة خدمة صحة الإنسان."
    },
    "Irak’ın Bağdat kentinde düzenlenen Health Expo – Uluslararası Sağlık, Medikal ve Eczacılık Fuarı’na dair paylaşımımızı keşfedin.": {
        "en": "Discover our post about Health Expo – International Healthcare, Medical and Pharmaceutical Fair held in Baghdad, Iraq.",
        "ar": "اكتشف منشورنا حول معرض الصحة - المعرض الدولي للصحة والطب والصيدلة المقام في بغداد، العراق."
    },
    "Kurulduğu günden bu yana “yerli üretimle küresel rekabet” vizyonunu benimseyen Seyitler Kimya, araştırma ve geliştirmeyi her süreçte merkeze alır.": {
        "en": "Embracing the vision of 'global competition with domestic production' since day one, Seyitler Kimya puts research and development at the center of every process.",
        "ar": "تتبنى سييتلر كيميا منذ تأسيسها رؤية 'المنافسة العالمية بالإنتاج المحلي'، وتضع البحث والتطوير في صميم كل عملية."
    },
    "Laboratuvar altyapımız; mikrobiyolojik, fiziksel ve kimyasal test laboratuvarlarını, ayrıca yeni formülasyon geliştirme ve prototip üretim alanlarını içerir.": {
        "en": "Our laboratory infrastructure includes microbiological, physical, and chemical testing laboratories, as well as formulation development and prototype production areas.",
        "ar": "تشمل بنيتنا التحتية للمختبرات مختبرات الاختبارات الميكروبيولوجية والفيزيائية والكيميائية، بالإضافة إلى مجالات تطوير التركيبات الجديدة وإنتاج النماذج الأولية."
    },
    "Manisa Organize Sanayi Bölgesi kampüsümüzde üretim, Ar-Ge ve lojistik ekiplerimiz bulunur.": {
        "en": "Our manufacturing, R&D, and logistics teams are located at our campus in Manisa Organized Industrial Zone.",
        "ar": "تتواجد فرق الإنتاج والبحث والتطوير والخدمات اللوجستية في مجمعنا بمنطقة مانيسا الصناعية المنظمة."
    },
    "Manisa Turgutlu Organize Sanayi Bölgesi’ndeki modern tesislerinde, flaster, hidrojel ve hot-melt kaplama teknolojilerine dayalı medikal ürünleri uluslararası kalite standartlarına uygun olarak üretmektedir.": {
        "en": "In its modern facilities in Manisa Turgutlu Organized Industrial Zone, it manufactures medical products based on plaster, hydrogel, and hot-melt coating technologies in accordance with international quality standards.",
        "ar": "في منشآتها الحديثة في منطقة مانيسا تورغوتلو الصناعية، تنتج منتجات طبية قائمة على تقنيات اللواصق والهيدروجيل والطلاء بالصهر الساخن وفقاً لمعايير الجودة الدولية."
    },
    "Müşteri başarı, ihracat ve Ar-Ge ekiplerimiz her zaman diliminde aynı özenle yanınızdadır.": {
        "en": "Our customer success, export, and R&D teams stand by you with the same diligence across all time zones.",
        "ar": "فرق نجاح العملاء والتصدير والبحث والتطوير لدينا تقف بجانبكم بنفس العناية والاهتمام في جميع المناطق الزمنية."
    },
    "Sadece bir mesaj uzağınızdayız": {
        "en": "We are just a message away",
        "ar": "نحن على بعد رسالة واحدة فقط"
    },
    "İş ortaklığı, tedarikçi veya medya taleplerinizi paylaşın.": {
        "en": "Share your partnership, supplier, or media inquiries.",
        "ar": "شاركنا استفسارات الشراكة أو التوريد أو الاستفسارات الإعلامية."
    },
    "Bu form demo amaçlıdır. Acil talepleriniz için telefon veya e-posta kullanın.": {
        "en": "This form is for demo purposes. Use phone or email for urgent inquiries.",
        "ar": "هذا النموذج تجريبي. يُرجى استخدام الهاتف أو البريد الإلكتروني للطلبات العاجلة."
    },
    "Hafta içi 09:00 – 18:00 (GMT+3) arasında bize ulaşabilirsiniz.": {
        "en": "You can reach us on weekdays between 09:00 – 18:00 (GMT+3).",
        "ar": "يمكنكم التواصل معنا خلال أيام الأسبوع من 09:00 إلى 18:00 (GMT+3)."
    },
    "Ar-Ge merkezimiz, TÜBİTAK, TÜSEB ve seçkin üniversitelerle yürütülen ortak projeler sayesinde, tıbbi yapışkan teknolojilerinde Türkiye’nin öncü geliştirme merkezi haline gelmiştir.": {
        "en": "Thanks to joint projects carried out with TÜBİTAK, TÜSEB, and distinguished universities, our R&D center has become Turkey's leading development center in medical adhesive technologies.",
        "ar": "بفضل المشاريع المشتركة المنفذة مع TÜBİTAK و TÜSEB والجامعات المرموقة، أصبح مركز البحث والتطوير لدينا مركز التطوير الرائد في تركيا في تقنيات اللواصق الطبية."
    },
    "Ar-Ge ve inovasyona dayalı üretim anlayışımızla geleceğin tedavi çözümlerini geliştirmek,": {
        "en": "Developing future treatment solutions with our R&D and innovation-based manufacturing philosophy,",
        "ar": "تطوير حلول علاجية مستقبلية بفلسفتنا الإنتاجية القائمة على البحث والتطوير والابتكار،"
    },
    "Bilimsel bilgi birikiminin üretim tecrübelerimizle birleştirerek katma değeri yüksek çözümler": {
        "en": "High value-added solutions by combining scientific knowledge with manufacturing experience",
        "ar": "حلول عالية القيمة المضافة من خلال الجمع بين المعرفة العلمية والخبرة الإنتاجية"
    },
    "Bu kapsamda ürünlerin klinik güvenliği, yapışma performansı, cilt uyumluluğu ve uzun süreli stabilitesi bilimsel testlerle değerlendirilir.": {
        "en": "In this context, clinical safety, adhesion performance, skin compatibility, and long-term stability of products are evaluated with scientific tests.",
        "ar": "في هذا السياق، يتم تقييم السلامة السريرية وأداء الالتصاق وملاءمة البشرة واستقرار المنتجات على المدى الطويل من خلال الاختبارات العلمية."
    },
    "Bu yaklaşım, firmayı yerli tıbbi cihaz üretiminde bilimsel katma değer üreten bir marka konumuna taşımaktadır.": {
        "en": "This approach elevates the company to the position of a brand generating scientific value-added in domestic medical device manufacturing.",
        "ar": "يرتقي هذا النهج بالشركة إلى مكانة علامة تجارية تنتج قيمة مضافة علمية في تصنيع الأجهزة الطبية المحلية."
    },
    "Bugün Seyitler Kimya, 17’den fazla ülkeye yaptığı ihracatla, güvenilir, sürdürülebilir ve yenilikçi medikal çözümleri dünya pazarına sunmaktadır.": {
        "en": "Today, Seyitler Kimya exports to more than 17 countries, providing reliable, sustainable, and innovative medical solutions to the world market.",
        "ar": "تصدر سييتلر كيميا اليوم إلى أكثر من 17 دولة، وتقدم حلولاً طبية موثوقة ومستدامة ومبتكرة للسوق العالمية."
    },
    "10x10": {
        "en": "10x10",
        "ar": "10x10"
    },
    "10x12": {
        "en": "10x12",
        "ar": "10x12"
    },
    "10x15": {
        "en": "10x15",
        "ar": "10x15"
    },
    "10x2.5": {
        "en": "10x2.5",
        "ar": "10x2.5"
    },
    "10x2.5 (12'li)": {
        "en": "10x2.5 (Pack of 12)",
        "ar": "10x2.5 (عبوة من 12)"
    },
    "10x20": {
        "en": "10x20",
        "ar": "10x20"
    },
    "10x25": {
        "en": "10x25",
        "ar": "10x25"
    },
    "10x5": {
        "en": "10x5",
        "ar": "10x5"
    },
    "15x20": {
        "en": "15x20",
        "ar": "15x20"
    },
    "20x30": {
        "en": "20x30",
        "ar": "20x30"
    },
    "30x72": {
        "en": "30x72",
        "ar": "30x72"
    },
    "38x38": {
        "en": "38x38",
        "ar": "38x38"
    },
    "38x72": {
        "en": "38x72",
        "ar": "38x72"
    },
    "5x1.25": {
        "en": "5x1.25",
        "ar": "5x1.25"
    },
    "5x10": {
        "en": "5x10",
        "ar": "5x10"
    },
    "5x2.5": {
        "en": "5x2.5",
        "ar": "5x2.5"
    },
    "5x5": {
        "en": "5x5",
        "ar": "5x5"
    },
    "6x7": {
        "en": "6x7",
        "ar": "6x7"
    },
    "6x8": {
        "en": "6x8",
        "ar": "6x8"
    },
    "7x6": {
        "en": "7x6",
        "ar": "7x6"
    },
    "7x9": {
        "en": "7x9",
        "ar": "7x9"
    },
    "8.5x11.5": {
        "en": "8.5x11.5",
        "ar": "8.5x11.5"
    },
    "8x6": {
        "en": "8x6",
        "ar": "8x6"
    },
    "9x10": {
        "en": "9x10",
        "ar": "9x10"
    },
    "9x15": {
        "en": "9x15",
        "ar": "9x15"
    },
    "9x20": {
        "en": "9x20",
        "ar": "9x20"
    },
    "9x25": {
        "en": "9x25",
        "ar": "9x25"
    },
    "9x30": {
        "en": "9x30",
        "ar": "9x30"
    },
    "9x5": {
        "en": "9x5",
        "ar": "9x5"
    },
    "Seyitler Kimya 35. Yılında Geleceğe Hazırlanıyor": {
        "en": "Seyitler Kimya Prepares for the Future in Its 35th Year",
        "ar": "سييتلر كيميا تستعد للمستقبل في عامها الـ 35"
    },
    "Seyitler Kimya'dan Yeni Ar-Ge Yatırımı: Seyka Sağlık Teknolojileri": {
        "en": "New R&D Investment from Seyitler Kimya: Seyka Health Technologies",
        "ar": "استثمار جديد في البحث والتطوير من سييتلر كيميا: سيكا للتقنيات الصحية"
    },
    "Seyitler Kimya’den Yeni Ürün: SILIONYX": {
        "en": "New Product from Seyitler Kimya: SILIONYX",
        "ar": "منتج جديد من سييتلر كيميا: SILIONYX"
    },
    "Seyitler Kimya, MEDICA Düsseldorf 2025’te!": {
        "en": "Seyitler Kimya at MEDICA Düsseldorf 2025!",
        "ar": "سييتلر كيميا في معرض ميديكا دوسلدورف 2025!"
    },
    "Seyitler Kimya, WHX Dubai 2026’da!": {
        "en": "Seyitler Kimya at WHX Dubai 2026!",
        "ar": "سييتلر كيميا في معرض WHX دبي 2026!"
    },
    "WHX Dubai 2026 Başladı!": {
        "en": "WHX Dubai 2026 Has Begun!",
        "ar": "بدأ معرض WHX دبي 2026!"
    },
    "Health Expo Irak Bağdat – Uluslararası Sağlık, Medikal ve Eczacılık Fuarı": {
        "en": "Health Expo Iraq Baghdad – International Healthcare, Medical and Pharmaceutical Fair",
        "ar": "معرض الصحة العراق بغداد – المعرض الدولي للصحة والطب والصيدلة"
    },
    "Seyitler Kimya A.Ş. olarak, Ege Üniversitesi Teknopark bünyesinde kurulan Ar-Ge şirketimiz Seyka Sağlık Teknolojileri San. Tic. A.Ş. ile bilim, teknoloji ve yenilik odaklı yolculuğumuzda yeni bir dönemi başlatıyoruz. Sağlık alanında katma değerli, sürdürülebilir ve yenilikçi çözümler üretme hedefimizi bu önemli adımla güçlendiriyoruz.": {
        "en": "As Seyitler Kimya A.Ş., we initiate a new era in our journey focused on science, technology, and innovation with our R&D company Seyka Health Technologies established within Ege University Technopark. We strengthen our goal of producing value-added, sustainable, and innovative solutions in healthcare with this significant step.",
        "ar": "بصفتنا شركة سييتلر كيميا، نبدأ حقبة جديدة في مسيرتنا التي تركز على العلم والتكنولوجيا والابتكار مع شركة البحث والتطوير التابعة لنا 'سيكا للتقنيات الصحية' في حديقة التكنولوجيا بجامعة إيجه، معززين هدفنا في إنتاج حلول مبتكرة ومستدامة في الرعاية الصحية."
    },
    "Seyitler Kimya A.Ş. olarak, dünyanın en büyük sağlık ve medikal fuarlarından biri olan World Health Expo (WHX) Dubai 2026’da yerimizi aldık! 9–12 Şubat 2026 tarihleri arasında Dubai Exhibition Centre’da, yenilikçi ürünlerimiz ve çözümlerimizle sizleri standımızda ağırlamaktan memnuniyet duyacağız.": {
        "en": "As Seyitler Kimya A.Ş., we took our place at World Health Expo (WHX) Dubai 2026, one of the world's largest healthcare and medical exhibitions! Between February 9–12, 2026 at the Dubai Exhibition Centre, we will be pleased to welcome you at our booth with our innovative products and solutions.",
        "ar": "بصفتنا شركة سييتلر كيميا، حجزنا مكاننا في معرض World Health Expo (WHX) دبي 2026! ويسعدنا أن نرحب بكم في جناحنا لعرض منتجاتنا وحلولنا المبتكرة في مركز دبي للمعارض."
    },
    "Seyitler Kimya olarak, yara izi bakımı ve cilt onarımına yönelik ürün portföyümüze yeni nesil bir çözüm ekliyoruz. SILIONYX Silikon Jel Flaster, cerrahi izler ve skar dokusunun görünümünü azaltmaya yardımcı olmak üzere geliştirilmiştir. Yumuşak ve esnek silikon jel yapısı sayesinde cilde nazikçe uyum sağlar. Nefes alabilen ve suya dayanıklı formu ile günlük kullanımda konfor sunarken, hassas ciltlerde güvenle kullanılabilir. Uzun süreli ve düzenli kullanım için uygun yapısı ile yara iyileşme sürecini destekler. Seyitler Kimya olarak, bilim temelli ve kullanıcı odaklı çözümlerimizle sağlık sektörüne değer katmaya devam ediyoruz. 📌 SILIONYX – Yeni ürünümüz çok yakında.": {
        "en": "As Seyitler Kimya, we add a next-generation solution to our product portfolio for scar care and skin repair. SILIONYX Silicone Gel Plaster is developed to help reduce the appearance of surgical scars and scar tissue. Its soft and flexible silicone gel adapts gently to the skin. With its breathable and waterproof form, it offers daily comfort and safe use on sensitive skin. Supporting the healing process with regular use, we continue to add value to healthcare with science-based solutions. 📌 SILIONYX – Coming very soon.",
        "ar": "بصفتنا سييتلر كيميا، نضيف حلاً من الجيل الجديد لمحفظتنا الخاصة بالعناية بالندبات وترميم الجلد. تم تطوير لاصق جل السيليكون SILIONYX للمساعدة في تقليل مظهر الندبات الجراحية. بفضل الجل الناعم والمرن، يتكيف بلطف مع البشرة ويوفر الراحة اليومية والاستخدام الآمن على البشرة الحساسة. 📌 SILIONYX – قريباً جداً."
    },
    "Misyonumuz": {
        "en": "Our Mission",
        "ar": "رسالتنا"
    },
    "Vizyonumuz": {
        "en": "Our Vision",
        "ar": "رؤيتنا"
    },
    "Tanım": {
        "en": "Description",
        "ar": "الوصف"
    },
    "Teknopark İnovasyonu": {
        "en": "Technopark Innovation",
        "ar": "ابتكار الحدائق التكنولوجية"
    },
    "Piyasaya Sunum": {
        "en": "Market Launch",
        "ar": "طرح المنتجات في السوق"
    },
    "Üniversite-Sanayi İşbirlikleri": {
        "en": "University-Industry Collaborations",
        "ar": "التعاون بين الجامعات والصناعة"
    },
    "Sağlıkta GüveninGlobal Adı": {
        "en": "The Global Name of Trust in Healthcare",
        "ar": "الاسم العالمي للثقة في الرعاية الصحية"
    },
    "Seyitler Kimya San. A.S Türkiye’de Tıbbi Plaster, yara örtüsü, ilk yardım bantları ve kapsikumlu yakı üreten, sektöründe lider bir kuruluştur.": {
        "en": "Seyitler Kimya San. A.S. is a leading company in Turkey producing medical plasters, wound dressings, first aid strips, and capsicum plasters.",
        "ar": "شركة سييتلر كيميا هي مؤسسة رائدة في تركيا تنتج اللواصق الطبية وضمادات الجروح وأشرطة الإسعافات الأولية ولواصق الكابسايسين."
    },
    "Orta Doğu, Afrika, Türk Cumhuriyetleri, Avrupa ve Amerika başta olmak üzere 17 ülkeye düzenli ihracat yapan Seyitler Kimya, sağlık sektöründe global bir çözüm ortağıdır. Farklı iklim ve coğrafyalarda, aynı kaliteye sahip ürünlerimizle hizmetinizdeyiz.": {
        "en": "Exporting regularly to 17 countries, notably the Middle East, Africa, Turkic Republics, Europe, and America, Seyitler Kimya is a global solution partner in the healthcare sector. We are at your service across different climates and geographies with products of the same high quality.",
        "ar": "تعد سييتلر كيميا شريك حلول عالمي يصدر بانتظام إلى 17 دولة في الشرق الأوسط وأفريقيا وأوروبا وأمريكا. نحن في خدمتكم عبر مختلف المناخات والجغرافيات بمنتجات تتمتع بنفس معايير الجودة العالية."
    },
    "Sağlık sektöründe güvenilir ve kaliteli ürünler üreterek yaşamınıza değer katıyoruz. Paydaşlarımızla sürdürülebilir ilişkiler kurarken üretim süreçlerimizde şeffaflık, etik sorumluluk ve sürekli gelişim ilkelerinden ödün vermiyoruz.": {
        "en": "We add value to life by producing reliable, high-quality products in the healthcare sector. While establishing sustainable relationships with our stakeholders, we do not compromise on transparency, ethical responsibility, and continuous development in our manufacturing processes.",
        "ar": "نضيف قيمة إلى الحياة من خلال إنتاج منتجات موثوقة وعالية الجودة في قطاع الرعاية الصحية. ولا نتهاون في مبادئ الشفافية والمسؤولية الأخلاقية والتطوير المستمر في عمليات الإنتاج."
    },
    "Medikal üretim alanında yeniliği, kaliteyi ve güveni temsil eden global bir marka olmak,": {
        "en": "To be a global brand representing innovation, quality, and trust in medical manufacturing,",
        "ar": "أن نكون علامة تجارية عالمية تمثل الابتكار والجودة والثقة في التصنيع الطبي،"
    },
    "Teknolojik altyapımızı ve uzman çalışan gücümüzü birleştirerek hem Türkiye’de hem de global pazarlarda güvenilir bir çözüm ortağı olmayı sürdürüyoruz.": {
        "en": "By uniting our technological infrastructure with our expert workforce, we continue to be a trusted solution partner both in Turkey and in global markets.",
        "ar": "من خلال الجمع بين بنيتنا التحتية التكنولوجية وكوادرنا المتخصصة، نواصل كوننا شريك حلول موثوقاً في تركيا والأسواق العالمية."
    },
    "Seyitler Kimya bünyesinde görev alan personel kadromuz; uzun yıllardır bizimle birlikte yol alan, ürünleri ve üretim süreçlerini yakından tanıyan, teknik bilgi birikimi yüksek bireylerden oluşuyor. Ar-Ge, üretim, kalite kontrol, satış ve lojistik gibi farklı departmanlarda görev alan ekip üyelerimiz; hem bireysel yetkinlikleri hem de takım uyumlarıyla şirketimizin global başarısına katkı sağlıyor.": {
        "en": "Our personnel working within Seyitler Kimya consist of individuals with high technical expertise who have been with us for many years and know our products and production processes intimately. Our team members across departments such as R&D, production, quality control, sales, and logistics contribute to our global success through both individual competencies and team cohesion.",
        "ar": "يتكون كادرنا في سييتلر كيميا من أفراد ذوي خبرة تقنية عالية رافقونا لسنوات طويلة ويعرفون المنتجات وعمليات الإنتاج عن كثب. يساهم أعضاء فريقنا في أقسام البحث والتطوير والإنتاج ومراقبة الجودة والمبيعات واللوجستيات في نجاحنا العالمي بكفاءاتهم وتماسكهم."
    },
    "Seyitler Kimya olarak büyüyen organizasyon yapımız içinde, farklı alanlarda yeni ekip arkadaşları arıyoruz. Açık pozisyonlarımız dönemsel olarak güncellenmekte olup üretim, kalite kontrol, Ar-Ge, satış ve lojistik gibi birimlerde Seyitler Kimya olarak çeşitli kariyer fırsatları sunuyoruz.": {
        "en": "Within our growing organizational structure at Seyitler Kimya, we seek new team members across various fields. Our open positions are updated periodically, and we offer diverse career opportunities in production, quality control, R&D, sales, and logistics.",
        "ar": "ضمن هيكلنا التنظيمي المتنامي في سييتلر كيميا، نبحث عن زملاء جدد في مختلف المجالات. يتم تحديث وظائفنا المتاحة دورياً، ونقدم فرص عمل متنوعة في الإنتاج ومراقبة الجودة والبحث والتطوير والمبيعات والخدمات اللوجستية."
    },
    "Seyitler Kimya olarak, insan sağlığını merkeze alan anlayışımızla geliştirdiğimiz tüm ürünlerde; yüksek kalite, güvenilirlik ve yenilik ilkelerini esas alıyoruz. Üretim süreçlerimizde uluslararası standartlara bağlı kalarak, her biri titizlikle test edilmiş medikal ürünler sunuyoruz. Plasterlerden yara örtülerine, ilk yardım bantlarından özel tedavi çözümlerine kadar uzanan geniş ürün yelpazemizle sağlık profesyonellerine ve iş ortaklarımıza güven veren çözümler üretiyoruz.": {
        "en": "At Seyitler Kimya, in all products developed with a human health-centered philosophy, we take high quality, reliability, and innovation as our core principles. Adhering to international standards in our manufacturing processes, we deliver meticulously tested medical products. With our broad product range from plasters to wound dressings, first aid strips to specialized treatment solutions, we produce solutions that inspire confidence among healthcare professionals and partners.",
        "ar": "في سييتلر كيميا، نعتمد الجودة العالية والموثوقية والابتكار كمبادئ أساسية في جميع المنتجات التي نطورها برؤية تضع صحة الإنسان في المركز. وبالالتزام بالمعايير الدولية، نقدم منتجات طبية تم اختبارها بدقة، من اللواصق إلى ضمادات الجروح وأشرطة الإسعافات الأولية."
    },
    "Seyitler Kimya olarak, üretimden yönetime kadar tüm süreçlerde görev alan çalışanlarımızı, şirketimizin sürdürülebilir başarısının temel taşı olarak görüyoruz. Bünyemizde görev yapan personelimiz; medikal üretim alanında deneyimli, kalite standartlarına hâkim, gelişime açık ve ekip çalışmasına yatkın profesyonellerden oluşuyor.": {
        "en": "At Seyitler Kimya, we regard our employees working across all processes from manufacturing to management as the cornerstone of our sustainable success. Our personnel consist of professionals who are experienced in medical manufacturing, master quality standards, open to growth, and inclined to teamwork.",
        "ar": "في سييتلر كيميا، نعتبر موظفينا في جميع العمليات من الإنتاج إلى الإدارة حجر الزاوية في نجاحنا المستدام. يتكون كادرنا من متخصصين متمرسين في التصنيع الطبي، ومتقنين لمعايير الجودة، ومنفتحين على التطوير."
    },
    "Seyitler Kimya, Ar-Ge süreçlerinde sadece yeni ürünler değil; aynı zamanda patentlenebilir teknolojiler ve üretim metotları geliştirir.": {
        "en": "Seyitler Kimya develops not only new products in its R&D processes, but also patentable technologies and manufacturing methodologies.",
        "ar": "تطور سييتلر كيميا في عمليات البحث والتطوير تقنيات وطرق إنتاج قابلة للحصول على براءات اختراع بالإضافة إلى المنتجات الجديدة."
    },
    "Seyitler Kimya, sürdürülebilir büyümenin temelini bilimsel araştırma ve yenilikçi ürün geliştirme faaliyetleriyle güçlendirir.": {
        "en": "Seyitler Kimya strengthens the foundation of sustainable growth with scientific research and innovative product development activities.",
        "ar": "تعزز سييتلر كيميا أسس النمو المستدام بأنشطة البحث العلمي وتطوير المنتجات المبتكرة."
    },
    "Seyitler Kimya, sürdürülebilir büyümenin temelini bilimsel araştırma ve yenilikçi ürün geliştirme faaliyetleriyle güçlendirir. Ar-Ge merkezimiz, TÜBİTAK, TÜSEB ve seçkin üniversitelerle yürütülen ortak projeler sayesinde, tıbbi yapışkan teknolojilerinde Türkiye’nin öncü geliştirme merkezi haline gelmiştir.": {
        "en": "Seyitler Kimya reinforces the foundation of sustainable growth through scientific research and innovative product development. Thanks to joint projects carried out with TÜBİTAK, TÜSEB, and prominent universities, our R&D center has become Turkey's leading development hub in medical adhesive technologies.",
        "ar": "تعزز سييتلر كيميا أسس النمو المستدام بالبحث العلمي والابتكار. وبفضل المشاريع المشتركة مع TÜBİTAK و TÜSEB والجامعات الرائدة، أصبح مركز البحث والتطوير لدينا المركز الرائد في تركيا في تقنيات اللواصق الطبية."
    },
    "Seyitler Kimya, tıbbi yapışkan teknolojileri alanında yenilikçi çözümler sunan öncü bir yerli üreticidir.": {
        "en": "Seyitler Kimya is a pioneering domestic manufacturer offering innovative solutions in the field of medical adhesive technologies.",
        "ar": "سييتلر كيميا هي شركة تصنيع محلية رائدة تقدم حلولاً مبتكرة في مجال تقنيات اللواصق الطبية."
    },
    "Steril": {
        "en": "Sterile",
        "ar": "معقم"
    },
    "Suya dayanıklı": {
        "en": "Water-resistant",
        "ar": "مقاوم للماء"
    },
    "Sürekli görünürlük sağlar": {
        "en": "Provides continuous visibility",
        "ar": "يوفر رؤية مستمرة"
    },
    "Sürekli görünürlük sunar": {
        "en": "Offers continuous visibility",
        "ar": "يوفر رؤية مستمرة للموضع"
    },
    "Sıvılar ve bakteriler dahil dış etkenlere karşı bariyer": {
        "en": "Barrier against external factors including liquids and bacteria",
        "ar": "حاجز ضد العوامل الخارجية بما في ذلك السوائل والبكتيريا"
    },
    "Sıvılar, bakteriler ve virüslere karşı bariyer sağlar": {
        "en": "Provides barrier against liquids, bacteria, and viruses",
        "ar": "يوفر حاجزاً ضد السوائل والبكتيريا والفيروسات"
    },
    "Sıvılar, bakteriler ve virüslere karşı su geçirmez, steril bariyer": {
        "en": "Waterproof, sterile barrier against liquids, bacteria, and viruses",
        "ar": "حاجز معقم ومقاوم للماء ضد السوائل والبكتيريا والفيروسات"
    },
    "Sağlam ve güvenilir tespit": {
        "en": "Robust and reliable fixation",
        "ar": "تثبيت قوي وموثوق"
    },
    "Resim çerçeveli tasarım ile kolay uygulama": {
        "en": "Easy application with picture-frame design",
        "ar": "تطبيق سهل مع تصميم إطار الصورة"
    },
    "Resim çerçevesi tasarımı ile kolay uygulama": {
        "en": "Easy application with picture-frame design",
        "ar": "تطبيق سهل مع تصميم إطار الصورة"
    },
    "Pamuklu kumaş taşıyıcı": {
        "en": "Cotton fabric backing",
        "ar": "حامل قماشي قطني"
    },
    "Polyester viskon non-woven taşıyıcı": {
        "en": "Polyester viscose non-woven backing",
        "ar": "قماش بوليستر وفيسكوز غير منسوج"
    },
    "Polyester viskoz nonwoven taşıyıcı": {
        "en": "Polyester viscose nonwoven backing",
        "ar": "قماش بوليستر وفيسكوز غير منسوج"
    },
    "Radyolusent": {
        "en": "Radiolucent",
        "ar": "منفذ للأشعة السينية"
    },
    "Radyotransparan": {
        "en": "Radiotransparent",
        "ar": "شفاف للأشعة السينية"
    },
    "Nem buharı ve oksijen geçişi ile cildin normal fonksiyonunu destekler": {
        "en": "Supports normal skin function through moisture vapor and oxygen transmission",
        "ar": "يدعم الوظيفة الطبيعية للبشرة من خلال نفاذية بخار الرطوبة والأكسجين"
    },
    "Nonwoven I.V. plaster, non-adherent ped ile I.V. ve santral kateter tespiti için kullanılır.": {
        "en": "Nonwoven I.V. plaster with non-adherent pad used for securing I.V. and central catheters.",
        "ar": "لاصق قسطرة وريدية غير منسوج مع وسادة غير لاصقة يُستخدم لتثبيت القسطرة الوريدية والمركزية."
    },
    "Nonwoven taşıyıcı ve yapışmayan yara pedi": {
        "en": "Nonwoven backing and non-adherent wound pad",
        "ar": "حامل غير منسوج مع وسادة جروح غير لاصقة"
    },
    "Nonwoven taşıyıcılı, non-adherent yara pedi bulunan post-operatif pansuman.": {
        "en": "Post-operative dressing with nonwoven backing and non-adherent wound pad.",
        "ar": "ضمادة ما بعد العمليات الجراحية بحامل غير منسوج ووسادة جروح غير لاصقة."
    },
    "Maxipore PU Film": {
        "en": "Maxipore PU Film",
        "ar": "ماكسيبور بي يو فيلم"
    },
    "Maxipore PU I.V.": {
        "en": "Maxipore PU I.V.",
        "ar": "ماكسيبور بي يو آي في"
    },
    "Maxipore PU Roll": {
        "en": "Maxipore PU Roll",
        "ar": "ماكسيبور بي يو رول"
    },
    "Medi İpek Plaster": {
        "en": "Medi Silk Plaster",
        "ar": "لاصق ميدي حريري"
    },
    "Medi-Bez Plaster": {
        "en": "Medi Cloth Plaster",
        "ar": "لاصق ميدي قماشي"
    },
    "Nova Dialysis Bası Bandı": {
        "en": "Nova Dialysis Pressure Tape",
        "ar": "شريط ضغط نوفا لغسيل الكلى"
    },
    "Nova Fix": {
        "en": "Nova Fix",
        "ar": "نوفا فيكس"
    },
    "Nova Plast": {
        "en": "Nova Plast",
        "ar": "نوفا بلاست"
    },
    "Nova Pore": {
        "en": "Nova Pore",
        "ar": "نوفا بور"
    },
    "Nova Silk": {
        "en": "Nova Silk",
        "ar": "نوفا سيلك"
    },
    "Nova Trans": {
        "en": "Nova Trans",
        "ar": "نوفا ترانس"
    },
    "Ürün Kataloğunu İndir": {
        "en": "Download Product Catalog",
        "ar": "تحميل كتالوج المنتجات"
    },
    "Ürün Kategorileri": {
        "en": "Product Categories",
        "ar": "أقسام المنتجات"
    },
    "Ülkeye Ürün SağlayabilecekÜretim Kapasitesi": {
        "en": "Export Capacity to 51 Countries",
        "ar": "طاقة إنتاجية للتصدير إلى 51 دولة"
    },
    "Şu anda açık pozisyon bulunmamaktadır.": {
        "en": "There are currently no open positions.",
        "ar": "لا توجد وظائف شاغرة متاحة حالياً."
    },
    "Şeffaf I.V. plaster, I.V. ve santral kateter tespiti için suya dayanıklı film plaster.": {
        "en": "Transparent I.V. plaster, water-resistant film plaster for fixation of I.V. and central catheters.",
        "ar": "لاصق قسطرة وريدية شفاف، لاصق غشائي مقاوم للماء لتثبيت القسطرة الوريدية والمركزية."
    },
    "Şeffaf film taşıyıcılı, non-adherent pedli post-operatif yara örtüsü.": {
        "en": "Post-operative wound dressing with transparent film backing and non-adherent pad.",
        "ar": "ضمادة جروح ما بعد العمليات الجراحية بحامل غشائي شفاف ووسادة غير لاصقة."
    },
    "Şeffaf yönetim anlayışıyla çalışanlarımıza, iş ortaklarımıza ve yatırımcılarımıza kalıcı değer yaratmak.": {
        "en": "To create enduring value for our employees, partners, and investors with a transparent management philosophy.",
        "ar": "خلق قيمة دائمة لموظفينا وشركائنا ومستثمرينا برؤية إدارية شفافة."
    },
    "Şeffaf, gözenekli polietilen taşıyıcı": {
        "en": "Transparent, porous polyethylene backing",
        "ar": "حامل بولي إيثيلين مسامي وشفاف"
    },
    "Şirketimiz tarafından sunulan ürün ve hizmetlerin sunulabilmesi ve operasyonel süreçlerin yürütülmesi,": {
        "en": "Provision of products and services offered by our Company and execution of operational processes,",
        "ar": "تقديم المنتجات والخدمات التي تقدمها شركتنا وإدارة العمليات التشغيلية،"
    },
    "İş Birliği": {
        "en": "Cooperation",
        "ar": "التعاون والشراكة"
    },
    "Yenilik": {
        "en": "Innovation",
        "ar": "الابتكار"
    },
    "İpek asetat kumaş taşıyıcı": {
        "en": "Silk acetate fabric backing",
        "ar": "حامل قماشي من حرير الأسيتات"
    },
    "İstenilen boyda kesilerek kullanılabilir": {
        "en": "Can be cut to desired length for use",
        "ar": "يمكن قصه حسب الطول المطلوب للاستخدام"
    },
    "İnsan sağlığı, çevre ve topluma karşı duyarlılıkla hareket ediyoruz.": {
        "en": "We act with sensitivity towards human health, the environment, and society.",
        "ar": "نتصرف بوعي ومسؤولية تجاه صحة الإنسان والبيئة والمجتمع."
    },
    "İnsan kaynakları politikalarının yürütülmesi.": {
        "en": "Execution of human resources policies.",
        "ar": "تنفيذ سياسات الموارد البشرية."
    },
    "Ürün ve süreçlerimizde mükemmelliği hedefliyoruz.": {
        "en": "We strive for excellence in our products and processes.",
        "ar": "نسعى للتميز في منتجاتنا وعملياتنا."
    },
    "Ürün kalitemizle sağlık sektöründe, referans noktası haline gelmek,": {
        "en": "To become a benchmark in the healthcare sector with our product quality,",
        "ar": "أن نكون نقطة مرجعية في قطاع الرعاية الصحية بجودة منتجاتنا،"
    },
    "Üniversite-sanayi iş birliklerimiz, teknopark yapılanmamız ve TÜBİTAK projelerimizle inovatif ürünler geliştiriyor, geleceğe bugünden hazırlanıyoruz.": {
        "en": "We develop innovative products with our university-industry partnerships, technopark structure, and TÜBİTAK projects, preparing for the future today.",
        "ar": "نطور منتجات مبتكرة من خلال شراكاتنا بين الجامعات والصناعة ومشاريع TÜBİTAK، مستعدين للمستقبل من اليوم."
    },
    "Çalışan profilimiz; yenilikçi düşünceye açık, kalite odaklı, çözüm üreten ve etik değerlere bağlı bireylerden oluşuyor. Üniversite-sanayi iş birlikleri kapsamında yürütülen projelerde görev alan uzmanlarımız, sektörel gelişmeleri yakından takip ederek şirketimizin rekabet gücünü arttırıyor.": {
        "en": "Our employee profile consists of individuals open to innovative thinking, quality-focused, solution-oriented, and committed to ethical values. Our specialists involved in university-industry collaboration projects closely follow sector developments to boost our company's competitive power.",
        "ar": "يتكون كادر موظفينا من أفراد منفتحين على الفكر المبتكر، ومركّزين على الجودة، ومتمسكين بالقيم الأخلاقية. ويساهم خبراؤنا في المشاريع المشتركة مع الجامعات في تعزيز قدرتنا التنافسية بمتابعة أحدث التطورات."
    },
    "Çalışanlarımız, müşterilerimiz ve paydaşlarımızla ortak başarı kültürünü benimsiyoruz.": {
        "en": "We embrace a culture of shared success with our employees, customers, and stakeholders.",
        "ar": "نتبنى ثقافة النجاح المشترك مع موظفينا وعملائنا وشركائنا."
    },
    "sağlık sektörüne değer katan yenilikçi ve yüksek performanslı ürünler": {
        "en": "Innovative and high-performance products adding value to the healthcare sector",
        "ar": "منتجات مبتكرة وعالية الأداء تضيف قيمة لقطاع الرعاية الصحية"
    },
    "Yurt içi ve yurt dışı pazarlarda sadece bayi ve distribütörlerimiz aracılığıyla hizmet veriyor, iş ortaklarımıza özel sistemlerle güvenli ve hızlı sipariş altyapısı sunuyoruz.": {
        "en": "We serve domestic and international markets exclusively through our dealers and distributors, providing a secure and fast ordering infrastructure tailored to our partners.",
        "ar": "نخدم الأسواق المحلية والدولية حصرياً عبر وكلائنا وموزعينا، ونوفر بنية تحتية سريعة وآمنة للطلبات مخصصة لشركائنا."
    },
    "Yumuşak ve cilde uyumlu nonwoven yapı, hipoalerjenik": {
        "en": "Soft and skin-compatible nonwoven structure, hypoallergenic",
        "ar": "هيكل غير منسوج ناعم ومتوافق مع البشرة، مضاد للحساسية"
    },
    "Yumuşak ve cilde uyumlu, hipoalerjenik": {
        "en": "Soft and skin-compatible, hypoallergenic",
        "ar": "ناعم ومتوافق مع البشرة، مضاد للحساسية"
    },
    "Yumuşak ve vücuda uyumlu, ciltle uyumlu ve hipoalerjenik": {
        "en": "Soft and body-conforming, skin-compatible and hypoallergenic",
        "ar": "ناعم ومتوافق مع منحنيات الجسم والبشرة، مضاد للحساسية"
    },
    "Yeni nesil medikal ürünlerin tasarım, test ve prototipleme süreçleri": {
        "en": "Design, testing, and prototyping processes of next-generation medical products",
        "ar": "عمليات التصميم والاختبار والنمذجة الأولية لمنتجات طبية من الجيل الجديد"
    },
    "Yasal yükümlülüklerin yerine getirilmesi ve resmi kurumlarla olan süreçlerin yönetilmesi,": {
        "en": "Fulfillment of legal obligations and management of processes with official institutions,",
        "ar": "الوفاء بالالتزامات القانونية وإدارة العمليات مع الجهات الرسمية،"
    },
    "Vücudun kıvrımlı bölgelerinde dahi yüksek uyum": {
        "en": "High conformity even on contoured body areas",
        "ar": "توافق عالي حتى في المناطق المنحنية من الجسم"
    },
    "Vücut hatlarına uyum sağlar": {
        "en": "Conforms to body contours",
        "ar": "يتكيف مع ثنايا ومنحنيات الجسم"
    },
    "Vücut konturlarına uyum sağlar": {
        "en": "Conforms to body contours",
        "ar": "يتكيف مع ثنايا الجسم"
    },
    "Vücut konturlarına yüksek uyum": {
        "en": "High conformity to body contours",
        "ar": "توافق ممتاز مع ثنايا الجسم"
    },
    "Uluslararası pazarlarda, sürdürülebilir büyüme ve güçlü iş birlikleri oluşturmak,": {
        "en": "To establish sustainable growth and strong partnerships in international markets,",
        "ar": "تحقيق نمو مستدام وبناء شراكات قوية في الأسواق الدولية،"
    },
    "Tıbbi cihazların sabitlenmesi ve pansumanların tespiti için cerrahi ipek bant.": {
        "en": "Surgical silk tape for fixation of medical devices and dressings.",
        "ar": "شريط حريري جراحي لتثبيت الأجهزة الطبية والضمادات."
    },
    "Tıbbi cihazların sabitlenmesi ve pansumanların tespiti için hipoalerjenik yapışkanlı elastik cerrahi bant.": {
        "en": "Elastic surgical tape with hypoallergenic adhesive for fixation of medical devices and dressings.",
        "ar": "شريط جراحي مرن بمادة لاصقة مضادة للحساسية لتثبيت الأجهزة الطبية والضمادات."
    },
    "Tıbbi cihazların sabitlenmesi ve pansumanların tespiti için hipoalerjenik yapışkanlı kağıt cerrahi bant.": {
        "en": "Paper surgical tape with hypoallergenic adhesive for fixation of medical devices and dressings.",
        "ar": "شريط جراحي ورقي بمادة لاصقة مضادة للحساسية لتثبيت الأجهزة الطبية والضمادات."
    },
    "Tıbbi cihazların sabitlenmesi ve pansumanların tespiti için hipoalerjenik yapışkanlı şeffaf cerrahi bant.": {
        "en": "Transparent surgical tape with hypoallergenic adhesive for fixation of medical devices and dressings.",
        "ar": "شريط جراحي شفاف بمادة لاصقة مضادة للحساسية لتثبيت الأجهزة الطبية والضمادات."
    },
    "Tıbbi cihazların sabitlenmesi ve pansumanların tespiti için hipoalerjenik yapışkanlı şeffaf film rulo.": {
        "en": "Transparent film roll with hypoallergenic adhesive for fixation of medical devices and dressings.",
        "ar": "لفة غشائية شفافة بمادة لاصقة مضادة للحساسية لتثبيت الأجهزة الطبية والضمادات."
    },
    "Tıbbi cihazların sabitlenmesi ve pansumanların tespiti için ipek cerrahi plaster.": {
        "en": "Silk surgical plaster for fixation of medical devices and dressings.",
        "ar": "لاصق جراحي حريري لتثبيت الأجهزة الطبية والضمادات."
    },
    "Tıbbi cihazların sabitlenmesi ve pansumanların tespiti için pamuklu kumaş cerrahi bant.": {
        "en": "Cotton fabric surgical tape for fixation of medical devices and dressings.",
        "ar": "شريط جراحي من القماش القطني لتثبيت الأجهزة الطبية والضمادات."
    },
    "Tıbbi cihazların sabitlenmesi ve pansumanların tespiti için pamuklu kumaş cerrahi plaster.": {
        "en": "Cotton fabric surgical plaster for fixation of medical devices and dressings.",
        "ar": "لاصق جراحي من القماش القطني لتثبيت الأجهزة الطبية والضمادات."
    },
    "Tıbbi cihazların sabitlenmesi ve pansumanların tespiti için şeffaf cerrahi plaster.": {
        "en": "Transparent surgical plaster for fixation of medical devices and dressings.",
        "ar": "لاصق جراحي شفاف لتثبيت الأجهزة الطبية والضمادات."
    },
    "Tıbbi cihazların ve pansumanların sabitlenmesi için elastik cerrahi plaster.": {
        "en": "Elastic surgical plaster for fixation of medical devices and dressings.",
        "ar": "لاصق جراحي مرن لتثبيت الأجهزة الطبية والضمادات."
    },
    "Tüm ilişkilerimizde dürüstlük ve etik sorumluluğa önem veriyoruz.": {
        "en": "We value honesty and ethical responsibility in all our relationships.",
        "ar": "نولي أهمية قصوى للصدق والمسؤولية الأخلاقية في جميع علاقاتنا."
    },
    "TÜBİTAK, TÜSEB ve üniversite iş birlikleriyle yürütülen Ar-Ge projeleri, firmayı yalnızca bir üretici değil; aynı zamanda bilimsel bir çözüm ortağı haline getirmiştir.": {
        "en": "R&D projects conducted with TÜBİTAK, TÜSEB, and university partnerships have made the company not only a manufacturer, but also a scientific solution partner.",
        "ar": "جعلت مشاريع البحث والتطوير المنفذة بالشراكة مع TÜBİTAK و TÜSEB والجامعات من الشركة ليست مجرد مصنّع، بل شريك حلول علمي أيضاً."
    },
    "Toplanan kişisel verileriniz aşağıdaki amaçlarla işlenmektedir:": {
        "en": "Your collected personal data is processed for the following purposes:",
        "ar": "تتم معالجة بياناتكم الشخصية المجمعة للأغراض التالية:"
    },
    "Ticari faaliyetlerimizin planlanması ve icrası,": {
        "en": "Planning and execution of our commercial activities,",
        "ar": "تخطيط وتنفيذ أنشطتنا التجارية،"
    },
    "Müşteri ilişkileri yönetimi ve satış sonrası destek süreçlerinin takibi,": {
        "en": "Customer relationship management and follow-up of after-sales support processes,",
        "ar": "إدارة علاقات العملاء ومتابعة عمليات دعم ما بعد البيع،"
    },
    "Seyitler Kimya Sanayi A.Ş. (\"Şirket\") olarak, kişisel verilerinizin güvenliğine ve mahremiyetine önem veriyoruz. 6698 sayılı Kişisel Verilerin Korunması Kanunu (\"KVKK\") uyarınca, veri sorumlusu sıfatıyla, kişisel verilerinizi aşağıda açıklanan amaçlar doğrultusunda ve mevzuata uygun olarak işlemekteyiz.": {
        "en": "As Seyitler Kimya Sanayi A.Ş. (\"Company\"), we value the security and privacy of your personal data. In our capacity as data controller pursuant to the Personal Data Protection Law No. 6698 (\"KVKK\"), we process your personal data in accordance with legislation for the purposes explained below.",
        "ar": "بصفتنا شركة سييتلر كيميا، نولي أهمية لأمان وخصوصية بياناتكم الشخصية. وبصفتنا مراقب بيانات بموجب قانون حماية البيانات الشخصية رقم 6698 (\"KVKK\")، نقوم بمعالجة بياناتكم الشخصية وفقاً للتشريعات للأغراض الموضحة أدناه."
    },
    "Kişisel verileriniz, yukarıda belirtilen amaçların gerçekleştirilmesi doğrultusunda; iş ortaklarımıza, tedarikçilerimize, kanunen yetkili kamu kurumlarına ve özel kişilere, KVKK’nın 8. ve 9. maddelerinde belirtilen kişisel veri işleme şartları ve amaçları çerçevesinde aktarılabilmektedir.": {
        "en": "Your personal data may be transferred to our partners, suppliers, legally authorized public institutions, and private persons within the framework of data processing conditions and purposes specified in Articles 8 and 9 of the KVKK.",
        "ar": "يجوز نقل بياناتكم الشخصية إلى شركائنا وموردينا والمؤسسات العامة المصرح لها قانوناً والأشخاص المعنيين في إطار شروط وأغراض معالجة البيانات المحددة في المادتين 8 و 9 من قانون حماية البيانات."
    },
    "Kişisel verileriniz, Şirketimizle kurduğunuz ticari iliş, web sitemiz üzerinden yapılan başvurular, iletişim formları, çerezler ve fiziki ziyaretleriniz gibi kanallar aracılığıyla otomatik veya otomatik olmayan yöntemlerle toplanmaktadır. Bu veriler, KVKK’nın 5. ve 6. maddelerinde belirtilen; kanunlarda açıkça öngörülmesi, bir sözleşmenin kurulması veya ifasıyla doğrudan ilgili olması, veri sorumlusunun hukuki yükümlülüğünü yerine getirebilmesi ve meşru menfaatlerimiz gibi hukuki sebeplere dayalı olarak işlenmektedir.": {
        "en": "Your personal data is collected through automatic or non-automatic methods via channels such as commercial relations, website applications, contact forms, cookies, and physical visits. These data are processed based on legal reasons specified in Articles 5 and 6 of the KVKK.",
        "ar": "يتم جمع بياناتكم الشخصية بطرق آلية أو غير آلية من خلال العلاقات التجارية والطلبات عبر الموقع ونماذج الاتصال وملفات تعريف الارتباط والزيارات الفعلية. وتتم معالجتها استناداً إلى الأسباب القانونية المحددة في المادتين 5 و 6 من قانون حماية البيانات."
    },
    "KVKK’nın 11. maddesi uyarınca, Şirketimize başvurarak; kişisel verilerinizin işlenip işlenmediğini öğrenme, işlenmişse bilgi talep etme, işlenme amacını ve buna uygun kullanılıp kullanılmadığını öğrenme, yurt içinde veya yurt dışında aktarıldığı üçüncü kişileri bilme, eksik veya yanlış işlenmişse düzeltilmesini isteme, silinmesini veya yok edilmesini isteme ve bu işlemlerের aktarıldığı üçüncü kişilere bildirilmesini isteme haklarına sahipsiniz.": {
        "en": "Pursuant to Article 11 of the KVKK, you have the right to apply to our Company to learn whether your data is processed, request information, learn the purpose, know recipients, and request correction, deletion, or destruction.",
        "ar": "وفقاً للمادة 11 من قانون حماية البيانات، يحق لكم مراجعة شركتنا لمعرفة ما إذا كانت بياناتكم تعالج، وطلب معلومات عنها، ومعرفة الغرض، ومعرفة الأطراف المنقولة إليها، وطلب تصحيحها أو حذفها أو إتلافها."
    },
    "1991 yılından bu yana sağlık sektöründe üretim gücümüzü kalite anlayışımızla birleştirerek Türkiye’nin en köklü ve en güçlü medikal üretim tesislerinden biri olmanın gururunu yaşıyoruz. Seyitler Kimya Sanayi A.Ş. olarak, Manisa’daki merkez üretim kampüsümüzde, 17.257 m² kapalı alanda faaliyet gösteriyor; alanında uzman çalışanımız ile yüksek hacimli siparişleri karşılayabilecek altyapımız sayesinde üretimde sürekliliği, verimliliği ve güvenilirliği bir arada sunuyoruz.": {
        "en": "Since 1991, we combine our production strength with quality in the healthcare sector, being proud to be one of Turkey's most established and strongest medical manufacturing facilities. As Seyitler Kimya Sanayi A.Ş., we operate in an enclosed area of 17,257 m² at our central manufacturing campus in Manisa; thanks to our expert staff and infrastructure capable of meeting high-volume orders, we provide continuity, efficiency, and reliability in production. Within our organization, there is a strong structure extending from R&D specialists to project teams, distributor support units, and the export department.",
        "ar": "منذ عام 1991، نجمع بين قدراتنا الإنتاجية وأعلى معايير الجودة في قطاع الرعاية الصحية، ونفخر بكوننا أحد أعرق وأقوى المصانع الطبية في تركيا. بصفتنا شركة سييتلر كيميا، نعمل في مساحة مغلقة تبلغ 17,257 مترًا مربعًا في مجمع الإنتاج الرئيسي في مانيسا؛ وبفضل موظفينا الخبراء وبنيتنا التحتية القادرة على تلبية الطلبات الكبيرة، نقدم الاستمرارية والكفاءة والموثوقية في الإنتاج معًا."
    },
    "1991 yılından bu yana sağlık sektöründe üretim gücümüzü kalite anlayışımızla birleştirerek Türkiye’nin en köklü ve en güçlü medikal üretim tesislerinden biri olmanın gururunu yaşıyoruz. Seyitler Kimya Sanayi A.Ş. olarak, Manisa’daki merkez üretim kampüsümüzde, 17.257 m² kapalı alanda faaliyet gösteriyor; alanında uzman çalışanımız ile yüksek hacimli siparişleri karşılayabilecek altyapımız sayesinde üretimde sürekliliği, verimliliği ve güvenilirliği bir arada sunuyoruz. Bünyemizde; Ar-Ge uzmanlarından proje ekiplerine, distribütör destek birimlerinden ihracat departmanına kadar uzanan güçlü bir organizasyon yapısı bulunuyor.": {
        "en": "Since 1991, we combine our production strength with quality in the healthcare sector, being proud to be one of Turkey's most established and strongest medical manufacturing facilities. As Seyitler Kimya Sanayi A.Ş., we operate in an enclosed area of 17,257 m² at our central manufacturing campus in Manisa; thanks to our expert staff and infrastructure capable of meeting high-volume orders, we provide continuity, efficiency, and reliability in production. Within our organization, there is a strong structure extending from R&D specialists to project teams, distributor support units, and the export department.",
        "ar": "منذ عام 1991، نجمع بين قدراتنا الإنتاجية وأعلى معايير الجودة في قطاع الرعاية الصحية، ونفخر بكوننا أحد أعرق وأقوى المصانع الطبية في تركيا. بصفتنا شركة سييتلر كيميا، نعمل في مساحة مغلقة تبلغ 17,257 مترًا مربعًا في مجمع الإنتاج الرئيسي في مانيسا؛ وبفضل موظفينا الخبراء وبنيتنا التحتية القادرة على تلبية الطلبات الكبيرة، نقدم الاستمرارية والكفاءة والموثوقية في الإنتاج معًا."
    },
    "51 ülkeye ürün sağlayabilecek üretim kapasitesine sahip global ölçekte faaliyet gösteren profesyonel bir üretim tesisiyiz. İhracat gerçekleştirdiğimiz ülke sayını 3 katına çıkarabilecek potansiyelimizle “Güçlü Oyuncu” pozisyonumuzu, her geçen gün daha da sağlamlaştırıyoruz. Global pazarda; kendi kulvarımızda fark yaratmaya, kullanıcı deneyimini hem son tüketici hem de distribütörler nezdinde en üst seviyede tutmaya devam ediyoruz.": {
        "en": "We are a professional manufacturing facility operating on a global scale with the production capacity to supply products to 51 countries. With our potential to triple the number of export countries, we strengthen our 'Strong Player' position every day. In the global market; we continue to make a difference in our lane and maintain the highest user experience for both end consumers and distributors.",
        "ar": "نحن منشأة تصنيع احترافية تعمل على نطاق عالمي بقدرة إنتاجية تتيح تزويد 51 دولة بالمنتجات. وبفضل إمكاناتنا لمضاعفة عدد دول التصدير إلى 3 أضعاف، نعزز مكانتنا كـ 'لاعب قوي' يوماً بعد يوم في السوق العالمية ونحافظ على أعلى مستويات رضا العملاء والموزعين."
    },
    "Ar-Ge": {
        "en": "R&D",
        "ar": "البحث والتطوير"
    },
    "Küresel büyüme stratejimizin temelinde; bilimsel üretim, esnek lojistik ve güçlü iş ortaklıkları yer alır.Her ülkenin medikal regülasyonlarına uygunluk (CE, ISO 13485, UTS, GBTU vb.) süreçleri dikkatle yürütülür.": {
        "en": "At the foundation of our global growth strategy lie scientific production, flexible logistics, and strong business partnerships. Compliance with each country's medical regulations (CE, ISO 13485, UTS, GBTU, etc.) is carefully conducted.",
        "ar": "يرتكز جوهر استراتيجيتنا للنمو العالمي على الإنتاج العلمي واللوجستيات المرنة والشراكات القوية. وتتم متابعة الامتثال للأنظمة الطبية في كل بلد (CE, ISO 13485, UTS, GBTU إلخ) بعناية."
    },
    "SELVİLİTEPE OSB MAH. OSB 2007. CAD. SEYITLER KIMYA SAN.A.Ş NO: 7 İÇ KAPI NO: 2 TURGUTLU / MANİSA": {
        "en": "SELVILITEPE OSB MAH. OSB 2007. CAD. SEYITLER KIMYA SAN.A.S. NO: 7 TURGUTLU / MANISA / TURKEY",
        "ar": "منطقة سيلفيلي تيبي الصناعية، شارع 2007، سييتلر كيميا رقم: 7 تورغوتلو / مانيسا / تركيا"
    },
    "Üretim hattımız, son teknolojiyle donatılmış modern makine parkurundan oluşuyor. Bu altyapı, birçok uluslararası firmanın da ulaşamadığı ölçekte yüksek kapasite ve teknik donanım sunuyor. Üretim süreçlerimiz; ISO 13485, GMP ve ülke bazlı kalite sertifikaları ile destekleniyor. Bu durum, farklı coğrafyalarda aynı kalite standardını güvenle sunmamıza imkân sağlıyor. Her siparişin kalite standartlarını, teslimat öncesinde, ülke gerekliliklerine göre özelleştirebiliyoruz.": {
        "en": "Our production line consists of a modern machinery park equipped with state-of-the-art technology. This infrastructure offers high capacity and technical capability at a scale achieved by few international firms. Our production processes are supported by ISO 13485, GMP, and country-specific quality certificates.",
        "ar": "يتكون خط الإنتاج لدينا من أحدث الآلات الحديثة المتطورة. توفر هذه البنية التحتية قدرة إنتاجية عالية ومعدات تقنية بمستوى قلما تصل إليه الشركات الدولية. عمليات الإنتاج لدينا مدعومة بشهادات ISO 13485 و GMP وشهادات الجودة المعتمدة دولياً."
    },
    "Ürün portföyümüzde plasterler, yara örtüleri, ilk yardım bantları, katı tıbbi yara ürünleri ve plaster-yakı grubu yer alıyor; bu alanlarda Türkiye’de sektör lideri konumunda bulunuyoruz. Toplamda 30 farklı ürün üretirken bunların 17’sini, kendi markalarımız altında pazara sunuyoruz. Aynı anda hem kendi markamız hem de iş ortaklarımız için üretim gerçekleştirebilen bir altyapıya sahibiz.": {
        "en": "Our product portfolio includes plasters, wound dressings, first aid strips, solid medical wound products, and capsicum plaster groups; we are the sector leader in Turkey in these areas. While producing 30 distinct products in total, we offer 17 of them to the market under our proprietary brands.",
        "ar": "تشمل مجموعة منتجاتنا اللواصق الطبية وضمادات الجروح وأشرطة الإسعافات الأولية ومنتجات الجروح الطبية واللواصق الحرارية؛ ونحتل مكانة رائدة في هذا القطاع في تركيا. ونقدم 17 منتجاً من أصل 30 تحت علاماتنا التجارية الخاصة."
    },
    "Ar-Ge ile Geleceği": {
        "en": "Shaping the Future",
        "ar": "تشكيل المستقبل"
    },
    "Şekillendiriyoruz": {
        "en": "with R&D",
        "ar": "بالبحث والتطوير"
    },
    "Sağlıkta Güvenin": {
        "en": "The Global Name",
        "ar": "الاسم العالمي"
    },
    "Global Adı": {
        "en": "of Trust in Healthcare",
        "ar": "للثقة في الرعاية الصحية"
    },
    "Dünya Seyitler'i": {
        "en": "The World Chooses",
        "ar": "العالم يختار"
    },
    "Tercih Ediyor!": {
        "en": "Seyitler!",
        "ar": "سييتلر!"
    },
    "Distribütör": {
        "en": "Join our",
        "ar": "انضم إلى"
    },
    "Ekosistemine Katılın": {
        "en": "Distributor Ecosystem",
        "ar": "شبكة موزعينا"
    },
    "Kapalı Alanda": {
        "en": "Indoor Area",
        "ar": "مساحة مغلقة"
    },
    "Modern Üretim Tesisi": {
        "en": "Modern Production Facility",
        "ar": "منشأة إنتاج حديثة"
    },
    "Farklı Ürün": {
        "en": "Different",
        "ar": "مختلف"
    },
    "Üretimi": {
        "en": "Product Lines",
        "ar": "خطوط الإنتاج"
    },
    "Ülkeye Ürün Sağlayabilecek": {
        "en": "Export Capacity to",
        "ar": "طاقة تصديرية إلى"
    },
    "Üretim Kapasitesi": {
        "en": "51 Countries",
        "ar": "51 دولة"
    },
    "Zorunlu Çerezler:": {
        "en": "Mandatory Cookies:",
        "ar": "ملفات تعريف الارتباط الإلزامية:"
    },
    "Performans ve Analiz Çerezleri:": {
        "en": "Performance and Analytics Cookies:",
        "ar": "ملفات الأداء والتحليلات:"
    },
    "Hedefleme ve Reklam Çerezleri:": {
        "en": "Targeting and Advertising Cookies:",
        "ar": "ملفات الاستهداف والإعلانات:"
    },
    "İşlevsel Çerezler:": {
        "en": "Functional Cookies:",
        "ar": "ملفات تعريف الارتباط الوظيفية:"
    },
    "Sitenin temel işlevlerini yerine getirmesi için gerekli olan çerezlerdir (örneğin oturum yönetimi, güvenlik).": {
        "en": "Cookies necessary for the site to perform its basic functions (e.g. session management, security).",
        "ar": "ملفات ضرورية لأداء الموقع لوظائفه الأساسية (مثل إدارة الجلسة والأمان)."
    },
    "Sitenin nasıl kullanıldığını anlamamıza yardımcı olan, ziyaretçi sayıları ve trafik kaynaklarını analiz eden çerezlerdir.": {
        "en": "Cookies that help us understand how the site is used, analyzing visitor numbers and traffic sources.",
        "ar": "ملفات تساعدنا على فهم كيفية استخدام الموقع وتحليل أعداد الزوار ومصادر الحركة."
    },
    "Dil seçimi gibi tercihlerinizin hatırlanmasını sağlayan ve siteyi daha kolay kullanmanıza imkan veren çerezlerdir.": {
        "en": "Cookies that allow preferences such as language selection to be remembered and enable easier use of the site.",
        "ar": "ملفات تتيح تذكر تفضيلاتك مثل اختيار اللغة وتمكينك من استخدام الموقع بسهولة أكبر."
    },
    "İlgi alanlarınıza göre size özel içerik ve reklamlar sunmak amacıyla kullanılan çerezlerdir.": {
        "en": "Cookies used to deliver tailored content and advertisements based on your interests.",
        "ar": "ملفات تُستخدم لتقديم محتوى وإعلانات مخصصة وفقاً لاهتماماتك."
    },
    "Ar-Ge - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "R&D - Seyitler Kimya",
        "ar": "البحث والتطوير - سييتلر كيميا"
    },
    "Bizimle İletişime Geçin - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Contact Us - Seyitler Kimya",
        "ar": "اتصل بنا - سييتلر كيميا"
    },
    "Derma Pore - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Derma Pore - Seyitler Kimya",
        "ar": "ديرما بور - سييتلر كيميا"
    },
    "Dermafix Plus - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Dermafix Plus - Seyitler Kimya",
        "ar": "ديرمافيكس بلس - سييتلر كيميا"
    },
    "Faaliyet Alanları - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Fields of Activity - Seyitler Kimya",
        "ar": "مجالات النشاط - سييتلر كيميا"
    },
    "KVKK Aydınlatma Metni - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Privacy Policy (KVKK) - Seyitler Kimya",
        "ar": "بيان الخصوصية (KVKK) - سييتلر كيميا"
    },
    "Maxipore Dress - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Maxipore Dress - Seyitler Kimya",
        "ar": "ماكسيبور دريس - سييتلر كيميا"
    },
    "Maxipore I.V. (Nonwoven) - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Maxipore I.V. (Nonwoven) - Seyitler Kimya",
        "ar": "ماكسيبور آي في - سييتلر كيميا"
    },
    "Maxipore PU Dress - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Maxipore PU Dress - Seyitler Kimya",
        "ar": "ماكسيبور بي يو دريس - سييتلر كيميا"
    },
    "Maxipore PU Film - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Maxipore PU Film - Seyitler Kimya",
        "ar": "ماكسيبور بي يو فيلم - سييتلر كيميا"
    },
    "Maxipore PU I.V. - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Maxipore PU I.V. - Seyitler Kimya",
        "ar": "ماكسيبور بي يو آي في - سييتلر كيميا"
    },
    "Maxipore PU Roll - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Maxipore PU Roll - Seyitler Kimya",
        "ar": "ماكسيبور بي يو رول - سييتلر كيميا"
    },
    "Medi İpek Plaster - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Medi Silk Plaster - Seyitler Kimya",
        "ar": "لاصق ميدي حريري - سييتلر كيميا"
    },
    "Medi-Bez Plaster - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Medi Cloth Plaster - Seyitler Kimya",
        "ar": "لاصق ميدي قماشي - سييتلر كيميا"
    },
    "Nova Dialysis Bası Bandı - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Nova Dialysis - Seyitler Kimya",
        "ar": "نوفا لغسيل الكلى - سييتلر كيميا"
    },
    "Nova Fix - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Nova Fix - Seyitler Kimya",
        "ar": "نوفا فيكس - سييتلر كيميا"
    },
    "Nova Plast - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Nova Plast - Seyitler Kimya",
        "ar": "نوفا بلاست - سييتلر كيميا"
    },
    "Nova Pore - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Nova Pore - Seyitler Kimya",
        "ar": "نوفا بور - سييتلر كيميا"
    },
    "Nova Silk - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Nova Silk - Seyitler Kimya",
        "ar": "نوفا سيلك - سييتلر كيميا"
    },
    "Nova Trans - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Nova Trans - Seyitler Kimya",
        "ar": "نوفا ترانس - سييتلر كيميا"
    },
    "Seyitler Topplast - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Seyitler Topplast - Seyitler Kimya",
        "ar": "سييتلر توب بلاست - سييتلر كيميا"
    },
    "Unipore - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Unipore - Seyitler Kimya",
        "ar": "يونيبور - سييتلر كيميا"
    },
    "Yatırımcı İlişkileri - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Investor Relations - Seyitler Kimya",
        "ar": "علاقات المستثمرين - سييتلر كيميا"
    },
    "Çerez Politikası - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Cookie Policy - Seyitler Kimya",
        "ar": "سياسة ملفات تعريف الارتباط - سييتلر كيميا"
    },
    "Ürünlerimiz - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "Products - Seyitler Kimya",
        "ar": "المنتجات - سييتلر كيميا"
    },
    "about.title - Seyitler Kimya - Sağlık Üretiyoruz": {
        "en": "About Us - Seyitler Kimya",
        "ar": "من نحن - سييتلر كيميا"
    }
};

let langLeaveTimeout = null;

function normalizeString(str) {
    if (!str) return '';
    return str.replace(/\s+/g, ' ').trim();
}

function getUrlLang() {
    try {
        const params = new URLSearchParams(window.location.search);
        const langParam = params.get('lang');
        if (langParam && (langParam === 'tr' || langParam === 'en' || langParam === 'ar')) {
            return langParam;
        }
    } catch(e) {}
    return null;
}

function getCurrentLanguage() {
    // 1. Check URL query first
    const urlLang = getUrlLang();
    if (urlLang) {
        localStorage.setItem('seyitler_lang', urlLang);
        return urlLang;
    }

    // 2. Primary Source of Truth: Server rendered HTML lang attribute
    const docLang = document.documentElement.lang || document.documentElement.getAttribute('lang');
    if (docLang && (docLang === 'tr' || docLang === 'en' || docLang === 'ar')) {
        localStorage.setItem('seyitler_lang', docLang);
        return docLang;
    }

    return 'tr';
}

function setLanguage(lang) {
    if (lang !== 'tr' && lang !== 'en' && lang !== 'ar') lang = 'tr';
    localStorage.setItem('seyitler_lang', lang);

    // Set cookie on client side too for extra persistence
    document.cookie = `site_locale=${lang}; path=/; max-age=31536000; SameSite=Lax`;

    // Redirect or reload with new language
    try {
        const url = new URL(window.location.href);
        if (lang === 'tr') {
            url.searchParams.delete('lang');
        } else {
            url.searchParams.set('lang', lang);
        }
        window.location.href = url.toString();
    } catch(e) {
        window.location.reload();
    }
}

function updateInternalLinks(lang) {
    document.querySelectorAll('a[href]').forEach(a => {
        const href = a.getAttribute('href');
        if (!href || href.startsWith('http') || href.startsWith('#') || href.startsWith('mailto:') || href.startsWith('tel:') || href.startsWith('javascript:')) {
            return;
        }
        try {
            const urlParts = href.split('?');
            const path = urlParts[0];
            const currentParams = new URLSearchParams(urlParts[1] || '');
            if (lang === 'tr') {
                currentParams.delete('lang');
            } else {
                currentParams.set('lang', lang);
            }
            const newQuery = currentParams.toString();
            a.setAttribute('href', newQuery ? `${path}?${newQuery}` : path);
        } catch(e) {}
    });
}

function updateDropdownMenu(activeLang) {
    const dropdownMenu = document.getElementById('lang-dropdown-items');
    if (!dropdownMenu) return;

    const otherLangs = LANG_CONFIG.filter(l => l.code !== activeLang);
    dropdownMenu.innerHTML = otherLangs.map(l => `
        <a href="javascript:void(0)" onclick="setLanguage('${l.code}')" class="block w-full text-center py-2.5 px-4 text-sm font-medium text-[#2c3e50] hover:text-[#0AA64D] hover:bg-gray-50/80 transition-colors cursor-pointer select-none">
            ${l.name}
        </a>
    `).join('');
}

function closeAllDropdowns() {
    const dropdownMenu = document.getElementById('lang-dropdown-menu');
    const chevron = document.getElementById('lang-chevron');
    if (dropdownMenu) dropdownMenu.classList.add('hidden');
    if (chevron) chevron.classList.remove('rotate-180');
}

function openDropdown() {
    clearTimeout(langLeaveTimeout);
    const dropdownMenu = document.getElementById('lang-dropdown-menu');
    const chevron = document.getElementById('lang-chevron');
    if (dropdownMenu) dropdownMenu.classList.remove('hidden');
    if (chevron) chevron.classList.add('rotate-180');
}

function initLangDropdown() {
    const wrapper = document.getElementById('lang-dropdown-wrapper');
    const btn = document.getElementById('lang-switch-btn');
    const dropdownMenu = document.getElementById('lang-dropdown-menu');
    const chevron = document.getElementById('lang-chevron');

    if (!btn || !dropdownMenu) return;

    btn.addEventListener('click', (e) => {
        e.stopPropagation();
        clearTimeout(langLeaveTimeout);
        const isHidden = dropdownMenu.classList.contains('hidden');
        if (isHidden) {
            openDropdown();
        } else {
            closeAllDropdowns();
        }
    });

    if (wrapper) {
        wrapper.addEventListener('mouseenter', openDropdown);
        wrapper.addEventListener('mouseleave', () => {
            langLeaveTimeout = setTimeout(closeAllDropdowns, 350);
        });
    }

    dropdownMenu.addEventListener('mouseenter', () => clearTimeout(langLeaveTimeout));
    dropdownMenu.addEventListener('mouseleave', () => {
        langLeaveTimeout = setTimeout(closeAllDropdowns, 350);
    });

    document.addEventListener('click', (e) => {
        if (wrapper && !wrapper.contains(e.target)) {
            closeAllDropdowns();
        }
    });
}

/**
 * Deep normalized DOM Translation
 */
function translateDom(lang) {
    const isTurkish = (lang === 'tr');

    function walkNode(node) {
        if (node.nodeType === Node.TEXT_NODE) {
            const raw = node.nodeValue;
            if (!raw || !raw.trim()) return;

            if (node._tr_orig === undefined) {
                node._tr_orig = raw;
            }

            if (isTurkish) {
                if (node._tr_orig !== undefined) {
                    node.nodeValue = node._tr_orig;
                }
            } else {
                const normKey = normalizeString(node._tr_orig);
                if (PHRASE_MAP[normKey] && PHRASE_MAP[normKey][lang]) {
                    const translated = PHRASE_MAP[normKey][lang];
                    const leading = node._tr_orig.match(/^\s*/)[0];
                    const trailing = node._tr_orig.match(/\s*$/)[0];
                    node.nodeValue = leading + translated + trailing;
                }
            }
        } else if (node.nodeType === Node.ELEMENT_NODE) {
            const tag = node.tagName.toLowerCase();
            if (tag === 'script' || tag === 'style' || node.id === 'lang-dropdown-items' || node.id === 'current-lang-text') {
                return;
            }

            // Placeholders
            if (node.hasAttribute('placeholder')) {
                if (node._tr_ph === undefined) {
                    node._tr_ph = node.getAttribute('placeholder');
                }
                if (isTurkish) {
                    node.setAttribute('placeholder', node._tr_ph);
                } else {
                    const pKey = normalizeString(node._tr_ph);
                    if (PHRASE_MAP[pKey] && PHRASE_MAP[pKey][lang]) {
                        node.setAttribute('placeholder', PHRASE_MAP[pKey][lang]);
                    }
                }
            }

            for (let child of node.childNodes) {
                walkNode(child);
            }
        }
    }

    walkNode(document.body);
}

function applyLanguage(lang) {
    const cfg = I18N_CONFIG[lang] || I18N_CONFIG.tr;

    // Apply dir to html, body and site-root
    document.documentElement.lang = lang;
    document.documentElement.setAttribute('dir', cfg.dir);
    document.body.setAttribute('dir', cfg.dir);
    const siteRoot = document.getElementById('site-root');
    if (siteRoot) {
        siteRoot.setAttribute('dir', cfg.dir);
    }

    // Update title
    if (cfg.site_title) {
        document.title = cfg.site_title;
    }

    // Update Current Lang Text in Header
    const langIndicators = document.querySelectorAll('#current-lang-text, .current-lang-text');
    langIndicators.forEach(el => {
        el.textContent = cfg.lang_name;
    });

    // Update Dropdown options
    updateDropdownMenu(lang);

    // Update internal navigation links
    updateInternalLinks(lang);

    // Deep translate DOM text
    translateDom(lang);
    setupDomObserver(lang);
}

document.addEventListener('DOMContentLoaded', () => {
    const initialLang = getCurrentLanguage();
    applyLanguage(initialLang);
    initLangDropdown();
});


let isTranslating = false;
let domObserver = null;

function setupDomObserver(lang) {
    if (domObserver) {
        domObserver.disconnect();
    }
    if (lang === 'tr') return;

    domObserver = new MutationObserver((mutations) => {
        if (isTranslating) return;
        let shouldTranslate = false;
        for (let m of mutations) {
            if (m.type === 'childList' && m.addedNodes.length > 0) {
                for (let n of m.addedNodes) {
                    if (n.id !== 'lang-dropdown-items' && n.id !== 'current-lang-text') {
                        shouldTranslate = true;
                        break;
                    }
                }
            }
        }
        if (shouldTranslate) {
            isTranslating = true;
            translateDom(lang);
            setTimeout(() => { isTranslating = false; }, 50);
        }
    });

    domObserver.observe(document.body, {
        childList: true,
        subtree: true
    });
}
