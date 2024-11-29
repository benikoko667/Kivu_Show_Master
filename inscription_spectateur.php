<?php 
    session_start();
    require("./model/config/commandes.php");
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "./vue/styles/style_authentification.css"/>
        <title><?=  $_SESSION['systeme'] ?></title>
    </head>
    <body>
        <?php 
            include("menu.php");
        ?>

        <section class="authentification" id="authentification">

            <?php 
                if(isset($_POST['bt_recherche'])){

                    header('Location:http://localhost/KIVU_SHOW/index.php');
                    exit;                            
                }
            ?>

            <div class="contenu">
                <div class="contenu_second">
                    <h3>Nouveau Compte</h3>

                    <form action="./controler/actions/nouveau_compte_spectateur.php" method="POST">

                        <div class="element">
                            <div class="image">
                                <img class="logo" src="./img/utilisateur.png" alt="logo">
                            </div>
                            <div class="inputboite">
                                <input type="text" name="nom" class="form-control" placeholder="Nom complet ">
                            </div>
                        </div>

                        <div class="element">
                            <div class="image">
                                <img class="logo" src="./img/email.png" alt="logo">
                            </div>
                            <div class="inputboite">
                                <input type="email" name="email" class="form-control" placeholder="Adresse e-mail  ">
                            </div>
                        </div>

                        <div class="element">
                            <div class="image">
                                <img class="logo" src="./img/password.png" alt="logo">
                            </div>
                            <div class="inputboite">
                                <input type="password" name="password" class="form-control" placeholder="Mot de passe ">
                            </div>
                        </div>

                        <div class="bas">
                            <div class="inputboite">
                                <input type="submit" name="bt_suivant" value="Créer">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </section>

        <?php 
            include("copyright.php");
        ?>     
        
        <script src="./vue/js/index.js"></script>
    </body>
</html>