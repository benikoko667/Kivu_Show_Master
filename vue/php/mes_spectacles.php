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
                    <p class = "sous_titre">Spectacles</p>
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
                    <a href="../../deconnexion.php"><img class="logo" src="../../img/deconnexion.png" alt="logo"></a>
                    <p class = "sous_titre">Deconnexion</p>
                </div>
            </div>

            <div class="droite" >
                
                <div class="profil">
                    <div class="left">

                        <?php  
                            $valeurs = AfficherGerant($_SESSION['id']);
                            $etablissement = null;
            
                                if(count($valeurs)==1){
                                    foreach($valeurs as $LaValeur):  

                                        $etablissement = recupererMaison($LaValeur->id_etablissement);
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
                        <p class="parag_secondaire"><?= $_SESSION['nom'] ?>  ------------------------------ <?= $etablissement->nom; ?></p>
                    </div>
                </div>

                <div class="nouveau">
                    <a class = "btn_nouveau" href="nouveau_spectacle.php"> Ajouter un nouveau spectacle </a>
                </div>

                <div class="liste_publications">

                    <div class="principale">
                    
                    <?php 
                        if(isset($_POST['bt_recherche'])){

                            $type = $_POST['type_recherche'];
                            $mc = $_POST['mot_recherche'];
                                
                            $spectacles = AfficherMesSpectacleSelonCritaire($type, $mc, $etablissement->id);
                        }
                        else{
                            $spectacles = toutAfficherMesSpectacles($etablissement->id);            
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
                                    <input class="btn_publication" type="submit" name="bt_billets_vendu" value="<?= $Lespectacles->billet_vendu; ?> billets vendus"> 
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