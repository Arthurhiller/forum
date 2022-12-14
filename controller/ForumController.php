<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategorieManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;
    
class ForumController extends AbstractController implements ControllerInterface{

    public function index(){
          

        $topicManager = new TopicManager();

        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "data" => [
                "topics" => $topicManager->findAll(["creationdate", "DESC"])
            ]
        ];
        
    }

    public function listCategories() {

        $categorieManager = new CategorieManager();
            
        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "data" => [
                "categories" => $categorieManager->findAll()
            ]
        ];
    }


    public function listTopicCategories($id) {

        $topicManager = new TopicManager();

        return [

            "view" => VIEW_DIR."forum/listTopicsCategorie.php",
            "data" => [
                "topicsCategories" => $topicManager->findOneByIdTopicsCategorie($id)
            ]
        ];
    }


}
