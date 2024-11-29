<?php  

    Class spectacle{

        private $nomSpectacle = null;
        private $imageSpectacle = null;
        private $description = null;
        private $acteurPrincipale = null;
        private $autresActeurs = null;
        private $salle = null;
        private $dateSpectacle = null;
        private $heureDebut = null;
        private $heureFin = null;
        private $typeSpectacle = null;
        private $etatTerminer = false;
        private $moyenPaillement = null;
        private $billetVendu = 0;
        private $etablissementProprietaire = 0;
        private $validationAdministratif = false;

        public function __construct(){

        }

        public function getNomSpectacle(){
            return $this->nomSpectacle;
        }
        public function setNomSpectacle($nouveau){
            $this->nomSpectacle = $nouveau;
        }

        public function getImageSpectacle(){
            return $this->imageSpectacle;
        }
        public function setImageSpectacle($nouveau){
            $this->imageSpectacle = $nouveau;
        }

        public function getDescription(){
            return $this->description;
        }
        public function setDescription($nouveau){
            $this->description = $nouveau;
        }

        public function getActeurPrincipale(){
            return $this->acteurPrincipale;
        }
        public function setActeurPrincipale($nouveau){
            $this->acteurPrincipale = $nouveau;
        }

        public function getAutresActeurs(){
            return $this->autresActeurs;
        }
        public function setAutresActeurs($nouveau){
            $this->autresActeurs = $nouveau;
        }

        public function getSalle(){
            return $this->salle;
        }
        public function setSalle($nouveau){
            $this->salle = $nouveau;
        }
        
        public function getHeureDebut(){
            return $this->heureDebut;
        }
        public function setHeureDebut($nouveau){
            $this->heureDebut = $nouveau;
        }
        
        public function getHeureFin(){
            return $this->heureFin;
        }
        public function setHeureFin($nouveau){
            $this->heureFin = $nouveau;
        }
        
        public function getEtatTerminer(){
            return $this->etatTerminer;
        }
        public function setEtatTerminer($nouveau){
            $this->etatTerminer = $nouveau;
        }
        
        public function getMoyenPaillement(){
            return $this->moyenPaillement;
        }
        public function setMoyenPaillement($nouveau){
            $this->moyenPaillement = $nouveau;
        }
        
        public function getBilletVendu(){
            return $this->billetVendu;
        }
        public function setBilletVendu($nouveau){
            $this->billetVendu = $nouveau;
        }
        
        public function getEtablissementProprietaire(){
            return $this->etablissementProprietaire;
        }
        public function setEtablissementProprietaire($nouveau){
            $this->etablissementProprietaire = $nouveau;
        }
        
        public function getValidationAdministratif(){
            return $this->validationAdministratif;
        }
        public function setValidationAdministratif($nouveau){
            $this->validationAdministratif = $nouveau;
        }
        
        public function getDateSpectacle(){
            return $this->dateSpectacle;
        }
        public function setDateSpectacle($nouveau){
            $this->dateSpectacle = $nouveau;
        }
        
        public function getTypeSpectacle(){
            return $this->typeSpectacle;
        }
        public function setTypeSpectacle($nouveau){
            $this->typeSpectacle = $nouveau;
        }

    }


    Class MaisonOrganisationSpectacle{

        private $nomEtablissement = null;
        private $domaine = null;
        private $gerant = 0;

        public function __construct($nomEtablissement1, $domaine1, $gerant1){
            $this->setNomEtablissement($nomEtablissement1);
            $this->setDomaine($domaine1);
            $this->setGerant($gerant1);
        }

        public function getNomEtablissement(){
            return $this->nomEtablissement;
        }
        public function setNomEtablissement($nouveau){
            $this->nomEtablissement = $nouveau;
        }
        
        public function getDomaine(){
            return $this->domaine;
        }
        public function setDomaine($nouveau){
            $this->domaine = $nouveau;
        }
        
        public function getGerant(){
            return $this->gerant;
        }
        public function setGerant($nouveau){
            $this->gerant = $nouveau;
        }
        
    }


    Class GerantMaisonOrganisationSpectacle{

        private $nom = null;
        private $email = null;
        private $password = null;
        private $etablissement = 0;

        public function __construct($nom_complet, $email_client, $passWord_client, $maison){
            $this->setNom($nom_complet);
            $this->setEmail($email_client);
            $this->setPassword($passWord_client);
            $this->setEtablissement($maison);
        }

        public function getNom(){
            return $this->nom;
        }
        public function setNom($nouveau_nom){
            $this->nom = $nouveau_nom;
        }

        public function getEmail(){
            return $this->email;
        }
        public function setEmail($nouveau){
            $this->email = $nouveau;
        }

        public function getPassword(){
            return $this->password;
        }
        public function setPassword($nouveau){
            $this->password = $nouveau;
        }

        public function getEtablissement(){
            return $this->etablissement;
        }
        public function setEtablissement($nouveau){
            $this->etablissement = $nouveau;
        }

    }


    Class Acteur{

        private $nom = null;
        private $typeSpectacle = null;
        private $email = null;
        private $password = null;

        public function __construct($nom_complet, $type_spectacle, $email_client, $passWord_client){
            $this->setNom($nom_complet);
            $this->setTypeSpectacle($type_spectacle);
            $this->setEmail($email_client);
            $this->setPassword($passWord_client);
        }

        public function getNom(){
            return $this->nom;
        }
        public function setNom($nouveau_nom){
            $this->nom = $nouveau_nom;
        }

        public function getEmail(){
            return $this->email;
        }
        public function setEmail($nouveau){
            $this->email = $nouveau;
        }

        public function getPassword(){
            return $this->password;
        }
        public function setPassword($nouveau){
            $this->password = $nouveau;
        }

        public function getTypeSpectacle(){
            return $this->typeSpectacle;
        }
        public function setTypeSpectacle($nouveau){
            $this->typeSpectacle = $nouveau;
        }

    }


    Class Spectateur{

        private $nom = null;
        private $email = null;
        private $password = null;

        public function __construct($nom_complet, $email_client, $passWord_client){
            $this->setNom($nom_complet);
            $this->setEmail($email_client);
            $this->setPassword($passWord_client);
        }

        public function getNom(){
            return $this->nom;
        }
        public function setNom($nouveau_nom){
            $this->nom = $nouveau_nom;
        }

        public function getEmail(){
            return $this->email;
        }
        public function setEmail($nouveau){
            $this->email = $nouveau;
        }

        public function getPassword(){
            return $this->password;
        }
        public function setPassword($nouveau){
            $this->password = $nouveau;
        }

    }


    Class Administrateur{

        private $nom = null;
        private $email = null;
        private $password = null;
        
        public function __construct($email_client, $passWord_client){
            $this->setEmail($email_client);
            $this->setPassword($passWord_client);
        }

        public function getNom(){
            return $this->nom;
        }
        public function setNom($nouveau_nom){
            $this->nom = $nouveau_nom;
        }

        public function getEmail(){
            return $this->email;
        }
        public function setEmail($nouveau){
            $this->email = $nouveau;
        }

        public function getPassword(){
            return $this->password;
        }
        public function setPassword($nouveau){
            $this->password = $nouveau;
        }

    }


    Class Billet{

        private $proprietaireBillet = 0;
        private $spectacle = 0;
        private $typeBillet = null;
        private $montantPayer = 0.0;
        private $heureDateObtention = null;
        private $validationGerant = null;
        private $idReseauPaillement = null;
        private $dateHeureValidationBillet = null;
        
        public function __construct(){

        }

        public function getProprietaireBillet(){
            return $this->proprietaireBillet;
        }
        public function setProprietaireBillet($nouveau){
            $this->proprietaireBillet = $nouveau;
        }
         
        public function getSpectacle(){
            return $this->spectacle;
        }
        public function setSpectacle($nouveau){
            $this->spectacle = $nouveau;
        }
        
        public function getTypeBillet(){
            return $this->typeBillet;
        }
        public function setTypeBillet($nouveau){
            $this->typeBillet = $nouveau;
        }
        
        public function getMontantPayer(){
            return $this->montantPayer;
        }
        public function setMontantPayer($nouveau){
            $this->montantPayer = $nouveau;
        }
        
        public function getHeureDateObtention(){
            return $this->heureDateObtention;
        }
        public function setHeureDateObtention($nouveau){
            $this->heureDateObtention = $nouveau;
        }
        
        public function getValidationGerant(){
            return $this->validationGerant;
        }
        public function setValidationGerant($nouveau){
            $this->validationGerant = $nouveau;
        }
        
        public function getIdReseauPaillement(){
            return $this->idReseauPaillement;
        }
        public function setIdReseauPaillement($nouveau){
            $this->idReseauPaillement = $nouveau;
        }
        
        public function getDateHeureValidationBillet(){
            return $this->dateHeureValidationBillet;
        }
        public function setDateHeureValidationBillet($nouveau){
            $this->dateHeureValidationBillet = $nouveau;
        }

    }

?>