<?php
namespace models;

use core\Database;

class Model
{
    private $instance;

    function __construct()
    {

        $this->instance = Database::getInstance();
    }

    public function setPosition($top, $left, $key)
    {
        $sql = "SELECT count(*) FROM `positions` WHERE `key`=:key";
        $result = $this->instance->prepare($sql);
        $result->execute(array('key' => $key));
        $number_of_rows = $result->fetchColumn();
        var_dump($number_of_rows);
        if ($number_of_rows < 1) {
            return Database::Insert(array('top' => $top, 'left' => $left, 'key' => $key));
        } else {
            return Database::Update(array('top' => $top, 'left' => $left, 'key' => $key));
        }

    }

    public function getPosition()
    {
        return Database::FindeAll();
    }
}