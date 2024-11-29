<?php 
    session_start();
    require("./model/config/commandes.php");
    
    $_SESSION['id'] = 0;
    $_SESSION['login'] = null;
    $_SESSION['password'] = null;
    $_SESSION['image_profil'] = null;
    $_SESSION['nom'] = null;

// autres variables de sessions en dehors des parametres utilisateur

    $_SESSION['id_publication_afficher_details'] = 0;
    $_SESSION['publique'] = false;
    $_SESSION['utilisateur'] = null;
    
    $_SESSION['systeme'] = "KIVU SHOW";
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