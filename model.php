<?php

class Model
{
    private $instance;

    function __construct()
    {
        $db = new Database();
        $this->instance = $db->getInstance();
    }

    public function addItem($author_id, $ganre_id)
    {
        $sql = "INSERT INTO `authors_ganres` (`author_id`, `ganre_id`,) VALUES (:author_id, :ganre_id)";
        $st = $this->instance->prepare($sql);
        return $st->execute(array('author_id' => $author_id, 'ganre_id' => $ganre_id));
    }

    public function searchItem($attributes)
    {
        $where = array();
        foreach ($attributes as $key => $value) {

            if ($value != '') {
                $where [] = "$key LIKE CONCAT('%','$value','%') ";
            }
        }
        $where_sql = implode('OR ', $where);

        $sql = "SELECT * FROM `hm` WHERE  $where_sql";
        $st = $this->instance->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
}