<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminAPP<?= (isset($title)) ? ' · ' . $title : ''; ?></title>
    <link rel="shortcut icon" href="/icon/icon64.png" type="image/png">
    <link rel="icon" href="/icon/icon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/icon/icon64.png" sizes="64x64" type="image/png">
    <link rel="apple-touch-icon" href="/icon/icon128.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
</head>

<?= $this->renderSection('body'); ?>

<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>