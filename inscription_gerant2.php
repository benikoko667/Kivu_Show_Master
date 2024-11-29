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

                    <form action="./controler/actions/nouveau_compte_gerant2.php" method="POST">

                        <div class="element">
                            <div class="image">
                                <img class="logo" src="./img/maison.png" alt="logo">
                            </div>
                            <div class="inputboite">
                                <input type="text" name="nom" class="form-control" placeholder="Nom de l'etablissement ">
                            </div>
                        </div>

                        <div class="element">
                            <div class="image">
                                <img class="logo" src="./img/categorie.png" alt="logo">
                            </div>
                            <div class="inputboite">
                                <select name="spectacle" id="spectacle">
                                    <option value="cinema">Cinema</option>
                                    <option value="theatre">Thèatre</option>
                                    <option value="elocance">Elocance</option>
                                    <option value="concert">Concert de musique</option>
                                    <option value="autres">Autres categories</option>
                                </select>
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