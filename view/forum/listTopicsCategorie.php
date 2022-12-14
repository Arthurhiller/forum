<?php

$topicsCategories = $result["data"]["topicsCategories"];

?>


<div class="row">
    <?php  foreach($topicsCategories as $topic): ?>
    <div class="card" style="width: 18rem; margin: 5px;">
        <div class="card-body">
            <h2 class="card-title"><?= $topic->getTitle() ?></h2>
            <p class="card-text">Posté par <?= $topic->getUser()->getPseudonyme() ?></p>
            <p class="card-text">Date de création : <?= $topic->getCreationdate() ?></p>
        </div>
    </div>
    <?php endforeach; ?>
</div>