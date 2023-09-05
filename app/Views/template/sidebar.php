<?php

$userAccess = '101';

// ----- MENU LIST -------------------------------------------
/*
$ideNavs[] = array('text' => '', 'icon' => '', 'url' => '', 'access' => null);
$ideNavs[] = array('text' => '', 'icon' => '', 'child' => array(
    ['text' => '', 'icon' => '', 'url' => '', 'access' => null]
), 'access' => null);
*/
$ideNavs[] = array('text' => 'Menu 1', 'icon' => 'fas fa-database', 'child' => array(
    ['text' => 'Submenu 1.1', 'icon' => 'fas fa-user-alt', 'url' => '#'],
    ['text' => 'Submenu 1.2', 'icon' => 'fas fa-shield-alt', 'url' => '#']
), 'access' => '101');
$ideNavs[] = array('text' => 'Menu 2', 'icon' => 'fas fa-file', 'child' => array(
    ['text' => 'Submenu 2.1', 'icon' => 'fas fa-database', 'url' => '#'],
    ['text' => 'Submenu 2.2', 'icon' => 'fas fa-archive', 'url' => '#'],
    ['text' => 'Submenu 2.3', 'icon' => 'fas fa-list-ul', 'url' => '#']
));
$ideNavs[] = array('text' => 'Menu 3', 'icon' => 'fas fa-certificate', 'child' => array(
    ['text' => 'Submenu 3.1', 'icon' => 'fas fa-database', 'url' => '#'],
    ['text' => 'Submenu 3.2', 'icon' => 'fas fa-check-circle', 'url' => '#']
));
$ideNavs[] = array('text' => 'Menu 4', 'icon' => 'fas fa-user-shield', 'url' => null);
$ideNavs[] = array('text' => 'Menu 5', 'icon' => 'fas fa-shield-alt', 'url' => null);

// ----- LOOPING MENU ----------------------------------------
foreach ($ideNavs as $key => $navs) {
    $active = false;
    $navAccess = $navs['access'] ?? null;
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
        $childAccess = $ch['access'] ?? null;
        if ($childAccess !== null && $childAccess != $userAccess) {
            unset($ideNavs[$key]['child'][$ky]);
        }
    }
    $ideNavs[$key]['active'] = $active;
    if ($navAccess !== null && $navAccess != $userAccess) {
        unset($ideNavs[$key]);
    }
} ?>
<aside class="main-sidebar sidebar-dark-info elevation-4">
    <a href="/" class="brand-link link-transparent">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/1024px-2021_Facebook_icon.svg.png" alt="" class="brand-image">
        <span class="brand-text font-weight-light">AppName <strong>Apps</strong></span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=
                            // userdata('foto');
                            '/image/user/default_female.jpg';
                            ?>" class="img-circle elevation-1" alt="">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <?=
                    // userdata('nama');
                    'Nama Pengguna';
                    ?>
                </a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link<?= url_is('dashboard') ? ' active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">MENU</li>
                <?php foreach ($ideNavs as $ides) :
                    $url = $ides['url'] ?? null;
                    $child = $ides['child'] ?? null; ?>
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
                    <a href="#" class="nav-link <?= url_is('setting*') ? ' active' : ''; ?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Pengaturan Akun</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Keluar</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>