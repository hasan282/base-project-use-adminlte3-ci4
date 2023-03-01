<?php
$navMenu = array(
    ['menu' => 'Dashboard', 'url' => 'dashboard', 'icon' => ''],
    ['menu' => 'Dashboard', 'url' => '', 'icon' => ''],
    ['menu' => 'Dashboard', 'url' => '', 'icon' => '']
);
$uriSegment = '';
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <?php foreach ($navMenu as $nm) : ?>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= $nm['url']; ?>" class="nav-link active"><?= $nm['menu']; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="/image/user/default_male.jpg" class="user-image img-circle elevation-1" alt="">
                <span class="d-none d-md-inline">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <li class="user-header">
                    <img src="/image/user/default_male.jpg" class="img-circle elevation-2" alt="">
                    <p>Alexander Pierce</p>
                    <small>Web Developer</small>
                </li>
                <li class="user-footer">
                    <a href="#" class="btn btn-default btn-flat"><i class="fas fa-cog mr-1"></i>Pengaturan</a>
                    <a href="#" class="btn btn-default btn-flat float-right"><i class="fas fa-sign-out-alt mr-1"></i>Keluar</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>