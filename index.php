<?php
spl_autoload_register(function ($class) {
    require_once str_replace('\\', '/', $class). '.php';
});
require_once('controllers\PositionController.php');
$controller = new PositionController();
$controller->action_index();
