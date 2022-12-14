<?php

$topicsCategories = $result["data"]["topicsCategorie"];

?>

<h1 class="text-center">Créer un topics</h1>


<p class="text-center">Si vous avez un doute n'hésitez pas à relire le <a href="rules.php">règlement</a></p>


<form action="index.php?ctrl=topic&action=addTopic" method="post">
    <div class="m-auto col-lg-4 text-center">
        <div class="form-group">
            <label for="">Nom du topic</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" name="idCategorie">
                <?php foreach($topicsCategories as $topicsCategorie): ?> 
                <option value="<?= $topicsCategorie->getId() ?>" type="integer"><?= $topicsCategorie->getTitle() ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </div>
</form>