<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class TopicManager extends Manager{

        protected $className = "Model\Entities\Topic";
        protected $tableName = "topic";


        public function __construct(){
            parent::connect();
        }

        public function findOneByIdTopicsCategorie($id){

            $sql = "SELECT *
                    FROM ".$this->tableName." t
                    WHERE t.categorie_id = :id
                    ";
    
            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id], true), 
                $this->className
            );
        }

        public function findOneByTitle($data){

            $sql = "SELECT t.title
                    FROM ".$this->tableName." t
                    WHERE t.title = :title
                    ";
    
            return $this->getOneOrNullResult(
                DAO::select($sql, ['title' => $data], false), 
                $this->className
            );
        }

        public function lockTopic($id) {

            $sql = "UPDATE topic t SET t.closed = "."1"." WHERE t.id_topic = :id";
            DAO::update($sql, ["id " => $id]);
        }

        public function UnlockTopic($id) {

            $sql = "UPDATE topic SET closed = 0 WHERE id_topic = :id";
            DAO::update($sql, ["id" => $id]);
        }
    }