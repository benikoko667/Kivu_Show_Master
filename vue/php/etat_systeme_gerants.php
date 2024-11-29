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

        <section class="conteneur_menu" id="conteneur_menu">
        <div class="gauche">
                <div class="img">
                    <a href="menu_gerant.php"><img class="logo" src="../../img/home.png" alt="logo"></a>
                    <p class = "sous_titre">Actualités des spectacles</p>
                </div>
                <div class="img">
                    <a href="mes_spectacles.php"><img class="logo" src="../../img/mon_spectacle.png" alt="logo"></a>
                    <p class = "sous_titre">Nos spectacles</p>
                </div>
                <div class="img">
                    <a href="proposition_reussies_gerant.php"><img class="logo" src="../../img/mes_propositions.png" alt="logo"></a>
                    <p class = "sous_titre">Messages reussies</p>
                </div>
                <div class="img">
                    <a href="billets_vendus.php"><img class="logo" src="../../img/mes_billets.png" alt="logo"></a>
                    <p class = "sous_titre">Billets vendus</p>
                </div>
                <div class="img">
                    <a href="billets_attente_validation.php"><img class="logo" src="../../img/billets_attente.png" alt="logo"></a>
                    <p class = "sous_titre">Billets en attente</p>
                </div>
                <div class="img">
                    <a href="proposition_gerant.php"><img class="logo" src="../../img/contact.png" alt="logo"></a>
                    <p class = "sous_titre">Nouveau message</p>
                </div>
                <div class="img">
                    <a href="etat_systeme_gerants.php"><img class="logo" src="../../img/systeme.png" alt="logo"></a>
                    <p class = "sous_titre">Tableau de bord</p>
                </div>
                <div class="img">
                    <a href="../../deconnexion.php"><img class="logo" src="../../img/deconnexion.png" alt="logo"></a>
                    <p class = "sous_titre">Deconnexion</p>
                </div>
            </div>
            
            <div class="droite" >
                <div class="profil">
                    <div class="left">
                        <?php  
                            $valeurs = AfficherAdministrateur($_SESSION['id']);
            
                                if(count($valeurs)==1){
                                    foreach($valeurs as $LaValeur):  
                                        if(file_exists($LaValeur->image_profil)){
                                            $_SESSION['image_profil'] = $LaValeur->image_profil;
                                        }
                                        else{
                                            $_SESSION['image_profil'] = '../../img/profil.png';
                                        }
                        ?>
                             <img class="image" src="<?=  $_SESSION['image_profil'] ?>"  alt="image">
                        <?php 
                                    endforeach; 
                                }
                                else{     
                        ?>
                            <img class="image" src="../../img/profil.png"  alt="image">
                        <?php 
                                }     
                        ?>
                    </div>

                    <div class="right">
                        <p class="parag_secondaire"><?= $_SESSION['nom'] ?></p>
                    </div>
                </div>

                <div class="liste_publications">

                    <div class="principale">

                    <?php 
                        $nombreUtilisateursConnecter = AfficherNombreConnexion();
                        $nombreSpectateurs = count(selectionSpectateurs());
                        $nombreActeurs = count(selectionActeurs());
                        $nombreEtablissements = count(selectionEtablissements());
                        $nombreAdmin = count(selectionAdministrateurs());
                        $nombreSpectacles = count(selectionSpectacles());
                        $nombreSpectaclesEnAttente = count(selectionSpectacleAttente());
                        $nombreBillets = count(selectionBillets());  
                    ?>
                        <div class="dashboard">
                            <h3> Acteurs enregistrés : <?= $nombreActeurs ?></h3>

                            <h3> Spectacles   organisés : <?= $nombreSpectacles ?></h3>

                            <h3> Spectacles en attente de validation : <?= $nombreSpectaclesEnAttente ?></h3>

                            <h3> Billets   vendus : <?= $nombreBillets ?></h3>
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <?php 
            include("copyright.php");
        ?>      
    
        <script src="../js/index.js"></script>
    </body>
</html>