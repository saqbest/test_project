<?php
namespace models;

use core\Database;

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
}