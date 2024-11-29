<?php 
    
    // fonction pour client (spectateur)

    function AuthentificationClient($mail, $password){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM spectateurs WHERE email = '$mail' AND password = '$password'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function AfficherSpectateur($id){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM spectateurs WHERE id = '$id'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function EnregistrementNouveauSpectateur($spectacteur){
        if(require("connexion.php")){

            $nom = $spectacteur->getNom();
            $email = $spectacteur->getEmail(); 
            $password = $spectacteur->getPassword(); 
            $image_profil = "../../img/profil.png";

            $req = $acces->prepare("INSERT INTO spectateurs(nom, email, password, image_profil) VALUES(?, ?, ?, ?)");
            $req->execute(array($nom, $email, $password, $image_profil));
        }   
    }

    function afficherClientSelonCritaire($id){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM spectateurs WHERE id = '$id'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            if(count($data)==1){
                foreach($data as $client):
                    return $client;
                endforeach;
            }
            else{
                return null;
            }
        }
    }

    function afficherUnSpectacle($id_spectacle){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM spectacles WHERE id = '$id_spectacle'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            if(count($data)==1){
                foreach($data as $client):
                    return $client;
                endforeach;
            }
            else{
                return null;
            }
        }
    }

    function modifierEspectacle($id_spectacle, $validationAdmin){
        if(require("connexion.php")){

            $req = $acces->prepare("UPDATE spectacles SET validation_admin = '$validationAdmin' WHERE id = '$id_spectacle'");

            $req->execute();
            return null;
        }
    }

    function toutAfficherSpectacles(){
        if(require("connexion.php")){

            $validationAdmin = true;

            $req = $acces->prepare("SELECT * FROM spectacles WHERE validation_admin = '$validationAdmin' order by id desc");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function enregistrementNouveauSpectacle($nomSpectacle, $cheminImagePrincipale, $description, $acteur_principale, $autres_acteurs, $salle, 
    $dateSpectacle, $heure_debut, $heure_fin, $type_spectacle, $etat_terminer, $moyen_payement, $billet_vendu, $id_etablissement, 
    $validation_admin, $prix_billet_vip, $prix_billet_standard){

        if(require("connexion.php")){

            $req = $acces->prepare("INSERT INTO spectacles(nom, image, description, acteur_principale, autres_acteurs, salle, date, heure_debut, 
                heure_fin, type_spectacle, etat_terminer, moyen_payement, billet_vendu, id_etablissement, validation_admin, prix_billet_vip, prix_billet_standard)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $req->execute(array($nomSpectacle, $cheminImagePrincipale, $description, $acteur_principale, $autres_acteurs, $salle, 
            $dateSpectacle, $heure_debut, $heure_fin, $type_spectacle, $etat_terminer, $moyen_payement, $billet_vendu, $id_etablissement, 
            $validation_admin, $prix_billet_vip, $prix_billet_standard));
        }

    }

    function AfficherSpectacleSelonCritaire($type, $critaire){
        if(require("connexion.php")){

            $validationAdmin = true;

            if($type == "nom"){
                $req = $acces->prepare("SELECT * FROM spectacles WHERE validation_admin = '$validationAdmin' AND nom = '$critaire'");
            }
            else
            if($type == "acteur"){
                $req = $acces->prepare("SELECT * FROM spectacles WHERE  validation_admin = '$validationAdmin' AND acteur_principale = '$critaire'");
            }
            else{
                $req = $acces->prepare("SELECT * FROM spectacles order by id desc");
            }
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function afficherSpectacle($id_spectacle){
        if(require("connexion.php")){

            $req = $acces->prepare("SELECT * FROM spectacles WHERE id = '$id_spectacle'");
        
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function AfficherMesSpectacleSelonCritaire($type, $critaire, $id_etablissement){
        if(require("connexion.php")){

            if($type == "nom"){
                $req = $acces->prepare("SELECT * FROM spectacles WHERE nom = '$critaire' AND id_etablissement = '$id_etablissement'");
            }
            else
            if($type == "acteur"){
                $req = $acces->prepare("SELECT * FROM spectacles WHERE acteur_principale = '$critaire' AND id_etablissement = '$id_etablissement'");
            }
            else{
                $req = $acces->prepare("SELECT * FROM spectacles WHERE id_etablissement = '$id_etablissement' order by id desc");
            }
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }
                        
    function toutAfficherMesSpectacles($id_etablissement){
        if(require("connexion.php")){

            $req = $acces->prepare("SELECT * FROM spectacles WHERE id_etablissement = '$id_etablissement'");
        
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }            

    function afficherSpectacleNomme($critaire){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM spectacles WHERE nom = '$critaire'");
        
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }
            
    function afficherSpectacleActeur($critaire){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM spectacles WHERE acteur_principale = '$critaire'");
        
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function recupererMaison($id){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM etablissement_spectacles WHERE id = '$id'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            if(count($data)==1){
                foreach($data as $etab):
                    return $etab;
                endforeach;
            }
            else{
                return null;
            }
        }
    }

    function recupererAdministrateur($id_util){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM administrateurs WHERE id = '$id_util'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            if(count($data)==1){
                foreach($data as $etab):
                    return $etab;
                endforeach;
            }
            else{
                return null;
            }
        }
    }
                            
    function recupererActeur($id_util){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM acteurs WHERE id = '$id_util'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            if(count($data)==1){
                foreach($data as $etab):
                    return $etab;
                endforeach;
            }
            else{
                return null;
            }
        }
    }
                            
    function enregistrementNouveauBillet($noveauBillet, $type_utilisateur){
        if(require("connexion.php")){

            $id_spectateur = $noveauBillet->getProprietaireBillet();
            $id_spectacle = $noveauBillet->getSpectacle();
            $type_billet = $noveauBillet->getTypeBillet();
            $date_obtention = $noveauBillet->getHeureDateObtention();
            $validation_gerant = $noveauBillet->getValidationGerant();
            $identifiant_transaction = $noveauBillet->getIdReseauPaillement();

            $spectacle = afficherUnSpectacle($id_spectacle);
            $id_etablissement = $spectacle->id_etablissement;

            modifierNombreBilletsSpectacle($spectacle);

            $req = $acces->prepare("INSERT INTO billets(type_billet, date_obtention, validation_gerant, id_spectacle, id_spectateur, type_spectateur, identifiant_transaction, id_etablissement) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
            $req->execute(array($type_billet, $date_obtention, $validation_gerant, $id_spectacle, $id_spectateur, $type_utilisateur, $identifiant_transaction, $id_etablissement));
        }
        
    }

    function AfficherMesBilletsSelonCritaire($type, $critaire, $id_client, $typeClient){
        if(require("connexion.php")){

            $spectacle = null;
            $data = array();

            if($type == "nom"){

                $spectacle = afficherSpectacleNomme($critaire);
            }
            else
            if($type == "acteur"){

                $spectacle = afficherSpectacleActeur($critaire);
            }

            if($spectacle != null){
                foreach($spectacle as $Lespectacle):
                    $req = $acces->prepare("SELECT * FROM billets WHERE id_spectateur = '$id_client' AND id_spectacle = '$Lespectacle->id' AND type_spectateur = '$typeClient'");
               
                    $req->execute();
                    $data1 = $req->fetchAll(PDO::FETCH_OBJ);
                    $data = array_merge($data, $data1);
                endforeach;
            }
            else{
                $req = $acces->prepare("SELECT * FROM billets WHERE id_spectateur = '$id_client'");
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_OBJ);
            }

            return $data;
            $req->closeCursor();
        }
    }

    function AfficherBilletsVendusSelonCritaire($type, $mc, $id_etablissement){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM billets WHERE id_etablissement = '$id_etablissement' order by id desc");
        
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function toutAfficherBilletsSpectacle($id_spectacle){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM billets WHERE id_spectacle = '$id_spectacle' order by id desc");
        
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }
                        
    function toutAfficherBilletsVendus($id_etablissement){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM billets WHERE id_etablissement = '$id_etablissement'");
        
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }      
    
    function toutAfficherBilletsAttente($id_etablissement, $etat){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM billets WHERE id_etablissement = '$id_etablissement' AND validation_gerant = '$etat'");
        
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function modifierBillet($id_billet, $validation_agent, $date_validation){
        if(require("connexion.php")){

            $req = $acces->prepare("UPDATE billets SET validation_gerant = '$validation_agent', date_validation = '$date_validation' WHERE id = '$id_billet'");

            $req->execute();
            return null;
        }
    }               
                        
    function toutAfficherMesBillets($id_client, $typeClient){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM billets WHERE id_spectateur = '$id_client' AND type_spectateur = '$typeClient'");
        
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }   

    function afficherBillet($id_billet){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM billets WHERE id = '$id_billet'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            if(count($data)==1){
                foreach($data as $client):
                    return $client;
                endforeach;
            }
            else{
                return null;
            }
        }
    }








    // fonction pour gerant

    function AuthentificationGerant($mail, $password){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM gerants WHERE email = '$mail' AND password = '$password'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function EnregistrementNouveauGerant($gerant){
        if(require("connexion.php")){

            $nom = $gerant->getNom();
            $email = $gerant->getEmail(); 
            $password = $gerant->getPassword(); 
            $image_profil = "../../img/profil.png";

            $req = $acces->prepare("INSERT INTO gerants(nom, email, password, image_profil) VALUES(?, ?, ?, ?)");
            $req->execute(array($nom, $email, $password, $image_profil));
        }   
    }

    function EnregistrementNouveauEtablissement($etablissement){
        if(require("connexion.php")){

            $nom = $etablissement->getNomEtablissement();
            $typeSpectacle = $etablissement->getDomaine(); 
            $id_gerant = $etablissement->getGerant();
            
            $req = $acces->prepare("INSERT INTO etablissement_spectacles(nom, type_spectacle, id_gerant) VALUES(?, ?, ?)");
            $req->execute(array($nom, $typeSpectacle, $id_gerant));
        }   
    }

    function selectionEtablissementSelonCritaire($nomEtablissement){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM etablissement_spectacles WHERE nom = '$nomEtablissement'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function toutAfficherEtablissement(){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM etablissement_spectacles");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function upDateGerant($id_gerant, $id_etablissement){
        if(require("connexion.php")){
            $req = $acces->prepare("UPDATE gerants SET id_etablissement = '$id_etablissement' WHERE id = '$id_gerant'");
            $req->execute();
        }
    }

    function AfficherGerant($id_gerant){
        if(require("connexion.php")){

            $req = $acces->prepare("SELECT * FROM gerants WHERE id = '$id_gerant'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function AfficherUnGerant($id_gerant){
        if(require("connexion.php")){

            $req = $acces->prepare("SELECT * FROM gerants WHERE id = '$id_gerant'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            if(count($data)==1){
                foreach($data as $etab):
                    return $etab;
                endforeach;
            }
            else{
                return null;
            }
        }
    }




    // fonction pour administrateur du systeme

    function AuthentificationAdmin($mail, $password){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM administrateurs WHERE email = '$mail' AND password = '$password'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function toutAfficherAdministrateur(){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM administrateurs");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function AfficherAdministrateur($id_admin){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM administrateurs WHERE id = '$id_admin'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function verificationUtilisateurConnecte($id_utilisateur, $type){
        if(require("connexion.php")){

            $presence = true;
            $req1 = $acces->prepare("SELECT * FROM utilisateurs_connecter WHERE id_utilisateur = '$id_utilisateur' AND type_utilisateur = '$type'");
            
            $req1->execute();
            $data = $req1->fetchAll(PDO::FETCH_OBJ);
            
            if(count($data)==0){
                $presence = false;
            }

            return $presence;
        }
    }

    function AfficherNombreConnexion(){
        $nombre = 0;

        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM nombre_connexions");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);

            if(count($data)==1){

                foreach($data as $LaValeur):

                    $nombre = $LaValeur->nombre;

                endforeach;
            }
            return $nombre;
            $req->closeCursor();
        }
    }

    function ModifierNombreConnexion($nombre_connexion){
        if(require("connexion.php")){

            $id = 1;
            $date = date('Y-m-d');
            $heure = date('h:i:s');
            $req = $acces->prepare("UPDATE nombre_connexions SET nombre = '$nombre_connexion', date = '$date', heure = '$heure' WHERE id = '$id'");

            $req->execute();
            return null;
        }
    }

    function AjouterConnectionUtilisateur($id_utilisateur, $type, $date, $terminal){
        if(require("connexion.php")){
            $req = $acces->prepare("INSERT INTO utilisateurs_connecter(id_utilisateur, type_utilisateur, date, terminal) VALUES(?, ?, ?, ?)");
            $req->execute(array($id_utilisateur, $type, $date, $terminal));
        }
    }

    function enregistrementErreur($email, $password, $date, $terminal){
        if(require("connexion.php")){

            $req = $acces->prepare("INSERT INTO erreurs_authentifications(email_utiliser, password_utiliser, date_tentative, terminal) VALUES(?, ?, ?, ?)");
            $req->execute(array($email, $password, $date, $terminal));
        }
    }

    function AfficherErreurAuthentificationSelonCritaire($type, $mc){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM erreurs_authentifications order by id desc");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }
                        
    function AfficherErreurAuthentification(){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM erreurs_authentifications");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function supprimerConnexion($id_utilisateur, $type){
        if(require("connexion.php")){
            $req = $acces->prepare("DELETE FROM utilisateurs_connecter WHERE id_utilisateur = '$id_utilisateur' AND type_utilisateur = '$type'");
            $req->execute();
        }
    }

    function AfficherselectionSpectateursCritaire($critaire){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM spectateurs WHERE nom = '$critaire'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function selectionSpectateurs(){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM spectateurs");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }
    
    function selectionActeurs(){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM acteurs");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function AfficherselectionGerantsCritaire($critaire){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM gerants WHERE nom = '$critaire'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function selectionGerants(){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM gerants");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function AfficherselectionActeursCritaire($critaire){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM acteurs WHERE nom = '$critaire'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }
    
    function selectionEtablissements(){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM etablissement_spectacles");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }
    
    function selectionAdministrateurs(){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM administrateurs");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }
    
    function selectionSpectacles(){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM spectacles");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function selectionSpectaclesPrecis($type,$critaire){
        
        if(require("connexion.php")){

            if($type == "nom"){
                $req = $acces->prepare("SELECT * FROM spectacles WHERE nom = '$critaire'");
            }
            else
            if($type == "acteur"){
                $req = $acces->prepare("SELECT * FROM spectacles WHERE acteur_principale = '$critaire'");
            }
            else{
                $req = $acces->prepare("SELECT * FROM spectacles");
            }

            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }

    }
    
    function selectionSpectacleAttente(){
        if(require("connexion.php")){

            $validation = false;

            $req = $acces->prepare("SELECT * FROM spectacles WHERE validation_admin = '$validation'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function selectionSpectacleAttentePrecis($type,$critaire){

        if(require("connexion.php")){

            $validation = false;

            if($type == "nom"){
                $req = $acces->prepare("SELECT * FROM spectacles WHERE nom = '$critaire' AND validation_admin = '$validation'");
            }
            else
            if($type == "acteur"){
                $req = $acces->prepare("SELECT * FROM spectacles WHERE acteur_principale = '$critaire' AND validation_admin = '$validation'");
            }
            else{
                $req = $acces->prepare("SELECT * FROM spectacles WHERE validation_admin = '$validation'");
            }

            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }

    }
    
    function selectionBillets(){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM billets");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }




    // fonction pour acteur 

    function AuthentificationActeur($mail, $password){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM acteurs WHERE email = '$mail' AND password = '$password'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function EnregistrementNouvelActeur($acteur){
        if(require("connexion.php")){

            $nom = $acteur->getNom();
            $email = $acteur->getEmail(); 
            $password = $acteur->getPassword(); 
            $typeSpectacle = $acteur->getTypeSpectacle(); 
            $image_profil = "../../img/profil.png";

            $req = $acces->prepare("INSERT INTO acteurs(nom, email, password, image_profil, type_spectacle) VALUES(?, ?, ?, ?, ?)");
            $req->execute(array($nom, $email, $password, $image_profil, $typeSpectacle));
        }   
    }
    
    function AfficherActeur($id_acteur){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM acteurs WHERE id = '$id_acteur'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function toutAfficherActeur(){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM acteurs");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function enregistrementProposition($nom, $email, $numero, $destinataire, $etablissement, $message_visiteur, $autorisation, $type_utilisateur){
        if(require("connexion.php")){

            $req = $acces->prepare("INSERT INTO propositions(nom, email, numero, type_destinataire, id_etablissement, message_visiteur, autorisation_newleter, type_utilisateur) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
            $req->execute(array($nom, $email, $numero, $destinataire, $etablissement, $message_visiteur, $autorisation, $type_utilisateur));
        }
    }

    function AfficherListePropositionsSelonCritaire($type, $critaire, $id_destinataire, $type_destinataire){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM propositions WHERE type_destinataire = '$type_destinataire' AND id_etablissement = '$id_destinataire' order by id desc");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }
                       
    function AfficherListePropositions($id_destinataire, $type_destinataire){
        if(require("connexion.php")){
            $req = $acces->prepare("SELECT * FROM propositions WHERE type_destinataire = '$type_destinataire' AND id_etablissement = '$id_destinataire'");
            
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor();
        }
    }

    function bloquerAcces($id_utilisateur, $type_utilisateur){
        if(require("connexion.php")){

            $req = null;

            if($type_utilisateur == "acteur"){

                $utilisateur = recupererActeur( $id_utilisateur);
                if($utilisateur->bloquer == true){
                    $etat = false;
                }
                else
                if($utilisateur->bloquer == false){
                    $etat = true;
                }
                $req = $acces->prepare("UPDATE acteurs SET bloquer = '$etat' WHERE id = '$id_utilisateur'");  
            }
            else
            if($type_utilisateur == "spectateur"){

                $utilisateur = afficherClientSelonCritaire( $id_utilisateur);
                if($utilisateur->bloquer == true){
                    $etat = false;
                }
                else
                if($utilisateur->bloquer == false){
                    $etat = true;
                }
                $req = $acces->prepare("UPDATE spectateurs SET bloquer = '$etat' WHERE id = '$id_utilisateur'");  
            }
            else
            if($type_utilisateur == "gerant"){

                $utilisateur = AfficherUnGerant( $id_utilisateur);
                if($utilisateur->bloquer == true){
                    $etat = false;
                }
                else
                if($utilisateur->bloquer == false){
                    $etat = true;
                }
                $req = $acces->prepare("UPDATE gerants SET bloquer = '$etat' WHERE id = '$id_utilisateur'");  
            }

           $req->execute();
           return null;

        }
    }
                
    function modifierNombreBilletsSpectacle($spectacle){
        if(require("connexion.php")){

            $billets = $spectacle->billet_vendu + 1;

            $req = $acces->prepare("UPDATE spectacles SET billet_vendu = '$billets' WHERE id = '$spectacle->id'");

            $req->execute();
            return null;
        }
    }




?>