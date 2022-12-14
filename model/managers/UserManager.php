<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class UserManager extends Manager {

    protected $className = "Model\Entities\User";
    protected $tableName = "user";

    public function __construct()
    {
        parent::connect();
    }

    public function findOneByPseudonyme($data){

        $sql = "SELECT u.id_user, u.pseudonyme, u.email, u.role, u.registerdate, u.status
                FROM ".$this->tableName." u
                WHERE u.pseudonyme = :pseudonyme
                ";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['pseudonyme' => $data], false), 
            $this->className
        );


    }

    public function findOneByEmail($data) {

        $sql = "SELECT *
        FROM ".$this->tableName." u
        WHERE u.email = :email
        ";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['email' => $data], false), 
            $this->className
        );

    }

    public function findOneByEmailPassword($data) {

        $sql = "SELECT u.password
        FROM ".$this->tableName." u
        WHERE u.pseudonyme = :pseudonyme
        ";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['pseudonyme' => $data], false), 
            $this->className
        );

    }

    public function updatePseudonyme($id,$pseudonyme){

        $sql = "UPDATE ".$this->tableName." u
                SET u.pseudonyme = :pseudonyme 
                WHERE u.id_".$this->tableName."= :id";

        return $this->getOneOrNullResult(
            DAO::update($sql, ['id' => $id, 'pseudonyme ' => $pseudonyme], false), 
            $this->className
        );
    }
}