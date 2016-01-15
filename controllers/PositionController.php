<?php
use models\Model;
use core\Controller;

class PositionController extends Controller
{
    function actionIndex()
    {
        $model = new Model();
        $positions = $model->getPosition();
        $this->view->render('Template', array('positions' => $positions));

    }

    function actionSetposition()
    {
        if (isset($_POST['top']) && isset($_POST['left']) && isset($_POST['key'])) {
            $model = new Model();
            $model->setPosition($_POST['top'], $_POST['left'], $_POST['key']);
            return true;
        }

    }

}

