<!doctype html>
<html lang="en">
<head>
    <?php
    $url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

    require_once('config.php');
    require_once('models/Database.php');
    require_once('models/Model.php');
    $model = new Model();
    $positions = $model->getPosition();
    ?>
    <meta charset="utf-8">
    <title>jQuery UI Draggable - Default functionality</title>
    <script src="<?= $url ?>views/js/jquery.js" type="text/javascript"></script>
    <script src="<?= $url ?>views/js/jquery-ui.js" type="text/javascript"></script>
    <script src="<?= $url ?>views/js/script.js" type="text/javascript"></script>

    <link rel="stylesheet" href="<?= $url ?>views/css/style.css">

</head>
<body>
<?php foreach ($positions as $value): ?>
    <div data-key="<?= $value['key'] ?>" class="draggable"
         style="background-color: #ffe31d;position: absolute;top: <?= $value['top'] . "px"; ?>;left: <?= $value['left'] . "px" ?>"></div>
<?php endforeach; ?>
<input type="hidden" id="baseurl" value="/test3/">
</body>
</html>
