<?php 
    session_start();
    include_once("../classes/Classes.php");
    require("../../model/config/commandes.php");

    if(isset($_POST['bt_acces_systeme'])){

        $id_utilisateur = $_POST['identifiant'];
        $type_utilisateur = $_POST['type_utilisateur'];

        if($type_utilisateur == "acteur"){

            bloquerAcces($id_utilisateur, $type_utilisateur);

            header('Location:http://localhost/KIVU_SHOW/vue/php/liste_acteurs.php');
            exit;
        }
        else
        if($type_utilisateur == "spectateur"){
            
            bloquerAcces($id_utilisateur, $type_utilisateur);

            header('Location:http://localhost/KIVU_SHOW/vue/php/liste_clients.php');
            exit;
        }
        else
        if($type_utilisateur == "gerant"){
            
            bloquerAcces($id_utilisateur, $type_utilisateur);

            header('Location:http://localhost/KIVU_SHOW/vue/php/liste_gerant.php');
            exit;
        }

    }
 
?>