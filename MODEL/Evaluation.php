<?php
    class Evaluation{
        private $IDE;
        private $CodeE;
        private $IDB;
        private $Age;
        private $Poid
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
            require_once('ConnectionBD.php');
            while($this->verifierCode($this->codeE)==true){
                $this->codeB = "EV-" . rand(100000, 999999);        
            }
                $this->codeB= "EV-" . rand(100000, 999999);
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

         //fonction permettant de prendre un rendez vous medicale
         public function Rendez_Vous(){
            require_once('ConnectionBD.php');
            $stmt = $BDD->prepare("INSERT into Evaluation(CodeE,IDB,Poid,Age,Hauteur,Perimetre_Branchial,Date_Rendez_Vous,References_Hopital,Maladie,Diagnostique,Traitement,Vaccin) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute(array($this->CodeE,$this->IDB,$this->Poid,$this->Age,$this->Hauteur,$this->Perimetre_Branchial,$this->Date_Rendez_Vous,$this->References_Hopital,$this->Maladie,$this->Diagnostique,$this->Traitement,$this->Vaccin));
            $stmt->closeCursor();
            return $stmt;
        }

           //fonction permettant de lister les Evaluation
           public function Lister_EVA(){
            require_once('ConnectionBD.php');
            $stmt = $BDD->("SELECT * from Evaluation");
            $stmt->execute();
            $stmt->closeCursor();
            return $stmt;
        }

              //fonction permettant de modifier un Evaluation
              public function Modifier_BEN($id){
                require_once('ConnectionBD.php');
                $stmt = $BDD->prepare("UPDATE Beneficiaire set Poid=?,Age=?,Hauteur=?,Perimetre_Branchial=?,Date_Rendez_Vous=?,References_Hopital=?,Maladie=?,Diagnostique=?,Traitement=?,Vaccin=?   where ID=?");
                $stmt->execute(array($this->Poid,$this->Age,$this->Hauteur,$this->Perimetre_Branchial,$this->Date_Rendez_Vous,$this->References_Hopital,$this->Maladie,$this->Diagnostique,$this->Traitement,$this->Vaccin,$id));
                return $stmt;
            }
    
             //fonction permettant de Lister Par ID
             public function Lister_ID($id){
                require_once('ConnectionBD.php');
                $stmt = $BDD->prepare("SELECT * from Evaluation where ID=?");
                $stmt->execute(array($id));
                $stmt->closeCursor();
                return $stmt;
            }
    }
?>