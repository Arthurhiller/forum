<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\PostManager;
use Model\Managers\TopicManager;
use Model\Managers\UserManager;

class PostController extends AbstractController implements ControllerInterface {

    public function index()
    {
        
    }


    public function listPostTopic($id) {

        $postManager = new PostManager();

        return [
            
            "view" => VIEW_DIR."forum/listPostTopic.php",
            "data" => [
                "postTopic" => $postManager->findOneByIdCustom($id)
            ]
        ];
    }

    public function addPost() {

        // Vérifie si il y à un utilisateur en session
        if($_SESSION['user']) {

            $topicManager = new TopicManager();
            $topicLock = $topicManager->findOneById($_GET['id'])->getClosed();
            if(isset($_POST)) {

                $text = filter_input(INPUT_POST, "text", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $idUser = Session::getUser()->getId();
                $idTopic = $_GET['id'];
    
                if($text && $idUser && $idTopic) {
                        
                    $postManager = new PostManager();
    
                    if($postManager->add([
                        "text" => $text,
                        "user_id" => $idUser,
                        "topic_id" => $idTopic
                    ]));
                    $postManager = new PostManager();
                    return [
                            
                        "view" => VIEW_DIR."forum/listPostTopic.php",
                        "data" => [
                        "postTopic" => $postManager->findOneByIdCustom($_GET['id'])
                        ]
                    ];
                }
            }
        }
        $postManager = new PostManager();
        return [
            
            "view" => VIEW_DIR."forum/listPostTopic.php",
            "data" => [
                "postTopic" => $postManager->findOneByIdCustom($_GET['id'])
            ]
        ];
    }

    public function deletePost($id) {

        $postManager = new PostManager();

        $userId = $postManager->findOneById($id)->getUser()->getId();


        if(Session::getUser()->getId() ===  $userId || Session::getUser()->getRole() === "ROLE_ADMIN") {

            $postManager->delete($id);
            Session::addFlash("success", "Le post à été supprimé");
            $this->redirectTo("forum","listTopics");

        }
        Session::addFlash("error", "Vous n'avez pas les droits necessaire pour supprimer le post.");
        $this->redirectTo("forum","listTopics");

    }
}