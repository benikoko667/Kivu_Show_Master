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
                else
                if(isset($_POST['bt_suivant'])){

                    if($_POST['utilisateur'] == "spectateur"){
                        header('Location:http://localhost/KIVU_SHOW/inscription_spectateur.php');
                        exit;
                    }
                    else
                    if($_POST['utilisateur'] == "acteur"){
                        header('Location:http://localhost/KIVU_SHOW/inscription_acteur.php');
                        exit;
                    }
                    else
                    if($_POST['utilisateur'] == "gerant"){
                        header('Location:http://localhost/KIVU_SHOW/inscription_gerant.php');
                        exit;
                    }
                            
                }
            ?>

            <div class="contenu">
                <div class="contenu_second">
                    <h3>Nouveau Compte</h3>

                    <form action="" method="POST">

                        <div class="element">
                            <div class="image">
                                <img class="logo" src="./img/utilisateur.png" alt="logo">
                            </div>
                            <div class="inputboite">
                                <select name="utilisateur" id="utilisateur">
                                    <option value="spectateur">Compte pour Spectateur</option>
                                    <option value="acteur">Compte pour Acteur</option>
                                    <option value="gerant">Compte pour Gérant spectacle</option>
                                </select>
                            </div>
                        </div>

                        <div class="bas">
                            <div class="inputboite">
                                <input type="submit" name="bt_suivant" value="Suivant">
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