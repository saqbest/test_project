<?php
namespace models;

use core\Database;
use PDO;
class Model extends Database
{


    public function setPosition($top, $left, $key)
    {
        $sql = "SELECT count(*) FROM `positions` WHERE `id`=:id";
        $result = $this->getInstance()->prepare($sql);
        $result->execute(array(':id' => $key));
        $number_of_rows = $result->fetchColumn();
        if ($number_of_rows > 0) {
            return Database::Update(array(':top' => $top, ':left' => $left, ':id' => $key));
        }

    }

    public function getPosition()
    {
        return Database::FindeAll();
    }

    public function getUnique($param)
    {
        $sql = "SELECT count(*) FROM `users` WHERE `username`=:param OR `email`=:param";
        $result = $this->getInstance()->prepare($sql);
        $result->execute(array(':param' => $param));
        $number_of_rows = $result->fetchColumn();
        if ($number_of_rows > 0) {
            echo true;
        } else {
            return false;
        }
    }

    public function getAvatar($user_id)
    {
        $result = self::getInstance()->prepare("SELECT image FROM `users` WHERE `id`=:user_id");
        $result->execute(array(':user_id' => $user_id));
        return $row = $result->fetchAll(PDO::FETCH_ASSOC);
    }
}