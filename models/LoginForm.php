<?php
namespace models;

use core\App;
use core\Database;

class LoginForm extends Database
{
    public $errors = array();
    private $attributes = [
        'username',
        'password',
    ];

    public function isValidate($form)
    {
        if (!empty($form)) {
            foreach ($this->attributes as $value) {
                if (!array_key_exists($value, $form)) {
                    $this->errors[] = 'This field  <b>' . $value . '</b> is not entered';
                }

                if ($form[$value] == '') {
                    $this->errors[] = 'This field <b>' . $value . '</b> empty!';
                }

                if ($value == 'username' || $value == 'password') {
                    if (mb_strlen($form[$value]) < 4) {
                        $this->errors[] = 'This field <b>' . $value . '</b> should not be more than 4 characters';
                    }
                }


            }
        } else {
            $this->errors[] = "dont submited";
        }
        if (empty($this->errors)) {
            return true;
        } else {
            return false;
        }

    }

    public function isLogin($data)
    {
        if ($this->isValidate($data)) {
            $username = trim(htmlspecialchars($data['username'], ENT_QUOTES));
            $password = md5(trim(htmlspecialchars($data['password'], ENT_QUOTES)));
            $sql = "SELECT count(*) FROM `users` WHERE `username`=:username AND `password`=:password";
            $result = $this->getInstance()->prepare($sql);
            $result->execute(array(':username' => $username, ':password' => $password));
            $number_of_rows = $result->fetchColumn();
            if ($number_of_rows > 0) {
                $userId = App::getUserId($username, $password);
                return $userId;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}