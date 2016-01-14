<?php

class Model
{
    private $instance;

    function __construct()
    {
        $db = new Database();
        $this->instance = $db->getInstance();
    }

    public function setPosition($top, $left, $key)
    {
        $sql = "SELECT count(*) FROM `positions` WHERE `key`=:key";
        $result = $this->instance->prepare($sql);
        $result->execute(array('key' => $key));
        $number_of_rows = $result->fetchColumn();
        var_dump($number_of_rows);
        if ($number_of_rows < 1) {
            $sql = "INSERT INTO `positions` (`top`, `left`,`key`) VALUES (:top, :left, :key)";
            $result = $this->instance->prepare($sql);
            return $result->execute(array('top' => $top, 'left' => $left, 'key' => $key));
        } else {
            $result = $this->instance->prepare("UPDATE positions SET `top`=:top,`left`=:left WHERE `key` = :key");
            $result->bindParam(':top', $top);
            $result->bindParam(':left', $left);
            $result->bindParam(':key', $key);
            return $result->execute();
        }

    }

    public function getPosition()
    {

        $result = $this->instance->prepare("SELECT * FROM `positions`");
        $result->execute();
        return $row = $result->fetchAll(PDO::FETCH_ASSOC);

    }
}