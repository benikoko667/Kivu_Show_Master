<?php 
    session_start();
    include_once("../classes/Classes.php");
    require("../../model/config/commandes.php");

    if(isset($_POST['bt_suivant'])){

        if(isset($_POST['nom']) && isset($_POST['spectacle'])){
            $nomEtablissement = $_POST['nom'];
            $typeSpectacle = $_POST['spectacle'];

            if($nomEtablissement != null && $typeSpectacle != null){

                $etablissement = new MaisonOrganisationSpectacle($nomEtablissement, $typeSpectacle, $_SESSION['id']);
                EnregistrementNouveauEtablissement($etablissement);

                $valeurs = selectionEtablissementSelonCritaire($nomEtablissement);
                if(count($valeurs)==1){
                    foreach($valeurs as $LaValeur):

                        upDateGerant($_SESSION['id'], $LaValeur->id);

                        if(verificationUtilisateurConnecte($_SESSION['id'], "gerant") == false){
                            $nombre_connexion = AfficherNombreConnexion();
                            $nombre_connexion = $nombre_connexion + 1;
                            ModifierNombreConnexion($nombre_connexion);   
                        
                            $date = date('Y-m-d h:i:s');
                            $terminal = $_SERVER['REMOTE_ADDR'];

                            AjouterConnectionUtilisateur($_SESSION['id'], "gerant", $date, $terminal);
                        }

                        header('Location:http://localhost/KIVU_SHOW/vue/php/menu_gerant.php');
                        exit;
                        
                    endforeach;
                } 
                else{
                    $date = date("Y-m-d");
                    $terminal = $_SERVER['REMOTE_ADDR'];
                    enregistrementErreur($_SESSION['login'], $_SESSION['password'], $date, $terminal);

                    header('Location:http://localhost/KIVU_SHOW/erreur_authentification.php');
                    exit;
                }
                
            }

        }

    }

?>