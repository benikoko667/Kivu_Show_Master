<?php 
    session_start();
    include_once("../classes/Classes.php");

    if(isset($_POST['bt_details'])){
        $_SESSION['id_publication_afficher_details'] = $_POST['identifiant'];

        header('Location:http://localhost/KIVU_SHOW/index2.php');
        exit;
    }
    else
    if(isset($_POST['bt_reservation'])){

        if($_SESSION['publique'] == true){
            $_SESSION['id_publication_afficher_details'] = $_POST['identifiant'];
            header('Location:http://localhost/KIVU_SHOW/index3.php');
            exit;
        }
        else{
            header('Location:http://localhost/KIVU_SHOW/inscription_spectateur.php');
            exit;
        }
    
    }  
?>