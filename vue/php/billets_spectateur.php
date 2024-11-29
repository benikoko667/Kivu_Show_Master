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
                    <a href="menu_spectateur.php"><img class="logo" src="../../img/home.png" alt="logo"></a>
                    <p class = "sous_titre">Actualités des spectacles</p>
                </div>
                <div class="img">
                    <a href="billets_spectateur.php"><img class="logo" src="../../img/mes_billets.png" alt="logo"></a>
                    <p class = "sous_titre">Mes billets</p>
                </div>
                <div class="img">
                    <a href="proposition_spectateur.php"><img class="logo" src="../../img/contact.png" alt="logo"></a>
                    <p class = "sous_titre">Proposition</p>
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
                            $valeurs = AfficherSpectateur($_SESSION['id']);
            
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
                                
                            $spectacles = AfficherMesBilletsSelonCritaire($type, $mc, $_SESSION['id'], $_SESSION['utilisateur']);
                        }
                        else{
                            $spectacles = toutAfficherMesBillets($_SESSION['id'], $_SESSION['utilisateur']);            
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
                                $client = afficherClientSelonCritaire($Laligne1->id_spectateur);
                                $Spectacle = afficherUnSpectacle($Laligne1->id_spectacle);
                        ?> 
                        <div class="publication">
                            <div class="source">
                                <div class="image">
                                    <div class="message">
                                        <h3>Spectacle : <?= $Spectacle->nom; ?></h3>
                                        <p>Numero billet : <?= $Laligne1->id; ?></p>
                                        <p>Type billet : <?= $Laligne1->type_billet; ?></p>
                                        <p>Date achat : <?= $Laligne1->date_obtention; ?></p>
                                        <p>Validation : 
                                            <?php 
                                                if($Laligne1->validation_gerant == true){
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
                                        <p>Nom client : <?= $client->nom; ?></p>
                                        <p>ID Transaction : <?= $Laligne1->identifiant_transaction; ?></p>
                                    </div>
                                    <div class="operation">
                                        <form name="action sur publication" method="post" action="../../controler/actions/action_billet.php">
                                            <input type="hidden" name="identifiant" value="<?= $Laligne1->id; ?>" />
                                            <input class="btn_publication1" type="submit" name="bt_presentation" value="Presenter"/> 
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
                                $client = afficherClientSelonCritaire($Laligne2->id_spectateur);
                                $Spectacle = afficherUnSpectacle($Laligne2->id_spectacle);
                        ?> 
                        <div class="publication">
                            <div class="source">
                                <div class="image">
                                    <div class="message">
                                        <h3>Spectacle : <?= $Spectacle->nom; ?></h3>
                                        <p>Numero billet : <?= $Laligne2->id; ?></p>
                                        <p>Type billet : <?= $Laligne2->type_billet; ?></p>
                                        <p>Date achat : <?= $Laligne2->date_obtention; ?></p>
                                        <p>Validation : 
                                            <?php 
                                                if($Laligne2->validation_gerant == true){
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
                                        <p>Nom client : <?= $client->nom; ?></p>
                                        <p>ID Transaction : <?= $Laligne2->identifiant_transaction; ?></p>
                                    </div>
                                    <div class="operation">
                                        <form name="action sur publication" method="post" action="../../controler/actions/action_billet.php">
                                            <input type="hidden" name="identifiant" value="<?= $Laligne2->id; ?>" />
                                            <input class="btn_publication1" type="submit" name="bt_presentation" value="Presenter"/> 
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
                                $client = afficherClientSelonCritaire($Laligne3->id_spectateur);
                                $Spectacle = afficherUnSpectacle($Laligne3->id_spectacle);
                        ?> 
                        <div class="publication">
                            <div class="source">
                                <div class="image">
                                    <div class="message">
                                        <h3>Spectacle : <?= $Spectacle->nom; ?></h3>
                                        <p>Numero billet : <?= $Laligne3->id; ?></p>
                                        <p>Type billet : <?= $Laligne3->type_billet; ?></p>
                                        <p>Date achat : <?= $Laligne3->date_obtention; ?></p>
                                        <p>Validation : 
                                            <?php 
                                                if($Laligne3->validation_gerant == true){
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
                                        <p>Nom client : <?= $client->nom; ?></p>
                                        <p>ID Transaction : <?= $Laligne3->identifiant_transaction; ?></p>
                                    </div>
                                    <div class="operation">
                                        <form name="action sur publication" method="post" action="../../controler/actions/action_billet.php">
                                            <input type="hidden" name="identifiant" value="<?= $Laligne3->id; ?>" />
                                            <input class="btn_publication1" type="submit" name="bt_presentation" value="Presenter"/> 
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