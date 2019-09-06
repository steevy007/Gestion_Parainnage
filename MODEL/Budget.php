<?php
    class Budget{
        private $ID;
        private $CodeBU;
        private $IDP;
        private $Montant;
        private $Devise;
        private $Date_DebutBU;
        private $Date_FinBU;
        private $Description;

        //constructeur de la classe Budget
        public function __construct($ID,$CodeBU,$IDP,$Montant,$Devise,$Date_DebutBU,$Date_FinBU,$Description){
            $this->ID=$ID;
            $this->CodeBU=$CodeBU;
            $this->IDP=$IDP;
            $this->Montant=$Montant;
            $this->Date_DebutBU=$Date_DebutBU;
            $this->Date_FinBU=$Date_FinBU;
            $this->Description=$Description;
        }

        //Accesseur
        public function getID(){return $this->ID;}
        public function getCodeBU(){return $this->CodeBU;}
        public function getIDP(){return $this->IDP;}
        public function getMontant(){return $this->Montant;}
        public function getDevise(){return $this->Devise;}
        public function getDate_DebutBU(){return $this->Date_DebutBU;}
        public function getDate_FinBU(){return $this->Date_FinBU;}
        public function getDescription(){return $this->Description;}

        //Mutateur
        public function setID($ID){$this->ID=$ID;}
        public function setCodeBU($CodeBU){$this->CodeBU=$CodeBU;}
        public function setIDP($IDP){$this->IDP=$IDP;}
        public function setMontant($Montant){$this->Montant=$Montant;}
        public function setDevise($Devise){$this->Devise=$Devise;}
        public function setDate_DebutBU($Date_DebutBU){$this->Date_DebutBU=$Date_DebutBU;}
        public function setDate_FinBU($Date_FinBU){$this->Date_FinBU=$Date_FinBU;}
        public function setDescription($Description){$this->Description=$Description;}

        //fonction permettant de creer code pour un Budget
        public function genererCode(){
            $this->CodeBU= "BU-" . rand(100000, 999999);
            while($this->verifierCode($this->CodeBU)==1){
                $this->codeBU = "BU-" . rand(100000, 999999);        
            }
      }

        //fonction permettant de verifier code
        public function verifierCode($code){
            include('ConnectionBD.php');
             $selection=$BDD->prepare("SELECT code from Budget where code=?");
            $selection->execute(array($code));
            return $selection->rowCount();
        }

         //fonction permettant de creer un Budget
         public function Allouer_BU(){
            include('ConnectionBD.php');
            $this->genererCode();
            $stmt = $BDD->prepare("INSERT into Budget(Code,IDP,Montant,Devise,DateD,DateF,Description) VALUES(?,?,?,?,?,?,?)");
            $stmt->execute(array($this->CodeBU,$this->IDP,$this->Montant,$this->Devise,$this->Date_DebutBU,$this->Date_FinBU,$this->Description));
            $stmt1=$BDD->prepare("UPDATE programme set Etat_Budget=? where ID=?");
            $stmt1->execute(array('DEFINI',$this->IDP));
            return $stmt;
        }

        
        //fonction permettant de lister les budget
        public function Lister_BU(){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT * from Budget");
            $stmt->execute();
            return $stmt;
            $stmt->closeCursor();
        }

           
        //fonction permettant de retourner l ID du programme
        public function GetIDPR($code){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT ID from Programme where CodePR=?");
            $stmt->execute(array($code));
            while($data=$stmt->fetch()){
                return $data['ID'];
            }
        }

        //fonction permettant de modifier un Budget
        public function Modifier_BU($id){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("UPDATE Budget set Montant=?,Devise=?,DateD=?,DateF=?,Description=? where ID=?");
            $stmt->execute(array($this->Montant,$this->Devise,$this->Date_DebutBU,$this->Date_FinBU,$this->Description,$id));
            return $stmt;
        }

        //fonction permettant de Lister Par ID
        public function Lister_ID($id){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT * from Budget where ID=?");
            $stmt->execute(array($id));
            return $stmt;
            $stmt->closeCursor();
        }
        //fonction permettant d'archiver un Budget
        public function Archiver_BU($id){
            $reponse=false;
            include('ConnectionBD.php'); 
            $stmt = $BDD->prepare("INSERT into archive_budget(ID,Code,IDP,Montant,Devise,DateD,DateF,Description) VALUES(?,?,?,?,?,?,?,?)");
            $stmt->execute(array($this->ID,$this->CodeBU,$this->IDP,$this->Montant,$this->Devise,$this->Date_DebutBU,$this->Date_FinBU,$this->Description));
            if($stmt){
                $reponse=true;
            }else{
                $reponse=false;
            }
            $stmt1=$BDD->prepare("DELETE from Budget where ID=?");
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