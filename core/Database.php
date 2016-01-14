<?php
namespace core;

use Setting\Config;
use PDO;
use PDOException;

class Database
{
    private static $instance = null;

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

    public static function FindeAll()
    {
        $result = self::$instance->prepare("SELECT * FROM `positions`");
        $result->execute();
        return $row = $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function Update($params)
    {
        $sql = "UPDATE positions SET `top`=:top,`left`=:left WHERE `key` = :key";
        $result = self::$instance->prepare($sql);
        return $result->execute($params);
    }

    public static function Insert($params)
    {
        $sql = "INSERT INTO `positions` (`top`, `left`,`key`) VALUES (:top, :left, :key)";
        $result = self::$instance->prepare($sql);
        return $result->execute($params);
    }

    public static function Delete()
    {

    }
}

?>