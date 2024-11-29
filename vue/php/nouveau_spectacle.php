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
                </div>
                <div class="img">
                    <a href="mes_spectacles.php"><img class="logo" src="../../img/mon_spectacle.png" alt="logo"></a>
                </div>
                <div class="img">
                    <a href="proposition_reussies_gerant.php"><img class="logo" src="../../img/mes_propositions.png" alt="logo"></a>
                </div>
                <div class="img">
                    <a href="billets_vendus.php"><img class="logo" src="../../img/mes_billets.png" alt="logo"></a>
                </div>
                <div class="img">
                    <a href="billets_attente_validation.php"><img class="logo" src="../../img/billets_attente.png" alt="logo"></a>
                </div>
                <div class="img">
                    <a href="proposition_gerant.php"><img class="logo" src="../../img/contact.png" alt="logo"></a>
                </div>
                <div class="img">
                    <a href="#"><img class="logo" src="../../img/verification.png" alt="logo"></a>
                </div>
                <div class="img">
                    <a href="../../deconnexion.php"><img class="logo" src="../../img/deconnexion.png" alt="logo"></a>
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

                <div class="liste_publications1">

                    <div class="principale">

                        <div class="contenu_second">
                            <h3>Nouveau spectacle</h3>
                            <form action="../../controler/actions/action_nouveau_spectacle.php" method="POST" enctype = "multipart/form-data">

                                <div class="inputboite">
                                    <input type="text" name="nom_spectacle" placeholder="Titre du spectacle">
                                </div>

                                <div class="element1">
                                    <p class="label">Affiche principale du spectacle</p>
                                    <p><input class="fichier" type="file" name="affiche"></p>  
                                </div>

                                <div class="inputboite">
								    <textarea class="champ_message" type="text" name="description" placeholder="  Description du spectacle..." rows="10"></textarea>
							    </div>

                                <div class="inputboite">
                                    <input type="text" name="personnage_principale" placeholder="Acteur clé">
                                </div>

                                <div class="inputboite">
                                    <input type="text" name="autres_personnages" placeholder="Autres acteurs">
                                </div>

                                <div class="inputboite">
                                    <input type="text" name="salle" placeholder="Salle de prestation">
                                </div>

                                <div class="element1">
                                    <p class="label">Date du spectacle</p>
                                    <input type="date" name="date_lancement" placeholder="Date lancement">  
                                </div>

                                <div class="element1">
                                    <p class="label">Heure de lancement du spectacle</p>
                                    <input type="time" name="heure_debut" placeholder="Heure lancement">  
                                </div>

                                <div class="element1">
                                    <p class="label">Heure de cloture du spectacle</p>
                                    <input type="time" name="heure_fin" placeholder="Heure cloture">  
                                </div>

                                <div class="inputboite">
                                    <select name="type_spectacle" id="type_spectacle">
                                        <option value="cinema">Cinema</option>
                                        <option value="theatre">Thèatre</option>
                                        <option value="concert">Concert de Musique</option>
                                        <option value="elocance">Elocance</option>
                                        <option value="footBall">Match de FootBall</option>
                                        <option value="basketBall">Match de BasketBall</option>
                                        <option value="autres">Autres categories</option>
                                    </select>
                                </div>

                                <div class="inputboite">
                                    <input type="text" name="payement" placeholder="Moyen de payement">
                                </div>

                                <div class="inputboite">
                                    <input type="number" name="prix_vip" placeholder="Prix Billet V.I.P">
                                </div>

                                <div class="inputboite">
                                    <input type="number" name="prix_standard" placeholder="Prix Billet Standard">
                                </div>

                                <div class="inputboite">
                                    <div class="envoie">
                                        <input type="submit" name="bt_enregistrer_spectacle" value="Enregistrer"/>
                                    </div>
                                </div>
                            </form>
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