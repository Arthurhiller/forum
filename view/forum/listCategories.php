<?php

$categories = $result["data"]["categories"];

?>

<h1 class="text-center m-2">Liste des catégories</h1>

<div class="container">
    <div class="row d-flex justify-content-center">
        <?php foreach($categories as $categorie): ?>
        <div class="card m-1 col-lg-3 border border-primary text-center">
            <div class="card-body">
                <h2 class="card-title"><?= $categorie->getTitle() ?></h2>
                <a href="index.php?ctrl=forum&action=listTopicCategories&id=<?= $categorie->getId() ?>" class=" btn btn-primary">Topics</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>