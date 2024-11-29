<?php 
    session_start();
    include_once("../classes/Classes.php");
    require("../../model/config/commandes.php");

    if(isset($_POST['bt_presentation'])){
        $_SESSION['id_publication_afficher_details'] = $_POST['identifiant'];

        $billet = afficherBillet($_POST['identifiant']);

        if($billet->validation_gerant == true){
            header('Location:http://localhost/KIVU_SHOW/vue/php/billets_spectateur2.php');
            exit;
        }
        else{
            header('Location:http://localhost/KIVU_SHOW/vue/php/billets_spectateur.php');
            exit;
        }
        
    }
    else
    if(isset($_POST['bt_valider_billet'])){
        $id_billet = $_POST['identifiant'];
        $validation_agent = true;
        $date_validation = date('Y-m-d h:i:s');

        modifierBillet($id_billet, $validation_agent, $date_validation);

        header('Location:http://localhost/KIVU_SHOW/vue/php/billets_vendus.php');
        exit;
    }


    
?>