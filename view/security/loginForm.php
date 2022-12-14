<h1 class="text-center">Se connecter</h1>


<form action="index.php?ctrl=security&action=login" method="post">
    <div class="m-auto col-lg-4 text-center">
        <div class="form-group">
            <label for="">Saisir votre identifant</label>
            <input type="text" name="pseudonyme" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Saisir votre mots de passe</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Se connecter</button>
    </div>
</form>