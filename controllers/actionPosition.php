<?php
require_once('../config.php');
require_once('../models/Database.php');
require_once('../models/Model.php');
$model = new Model();

if (isset($_POST['top']) && isset($_POST['left']) && isset($_POST['key'])) {
    $model->setPosition($_POST['top'], $_POST['left'], $_POST['key']);
    echo "Information saved";

}
