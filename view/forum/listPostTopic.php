<?php 

$postTopic = $result["data"]["postTopic"];
?>

<h1>List des messages</h1>


<?php foreach($postTopic as $post): ?>
<div class="media">
  <img src="..." class="mr-3" alt="...">
  <div class="media-body">
    <h5 class="mt-0"><?= $post->getUser()->getPseudonyme() ?></h5>
    <p><?= $post->getText() ?></p>
    <p><?= $post->getCreationdate() ?></p>
    <a href="index.php?ctrl=post&action=deletePost&id=<?= $post->getId() ?>" class="btn btn-danger">Supprimer</a>
  </div>
</div>
<?php endforeach; ?>


<form action="index.php?ctrl=post&action=addPost&id=<?= $_GET['id'] ?>" method="post">
    <p>Poster un message</p>
    <div class="form-group">
        <label for="">Message</label>
        <textarea class="form-control" name="text" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyé</button>
</form>


