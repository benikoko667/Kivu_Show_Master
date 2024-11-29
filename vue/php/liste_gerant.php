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
                    <a href="liste_gerant.php"><img class="logo" src="../../img/gerant.png" alt="logo"></a>
                    <p class = "sous_titre">Gerants etablissements</p>
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

                    <?php 
                        if(isset($_POST['bt_recherche'])){

                            $type = $_POST['type_recherche'];
                            $mc = $_POST['mot_recherche'];
                                
                            $spectacles = AfficherselectionGerantsCritaire($nom);
                        }
                        else{
                            $spectacles = selectionGerants();            
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
                                $acces = null;
                                if($Laligne1->bloquer == true){
                                    $acces = "Debloquer";
                                }
                                else{
                                    $acces = "Bloquer l'accés";
                                }

                                $etablissement = recupererMaison($Laligne1->id_etablissement);
                        ?> 
                        <div class="publication">
                            <div class="source">
                                <div class="image">
                                    <img class="logo_utilisateur" src="<?= $Laligne1->image_profil; ?>" alt="logo">
                                    <div class="message">
                                        <h3><?= $Laligne1->nom; ?></h3>
                                        <p><?= $Laligne1->email; ?></p>
                                        <h3><?= $etablissement->nom; ?></h3>
                                    </div>
                                    <div class="operation">
                                        <form name="action sur publication" method="post" action="../../controler/actions/action_utilisateurs.php">
                                            <input type="hidden" name="identifiant" value="<?= $Laligne1->id; ?>" />
                                            <input type="hidden" name="type_utilisateur" value="gerant" />
                                            <input class="btn_publication" type="submit" name="bt_acces_systeme" value="<?= $acces; ?>"/> 
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
                                $acces = null;
                                if($Laligne2->bloquer == true){
                                    $acces = "Debloquer";
                                }
                                else{
                                    $acces = "Bloquer l'accés";
                                }

                                $etablissement = recupererMaison($Laligne2->id_etablissement);
                        ?> 
                        <div class="publication">
                            <div class="source">
                                <div class="image">
                                    <img class="logo_utilisateur" src="<?= $Laligne2->image_profil; ?>" alt="logo">
                                    <div class="message">
                                        <h3><?= $Laligne2->nom; ?></h3>
                                        <p><?= $Laligne2->email; ?></p>
                                        <h3><?= $etablissement->nom; ?></h3>
                                    </div>
                                    <div class="operation">
                                        <form name="action sur publication" method="post" action="../../controler/actions/action_utilisateurs.php">
                                            <input type="hidden" name="identifiant" value="<?= $Laligne2->id; ?>" />
                                            <input type="hidden" name="type_utilisateur" value="gerant" />
                                            <input class="btn_publication" type="submit" name="bt_acces_systeme" value="<?= $acces; ?>"/> 
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
                                $acces = null;
                                if($Laligne3->bloquer == true){
                                    $acces = "Debloquer";
                                }
                                else{
                                    $acces = "Bloquer l'accés";
                                }

                                $etablissement = recupererMaison($Laligne3->id_etablissement);
                        ?> 
                        <div class="publication">
                            <div class="source">
                                <div class="image">
                                    <img class="logo_utilisateur" src="<?= $Laligne3->image_profil; ?>" alt="logo">
                                    <div class="message">
                                        <h3><?= $Laligne3->nom; ?></h3>
                                        <p><?= $Laligne3->email; ?></p>
                                        <h3><?= $etablissement->nom; ?></h3>
                                    </div>
                                    <div class="operation">
                                        <form name="action sur publication" method="post" action="../../controler/actions/action_utilisateurs.php">
                                            <input type="hidden" name="identifiant" value="<?= $Laligne3->id; ?>" />
                                            <input type="hidden" name="type_utilisateur" value="gerant" />
                                            <input class="btn_publication" type="submit" name="bt_acces_systeme" value="<?= $acces; ?>"/> 
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