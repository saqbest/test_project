<?php
namespace core;
use core\View;
class Controller {

    protected $model;
    protected $view;

    function __construct()
    {
        $this->view = new View();
    }

    function actionIndex()
    {
        //
    }
}

?>

