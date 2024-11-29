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
        <link rel = "stylesheet" href = "./vue/styles/style_index.css"/>
        <title><?=  $_SESSION['systeme'] ?></title>
    </head>
    <body>

        <?php 
            include("menu.php");
        ?>

        <section class="erreur" id="erreur">
            <?php 
                if(isset($_POST['bt_recherche'])){

                    header('Location:http://localhost/KIVU_SHOW/index.php');
                    exit;                            
                }
            ?>

            <div class="contenu">
                <H3>Erreur !</H3>
                <p>Les données d'authentification que vos avez saisies
                 sont soit erronnées soit obsoletes</p>
            </div>
        </section>

        <?php 
            include("copyright.php");
        ?>      
        
        <script src="./vue/js/index.js"></script>
    </body>
</html>