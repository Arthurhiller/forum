<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;

class SecurityController extends AbstractController implements ControllerInterface {

    public function index() {

    }

    public function registerForm() {

        return [

            "view" => VIEW_DIR."security/registerForm.php",
            "data" => null
        ];

    }

    public function register() {

        if(!empty($_POST)) {


            $pseudonyme = filter_input(INPUT_POST, "pseudonyme", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $confirmePassword = filter_input(INPUT_POST, "confirmePassword", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($pseudonyme && $email && $password && $confirmePassword) {


                if($password == $confirmePassword && strlen($password) >= 8 ) {


                    $manager = new UserManager();
                    $user = $manager->findOneByPseudonyme($pseudonyme);


                    if(!$user) {

                        $hash = password_hash($password, PASSWORD_DEFAULT);

                        if($manager->add([
                            "pseudonyme" => $pseudonyme,
                            "email" => $email,
                            "password" => $hash
                        ]));
                        Session::addFlash("success", "Merci de vous être inscrit");

                    }
                    $this->redirectTo("security", "login");
                    Session::addFlash("error", "Mots de passe ou nom d'utilisateur incorrect");
                }
                $this->redirectTo("security", "login");
                Session::addFlash("error", "Mots de passe ou nom d'utilisateur incorrect");
            }
            $this->redirectTo("security", "login");
            Session::addFlash("error", "Veillez vérifiez les information fournits");
        }
        
    }

    public function loginForm() {

        return [

            "view" => VIEW_DIR."security/loginForm.php",
            "data" => null
        ];

    }

    public function login() {

        // Vérifie si  la super global POST n'est pas vide
        if(!empty($_POST)) {

            // die("test 1");
            // Filtre les valeurs du formulaire pour éviter l'injection de code (XSS)
            $pseudonyme = filter_input(INPUT_POST, "pseudonyme", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Vérifie si le pseudonyme ET le password sont valides
            if($pseudonyme && $password) {
                
                // Instanciation de la class UserManager
                $manager = new UserManager();
                // On stock les données récupérés dans la variable email
                $user = $manager->findOneByPseudonyme($pseudonyme);

                // Si le pseudonyme saisis existe
                if(isset($user)) {

                    // Dans la variable hash, je stock le password hash
                    $hash = $manager->findOneByEmailPassword($pseudonyme)->getPassword();

                    
                    //Vérifie si le mots de passe saisis correspond 
                    if(password_verify($password, $hash)) {

                        Session::setUser($user);

                    }
                    $this->redirectTo("index");
                    Session::addFlash("success", "Bienvenue !");
                    
                }
            }
        }
        return [

            "view" => VIEW_DIR."security/loginForm.php"
        ];
    }

    public function logOut() {

        // Vérifie si la session n'est pas vide 
        if(!empty($_SESSION['user'])) {

            unset($_SESSION['user']);
            $this->redirectTo("index");
            
        }
    }

    public function viewProfil($id) {
        
        $manager = new UserManager();

        return [

            "view" => VIEW_DIR."security/viewProfile.php",
            "data" => [
                "userProfil" => $manager->findOneById($id)
            ]
        ];
    }

    public function editProfilPseudonyme($id) {

        if(isset($_POST)) {

            $pseudonyme = filter_input(INPUT_POST, "pseudonyme", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($pseudonyme) {

                $userManager = new UserManager();


            }
        }        
      
    }

    public function viewAllUsers() {
        
        $userManager = new UserManager;

        return [

            "view" => VIEW_DIR."security/viewAllUsers.php",
            "data" => [
                "allUsers" => $userManager->findAll(["registerdate", "DESC"])
            ]
        ];

    }


    public function deleteUser($id) {

        // Vérifie si la session 'user' n'est pas vide
        if(!empty($_SESSION['user'])) {
            
            // Vérifie si l'action post existe
            if(isset($_POST)) {
                
                // Filtre le mdp saisis par l'utilisateur
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                // Si le mdp est valide alors
                if($password) {
                    
                    
                    $userManager = new UserManager();

                    // Récupère le passeword hash du user
                    $hash = $userManager->findOneById($id)->getPassword();

                    // Vérifie si le mdp saisie est le même que le mdp en bdd
                    if(password_verify($password, $hash)) {
                        
                        $userManager->delete($id);
                        unset($_SESSION['user']);
                        $this->redirectTo("index");
                        Session::addFlash("succes", "Votre compte à bien été supprimé");
                    }
                }
                Session::addFlash("error", "Mots de passe incorrect");
                $manager = new UserManager();

                return [

                    "view" => VIEW_DIR."security/viewProfile.php",
                    "data" => [
                        "userProfil" => $manager->findOneById($id)
                    ]
                ];

            }
        }

    } 

    
}