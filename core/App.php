<?php

namespace core;

use PDO;
use core\Database;

class App
{


    public static function isGuest()
    {
        return !isset($_SESSION['isGuest']);
    }

    public static function getUserId($username, $password)
    {
        $result = Database::getInstance()->prepare("SELECT id FROM `users` where `username` = :username AND `password`=:password OR `email`=:username AND `password`=:password");
        $result->execute(array(':username' => $username, ':password' => $password));
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row['id'];
    }

    public static function userLogout()
    {
        unset($_SESSION['isGuest']);
        unset($_SESSION['user_id']);
        session_destroy();
        return true;

    }
}