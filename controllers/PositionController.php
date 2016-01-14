<?php
use models\Model;
use core\Controller;

class PositionController extends Controller
{
    function action_index()
    {
        $model = new Model();
        $data = $model->getPosition();

        $this->view->generate('Template', ['data' => $data]);
    }
}

