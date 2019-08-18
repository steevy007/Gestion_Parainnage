<?php
    class programme{
        private $ID;
        private $CodePR;
        private $Nom;
        private $Date_DebutP;
        private $Date_FinP;
        private $Description;
        private $Date_CreationP;

        //Constructeur de la classe programme
        public function __construct($ID,$CodePR,$Nom,$Date_DebutP,$Date_FinP,$Description,$Date_CreationP){
            $this->ID=$ID;
            $this->CodePR=$CodePR;
            $this->Nom=$Nom;
            $this->Date_DebutP=$Date_DebutP;
            $this->Date_FinP=$Date_FinP;
            $this->Description=$Description;
            $this->Date_CreationP=$Date_CreationP
        }

        //Accesseur
        public function getID(){return $this->ID;}
        public function getCodePR(){return $this->CodePR;}
        public function getNom(){return $this->Nom;}
        public function getDate_DebutP(){return $this->Date_DebutP;}
        public function getDate_FinP(){return $this->Date_FinP;}
        public function getDescription(){return $this->Description;}
        public function getDate_CreationP(){return $this->Date_CreationP;}

        //Mutateur
        public function setID($ID){$this->ID=$ID;}
        public function setCodePR($CodePR){$this->CodePR=$CodePR;}
        public function setNom($Nom){$this->Nom=$Nom;}
        public function setDate_DebutP($Date_DebutP){$this->Date_DebutP=$Date_DebutP;}
        public function setDate_FinP($Date_FinP){$this->Date_FinP=$Date_FinP;}
        public function setDescription($Description){$this->Description=$Description;}
        public function setDate_CreationP($Date_CreationP){$this->Date_CreationP=$Date_CreationP;}

        //fonction permettant de creer code pour un programme
        public function genererCode(){
            require_once('ConnectionBD.php');
            while($this->verifierCode($this->codePR)==true){
                $this->codePR = "PR-" . rand(100000, 999999);        
            }
                $this->codePR= "PR-" . rand(100000, 999999);
                $stmt->closeCursor();
      }

        //fonction permettant de verifier code
        public function verifierCode($code){
            require_once('ConnectionBD.php');
             $selection="SELECT code from Programme where code=?";
            $execution->execute(array($code));
            if($result=$execution->fetch()){
                return true;
            }else{
                return false;
            }
            $stmt->closeCursor();
        }

        //fonction permettant de creer un programme
        public function creer_programme(){
            require_once('ConnectionBD.php');
            $this->Date_CreationP=date("Y-m-d");
            $stmt = $BDD->prepare("INSERT into programme(codePR,Nom,Date_DebutP,Date_FinP,Description,Date_CreationP) VALUES(?,?,?,?,?,?)");
            $stmt->execute(array($this->CodePR,$this->Nom,$this->Date_DebutP,$this->Date_FinP,$this->Description,$this->Date_CreationP));
            $stmt->closeCursor();
        }

        //fonction permettant de lister les programmes
        public function Lister_PR(){
            require_once('ConnectionBD.php');
            $stmt = $BDD->("SELECT * from programme");
            $stmt->execute();
            $stmt->closeCursor();
            return $stmt;
        }

        //fonction permettant de modifier unprogramme
        public function Modifier_PR($id){
            require_once('ConnectionBD.php');
            $stmt = $BDD->prepare("UPDATE programme set Nom=?,Date_DebutP=?,Date_FinP=?,Description=? where ID=?");
            $stmt->execute(array($this->Nom,$this->Date_DebutP,$this->Date_FinP,$this->Description,$id));
            return $stmt;
        }

        //fonction permettant de Lister Par ID
        public function Lister_ID($id){
            require_once('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT * from programme where ID=?");
            $stmt->execute(array($id));
            $stmt->closeCursor();
            return $stmt;
        }
        //fonction permettant d'archiver un programme
        /*
        public function Archiver_PR($id){
            require_once('ConnectionBD.php'); 
            $stmt = $BDD->prepare("INSERT into Archive(id,codePR,Nom,Date_DebutP,Date_FinP,Description,Date_CreationP) VALUES(?,?,?,?,?,?,?)");
            $stmt->execute(array($this->ID,$this->CodePR,$this->Nom,$this->Date_DebutP,$this->Date_FinP,$this->Description,$this->Date_CreationP));
            $stmt1=$BDD->prepare("DELETE from programme where ID=?");
            $stmt1->execute(array($id));
            $stmt->closeCursor();
            $stmt1->closeCursor();
        }*/
    }
?>