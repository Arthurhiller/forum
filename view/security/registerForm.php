<h1 class="text-center m-2">Inscription sur le forum</h1>

<form action="index.php?ctrl=security&action=register" method="post">
    <div class="m-auto col-lg-5 text-center">
        <div class="form-group">
            <label for="">Saisir un pseudonyme</label>
            <input type="text" name="pseudonyme" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Saisir votre adresse mail</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Saisir un mots de passe</label>
            <input type="password" name="password" class="form-control">
            <small class="form-text">Le mots de passe doit contenir minimum 8 caractères.</small>
        </div>
        <div class="form-group">
            <label for="">Confirmer votre mots de passe</label>
            <input type="password" name="confirmePassword" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Envoyer</button>
    </div>
</form>
