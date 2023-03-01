<?= $this->extend('template/basic'); ?>

<?= $this->section('body'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?= $this->include('template/navbar'); ?>

        <?= $this->include('template/sidebar'); ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Starter Page</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container">

                    <?= $this->renderSection('content'); ?>

                </div>
            </div>
        </div>
        <footer class="main-footer text-sm">
            <div class="text-center">
                <strong>&copy; <?= date('Y'); ?> <a href="https://ptjis.com" target="_blank">PTJIS</a></strong> All rights reserved
            </div>
        </footer>
    </div>
    <?= $this->endSection(); ?>