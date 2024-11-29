<?php 
    session_start();
    require("../../model/config/commandes.php");
   
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "../styles/style_menu.css"/>
        <title><?=  $_SESSION['systeme'] ?></title>
    </head>
    <body>

        <?php 
            include("menu.php");
        ?>
    
    
        <?php 
            if($_SESSION['id_publication_afficher_details'] != 0){

                $billet = afficherBillet($_SESSION['id_publication_afficher_details']);
                $client = afficherClientSelonCritaire($billet->id_spectateur);
                $Spectacle = afficherUnSpectacle($billet->id_spectacle);
                
        ?>
            <div class="description" id="description">

                <h3 class="titre">Nom spectacle : <?= $Spectacle->nom; ?></h3>
                <h3 class="titre">Nom client : <?= $client->nom; ?></h3>

                <p class="parag_secondaire">Numero billet : <?= $billet->id; ?></p>
                <p class="parag_secondaire">Type billet : <?= $billet->type_billet; ?></p>
                <p class="parag_secondaire">Date achat : <?= $billet->date_obtention; ?></p>
                <p class="parag_secondaire">Validation : 
                <?php 
                    if($billet->validation_gerant == true){
                ?>
                    Validé
                <?php 
                    }
                    else{
                ?>
                    En attente de validation
                <?php
                    }
                ?> 
                </p>
                <p class="parag_secondaire">ID Transaction : <?= $billet->identifiant_transaction; ?></p>
                <!-- <div class="image">
                    <img class="qr_code" src="../../img/qr_code.png" alt="logo">
                </div> -->
                
                <div class="boite_bouton">
                    <?php 

                        if($_SESSION['publique']== false){
                    ?>
                        <a href="index.php" class="btn1">Fermer</a>
                    <?php 
                        }
                        else
                        if($_SESSION['publique']== true && $_SESSION['utilisateur'] == "spectateur"){
                    ?>
                        <a href="billets_spectateur.php" class="btn1">Fermer</a>
                    <?php 
                        }
                        else
                        if($_SESSION['publique']== true && $_SESSION['utilisateur'] == "acteur"){
                    ?>
                        <a href="billets_acteur.php" class="btn1">Fermer</a>
                    <?php 
                        }
                        else
                        if($_SESSION['publique']== true && $_SESSION['utilisateur'] == "gerant"){
                    ?>
                        <a href="billets_gerant.php" class="btn1">Fermer</a>
                    <?php 
                        }
                        else
                        if($_SESSION['publique']== true && $_SESSION['utilisateur'] == "admin"){
                    ?>
                        <a href="billets_administrateur.php" class="btn1">Fermer</a>
                    <?php 
                        }
                    ?>
                </div>
            </div>
            
        <?php 
            }
        ?>


        <?php 
            include("copyright.php");
        ?>      
    
        <script src="../js/index.js"></script>
    </body>
</html>