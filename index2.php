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
            if($_SESSION['id_publication_afficher_details'] != 0){

                $spectacle = afficherSpectacle($_SESSION['id_publication_afficher_details']);
                if(count($spectacle)==1){
                    foreach($spectacle as $Lespectacle): 

                        $maison =  recupererMaison($Lespectacle->id_etablissement);

        ?>
            <div class="description" id="description">

                <h3 class="etablissement"><?= $maison->nom; ?></h3>
                <h3 class="titre"><?= $Lespectacle->nom; ?></h3>

                <p class="parag_secondaire"><?= $Lespectacle->description; ?></p>
                <p class="parag_secondaire">Vedette : <?= $Lespectacle->acteur_principale; ?></p>
                <p class="parag_secondaire">salle : <?= $Lespectacle->salle; ?></p>
                <p class="parag_secondaire">date : <?= $Lespectacle->date; ?></p>
                <p class="parag_secondaire">Heure debut spectacle : <?= $Lespectacle->heure_debut; ?></p>
                <p class="parag_secondaire">Heure fin spectacle : <?= $Lespectacle->heure_fin; ?></p>
                <p class="parag_secondaire">Prix billet standard : <?= $Lespectacle->prix_billet_standard; ?></p>
                <p class="parag_secondaire">Prix billet V.I.P : <?= $Lespectacle->prix_billet_vip; ?></p>
                <p class="payement"><?= $Lespectacle->moyen_payement; ?></p>
                
                <div>

                    <?php 

                        if($_SESSION['publique']== false){
                    ?>
                        <a href="index.php" class="btn1">Fermer</a>
                    <?php 
                        }
                        else
                        if($_SESSION['publique']== true && $_SESSION['utilisateur'] == "spectateur"){
                    ?>
                        <a href="./vue/php/menu_spectateur.php" class="btn1">Fermer</a>
                    <?php 
                        }
                        else
                        if($_SESSION['publique']== true && $_SESSION['utilisateur'] == "acteur"){
                    ?>
                        <a href="./vue/php/menu_acteur.php" class="btn1">Fermer</a>
                    <?php 
                        }
                        else
                        if($_SESSION['publique']== true && $_SESSION['utilisateur'] == "gerant"){
                    ?>
                        <a href="./vue/php/menu_gerant.php" class="btn1">Fermer</a>
                    <?php 
                        }
                        else
                        if($_SESSION['publique']== true && $_SESSION['utilisateur'] == "admin"){
                    ?>
                        <a href="./vue/php/menu_administrateur.php" class="btn1">Fermer</a>
                    <?php 
                        }
                    ?>
                      
                </div>

            </div>
            
        <?php 
                    endforeach;
                }
            }
        ?>
         
        <?php 
            include("menu.php");
        ?>

        <section class="spectacles" id="spectacles">
        
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
                            <img class="logo_spectacle" src="<?= $Laligne1->image; ?>" alt="logo">
                            <div class="message">
                                <h3><?= $Laligne1->nom; ?></h3>
                                <p><?= $Laligne1->date; ?></p>
                            </div>
                            <div class="operation">
                                <form name="action sur publication" method="post" action="./controler/actions/action_spectacle.php">
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
                            <img class="logo_spectacle" src="<?= $Laligne2->image; ?>" alt="logo">
                            <div class="message">
                                <h3><?= $Laligne2->nom; ?></h3>
                                <p><?= $Laligne2->date; ?></p>
                            </div>
                            <div class="operation">
                                <form name="action sur publication" method="post" action="./controler/actions/action_spectacle.php">
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
                            <img class="logo_spectacle" src="<?= $Laligne3->image; ?>" alt="logo">
                            <div class="message">
                                <h3><?= $Laligne3->nom; ?></h3>
                                <p><?= $Laligne3->date; ?></p>
                            </div>
                            <div class="operation">
                                <form name="action sur publication" method="post" action="./controler/actions/action_spectacle.php">
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

        </section>

        <?php 
            include("copyright.php");
        ?>      
        
        <script src="./vue/js/index.js"></script>
    </body>
</html>