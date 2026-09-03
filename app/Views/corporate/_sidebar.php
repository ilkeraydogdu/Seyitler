<?php
$corporateLinks = [
    ['title' => __('Hakkımızda', 'Hakkımızda'), 'url' => url('/about-us'), 'path' => '/about-us'],
    ['title' => __('Tarihçe', 'Tarihçe'), 'url' => url('/about-us/tarihce'), 'path' => '/about-us/tarihce'],
    ['title' => __('Misyon ve Vizyon', 'Misyon ve Vizyon'), 'url' => url('/about-us/misyon-vizyon'), 'path' => '/about-us/misyon-vizyon'],
    ['title' => __('Değerler', 'Değerler'), 'url' => url('/about-us/degerler'), 'path' => '/about-us/degerler'],
    ['title' => __('Organizasyon Yapısı', 'Organizasyon Yapısı'), 'url' => url('/about-us/organizasyon'), 'path' => '/about-us/organizasyon'],
    ['title' => __('Sürdürülebilirlik', 'Sürdürülebilirlik'), 'url' => url('/about-us/surdurulebilirlik'), 'path' => '/about-us/surdurulebilirlik'],
    ['title' => __('İnsan Kaynakları', 'İnsan Kaynakları'), 'url' => url('/about-us/insan-kaynaklari'), 'path' => '/about-us/insan-kaynaklari'],
];
?>
<aside class="md:col-span-4 lg:col-span-3">
    <div class="sticky top-24 bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
        <div class="p-3.5 bg-gray-50 border-b border-gray-100 font-bold text-xs uppercase tracking-wider text-gray-700">
            <?= __('Kurumsal Menü', 'Kurumsal Menü') ?>
        </div>
        <ul class="divide-y divide-gray-100">
            <?php foreach ($corporateLinks as $link): ?>
                <?php 
                $req = new \App\Core\Request();
                $isCurrent = ($req->getPath() === $link['path']); 
                ?>
                <li>
                    <a class="w-full flex items-center justify-between gap-3 px-4 py-3 text-xs sm:text-sm font-medium transition-all <?= $isCurrent ? 'bg-[#0AA64D] text-white font-semibold' : 'text-gray-700 hover:bg-gray-50 hover:text-[#0AA64D]' ?>" href="<?= $link['url'] ?>">
                        <span><?= e($link['title']) ?></span>
                        <svg class="size-4 <?= $isCurrent ? 'text-white' : 'text-gray-400' ?>" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/></svg>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</aside>
