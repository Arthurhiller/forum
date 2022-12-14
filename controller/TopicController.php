<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategorieManager;
use Model\Managers\TopicManager;

class TopicController extends AbstractController implements ControllerInterface {

    public function index() {

    }

    public function viewFormTopic() {

        $categorieManager = new CategorieManager();

        return [

            "view" => VIEW_DIR."forum/viewFormTopic.php",
            "data" => [
                "topicsCategorie" => $categorieManager->findAll()
            ]
        ];
    }

    public function addTopic() {

        // Vérifie si la session user n'est pas vide
        if(!empty($_SESSION['user'])) {

            // Vérifie si la super global post n'est pas vide
            if(isset($_POST)) {
                

                // Filtre les valeurs de l'input
                $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $id = Session::getUser()->getId();
                $idCategorie = filter_input(INPUT_POST, "idCategorie", FILTER_SANITIZE_NUMBER_INT);

                if($title && $idCategorie && $id) {


                    $topicManager = new TopicManager();

                    if($topicManager->add([
                        "title" => $title,
                        "user_id" => $id,
                        "categorie_id" => $idCategorie
                    ]));

                }

            }

        }
        $categorieManager = new CategorieManager();
        return [
          
            "view" => VIEW_DIR."forum/viewFormTopic.php",
            "data" => [
                "topicsCategorie" => $categorieManager->findAll()
            ]

        ];
    }

    public function lockTopic($id) {

        $topicManager = new TopicManager();
        $topic = $topicManager->findOneById($id);

        if($_SESSION['user']) {

            $userId = $_SESSION['user']->getId();
            if($userId === $topic->getUser()->getId() || $_SESSION['user']->getRole() === "ROLE_ADMIN") {
                
                             
                $topicManager->lockTopic($id);
                $topic->setClosed(true);
                $this->redirectTo("home");
                $topic->setClosed(1);
                
                $this->redirectTo("forum", "listTopics");
                Session::addFlash("success", "Le topic à été vérouillé");

            }  else {

                $this->redirectTo("forum", "listTopics");
                Session::addFlash("error", "Vous n'avez pas la permission de lock le topic.");
            }

        } else {

            $this->redirectTo("forum", "listTopics");
            Session::addFlash("error", "Vous n'avez pas la permission de lock le topic.");
        }
    }

    public function unlockTopic($id) {

        $topicManager = new TopicManager();
        $topic = $topicManager->findOneById($id);

        if($_SESSION['user']) {

            $userId = $_SESSION['user']->getId();
            if($userId === $topic->getUser()->getId() || $_SESSION['user']->getRole() === "ROLE_ADMIN") {

                $params = 0;
                $topicManager->unlockTopic($id, $params);
                $this->redirectTo("forum", "listTopics");
                Session::addFlash("success", "Le topic à été dévérouillé.");

            } else {

                $this->redirectTo("forum", "listTopics");
                Session::addFlash("error", "Vous n'avez pas la permission de dévérouiller le topic.");
            }

        } else {

            $this->redirectTo("forum", "listTopics");
            Session::addFlash("error", "Vous n'avez pas la permission de dévérouiller le topic");
        }
    }
}