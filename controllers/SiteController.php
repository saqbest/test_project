<?php
use core\App;
use models\Model;
use core\Controller;
use models\Signup;
use models\LoginForm;

class SiteController extends Controller
{
    function actionIndex()
    {

        if (!App::isGuest()) {
            $model = new Model();
            $user_id = $_SESSION['user_id'];
            $positions = $model->FindeAll($user_id);
            $this->view->render('Template', array('positions' => $positions));

        }

        $this->view->render('LoginSignup');

    }

    function actionLogin()
    {
        $model = new LoginForm();
        if ($model->isLogin($_POST)) {
            $user_id = $model->isLogin($_POST);
            $positions = $model->FindeAll($user_id);
            $_SESSION['isGuest'] = true;
            $_SESSION['user_id'] = $user_id;
            $this->view->render('Template', array('positions' => $positions));


        } else {
            foreach ($model->errors as $error) {
                echo "<div class='error_div'>" . $error . "</div>";
            }
            $this->view->render('LoginSignup');

        }
    }

    function actionSignup()
    {
        $model = new Signup();
        if ($model->isValidate($_POST)) {
            $model->Save($_POST['reg-username'], $_POST['email'], $_POST['password'], $_POST['number']);
            echo "User registered";
            $this->view->render('LoginSignup');


        } else {

            foreach ($model->errors as $error) {

                echo "<div class='error_div'>" . $error . "</div>";
            }
            $this->view->render('LoginSignup');

        }


    }

    function actionSetposition()
    {
        if (isset($_POST['top']) && isset($_POST['left']) && isset($_POST['key'])) {
            $model = new Model();
            $model->setPosition($_POST['top'], $_POST['left'], $_POST['key']);
            return true;
        } else {
            return false;
        }

    }

    function actionLogout()
    {
        App::userLogout();
        header('Location: http://local.test.com/site/index');

    }

}
