<?php
use Setting\Config;
use models\Model;

$url = Config::getBaseURL();
$model = new Model();
$positions = $model->getPosition();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jQuery UI Draggable - Default functionality</title>


    <link rel="stylesheet" href="<?= $url ?>assets/css/style.css">

</head>
<body>
<?php foreach ($positions as $value): ?>
    <div data-key="<?= $value['key'] ?>" class="draggable"
         style="background-color: #ffe31d;position: absolute;top: <?= $value['top'] . "px"; ?>;left: <?= $value['left'] . "px" ?>"></div>
<?php endforeach; ?>
<input type="hidden" id="baseurl" value="/test3/">
<script src="<?= $url ?>assets/js/jquery.js" type="text/javascript"></script>
<script src="<?= $url ?>assets/js/jquery-ui.js" type="text/javascript"></script>
<script src="<?= $url ?>assets/js/script.js" type="text/javascript"></script>
</body>
</html>
