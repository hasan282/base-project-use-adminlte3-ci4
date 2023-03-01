<?php
$uriSegment = 'setting';
$menuItems = array(
    ['menu' => '', 'icon' => '', 'url' => ''],
    ['menu' => '', 'icon' => '', 'url' => ''],
    ['menu' => '', 'icon' => '', 'url' => ''],
    ['menu' => '', 'icon' => '', 'url' => '']
);
?>
<aside class="main-sidebar sidebar-dark-info elevation-4">
    <a href="/" class="brand-link">
        <span class="brand-text font-weight-light">AdminAPP</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/image/user/default_male.jpg" class="img-circle elevation-1" alt="">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="#" class="nav-link<?php if ($uriSegment == 'dashboard') echo ' active'; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">MENU</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Simple Link</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Simple Link</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Simple Link</p>
                    </a>
                </li>
                <li class="nav-header">USER</li>
                <li class="nav-item">
                    <a href="#" class="nav-link<?php if ($uriSegment == 'setting') echo ' active'; ?>">
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