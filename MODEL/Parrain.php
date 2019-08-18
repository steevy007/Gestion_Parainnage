<?php
    class Parrain{
        protected $IDP;
        protected $CodeP;
        protected $Type_Parrain;
        protected $Type_Parainnage;
        protected $Date_Debut_Parainnage;
        protected $Date_Cessession_Parainnage;
        protected $Date_Enregistrement;

        //constructeur de la classe Parrain
        public function __construct($IDP,$CodeP,$Type_Parrain,$Type_Parainnage,$Date_Debut_Parainnage,$Date_Cessession_Parainnage,$Date_Enregistrement){
            $this->IDP=$IDP;
            $this->CodeP=$CodeP;
            $this->Type_Parrain=$Type_Parrain;
            $this->Type_Parainnage=$Type_Parainnage;
            $this->Date_Debut_Parainnage=$Date_Debut_Parainnage;
            $this->Date_Cessession_Parainnage=$Date_Cessession_Parainnage;
            $this->Date_Enregistrement=date("Y-m-d");
        }

        //Accesseur
        public function getIDP(){return $this->IDP;}
        public function getCodeP(){return $this->CodeP;}
        public function getType_Parrain(){return $this->Type_Parrain;}
        public function getType_Parainnage(){return $this->Type_Parainnage;}
        public function getDate_Debut_Parainnage(){return $this->Date_Debut_Parainnage;}
        public function getDate_Cessession_Parainnage(){return $this->Date_Cessession_Parainnage;}
        public function getEnregistrement(){return $this->Enregistrement;}

         //fonction permettant de creer code pour un Budget
         public function genererCode(){
            require_once('ConnectionBD.php');
            while($this->verifierCode($this->codeP)==true){
                $this->codeBU = "PAR-" . rand(100000, 999999);        
            }
                $this->codeBU= "PAR-" . rand(100000, 999999);
                $stmt->closeCursor();
      }

        //fonction permettant de verifier code
        public function verifierCode($code){
            require_once('ConnectionBD.php');
             $selection="SELECT code from Parrain where code=?";
            $execution->execute(array($code));
            if($result=$execution->fetch()){
                return true;
            }else{
                return false;
            }
            $stmt->closeCursor();
        }

         //fonction permettant de lister les Parrain
         public function Lister_PAR(){
            require_once('ConnectionBD.php');
            $stmt = $BDD->("SELECT * from Parrain");
            $stmt->execute();
            $stmt->closeCursor();
            return $stmt;
        }

        //fonction permettant de Lister Par ID
        public function Lister_ID($id){
            require_once('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT * from Parrain where ID=?");
            $stmt->execute(array($id));
            $stmt->closeCursor();
            return $stmt;
        }

    }
?>