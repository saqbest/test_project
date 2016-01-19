<?php
namespace models;

use core\Database;

class Signup extends Database
{

    public $errors = array();
    private $attributes = [
        'reg-username',
        'email',
        'password',
        'confirm-password'
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
                if ($value == 'email') {
                    if (!filter_var($form[$value], FILTER_VALIDATE_EMAIL)) {
                        $this->errors[] = 'This filed <b>' . $value . '</b> should be email.';

                    }
                }
                if ($form['password'] !== $form['confirm-password']) {

                    $this->errors[] = 'Password error';

                }
                if ($value == 'reg-username' || $value == 'password') {
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

    public function Save($username, $email, $password, $number)
    {

        $password = md5($password);
        $sql = "INSERT INTO `users` (`username`, `email`,`password`) VALUES (:username, :email, :password)";;
        $result = self::getInstance()->prepare($sql);
        $result->execute(array(':username' => $username, ':email' => $email, ':password' => $password));
        $userId = self::getUserId($username, $password);

        $this->boxes($number, $userId);
    }

    public function Boxes($number, $userId)
    {
        $top = 50;
        $left = 50;

        for ($i = 0; $i <= $number; $i++) {
            $color = "rgb(" . rand(0, 255) . "," . rand(0, 255) . "," . rand(0, 255) . ")";
            $this->Insert(array(':top' => $top, ':left' => $left, ':color' => $color, ':user_id' => $userId));
            $top = $top + 50;
            $left = $left + 50;

        }


    }
}