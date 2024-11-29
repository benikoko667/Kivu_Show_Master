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
                    <a href="etat_systeme.php"><img class="logo" src="../../img/systeme.png" alt="logo"></a>
                    <p class = "sous_titre">Tableau de bord</p>
                </div>

                <div class="img">
                    <a href="spectacle_attente_validation.php"><img class="logo" src="../../img/attente.png" alt="logo"></a>
                    <p class = "sous_titre">Attentes de validation</p>
                </div>

                <div class="img">
                    <a href="liste_spectacles_realiser.php"><img class="logo" src="../../img/home.png" alt="logo"></a>
                    <p class = "sous_titre">Spectacles realisés</p>
                </div>
                
                
                <div class="img">
                    <a href="liste_clients.php"><img class="logo" src="../../img/profil.png" alt="logo"></a>
                    <p class = "sous_titre">Clients enregistrés</p>
                </div>

                <div class="img">
                    <a href="liste_acteurs.php"><img class="logo" src="../../img/acteur.png" alt="logo"></a>
                    <p class = "sous_titre">Agents enregistrés</p>
                </div>

                <div class="img">
                    <a href="menu_administrateur.php"><img class="logo" src="../../img/erreurs.png" alt="logo"></a>
                    <p class = "sous_titre">Erreurs authentification</p>
                </div>

                <div class="img">
                    <a href="messages_reussis_des_gerants.php"><img class="logo" src="../../img/mes_propositions.png" alt="logo"></a>
                    <p class = "sous_titre">Messages reussis</p>
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
                        if(isset($_POST['bt_recherche'])){

                            $type = $_POST['type_recherche'];
                            $mc = $_POST['mot_recherche'];
                                
                            $spectacles = selectionSpectaclesPrecis($type, $mc);
                        }
                        else{
                            $spectacles = selectionSpectacles();            
                        }

                        foreach($spectacles as $Lespectacles): 
                            
                    ?>

                    <div class="publication">
                        <div class="left">
                            <img class="image" src="../.<?= $Lespectacles->image ?>" alt="logo">
                        </div>
                        <div class="right">
                            <h3><?= $Lespectacles->nom ?></h3>
                            <p><?= $Lespectacles->description ?></p>
                            <p>Salle : <?= $Lespectacles->salle ?></p>
                            
                            <div class="action_publication">
                                <form action="../../controler/actions/action_spectacle_disponible.php" method="post">
                                    <input type="hidden" name="identifiant" value="<?= $Lespectacles->id; ?>" />
                                    <input class="btn_publication" type="submit" name="bt_details" value="Details"> 
                                    <input class="btn_publication" type="submit" name="bt_validation_spectacle" value="Valider"> 
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php 
                        endforeach;
                    ?> 
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