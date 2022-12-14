<?php

$allUsers = $result["data"]["allUsers"];
use App\Session;

?>

<?php 
    if(Session::getUser()->getRole() == "ROLE_ADMIN") { ?>
<div class="row">
    <?php foreach($allUsers as $user): ?>
    <div class="card" style="width: 30rem; margin: 5px 5px 5px 0;">
        <div class="card-body">
            <h5 class="card-title"><?= $user->getPseudonyme() ?></h5>
            <p class="card-text">L'adresse email : <?= $user->getEmail() ?></p>
            <p class="card-text">Le role : <?= $user->getRole() ?></p>
            <p class="card-text">Date d'enregistrement : <?= $user->getRegisterdate() ?></p>
            <p class="card-text">Le compte de l'utilisateur est : </p>
            <a href="#" class="btn btn-danger">Bannir</a>
            <a href="#" class="btn btn-primary">Unban</a>
        </div>
    </div>
        <?php endforeach; ?>
</div>
<?php
    } else {
        Session::addFlash("error", "Vous n'avez pas la permission");
        return [
            "view" => VIEW_DIR."home/index.php"
        ];
        
    }
?>
