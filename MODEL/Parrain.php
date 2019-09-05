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

         //fonction permettant de creer code pour un Budget
         public function genererCode(){
            include('ConnectionBD.php');
            $this->CodeP= "PAR-" . rand(100000, 999999);
            while($this->verifierCode($this->CodeP)==1){
                $this->CodeP = "PAR-" . rand(100000, 999999);        
            }
            return $this->CodeP;
      }

        //fonction permettant de verifier code
        public function verifierCode($code){
            include('ConnectionBD.php');
             $selection=$BDD->prepare("SELECT code from Parrain where code=?");
            $selection->execute(array($code));
            return $selection->rowCount();
        }

         //fonction permettant de lister les Parrain
         public function Lister_PAR(){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT * from Parrain");
            $stmt->execute();
            
            return $stmt;
            $stmt->closeCursor();
        }

        //fonction permettant de Lister Par ID
        public function Lister_ID($id){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT * from Parrain where ID=?");
            $stmt->execute(array($id));
            return $stmt;
        }

        
        //fonction permettant de verifier l'Email
        public function checkMail($email){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT email from Parrain where email=?");
            $stmt->execute(array($email));
            return $stmt->rowCount();
        }

         //fonction permettant de verifier le numero
         public function checkTel($tel){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT Telephone from Parrain where Telephone=?");
            $stmt->execute(array($tel));
            return $stmt->rowCount();
        }




    }
?>