<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App · Name<?= (isset($title)) ? ' · ' . $title : ''; ?></title>
    <link rel="shortcut icon" href="/image/icon/icon64.png" type="image/png">
    <link rel="icon" href="/image/icon/icon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/image/icon/icon64.png" sizes="64x64" type="image/png">
    <link rel="apple-touch-icon" href="/image/icon/icon128.png">
    <style>
        .bg-pattern {
            /* background-image: url("<?= base_url(); ?>/img/pattern/light"); */
            background-color: #F4F6F9;
        }

        .bg-pattern-dark {
            /* background-image: url("<?= base_url(); ?>/img/pattern/dark"); */
            background-color: #454D55;
        }
    </style>

    <?= $adminPlugins->head(); ?>

</head>

<?= $this->renderSection('body'); ?>

<script>
    const BaseURL = "<?= base_url(); ?>/";
</script>

<?= $adminPlugins->foot(); ?>

<?php $jscript = $jscript ?? array();
if (is_string($jscript)) $jscript = explode('|', $jscript);
foreach ($jscript as $js) : ?>
    <script src="/asset/js/<?= $js; ?>.js"></script>
<?php endforeach; ?>

<?= $this->renderSection('jscript'); ?>

</body>

</html>