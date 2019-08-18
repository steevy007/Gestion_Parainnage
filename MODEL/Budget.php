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
            require_once('ConnectionBD.php');
            while($this->verifierCode($this->codeBU)==true){
                $this->codeBU = "BU-" . rand(100000, 999999);        
            }
                $this->codeBU= "BU-" . rand(100000, 999999);
                $stmt->closeCursor();
      }

        //fonction permettant de verifier code
        public function verifierCode($code){
            require_once('ConnectionBD.php');
             $selection="SELECT code from Budget where code=?";
            $execution->execute(array($code));
            if($result=$execution->fetch()){
                return true;
            }else{
                return false;
            }
            $stmt->closeCursor();
        }

         //fonction permettant de creer un Budget
         public function Allouer_BU(){
            require_once('ConnectionBD.php');
            $stmt = $BDD->prepare("INSERT into Budget(CodeBU,IDP,Montant,Devise,Date_DebutBU,Date_FinBU,Description) VALUES(?,?,?,?,?,?,?)");
            $stmt->execute(array($this->CodeBU,$this->IDP,$this->Montant,$this->Devise,$this->Date_DebutBU,$this->Date_FinBU,$this->Description));
            $stmt->closeCursor();
            return $stmt;
        }

        
        //fonction permettant de lister les budget
        public function Lister_BU(){
            require_once('ConnectionBD.php');
            $stmt = $BDD->("SELECT * from Budget");
            $stmt->execute();
            $stmt->closeCursor();
            return $stmt;
        }

        //fonction permettant de modifier un Budget
        public function Modifier_BU($id){
            require_once('ConnectionBD.php');
            $stmt = $BDD->prepare("UPDATE Budget set Montant=?,Devise=?,Date_DebutBU=?,Date_FinBU=?,Description=? where ID=?");
            $stmt->execute(array($this->Montant,$this->Devise,$this->Date_DebutBU,$this->Date_FinBU,$this->Description,$id));
            return $stmt;
        }

        //fonction permettant de Lister Par ID
        public function Lister_ID($id){
            require_once('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT * from Budget where ID=?");
            $stmt->execute(array($id));
            $stmt->closeCursor();
            return $stmt;
        }
        //fonction permettant d'archiver un programme
        /*
        public function Archiver_PR($id){
            require_once('ConnectionBD.php'); 
            $stmt = $BDD->prepare("INSERT into Archive VALUES(?,?,?,?,?,?,?)");
            $stmt->execute(array($this->ID,$this->CodePR,$this->Nom,$this->Date_DebutP,$this->Date_FinP,$this->Description,$this->Date_CreationP));
            $stmt1=$BDD->prepare("DELETE from programme where ID=?");
            $stmt1->execute(array($id));
            $stmt->closeCursor();
            $stmt1->closeCursor();
        }*/
    }
?>