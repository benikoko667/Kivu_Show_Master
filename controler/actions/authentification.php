<?php 
    session_start();
    include_once("../classes/Classes.php");
    require("../../model/config/commandes.php");

    if(isset($_POST['bt_suivant'])){

        if(isset($_POST['email']) && isset($_POST['password'])){

            $mail = $_POST['email'];
            $password = $_POST['password'];

            if($_POST['utilisateur'] == "spectateur"){

                $valeurs = AuthentificationClient($mail, $password);

                if(count($valeurs)==1){
                    foreach($valeurs as $LaValeur):

                        if($LaValeur->bloquer == false){
                            $_SESSION['id'] = $LaValeur->id;
                            $_SESSION['login'] = $LaValeur->email;
                            $_SESSION['password'] = $LaValeur->password;
                            $_SESSION['image_profil'] = $LaValeur->image_profil;
                            $_SESSION['nom']  = $LaValeur->nom;

                            $_SESSION['publique'] = true;
                            $_SESSION['utilisateur'] = $_POST['utilisateur'];

                            if(verificationUtilisateurConnecte($LaValeur->id, $_POST['utilisateur']) == false){
                                $nombre_connexion = AfficherNombreConnexion();
                                $nombre_connexion = $nombre_connexion + 1;
                                ModifierNombreConnexion($nombre_connexion);   
                            
                                $date = date('Y-m-d h:i:s');
                                $terminal = $_SERVER['REMOTE_ADDR'];

                                AjouterConnectionUtilisateur($LaValeur->id, $_POST['utilisateur'], $date, $terminal);
                            }

                            header('Location:http://localhost/KIVU_SHOW/vue/php/menu_spectateur.php');
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
                    enregistrementErreur($mail, $password, $date, $terminal);

                    header('Location:http://localhost/KIVU_SHOW/erreur_authentification.php');
                    exit;
                }
            }
            else
            if($_POST['utilisateur'] == "acteur"){

                $valeurs = AuthentificationActeur($mail, $password);
                
                if(count($valeurs)==1){
                    foreach($valeurs as $LaValeur):

                        if($LaValeur->bloquer == false){
                            $_SESSION['id'] = $LaValeur->id;
                            $_SESSION['login'] = $LaValeur->email;
                            $_SESSION['password'] = $LaValeur->password;
                            $_SESSION['image_profil'] = $LaValeur->image_profil;
                            $_SESSION['nom']  = $LaValeur->nom;

                            $_SESSION['publique'] = true;
                            $_SESSION['utilisateur'] = $_POST['utilisateur'];

                            if(verificationUtilisateurConnecte($LaValeur->id, $_POST['utilisateur']) == false){
                                $nombre_connexion = AfficherNombreConnexion();
                                $nombre_connexion = $nombre_connexion + 1;
                                ModifierNombreConnexion($nombre_connexion);   
                            
                                $date = date('Y-m-d h:i:s');
                                $terminal = $_SERVER['REMOTE_ADDR'];

                                AjouterConnectionUtilisateur($LaValeur->id, $_POST['utilisateur'], $date, $terminal);
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
                    enregistrementErreur($mail, $password, $date, $terminal);

                    header('Location:http://localhost/KIVU_SHOW/erreur_authentification.php');
                    exit;
                }
            }
            else
            if($_POST['utilisateur'] == "gerant"){

                $valeurs = AuthentificationGerant($mail, $password);
                
                if(count($valeurs)==1){
                    foreach($valeurs as $LaValeur):

                        if($LaValeur->bloquer == false){
                            $_SESSION['id'] = $LaValeur->id;
                            $_SESSION['login'] = $LaValeur->email;
                            $_SESSION['password'] = $LaValeur->password;
                            $_SESSION['image_profil'] = $LaValeur->image_profil;
                            $_SESSION['nom']  = $LaValeur->nom;

                            $_SESSION['publique'] = true;
                            $_SESSION['utilisateur'] = $_POST['utilisateur'];

                            if(verificationUtilisateurConnecte($LaValeur->id, $_POST['utilisateur']) == false){
                                $nombre_connexion = AfficherNombreConnexion();
                                $nombre_connexion = $nombre_connexion + 1;
                                ModifierNombreConnexion($nombre_connexion);   
                            
                                $date = date('Y-m-d h:i:s');
                                $terminal = $_SERVER['REMOTE_ADDR'];

                                AjouterConnectionUtilisateur($LaValeur->id, $_POST['utilisateur'], $date, $terminal);
                            }

                            header('Location:http://localhost/KIVU_SHOW/vue/php/menu_gerant.php');
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
                    enregistrementErreur($mail, $password, $date, $terminal);

                    header('Location:http://localhost/KIVU_SHOW/erreur_authentification.php');
                    exit;
                }
            }
            else
            if($_POST['utilisateur'] == "admin"){

                $valeurs = AuthentificationAdmin($mail, $password);
                
                if(count($valeurs)==1){
                    foreach($valeurs as $LaValeur):

                        if($LaValeur->bloquer == false){
                            $_SESSION['id'] = $LaValeur->id;
                            $_SESSION['login'] = $LaValeur->email;
                            $_SESSION['password'] = $LaValeur->password;
                            $_SESSION['image_profil'] = $LaValeur->image_profil;
                            $_SESSION['nom']  = $LaValeur->nom;

                            $_SESSION['publique'] = true;
                            $_SESSION['utilisateur'] = $_POST['utilisateur'];

                            if(verificationUtilisateurConnecte($LaValeur->id, $_POST['utilisateur']) == false){
                                $nombre_connexion = AfficherNombreConnexion();
                                $nombre_connexion = $nombre_connexion + 1;
                                ModifierNombreConnexion($nombre_connexion);   
                            
                                $date = date('Y-m-d h:i:s');
                                $terminal = $_SERVER['REMOTE_ADDR'];

                                AjouterConnectionUtilisateur($LaValeur->id, $_POST['utilisateur'], $date, $terminal);
                            }

                            header('Location:http://localhost/KIVU_SHOW/vue/php/menu_administrateur.php');
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
                    enregistrementErreur($mail, $password, $date, $terminal);

                    header('Location:http://localhost/KIVU_SHOW/erreur_authentification.php');
                    exit;
                }
                
            }

        }

    }
    
?>