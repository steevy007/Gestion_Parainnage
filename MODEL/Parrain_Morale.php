<?php
require_once('Parrain.php');
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
        public function getNom_Institution(){return $this->Nom_Institution;}
        public function getAdresse(){return $this->Adresse;}
        public function getTelephone(){return $this->Telephone;}
        public function getEmail(){return $this->Email;}
        public function getFax(){return $this->Fax;}

        //Mutateur
        public function setNom_Institution($Nom_Institution){$this->Nom_Institution=$Nom_Institution;}
        public function setAdresse($Adresse){$this->Adresse=$Adresse;}
        public function setTelehone($Telephone){$this->Telephone=$Telephone;}
        public function setEmail($Email){$this->Email=$Email;}
        public function setFax($Fax){$this->Fax=$Fax;}

        public function getIDP(){return $this->IDP;}
        public function getCodeP(){return $this->CodeP;}
        public function getType_Parrain(){return $this->Type_Parrain;}
        public function getType_Parainnage(){return $this->Type_Parainnage;}
        public function getDate_Debut_Parainnage(){return $this->Date_Debut_Parainnage;}
        public function getDate_Cessession_Parainnage(){return $this->Date_Cessession_Parainnage;}
        public function getEnregistrement(){return $this->Date_Enregistrement;}

         //Mutateur
         public function setIDP($IDP){ $this->IDP=$IDP;}
         public function setCodeP($CodeP){ $this->CodeP=$CodeP;}
         public function setType_Parrain($Type_Parrain){$this->Type_Parrain=$Type_Parrain;}
         public function setType_Parainnage($Type_Parainnage){$this->Type_Parainnage=$Type_Parainnage;}
        public function setDate_Debut_Parainnage($Date_Debut_Parainnage){ $this->Date_Debut_Parainnage=$Date_Debut_Parainnage;}
         public function setDate_Cessession_Parainnage($Date_Cessession_Parainnage){ $this->Date_Cessession_Parainnage=$Date_Cessession_Parainnage;}
         public function setEnregistrement($Date_Enregistrement){ $this->Enregistrement=$Date_Enregistrement;}

           //fonction permettant d'enregistrer un Parrain Morale
           public function AddParrain(){
            include('ConnectionBD.php');
            $this->CodeP=PARENT::genererCode();
            $stmt = $BDD->prepare("INSERT into Parrain(Code,Type_Parrain,Type_Parrainage,DateD,DateF,Date_Enr,Nom_Institution,Adresse,Telephone,Email,Fax) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute(array($this->CodeP,$this->Type_Parrain,$this->Type_Parainnage,$this->Date_Debut_Parainnage,$this->Date_Cessession_Parainnage,$this->Date_Enregistrement,$this->Nom_Institution,$this->Adresse,$this->Telephone,$this->Email,(int)$this->Fax));
            $stmt->closeCursor();
            return $stmt;
        }

        //fonction permettant de Modifier un parrain Morale
        public function Modifier_PARP($id){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("UPDATE Parrain set Type_Parrain=?,Type_Parrainage=?,DateD=?,DateF=?,Nom_Institution=?,Adresse=?,Telephone=?,Email=?,Fax=? where ID=?");
            $stmt->execute(array($this->Type_Parrain,$this->Type_Parainnage,$this->Date_Debut_Parainnage,$this->Date_Cessession_Parainnage,$this->Nom_Institution,$this->Adresse,$this->Telephone,$this->Email,$this->Fax,$id));
            return $stmt;
        }


                        //fonction permettant d'archiver un Parrain
                        public function Archiver($id){
                            $reponse=false;
                            include('ConnectionBD.php'); 
                            $stmt = $BDD->prepare("INSERT into archive_Parrain(ID,Code,Type_Parrain,Type_Parrainage,DateD,DateF,Date_Enr,Nom_Institution,Adresse,Telephone,Email,Fax) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
                            $stmt->execute(array($this->IDP,$this->CodeP,$this->Type_Parrain,$this->Type_Parainnage,$this->Date_Debut_Parainnage,$this->Date_Cessession_Parainnage,$this->Date_Enregistrement,$this->Nom_Institution,$this->Adresse,$this->Telephone,$this->Email,(int)$this->Fax));
                         if($stmt){
                                $reponse=true;
                            }else{
                                $reponse=false;
                            }
                            $stmt1=$BDD->prepare("DELETE from Parrain where ID=?");
                            $stmt1->execute(array($id));
                            if($stmt1){
                                $reponse=true;
                            }else{
                                $reponse=false;
                            }
                            $stmt->closeCursor();
                            $stmt1->closeCursor();
                            return $reponse;
                        }
    }
?>