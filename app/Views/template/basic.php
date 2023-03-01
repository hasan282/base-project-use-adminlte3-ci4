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

    <?= $adminPlugins->head(); ?>

</head>

<?= $this->renderSection('body'); ?>

<?= $adminPlugins->foot(); ?>

<?= $this->renderSection('jscript'); ?>

</body>

</html>