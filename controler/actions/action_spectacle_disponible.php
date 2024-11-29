<?php 
    session_start();
    include_once("../classes/Classes.php");
    require("../../model/config/commandes.php");

    if(isset($_POST['bt_details'])){
        $_SESSION['id_publication_afficher_details'] = $_POST['identifiant'];
        
        header('Location:http://localhost/KIVU_SHOW/index2.php');
        exit;
    }
    else
    if(isset($_POST['bt_billets_vendu'])){
        $_SESSION['id_publication_afficher_details'] = $_POST['identifiant'];
        
        header('Location:http://localhost/KIVU_SHOW/vue/php/billets_vendus.php');
        exit;
    }
    else
    if(isset($_POST['bt_validation_spectacle'])){
        $id_spectacle = $_POST['identifiant'];
        $validationAdmin = true;
        
        modifierEspectacle($id_spectacle, $validationAdmin);

        header('Location:http://localhost/KIVU_SHOW/vue/php/liste_spectacles_realiser.php');
        exit;
    }


?>