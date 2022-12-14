<?php 

$topics = $result["data"]['topics'];
$categories = $result["data"]["categories"]

?>


<h1 class="text-center m-1">BIENVENUE SUR LE FORUM</h1>
<section>
    <h2 class="text-center m-2">Liste des catégories</h2>
    <div class="row d-flex justify-content-center">
        <?php foreach($categories as $categorie): ?>
        <div class="card m-2 col-lg-3 border border-primary text-center">
            <div class="card-body">
                <h2 class="card-title"><?= $categorie->getTitle() ?></h2>
                <a href="index.php?ctrl=forum&action=listTopicCategories&id=<?= $categorie->getId() ?>" class=" btn btn-primary">Topics</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<section>
    <h2 class="text-center m-2">Liste des topics</h2>
    <div class="row d-flex justify-content-center">
        <?php foreach($topics as $topic): ?>
        <div class="card m-2 col-lg-3 border border-primary text-center">
            <div class="card-body">
                <h2 class="card-title"><?= $topic->getTitle() ?></h2>
                <p class="card-text">Posté par <?= $topic->getUser()->getPseudonyme() ?></p>
                <p class="card-text">Date de création : <?= $topic->getCreationdate() ?></p>
                <?php if(App\Session::getUser()): ?>
                <a href="index.php?ctrl=post&action=listPostTopic&id=<?= $topic->getId() ?>" class="btn btn-primary">Voir les messages</a>
                <?php endif; ?>
                <span class="badge badge-primary"><?= $topic->getCategorie()->getTitle() ?></span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
