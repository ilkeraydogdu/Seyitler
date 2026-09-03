<?php
$corporateLinks = [
    ['title' => 'Hakkımızda', 'url' => url('/about-us'), 'path' => '/about-us'],
    ['title' => 'Tarihçe', 'url' => url('/about-us/tarihce'), 'path' => '/about-us/tarihce'],
    ['title' => 'Misyon ve Vizyon', 'url' => url('/about-us/misyon-vizyon'), 'path' => '/about-us/misyon-vizyon'],
    ['title' => 'Değerler', 'url' => url('/about-us/degerler'), 'path' => '/about-us/degerler'],
    ['title' => 'Organizasyon Yapısı', 'url' => url('/about-us/organizasyon'), 'path' => '/about-us/organizasyon'],
    ['title' => 'Sürdürülebilirlik', 'url' => url('/about-us/surdurulebilirlik'), 'path' => '/about-us/surdurulebilirlik'],
    ['title' => 'İnsan Kaynakları', 'url' => url('/about-us/insan-kaynaklari'), 'path' => '/about-us/insan-kaynaklari'],
];
$currentPath = (new \App\Core\Request())->getPath();
?>
<aside class="md:col-span-4 lg:col-span-3">
    <ul class="space-y-2">
        <?php foreach ($corporateLinks as $link): ?>
            <?php $isCurrent = ($currentPath === $link['path']); ?>
            <li>
                <a class="flex items-center justify-between p-3 border font-medium text-sm transition-all duration-200 <?= $isCurrent ? 'bg-seyitler-bg3 border-seyitler-bg3 text-white' : 'bg-seyitler-bg4 border-seyitler-bg4 text-seyitler-txt hover:bg-gray-50' ?>" href="<?= $link['url'] ?>">
                    <span><?= e($link['title']) ?></span>
                    <svg class="size-4" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</aside>
