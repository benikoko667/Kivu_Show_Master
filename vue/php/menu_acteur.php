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
                    <a href="menu_acteur.php"><img class="logo" src="../../img/home.png" alt="logo"></a>
                    <p class = "sous_titre">Actualités des spectacles</p>
                </div>
                <div class="img">
                    <a href="billets_acteur.php"><img class="logo" src="../../img/mes_billets.png" alt="logo"></a>
                    <p class = "sous_titre">Mes billets</p>
                </div>
                <div class="img">
                    <a href="propositions_reponses_acteur_reussies.php"><img class="logo" src="../../img/mes_propositions.png" alt="logo"></a>
                    <p class = "sous_titre">Messages reussies</p>
                </div>
                <div class="img">
                    <a href="proposition_acteur.php"><img class="logo" src="../../img/contact.png" alt="logo"></a>
                    <p class = "sous_titre">Faire une proposition</p>
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
                            $valeurs = AfficherActeur($_SESSION['id']);
            
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

                    <?php 
                        if(isset($_POST['bt_recherche'])){

                            $type = $_POST['type_recherche'];
                            $mc = $_POST['mot_recherche'];
                                
                            $spectacles = AfficherSpectacleSelonCritaire($type, $mc);
                        }
                        else{
                            $spectacles = toutAfficherSpectacles();            
                        }

                        $tour = 0;

                        $ligne1 = array();
                        $ligne2 = array();
                        $ligne3 = array();

                        foreach($spectacles as $Lespectacles): 
                            
                            if($tour % 3 == 0){
                                $ligne1[$tour] = $Lespectacles;
                            }
                            else
                            if($tour % 3 == 1){
                                $ligne2[$tour-1] = $Lespectacles;
                            }
                            else
                            if($tour % 3 == 2){
                                $ligne3[$tour-2] = $Lespectacles;
                            }

                            $tour++;
                            
                        endforeach;
                    ?>

                    <div class="vertical">
                        <?php 
                            foreach($ligne1 as $Laligne1): 
                        ?> 
                        <div class="publication">
                            <div class="source">
                                <div class="image">
                                    <img class="logo_spectacle" src="../.<?= $Laligne1->image; ?>" alt="logo">
                                    <div class="message">
                                        <h3><?= $Laligne1->nom; ?></h3>
                                        <p><?= $Laligne1->date; ?></p>
                                    </div>
                                    <div class="operation">
                                        <form name="action sur publication" method="post" action="../../controler/actions/action_spectacle.php">
                                            <input type="hidden" name="identifiant" value="<?= $Laligne1->id; ?>" />
                                            <input class="btn_publication" type="submit" name="bt_details" value="Details"/> 
                                            <input class="btn_publication" type="submit" name="bt_reservation" value="Reserver"/> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php 
                            endforeach;
                        ?> 
                    </div>

                    <div class="vertical">
                        <?php 
                            foreach($ligne2 as $Laligne2): 
                        ?> 
                        <div class="publication">
                            <div class="source">
                                <div class="image">
                                    <img class="logo_spectacle" src="../.<?= $Laligne2->image; ?>" alt="logo">
                                    <div class="message">
                                        <h3><?= $Laligne2->nom; ?></h3>
                                        <p><?= $Laligne2->date; ?></p>
                                    </div>
                                    <div class="operation">
                                        <form name="action sur publication" method="post" action="../../controler/actions/action_spectacle.php">
                                            <input type="hidden" name="identifiant" value="<?= $Laligne2->id; ?>" />
                                            <input class="btn_publication" type="submit" name="bt_details" value="Details"/> 
                                            <input class="btn_publication" type="submit" name="bt_reservation" value="Reserver"/> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php 
                            endforeach;
                        ?> 
                    </div>

                    <div class="vertical">
                        <?php 
                            foreach($ligne3 as $Laligne3): 
                        ?> 
                        <div class="publication">
                            <div class="source">
                                <div class="image">
                                    <img class="logo_spectacle" src="../.<?= $Laligne3->image; ?>" alt="logo">
                                    <div class="message">
                                        <h3><?= $Laligne3->nom; ?></h3>
                                        <p><?= $Laligne3->date; ?></p>
                                    </div>
                                    <div class="operation">
                                        <form name="action sur publication" method="post" action="../../controler/actions/action_spectacle.php">
                                            <input type="hidden" name="identifiant" value="<?= $Laligne3->id; ?>" />
                                            <input class="btn_publication" type="submit" name="bt_details" value="Details"/> 
                                            <input class="btn_publication" type="submit" name="bt_reservation" value="Reserver"/> 
                                        </form>
                                    </div>
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