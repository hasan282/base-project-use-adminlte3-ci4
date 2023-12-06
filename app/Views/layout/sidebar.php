<?php

// $menuModel = new \App\Models\MenuModel;
// $ideNavs = $menuModel->getCompileData(intval(userdata('role_id')));

$ideNavs = array();

$navigations = array();

foreach ($ideNavs as $key => $navs) {
    $active = false;
    $url = $navs['url'] ?? null;
    $child = $navs['child'] ?? array();
    if ($url !== null && url_is($url . '*')) $active = true;
    foreach ($child as $ky => $ch) {
        $activeChild = false;
        if (url_is($ch['url'] . '*')) {
            $active = true;
            $activeChild = true;
        }
        $ideNavs[$key]['child'][$ky]['active'] = $activeChild;
    }
    $ideNavs[$key]['active'] = $active;
}

?>
<aside class="main-sidebar sidebar-dark-info elevation-4">

    <a href="/" class="brand-link link-transparent">
        <img src="/image/icon/jis_icon.svg" alt="" class="brand-image">
        <span class="brand-text font-weight-lighter">Admin <strong>Apps</strong></span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= userdata('foto'); ?>" class="img-circle elevation-1" alt="">
            </div>
            <div class="info">
                <a href="/user" class="d-block"><?= userdata('nama'); ?></a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="/#dashboard" class="nav-link<?= url_is('dashboard') ? ' active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">MENU</li>
                <?php foreach ($ideNavs as $ides) : ?>

                    <?php
                    $url = $ides['url'] ?? null;
                    $child = $ides['child'] ?? null;
                    ?>

                    <li class="nav-item<?= $ides['active'] && $child !== null ? ' menu-open' : ''; ?>">
                        <a href="<?= $url === null ? '#' : '/' . $url; ?>" class="nav-link<?= $ides['active'] ? ' active' : ''; ?>">
                            <i class="nav-icon <?= $ides['icon']; ?>"></i>
                            <p><?= $ides['text']; ?><?= $child !== null ? '<i class="fas fa-angle-left right"></i>' : ''; ?></p>
                        </a>
                        <?php if ($child !== null) : ?>
                            <ul class="nav nav-treeview">
                                <?php foreach ($child as $cld) : ?>
                                    <li class="nav-item">
                                        <a href="<?= $cld['url'] == '#' ? '#' : '/' . $cld['url']; ?>" class="nav-link<?= $cld['active'] ? ' active' : ''; ?>">
                                            <i class="<?= $cld['icon']; ?> nav-icon"></i>
                                            <p><?= $cld['text']; ?></p>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>

                <?php endforeach; ?>

                <li class="nav-header">USER</li>
                <li class="nav-item">
                    <a href="/#setting" class="nav-link <?= url_is('setting*') ? ' active' : ''; ?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Pengaturan Akun</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>

</aside>