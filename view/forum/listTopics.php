<?php

$topics = $result["data"]['topics'];
    
?>

<h1 class="text-center m-2">liste topics</h1>



<div class="row d-flex justify-content-center">
    <?php foreach($topics as $topic): ?>
    <div class="card m-1 col-lg-4 border border-primary text-center">
        <div class="card-body">
            <h2 class="card-title"><?= $topic->getTitle() ?></h2>
            <p class="card-text">Posté par <?= $topic->getUser()->getPseudonyme() ?></p>
            <p class="card-text">Date de création : <?= $topic->getCreationdate() ?></p>
            <?php if(App\Session::getUser()): ?>
            <a href="index.php?ctrl=post&action=listPostTopic&id=<?= $topic->getId() ?>" class="btn btn-primary">Voir les messages</a>
            <?php endif; ?>
            <span class="badge badge-primary"><?= $topic->getCategorie()->getTitle() ?></span>
            <a href="index.php?ctrl=topic&action=lockTopic&id=<?= $topic->getId() ?>" class="btn btn-danger">Lock</a>
            <a href="index.php?ctrl=topic&action=unlockTopic&id=<?= $topic->getId() ?>" class="btn btn-success">Unlock</a>
        </div>
    </div>
    <?php endforeach; ?>
</div>
