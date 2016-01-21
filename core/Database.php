<?php
namespace core;

use Settings\Config;
use PDO;
use PDOException;
class Database
{
    public static $instance = null;

    public static function getInstance()
    {
        if (!self::$instance) {
            try {

                $DBHost = Config::HOST;
                $DBName = Config::DATABASE;
                $DBUsername = Config::USER;
                $DBPassword = Config::PASSWORD;

                if ($DBHost === null || $DBName === null || $DBUsername === null || $DBPassword === null)
                    die('Database: one or more configuration variables are not set ($DBHost, $DBName, $DBUsername, $DBPassword)');

                self::$instance = new PDO("mysql:host=$DBHost;dbname=$DBName", $DBUsername, $DBPassword);

                $st = self::$instance->prepare("SET NAMES 'utf8'");
                $st->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }

        return self::$instance;
    }

    public static function FindeAll($user_id)
    {
        $result = self::getInstance()->prepare("SELECT * FROM `positions` WHERE `user_id`=:user_id");
        $result->execute(array(':user_id' => $user_id));
        return $row = $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function Update($params)
    {
        $sql = "UPDATE positions SET `top`=:top,`left`=:left WHERE `id` = :id";
        $result = self::$instance->prepare($sql);
        return $result->execute($params);
    }

    public static function Insert($params)
    {

        $sql = "INSERT INTO `positions` (`top`, `left`,`color`,`user_id`) VALUES (:top, :left, :color ,:user_id)";
        $result = self::getInstance()->prepare($sql);
        return $result->execute($params);
    }

    public static function getUserId($username, $password)
    {
        $result = self::getInstance()->prepare("SELECT id FROM `users` where `username` = :username AND `password`=:password");
        $result->execute(array(':username' => $username, ':password' => $password));
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row['id'];
    }

    public static function Delete()
    {

    }
}

?>