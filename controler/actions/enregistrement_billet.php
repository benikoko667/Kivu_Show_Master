<?php 
    session_start();
    include_once("../classes/Classes.php");
    require("../../model/config/commandes.php");

    if(isset($_POST['bt_suivant'])){

        if(isset($_POST['type_billet']) && isset($_POST['transaction'])){
            $typeBillet = $_POST['type_billet'];
            $idTransaction = $_POST['transaction'];

            $noveauBillet = new Billet();

            $date = date('Y-m-d h:i:s');
            
            $noveauBillet->setProprietaireBillet($_SESSION['id']);
            $noveauBillet->setSpectacle($_SESSION['id_publication_afficher_details']);
            $noveauBillet->setTypeBillet($typeBillet);
            $noveauBillet->setHeureDateObtention($date);
            $noveauBillet->setValidationGerant(false);
            $noveauBillet->setIdReseauPaillement($idTransaction);
            
            enregistrementNouveauBillet($noveauBillet,  $_SESSION['utilisateur']);
        }


        if($_SESSION['publique']== false){
            header('Location:http://localhost/KIVU_SHOW/index.php');
            exit;
        }
        else
        if($_SESSION['publique']== true && $_SESSION['utilisateur'] == "spectateur"){
            header('Location:http://localhost/KIVU_SHOW/vue/php/menu_spectateur.php');
            exit;
        }
        else
        if($_SESSION['publique']== true && $_SESSION['utilisateur'] == "acteur"){
            header('Location:http://localhost/KIVU_SHOW/vue/php/menu_acteur.php');
            exit;
        }
        else
        if($_SESSION['publique']== true && $_SESSION['utilisateur'] == "gerant"){
            header('Location:http://localhost/KIVU_SHOW/vue/php/menu_gerant.php');
            exit;
        }
        else
        if($_SESSION['publique']== true && $_SESSION['utilisateur'] == "admin"){
            header('Location:http://localhost/KIVU_SHOW/vue/php/menu_administrateur.php');
            exit;
        }
    
    }

?>