<?php
$userProfil = $result["data"]['userProfil'];

?>

<h1 class="text-center">Bienvenue sur votre profile <?= $userProfil->getPseudonyme() ?></h1>

<p class="text-center">Vous êtes inscrit depuis le <?= $userProfil->getRegisterdate() ?></p>
<?php 
    if($userProfil->getPseudonyme() === "ROLE_ADMIN") {
        echo "<p class=\"text-center\">Vous êtes un administrateur.</p>";
    } else {
        echo "<p class=\"text-center\">Vous êtes un utilisateur.</p>";
    }
?>

<form action="index.php?ctrl=security&action=editProfilPseudonyme&id=<?= $userProfil->getId() ?>" method="post">
    <div class="m-auto col-lg-4 text-center">
        <div class="form-group">
            <label for="" class="mx-sm-1">Votre pseudonyme : </label>
            <input type="text" class="form-control" name="pseudonyme" placeholder="<?= $userProfil->getPseudonyme() ?>">
        </div>
    </div>
</form>

<form action="index.php?ctrl=security&action=editProfilEmail&id=<?= $userProfil->getId() ?>" method="post">
    <div class="m-auto col-lg-4 text-center">
        <div class="form-group">
            <label for="" class="mx-sm-1">Votre adresse email : </label>
            <input type="email" class="form-control" name="pseudonyme" placeholder="<?= $userProfil->getEmail() ?>">
        </div>
    </div>
</form>

<form action="index.php?ctrl=security&action=deleteUser&id=<?= $userProfil->getId() ?>" method="post">
    <div class="m-auto col-lg-4 text-center">
        <div class="form-group ">
            <label for="" class="mx-sm-1">Saisir votre mots de passe : </label>
            <input type="password" name="password" class="form-control">
            <small class="form-text">Si vous supprimez votre compte, vos topics ainsi que vos posts seront supprimés</small>
        </div>
        <button type="submit" class="btn btn-danger">Supprimer mon compte</button>
    </div>
</form>

