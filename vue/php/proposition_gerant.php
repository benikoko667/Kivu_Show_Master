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

                
                <div class="liste_publications">

                    <div class="principale">
                        <h3>Adresser un nouveau message</h3>
                        <p class="parg">Pour vous assurez de la rentabilité optimale de votre activité, 
                            vous pouvez contacter des acteurs, d'autres gerants ou l'administration du 
                            systeme à fin de bouster les participations à votre spectacle.</p>

                        <div class="conteneur_formulair">
                            <form action="" method="POST">
                                <div class="identite_client">
                                    <input class="champ" type="text" name="nom" placeholder="Nom">
                                    <input class="champ" type="email" name="email" placeholder="Adress email">
                                    <input class="champ" type="text" name="numero" placeholder="Numero de telephone">
                                </div>
                                <div class="inputboite">
                                    <select name="destinataire" id="destinataire">
                                        <option value="gerant">Gerant de spectacle</option>
                                        <option value="admin">Administrateur systeme</option>
                                        <option value="acteur">Acteur</option>
                                    </select>
                                </div>
                                <div class="inputboite">
                                    <select name="etablissement" id="etablissement">
                                        <?php 
                                            $maison = toutAfficherEtablissement();
                                            foreach($maison as $etablissement): 
                                        ?> 
                                            <option value="<?=  $etablissement->id ?>"><?=  $etablissement->nom ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="inputboite">
                                    <select name="administrateur" id="administrateur">
                                        <?php 
                                            $maison = toutAfficherAdministrateur();
                                            foreach($maison as $etablissement): 
                                        ?> 
                                            <option value="<?=  $etablissement->id ?>"><?=  $etablissement->nom ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="inputboite">
                                    <select name="acteur" id="acteur">
                                        <?php 
                                            $maison = toutAfficherActeur();
                                            foreach($maison as $etablissement): 
                                        ?> 
                                            <option value="<?=  $etablissement->id ?>"><?=  $etablissement->nom ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="inputboite">
								    <textarea class="champ_message" type="text" name="message" placeholder="Tapez votre message ici..." rows="16"></textarea>
							    </div>

                                <div class="pieds">
                                    <div class="inputboite">
                                        <label class="checkbox"><input type="checkbox" name="check" value="autoriser"> S'abonner à notre newsletter</label>
                                    </div>
                                    <div class="inputboite">
                                        <input type="submit" name="bt_suivant" value="Envoyer le message">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <?php 
            if(isset($_POST['bt_suivant'])){

                if($_POST['nom'] != null && $_POST['email'] != null && $_POST['numero'] != null){
                    $nom = $_POST['nom'];
                    $email = $_POST['email'];
                    $numero = $_POST['numero'];

                    $destinataire = $_POST['destinataire'];

                    if($destinataire == "gerant"){
                        $etablissement = $_POST['etablissement'];
                    }
                    else
                    if($destinataire == "admin"){
                        $etablissement = $_POST['administrateur'];
                    }
                    else
                    if($destinataire == "acteur"){
                        $etablissement = $_POST['acteur'];
                    }

                    $message_visiteur = $_POST['message'];
                    $autorisation = "autoriser";
                    $type_utilisateur = "gerant";
                
                    enregistrementProposition($nom, $email, $numero, $destinataire, $etablissement, $message_visiteur, $autorisation, $type_utilisateur);
                }
    
            }
        ?>

        <?php 
            include("copyright.php");
        ?>      
    
        <script src="../js/index.js"></script>
    </body>
</html>