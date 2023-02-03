<?= $this->extend('template/basic'); ?>

<?= $this->section('body'); ?>

<body class="hold-transition login-page">
    <div class="login-box">

        <?= $this->renderSection('login_box'); ?>

    </div>
    <?= $this->endSection(); ?>