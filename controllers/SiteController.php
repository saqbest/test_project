<?php
use core\App;
use models\Model;
use core\Controller;
use models\Signup;
use models\LoginForm;
use models\ImageUpload;
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
            $_SESSION['isGuest'] = true;
            $_SESSION['user_id'] = $user_id;
            header('Location: http://local.test.com/site/index');


        } elseif (!App::isGuest()) {
            header('Location: http://local.test.com/site/index');
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
        var_dump($_POST);
        if ($model->isValidate($_POST)) {
            $model->Save($_POST['reg-username'], $_POST['email'], $_POST['password1'], $_POST['number']);
            $username = trim(htmlspecialchars($_POST['reg-username'], ENT_QUOTES));
            $password = md5(trim(htmlspecialchars($_POST['password1'], ENT_QUOTES)));
            $user_id = App::getUserId($username, $password);
            $_SESSION['isGuest'] = true;
            $_SESSION['user_id'] = $user_id;
            $this->view->render('ImageUpload');
            unset($_POST);
        } elseif (!App::isGuest()) {
            header('Location: http://local.test.com/');

        } else {

            foreach ($model->errors as $error) {

                echo "<div class='error_div'>" . $error . "</div>";
            }
            $this->view->render('LoginSignUp');
        }


    }

    function actionSetPosition()
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

    function actionCheckUnique()
    {
        if (isset($_POST)) {
            $param = $_POST['param'];
            $model = new Model();
            $unique = $model->getUnique($param);
            if ($unique) {
                echo true;
            } else {
                return false;
            }
        }

    }

    function actionImageUpload()
    {


        if (isset($_FILES["FileInput"]) && $_FILES["FileInput"]["error"] == UPLOAD_ERR_OK) {
            $model = new ImageUpload();
            if ($model->isValidate($_FILES["FileInput"])) {

                $model->Save($_FILES["FileInput"]);
                header('Location: http://local.test.com/');

            } else {
                foreach ($model->errors as $error) {
                    echo $error;
                }

            }

        } elseif (!App::isGuest()) {
            header('Location: http://local.test.com/');

        } else {

            //$this->view->render('ImageUpload');

            die('Something wrong with upload! Is "upload_max_filesize" set correctly?');
        }
    }

}
