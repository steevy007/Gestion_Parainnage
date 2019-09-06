<?php
    class programme{
        private $ID;
        private $CodePR;
        private $Nom;
        private $Date_DebutP;
        private $Date_FinP;
        private $Description;
        private $Date_CreationP;
        private $Etat_Budget;
        //Constructeur de la classe programme
        public function __construct($ID,$CodePR,$Nom,$Date_DebutP,$Date_FinP,$Description,$Date_CreationP,$Etat_Budget){
            $this->ID=$ID;
            $this->CodePR=$CodePR;
            $this->Nom=$Nom;
            $this->Date_DebutP=$Date_DebutP;
            $this->Date_FinP=$Date_FinP;
            $this->Description=$Description;
            $this->Date_CreationP=date("Y-m-d");
            $this->Etat_Budget='NON DEFINI';
        }

        //Accesseur
        public function getID(){return $this->ID;}
        public function getCodePR(){return $this->CodePR;}
        public function getNom(){return $this->Nom;}
        public function getDate_DebutP(){return $this->Date_DebutP;}
        public function getDate_FinP(){return $this->Date_FinP;}
        public function getDescription(){return $this->Description;}
        public function getDate_CreationP(){return $this->Date_CreationP;}
        public function getEtat_Budget(){return $this->Etat_Budget;}

        //Mutateur
        public function setID($ID){$this->ID=$ID;}
        public function setCodePR($CodePR){$this->CodePR=$CodePR;}
        public function setNom($Nom){$this->Nom=$Nom;}
        public function setDate_DebutP($Date_DebutP){$this->Date_DebutP=$Date_DebutP;}
        public function setDate_FinP($Date_FinP){$this->Date_FinP=$Date_FinP;}
        public function setDescription($Description){$this->Description=$Description;}
        public function setDate_CreationP($Date_CreationP){$this->Date_CreationP=$Date_CreationP;}
        public function setEtat_Budget($Etat_Budget){$this->Etat_Budget=$Etat_Budget;}

        //fonction permettant de creer code pour un programme
        public function genererCode(){
            include('ConnectionBD.php');
            $this->CodePR = "PR-" . rand(100000, 999999);  
            while($this->verifierCode($this->CodePR)==1){
                $this->codePR = "PR-" . rand(100000, 999999);        
            }
      }

        //fonction permettant de verifier code
        public function verifierCode($code){
            include('ConnectionBD.php');          
             $execution=$BDD->prepare("SELECT codePR from Programme where codePR=?");
            $execution->execute(array($code));
            return $execution->rowCount();
            $stmt->closeCursor();
        }

        //fonction permettant de creer un programme
        public function creer_programme(){
            include('ConnectionBD.php');
            $this->Date_CreationP=date("Y-m-d");
            $this->genererCode();
            $stmt = $BDD->prepare("INSERT into programme(codePR,Nom,Date_DebutP,date_FP,Description,Date_CreationP,Etat_Budget) VALUES(?,?,?,?,?,?,?)");
            $stmt->execute(array($this->CodePR,$this->Nom,$this->Date_DebutP,$this->Date_FinP,$this->Description,$this->Date_CreationP,$this->Etat_Budget));
            $stmt->closeCursor();
            return $stmt;
        }

        //fonction permettant de lister les programmes
        public function Lister_PR(){
            include('ConnectionBD.php');
            $stmt=$BDD->prepare("SELECT * from programme");
            $stmt->execute();
            return $stmt;
        }

        public function Lister_PR2(){
            include('ConnectionBD.php');
            $stmt=$BDD->prepare("SELECT * from programme where Etat_Budget=?");
            $stmt->execute(array('NON DEFINI'));
            return $stmt;
        }

        public function Lister_PR3(){
            include('ConnectionBD.php');
            $stmt=$BDD->prepare("SELECT CodePR from programme where Etat_Budget=?");
            $stmt->execute(array('DEFINI'));
            return $stmt;
        }
        public function Find_ID($code){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT ID from programme where CodePR=?");
            $stmt->execute(array($code));
            while($data=$stmt->fetch()){
                return $data['ID'];
            }
        }

        public function Find_DateS($code){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT date_FP from programme where CodePR=?");
            $stmt->execute(array($code));
            while($data=$stmt->fetch()){
                return $data['date_FP'];
            }
        }


        //fonction permettant de modifier unprogramme
        public function Modifier_PR($id){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("UPDATE programme set Nom=?,Date_DebutP=?,Date_FP=?,Description=? where ID=?");
            $stmt->execute(array($this->Nom,$this->Date_DebutP,$this->Date_FinP,$this->Description,$id));
            return $stmt;
        }

        //fonction permettant de Lister Par ID
        public function Lister_ID($id){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT * from programme where ID=?");
            $stmt->execute(array($id));       
            return $stmt;
            $stmt->closeCursor();
        }



        //fonction permettant d'archiver un programme
        
        public function Archiver_PR($id){
            $reponse=false;
            include('ConnectionBD.php'); 
            $stmt = $BDD->prepare("INSERT into Archive_Programme(ID,codePR,Nom,Date_DebutP,Date_FP,Description,Date_CreationP,Etat_Budget) VALUES(?,?,?,?,?,?,?,?)");
            $stmt->execute(array($this->ID,$this->CodePR,$this->Nom,$this->Date_DebutP,$this->Date_FinP,$this->Description,$this->Date_CreationP,$this->Etat_Budget));
            if($stmt){
                $reponse=true;
            }else{
                $reponse=false;
            }
            $stmt1=$BDD->prepare("DELETE from programme where ID=?");
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