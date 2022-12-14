<?php

namespace Model\Managers;

use App\DAO;
use App\Manager;

class PostManager extends Manager {

    protected $className = "Model\Entities\Post";
    protected $tableName = "post";

    public function __construct()
    {
        parent::connect();
    }


    public function findOneByIdCustom($id){

        $sql = "SELECT *
                FROM ".$this->tableName." p
                WHERE p.topic_id = :id
                ORDER BY p.creationdate
                ";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id], true), 
            $this->className
        );
    }
}