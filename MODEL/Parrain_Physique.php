<?php
    class Parrain_P extends Parrain{
        private $Nom;
        private $Prenom;
        private $Sexe;
        private $Adresse;
        private $Telephone;
        private $Email;
        private $Fax;
        
        //constructeur de la classe Parrain_P
        public function __construct($IDP,$CodeP,$Type_Parrain,$Type_Parainnage,$Date_Debut_Parainnage,$Date_Cessession_Parainnage,$Date_Enregistrement,$Nom,$Prenom,$Sexe,$Adresse,$Telephone,$Email,$Fax){
            PARENT::__construct($IDP,$CodeP,$Type_Parrain,$Type_Parainnage,$Date_Debut_Parainnage,$Date_Cessession_Parainnage,$Date_Enregistrement);
            $this->Nom=$Nom;
            $this->Prenom=$Prenom;
            $this->Sexe=$Sexe;
            $this->Adresse=$Adresse;
            $this->Telephone=$Telephone;
            $this->Email=$Email;
            $this->Fax=$Fax;
        }

        //Accesseur
        public function getNom(){return $this->Nom;}
        public function getPrenom(){return $this->Prenom;}
        public function getSexe(){return $this->Sexe;}
        public function getAdresse(){return $this->Adresse;}
        public function getTelephone(){return $this->Telephone;}
        public function getEmail(){return $this->Email;}
        public function getFax(){return $this->Fax;}

        //Mutateur
        public function setNom($Nom){$this->Nom=$Nom;}
        public function setPrenom($Prenom){$this->Prenom=$Prenom;}
        public function setSexe($Sexe){$this->Sexe=$Sexe;}
        public function setAdresse($Adresse){$this->Adresse=$Adresse;}
        public function setTelephone($Telephone){$this->Telephone=$Telephone;}
        public function setEmail($Email){$this->Email=$Email;}
        public function setFax($Fax){$this->Fax=$Fax;}
        
         //fonction permettant d'enregistrer un Parrain Physique
         public function Allouer_BU(){
            require_once('ConnectionBD.php');
            $stmt = $BDD->prepare("INSERT into Parrain(CodeP,Type_Parrain,Type_Parainnage,Date_Debut_Parainnage,Date_Cessession_Parainnage,Date_Enregistrement,Nom,Prenom,Sexe,Adresse,Telephone,Email,Fax) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute(array($this->CodeP,$this->Type_Parrain,$this->Date_Debut_Parainnage,$this->Date_Cessession_Parainnage,$this->Date_Enregistrement,$this->Nom,$this->Prenom,$this->Sexe,$this->Adresse,$this->Email,$this->Fax));
            $stmt->closeCursor();
            return $stmt;
        }

        //fonction permettant de Modifier un parrain physique
        public function Modifier_PARP($id){
            require_once('ConnectionBD.php');
            $stmt = $BDD->prepare("UPDATE Budget set Type_Parrain=?,Type_Parainnage=?,Date_Debut_Parainnage=?,Date_Cessession_Parainnage=?,Nom=?,Prenom=?,Sexe=?,Adresse=?,Telephone=?,Email=?,Fax=? where ID=?");
            $stmt->execute(array($this->Type_Parrain,$this->Type_Parainnage,$this->Date_Debut_Parainnage,$this->Date_Cessession_Parainnage,$this->Nom,$this->Prenom,$this->Sexe,$this->Adresse,$this->Telephone,$this->Email,$this->Fax,$id));
            return $stmt;
        }
    }
?>