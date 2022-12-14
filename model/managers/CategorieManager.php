<?php

namespace Model\Managers;

use App\DAO;
use App\Manager;

class CategorieManager extends Manager {

    protected $className = "Model\Entities\Categorie";
    protected $tableName = "categorie";

    public function __construct()
    {
        parent::connect();
    }


    
}