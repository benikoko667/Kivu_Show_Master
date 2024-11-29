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
                
            <?php    
                if(verificationUtilisateurConnecte($_SESSION['id'], $_SESSION['utilisateur']) == true){
                    $nombre_connexion = AfficherNombreConnexion();

                    if($nombre_connexion > 0){
                        $nombre_connexion = $nombre_connexion - 1;
                         ModifierNombreConnexion($nombre_connexion);
                    }
                            
                    supprimerConnexion($_SESSION['id'], $_SESSION['utilisateur']);

                    unset($_SESSION['id']);
                    unset($_SESSION['login']);
                    unset($_SESSION['password']);
                    unset($_SESSION['image_profil']);
                    unset($_SESSION['nom']);
                    unset($_SESSION['id_publication_afficher_details']);

                    unset($_SESSION['publique']);
                    unset($_SESSION['utilisateur']);

                }
            ?>

                <h2>Vous n'êtes connecté à aucun compte</h2>

            </div>
        </section>

        <?php 
            include("copyright.php");
        ?>      
        
        <script src="./vue/js/index.js"></script>
    </body>
</html>