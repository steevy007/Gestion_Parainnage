<?php
    class Evaluation{
        private $IDE;
        private $CodeE;
        private $IDB;
        private $Age;
        private $Poid;
        private $Hauteur;
        private $Perimetre_Branchial;
        private $Date_Rendez_Vous;
        private $References_Hopital;
        private $Maladie;
        private $Diagnostique;
        private $Traitement;
        private $Vaccin;

        //constructeur de la classe 
        public function __construct($IDE,$CodeE,$IDB,$Age,$Poid,$Hauteur,$Perimetre_Branchial,$Date_Rendez_Vous,$References_Hopital,$Maladie,$Diagnostique,$Traitement,$Vaccin){
            $this->IDE=$IDE;
            $this->CodeE=$CodeE;
            $this->IDB=$IDB;
            $this->Age=$Age;
            $this->Poid=$Poid;
            $this->Hauteur=$Hauteur;
            $this->Perimetre_Branchial=$Perimetre_Branchial;
            $this->Date_Rendez_Vous;
            $this->References_Hopital=$References_Hopital;
            $this->Maladie=$Maladie;
            $this->Diagnostique=$Diagnostique;
            $this->Traitement=$Traitement;
            $this->Vaccin=$Vaccin;
        }

        //Accesseur
        public function getIDE(){return $this->IDE;}
        public function getCodeE(){return $this->CodeE;}
        public function getIDB(){return $this->IDB;}
        public function getPoid(){return $this->Poid;}
        public function getAge(){return $this->Age;}
        public function getHauteur(){return $this->Hauteur;}
        public function getPerimetre_Branchial(){return $this->Perimetre_Branchial;}
        public function getDate_Rendez_Vous(){return $this->Date_Rendez_Vous;}
        public function getReferences_Hopital(){return $this->References_Hopital;}
        public function getMaladie(){return $this->Maladie;}
        public function getDiagnostique(){return $this->Diagnostique;}
        public function getTraitement(){return $this->Traitement;}
        public function getVaccin(){return $this->Vaccin;}

        //Mutateur
        public function setIDE($IDE){$this->IDE=$IDE;}
        public function setCodeE($CodeE){$this->CodeB=$CodeE;}
        public function setIDB($IDB){$this->IDB=$IDB;}
        public function setPoid($Poid){$this->Poid=$Poid;}
        public function setAge($Age){$this->Age=$Age;}
        public function setHauteur($Hauteur){$this->Hauteur=$Hauteur;}
        public function setPerimetre_Branchial($Perimetre_Branchial){$this->Perimetre_Branchial=$Perimetre_Branchial;}
        public function setDate_Rendez_Vous($Date_Rendez_Vous){$this->Date_Rendez_Vous=$Date_Rendez_Vous;}
        public function setReferences_Hopital($References_Hopital){$this->References_Hopital=$References_Hopital;}
        public function setMaladie($Maladie){$this->Maladie=$Maladie;}
        public function setDiagnostique($Diagnostique){$this->Diagnostique=$Diagnostique;}
        public function setTraitement($Traitement){$this->Traitement=$Traitement;}
        public function setVaccin($Vaccin){$this->Vaccin=$Vaccin;}


        
         //fonction permettant de creer code 
         public function genererCode(){
            include('ConnectionBD.php');
            $this->CodeE= "EV-" . rand(100000, 999999);
            while($this->verifierCode($this->CodeE)==1){
                $this->codeB = "EV-" . rand(100000, 999999);        
            }
                
            
      }

        //fonction permettant de verifier code
        public function verifierCode($code){
            include('ConnectionBD.php');
             $selection=$BDD->prepare("SELECT code from Evaluation where code=?");
            $selection->execute(array($code));
            return $selection->rowCount();
            $stmt->closeCursor();
        }

         //fonction permettant de prendre un rendez vous medicale
         public function Rendez_Vous(){
            include('ConnectionBD.php');
            $this->genererCode();
            $stmt = $BDD->prepare("INSERT into Evaluation(Code,IDB,Poid,Age,Hauteur,Perimetr_B,Date_R,Reference,Maladie,Diagnostique,Traitement,Vaccin) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute(array($this->CodeE,$this->IDB,$this->Poid,$this->Age,$this->Hauteur,$this->Perimetre_Branchial,$this->Date_Rendez_Vous,$this->References_Hopital,$this->Maladie,$this->Diagnostique,$this->Traitement,$this->Vaccin));
            $stmt->closeCursor();
            return $stmt;
        }

           //fonction permettant de lister les Evaluation
           public function Lister_EVA(){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT * from Evaluation");
            $stmt->execute();
            return $stmt;
            $stmt->closeCursor();
        }


        //fonction permettant de verifier si evaluation est deja prise
        public function Verifier_IDB($code){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT IDB from Evaluation where IDB=?");
            $stmt->execute(array($code));
            return $stmt->rowCount();
            $stmt->closeCursor();
        }

              //fonction permettant de modifier un Evaluation
              public function Modifier_EV($id){
                include('ConnectionBD.php');
                $stmt = $BDD->prepare("UPDATE Evaluation set Poid=?,Age=?,Hauteur=?,Perimetr_B=?,Date_R=?,Reference=?,Maladie=?,Diagnostique=?,Traitement=?,Vaccin=?   where ID=?");
                $stmt->execute(array($this->Poid,$this->Age,$this->Hauteur,$this->Perimetre_Branchial,$this->Date_Rendez_Vous,$this->References_Hopital,$this->Maladie,$this->Diagnostique,$this->Traitement,$this->Vaccin,$id));
                return $stmt;
            }
    
             //fonction permettant de Lister Par ID
             public function Lister_ID($id){
                include('ConnectionBD.php');
                $stmt = $BDD->prepare("SELECT * from Evaluation where ID=?");
                $stmt->execute(array($id));
                return $stmt;
            }


            
        //fonction permettant d'archiver un Evaluation
        public function Archiver_BE($id){
            $reponse=false;
            include('ConnectionBD.php'); 
            $stmt = $BDD->prepare("INSERT into archive_evaluation(ID,Code,IDB,Poid,Age,Hauteur,Perimetr_B,Date_R,Reference,Maladie,Diagnostique,Traitement,Vaccin) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute(array($this->IDE,$this->CodeE,$this->IDB,$this->Poid,$this->Age,$this->Hauteur,$this->Perimetre_Branchial,$this->Date_Rendez_Vous,$this->References_Hopital,$this->Maladie,$this->Diagnostique,$this->Traitement,$this->Vaccin));
            if($stmt){
                $reponse=true;
            }else{
                $reponse=false;
            }
            $stmt1=$BDD->prepare("DELETE from Evaluation where ID=?");
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