<?php 
    session_start();
    include_once("../classes/Classes.php");
    require("../../model/config/commandes.php");

    if(isset($_POST['bt_suivant'])){

        if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['password'])){
            
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if($nom != null && $email != null && $password != null){
                $gerant = new GerantMaisonOrganisationSpectacle($nom, $email, $password, null);
                EnregistrementNouveauGerant($gerant);

                $valeurs = AuthentificationGerant($email, $password);

                if(count($valeurs)==1){
                    foreach($valeurs as $LaValeur):

                        if($LaValeur->bloquer == false){
                            $_SESSION['id'] = $LaValeur->id;
                            $_SESSION['login'] = $LaValeur->email;
                            $_SESSION['password'] = $LaValeur->password;
                            $_SESSION['image_profil'] = $LaValeur->image_profil; 
                            $_SESSION['nom']  = $LaValeur->nom;

                            $_SESSION['publique'] = true;
                            $_SESSION['utilisateur'] = "gerant";

                            header('Location:http://localhost/KIVU_SHOW/inscription_gerant2.php');
                            exit; 
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