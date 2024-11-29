<?php 
    session_start();
    include_once("../classes/Classes.php");
    require("../../model/config/commandes.php");

    if(isset($_POST['bt_suivant'])){

        if(isset($_POST['nom']) && isset($_POST['spectacle']) && isset($_POST['email']) && isset($_POST['password'])){
            
            $nom = $_POST['nom'];
            $typeSpectacle = $_POST['spectacle'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            if($nom != null && $typeSpectacle != null && $email != null && $password != null){
                $acteur = new Acteur($nom, $typeSpectacle, $email, $password);
                EnregistrementNouvelActeur($acteur);

                $valeurs = AuthentificationActeur($email, $password);
                
                if(count($valeurs)==1){
                    foreach($valeurs as $LaValeur):

                        if($LaValeur->bloquer == false){
                            $_SESSION['id'] = $LaValeur->id;
                            $_SESSION['login'] = $LaValeur->email;
                            $_SESSION['password'] = $LaValeur->password;
                            $_SESSION['image_profil'] = $LaValeur->image_profil;
                            $_SESSION['nom']  = $LaValeur->nom;

                            $_SESSION['publique'] = true;
                            $_SESSION['utilisateur'] =  "acteur";

                            if(verificationUtilisateurConnecte($LaValeur->id, "acteur") == false){
                                $nombre_connexion = AfficherNombreConnexion();
                                $nombre_connexion = $nombre_connexion + 1;
                                ModifierNombreConnexion($nombre_connexion);   
                            
                                $date = date('Y-m-d h:i:s');
                                $terminal = $_SERVER['REMOTE_ADDR'];

                                AjouterConnectionUtilisateur($LaValeur->id, "acteur", $date, $terminal);
                            }

                            header('Location:http://localhost/KIVU_SHOW/vue/php/menu_acteur.php');
                            exit;
                        }
                        else{
                            echo "Votre compte est bloquer!";
                        }

                    endforeach;
                }
                else{
                    $date = date("Y-m-d");
                    $terminal = $_SERVER['REMOTE_ADDR'];
                    enregistrementErreur($email, $password, $date, $terminal);

                    header('Location:http://localhost/KIVU_SHOW/erreur_authentification.php');
                    exit;
                }

            }

        }

    }

?>