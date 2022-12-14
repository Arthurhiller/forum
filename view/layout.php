<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/7b23746ca8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">
    <title>FORUM</title>
</head>
<body>
    <div id="wrapper"> 
       
        <div id="mainpage">
            <!-- c'est ici que les messages (erreur ou succès) s'affichent-->
            <!-- <h3 class="message" style="color: red">h3> -->
            <div class="alert alert-danger" role="alert">
                <?= App\Session::getFlash("error") ?>
            </div>

            <h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>
            <header>
                <nav class="navbar navbar-dark bg-dark">
                    <div id="nav-left">
                        <a href="index.php?ctrl=home&action=index" class="nav-item text-white">Accueil</a>
                    </div>
                    <div id="nav-right">
                    <?php
                        
                        if(App\Session::getUser()){
                            ?>
                            <a href="index.php?ctrl=security&action=viewProfil&id=<?= App\Session::getUser()->getId() ?>"><span class="fas fa-user" class="nav-item"></span>&nbsp;<?= App\Session::getUser()->getPseudonyme() ?></a>
                            <a href="index.php?ctrl=security&action=viewAllUsers" class="nav-item text-white">Voir la liste des gens</a>
                            <a href="index.php?ctrl=topic&action=viewFormTopic" class="nav-item text-white ">Ajouter un topic</a>
                            <a href="index.php?ctrl=forum&action=listTopics" class="nav-item text-white">la liste des topics</a>
                            <a href="index.php?ctrl=forum&action=listCategories" class="nav-item">Listes des catégories</a>
                            <a href="index.php?ctrl=security&action=logOut" class="nav-item">Déconnexion</a>
                            <?php
                        }
                        else{
                            ?>
                            <a href="index.php?ctrl=security&action=loginForm" class="nav-item  text-white">Connexion</a>
                            <a href="index.php?ctrl=security&action=registerForm" class="nav-item  text-white">Inscription</a>
                            <a href="index.php?ctrl=forum&action=listTopics" class="nav-item  text-white">la liste des topics</a>
                            <a href="index.php?ctrl=forum&action=listCategories" class="nav-item text-white">Listes des catégories</a>
                        <?php
                        }
                        
                    ?>
                    </div>
                </nav>
            </header>
                
            <main id="forum" class="container">
                <?= $page ?>                
            </main>
        </div>
        <footer class="container">
            <p class="text-center">&copy; 2020 - Forum CDA - <a href="/home/forumRules.html">Règlement du forum</a> - <a href="#">Mentions légales</a></p>
            <!-- <button id="ajaxbtn">Surprise en Ajax !</button> -> cliqué <span id="nbajax">0</span> fois -->
        </footer>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script>

        $(document).ready(function(){
            $(".message").each(function(){
                if($(this).text().length > 0){
                    $(this).slideDown(500, function(){
                        $(this).delay(3000).slideUp(500)
                    })
                }
            })
            $(".delete-btn").on("click", function(){
                return confirm("Etes-vous sûr de vouloir supprimer?")
            })
            tinymce.init({
                selector: '.post',
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });
        })

        

        
       /* $("#ajaxbtn").on("click", function(){
            $.get(
                "index.php?action=ajax",
                {
                    nb : $("#nbajax").text()
                },
                function(result){
                    $("#nbajax").html(result)
                }
            )
        }) */
    </script>
</body>
</html>