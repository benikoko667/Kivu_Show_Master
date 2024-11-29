<?php 
    session_start();
    include_once("../classes/Classes.php");
    require("../../model/config/commandes.php");

    if(isset($_POST['bt_enregistrer_spectacle'])){

        $nomSpectacle = $_POST['nom_spectacle'];

        $image_principale = $_FILES['affiche']['tmp_name'];
        $photo_image_principale = basename($_FILES['affiche']['name']);
        $photo_image_principale_extension = strrchr($photo_image_principale, ".");
        $cheminImagePrincipale = null;

        $_extensions_autoriser = array('.PNG', '.png', '.jpg', '.JPG', '.jpeg', '.JPEG');
        if(in_array($photo_image_principale_extension , $_extensions_autoriser)){
            if($_FILES['affiche']['error'] == 0){
                move_uploaded_file($_FILES['affiche']['tmp_name'], '../../img/'.basename(basename($_FILES['affiche']['name'])));
                $cheminImagePrincipale = './img/'.basename(basename($_FILES['affiche']['name']));
            }
        }
        else{
            $cheminImagePrincipale = './img/spectacle.png';
        }

        $description = $_POST['description'];
        $acteur_principale = $_POST['personnage_principale'];
        $autres_acteurs = $_POST['autres_personnages'];
        $salle = $_POST['salle'];
        $dateSpectacle = $_POST['date_lancement'];
        $heure_debut = $_POST['heure_debut'];
        $heure_fin = $_POST['heure_fin'];
        $type_spectacle = $_POST['type_spectacle'];
        $etat_terminer = false;
        $moyen_payement = $_POST['payement'];
        $billet_vendu = 0;
        $id_etablissement = 0;

        $prix_billet_vip = $_POST['prix_vip'];
        $prix_billet_standard = $_POST['prix_standard'];

        $gerant = AfficherGerant($_SESSION['id']);
        if(count($gerant)==1){
            foreach($gerant as $Legerant):
                $id_etablissement = $Legerant->id_etablissement;
            endforeach;
        }
        $validation_admin = false;

        if($nomSpectacle != null && $description != null && $salle != null && $dateSpectacle != null && 
        $heure_debut != null && $heure_fin != null && $moyen_payement != null){

            enregistrementNouveauSpectacle($nomSpectacle, $cheminImagePrincipale, $description, $acteur_principale, $autres_acteurs, $salle, 
            $dateSpectacle, $heure_debut, $heure_fin, $type_spectacle, $etat_terminer, $moyen_payement, $billet_vendu, $id_etablissement, 
            $validation_admin, $prix_billet_vip, $prix_billet_standard);

            header('Location:http://localhost/KIVU_SHOW/vue/php/mes_spectacles.php');
            exit;
        }
        else{
            echo "Les informations d'enregistrement du spectacle sont incompletes!";
        }

    }

?>