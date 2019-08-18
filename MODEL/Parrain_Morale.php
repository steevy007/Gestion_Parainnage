<?php
    class ParrainM extends Parrain{
        private $Nom_Institution;
        private $Adresse;
        private $Telephone;
        private $Email;
        private $Fax;

        //constructeur de la classe Parrain Morale
        public function __construct($IDP,$CodeP,$Type_Parrain,$Type_Parainnage,$Date_Debut_Parainnage,$Date_Cessession_Parainnage,$Date_Enregistrement,$Nom_Institution,$Adresse,$Telephone,$Email,$Fax){
            PARENT::__construct($IDP,$CodeP,$Type_Parrain,$Type_Parainnage,$Date_Debut_Parainnage,$Date_Cessession_Parainnage,$Date_Enregistrement);
            $this->Nom_Institution=$Nom_Institution;
            $this->Adresse=$Adresse;
            $this->Email=$Email;
            $this->Fax=$Fax;
        }

        //Accesseur
        public getNom_Institution(){return $this->Nom_Institution;}
        public getAdresse(){return $this->Adresse;}
        public getTelephone(){return $this->Telephone;}
        public getEmail(){return $this->Email;}
        public getFax(){return $this->Fax;}

        //Mutateur
        public setNom_Institution($Nom_Institution){$this->Nom_Institution=$Nom_Institution;}
        public setAdresse($Adresse){$this->Adresse=$Adresse;}
        public setTelehone($Telephone){$this->Telephone=$Telephone;}
        public setEmail($Email){$this->Email=$Email;}
        public setFax($Fax){$this->Fax=$Fax;}

           //fonction permettant d'enregistrer un Parrain Morale
           public function Allouer_BU(){
            require_once('ConnectionBD.php');
            $stmt = $BDD->prepare("INSERT into Parrain(CodeP,Type_Parrain,Type_Parainnage,Date_Debut_Parainnage,Date_Cessession_Parainnage,Date_Enregistrement,Nom_Institution,Adresse,Telephone,Email,Fax) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute(array($this->CodeP,$this->Type_Parrain,$this->Date_Debut_Parainnage,$this->Date_Cessession_Parainnage,$this->Date_Enregistrement,$this->Nom_Institution,$this->Adresse,$this->Email,$this->Fax));
            $stmt->closeCursor();
            return $stmt;
        }

        //fonction permettant de Modifier un parrain Morale
        public function Modifier_PARP($id){
            require_once('ConnectionBD.php');
            $stmt = $BDD->prepare("UPDATE Budget set Type_Parrain=?,Type_Parainnage=?,Date_Debut_Parainnage=?,Date_Cessession_Parainnage=?,Nom_Institution=?,Adresse=?,Telephone=?,Email=?,Fax=? where ID=?");
            $stmt->execute(array($this->Type_Parrain,$this->Type_Parainnage,$this->Date_Debut_Parainnage,$this->Date_Cessession_Parainnage,$this->Nom_Institution,$this->Adresse,$this->Telephone,$this->Email,$this->Fax,$id));
            return $stmt;
        }
    }
?>