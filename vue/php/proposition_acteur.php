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

                    <div class="principale">
                        <h3>Nous proposer un spectacle</h3>
                        <p class="parg">Si vous êtes un artiste, faites une proposition de spectacle en esperez etre invité par   
                            les organisateurs des spectacles de la region. <br> Pour envoyer votre proposition à un organisateur des psectacles, veillez 
                            remplire les champs du present formulaire. 
                            <br> Nous promettons de vous repondre dès que possible et de tenir compte de votre proposition lors de
                            l'organisation des prochains spectacles.</p>

                        <div class="conteneur_formulair">
                            <form action="" method="POST">
                                <div class="identite_client">
                                    <input class="champ" type="text" name="nom" placeholder="Nom acteur">
                                    <input class="champ" type="email" name="email" placeholder="Adress email">
                                    <input class="champ" type="text" name="numero" placeholder="Numero de telephone">
                                </div>
                                <div class="inputboite">
                                    <select name="destinataire" id="destinataire">
                                        <option value="gerant">Gerant de spectacle</option>
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
                    $etablissement = $_POST['etablissement'];

                    $message_visiteur = $_POST['message'];
                    $autorisation = "autoriser";
                    $type_utilisateur = "acteur";
                
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