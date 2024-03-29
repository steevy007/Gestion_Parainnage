<?php
    class Beneficiaire{
        private $IDB;
        private $CodeB;
        private $IDPR;
        private $IDP;
        private $Nom;
        private $Prenom;
        private $Age;
        private $Sexe;
        private $Date_de_Naissance;
        private $Lieu_de_Naissance;
        private $Date_Entree_Programme;
        private $Niveau_Scolaire;
        private $Date_Sortie_Programme;
        private $Statut;
        private $Adresse;
        private $Telephone;
        private $Zone;

        //constructeur de la classe Beneficiaire
        public function __construct($IDB,$CodeB,$IDPR,$IDP,$Nom,$Prenom,$Age,$Sexe,$Date_de_Naissance,$Lieu_de_Naissance,$Date_Entree_Programme,$Niveau_Scolaire,$Date_Sortie_Programme,$Statut,$Adresse,$Telephone,$Zone){
            $this->IDB=$IDB;
            $this->CodeB=$CodeB;
            $this->IDPR=$IDPR;
            $this->IDP=$IDP;
            $this->Nom=$Nom;
            $this->Premom=$Prenom;
            $this->Age=$Age;
            $this->Sexe=$Sexe;
            $this->Date_de_Naissance=$Date_de_Naissance;
            $this->Lieu_de_Naissance=$Lieu_de_Naissance;
            $this->Date_Entree_Programme=date("Y-m-d");
            $this->Niveau_Scolaire=$Niveau_Scolaire;
            $this->Date_Sortie_Programme=$Date_Sortie_Programme;
            $this->Statut=$Statut;
            $this->Adresse=$Adresse;
            $this->Telephone=$Telephone;
            $this->Zone=$Zone;
        }

        //Accesseur
        public function getIDB(){return $this->IDB;}
        public function getCodeB(){return $this->CodeB;}
        public function getIDPR(){return $this->IDPR;}
        public function getIDP(){return $this->IDP;}
        public function getNom(){return $this->Nom;}
        public function getPrenom(){return $this->Prenom;}
        public function getAge(){return $this->Age;}
        public function getSexe(){return $this->Sexe;}
        public function getDate_de_Naissance(){return $this->Date_de_Naissance;}
        public function getLieu_de_Naissance(){return $this->Lieu_de_Naissance;}
        public function getDate_Entree_Programme(){return $this->Date_Entree_Programme;}
        public function getNiveau_Scolaire(){return $this->Niveau_Scolaire;}
        public function getDate_Sortie_Programme(){return $this->Date_Sortie_Programme;}
        public function getStatut(){return $this->Statut;}
        public function getAdresse(){return $this->Adresse;}
        public function getTelephone(){return $this->Telephone;}
        public function getZone(){return $this->Zone;}
       
        //Mutateur
        public function setIDB($IDB){$this->IDB=$IDB;}
        public function setCodeB($CodeB){$this->CodeB=$CodeB;}
        public function setIDPR($IDPR){$this->IDPR=$IDPR;}
        public function setIDP($IDP){$this->IDP=$IDP;}
        public function setNom($Nom){$this->Nom=$Nom;}
        public function setPrenom($Prenom){$this->Prenom=$Prenom;}
        public function setAge($Age){$this->Age=$Age;}
        public function setSexe($Sexe){$this->Sexe=$Sexe;}
        public function setDate_de_Naissance($Date_de_Naissance){$this->Date_de_Naissance=$Date_de_Naissance;}
        public function setLieu_de_Naissance($Lieu_de_Naissance){$this->Lieu_de_Naissance=$Lieu_de_Naissance;}
        public function setDate_Entree_Programme($Date_Entree_Programme){$this->Date_Entree_Programme=$Date_Entree_Programme;}
        public function setNiveau_Scolaire($Niveau_Scolaire){$this->Niveau_Scolaire=$Niveau_Scolaire;}
        public function setDate_Sortie_Programme($Date_Sortie_Programme){$this->Date_Sortie_Programme=$Date_Sortie_Programme;}
        public function setStatut($Statut){$this->Statut=$Statut;}
        public function setAdresse($Adresse){$this->Adresse=$Adresse;}
        public function setTelephone($Telephone){$this->Telephone=$Telephone;}
        public function setZone($Zone){$this->Zone=$Zone;}

         //fonction permettant de creer code pour un Beneficiaire
        public function genererCode(){
            include('ConnectionBD.php');
            $this->CodeB = "BEN-" . rand(100000, 999999);      
            while($this->verifierCode($this->CodeB)==1){
                $this->codeB = "BEN-" . rand(100000, 999999);        
            }
      
      }

        //fonction permettant de verifier code
        public function verifierCode($code){
            include('ConnectionBD.php');
             $selection=$BDD->prepare("SELECT CodeB from Beneficiaire where CodeB=?");
            $selection->execute(array($code));
            return $selection->rowCount();
            $stmt->closeCursor();
        }

         //fonction permettant de faire une demande d'inscription a un programme
         public function Demande_Inscription(){
            include('ConnectionBD.php');    
            $stmt = $BDD->prepare("INSERT into Beneficiaire(CodeB,IDPR,IDP,Nom,Prenom,Age,Sexe,Date_de_Naissance,Lieu_de_Naissance,Date_Entree_Programme,Niveau_Scolaire,Date_Sortie_Programme,Statut,Adresse,Telephone,Zone) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute(array($this->CodeB,$this->IDPR,$this->IDP,$this->Nom,$this->Prenom,$this->Age,$this->Sexe,$this->Date_de_Naissance,$this->Date_Entree_Programme,$this->Niveau_Scolaire,$this->Date_Sortie_Programme,$this->Statut,$this->Adresse,$this->Telephone,$this->Zone));
            $stmt->closeCursor();
            return $stmt;
        }

         //fonction permettant d'inscrire un beneficiare dans ONG
         public function Inscrire_Benefiaire(){
            include('ConnectionBD.php');
            $this->genererCode();
            $stmt = $BDD->prepare("INSERT into Beneficiaire(CodeB,Nom,Prenom,Age,Sexe,Date_de_Naissance,Lieu_de_Naissance,Niveau_Scolaire,Statut,Adresse,Telephone,Zone) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute(array($this->CodeB,$this->Nom,$this->Prenom,$this->Age,$this->Sexe,$this->Date_de_Naissance,$this->Lieu_de_Naissance,$this->Niveau_Scolaire,$this->Statut,$this->Adresse,"+509".$this->Telephone,$this->Zone));
            return $stmt;
         
        }

        //inscrire Beneficiant
        public function Inscrire_Beneficiant(){
            include('ConnectionBD.php');
            $stmt=$BDD->prepare('INSERT into Beneficiant(IDB,IDP,DateE,DateS) values(?,?,?,?)');
            $stmt->execute(array($this->IDB,$this->IDP,$this->Date_Entree_Programme,$this->Date_Sortie_Programme));
            return $stmt;
            $stmt->closeCursor();
        }

        //fonction permettant de lister les bBeneficiaire
        public function Lister_Beneficiant(){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT * from Beneficiant");
            $stmt->execute();
            return $stmt;
            $stmt->closeCursor();
        }

        public function Lister_BeneficiantID($ID){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT * from Beneficiant WHERE ID=?");
            $stmt->execute(array($ID));
            return $stmt;
            $stmt->closeCursor();
        }

        public function Lister_Beneficiant1(){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("select * from beneficiant inner join beneficiaire inner join programme on beneficiant.IDB=beneficiaire.ID AND beneficiant.IDP=programme.ID");
            $stmt->execute();
            return $stmt;
            $stmt->closeCursor();
        }

       

        public function Lister_BEN(){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT * from Beneficiaire");
            $stmt->execute();
            return $stmt;
            $stmt->closeCursor();
        }

        public function Lister_BEN1(){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT * from Beneficiaire where Etat_Evaluation=?");
            $stmt->execute(array('NON DEFINI'));
            return $stmt;
            $stmt->closeCursor();
        }

        public function Lister_BEN2(){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT CodeB from Beneficiaire where Etat_Evaluation=?");
            $stmt->execute(array('DEFINI'));
            return $stmt;
            $stmt->closeCursor();
        }

        public function Find_ID($code){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT ID from Beneficiaire where CodeB=?");
            $stmt->execute(array($code));
            while($data=$stmt->fetch()){
                return $data['ID'];
            }
        }
        
        public function Verif_BEN($IDB,$IDP){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT * from Beneficiant where IDB=? AND IDP=?");
            $stmt->execute(array($IDB,$IDP));
            return $stmt->rowCount();
            $stmt->closeCursor();
        }
        

         //fonction permettant de lister les bBeneficiaire avec Code
         public function Lister_BENC($code){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT * from Beneficiaire Where CodeB=?");
            $stmt->execute(array($code));
            return $stmt;
            $stmt->closeCursor();
        }

        //fonction permettant de tester l'existence du numero du beneficiaire
        public function checkTel($number){
            include('ConnectionBD.php');
            $stmt=$BDD->prepare("SELECT Telephone from Beneficiaire where Telephone=?");
            $stmt->execute(array($number));
            $stmt->closeCursor();
            return $stmt->rowCount();
        }
        //fonction permettant de modifier un Beneficiaire
        public function Modifier_BEN($id){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("UPDATE Beneficiaire set Nom=?,Prenom=?,Age=?,Sexe=?,Date_de_Naissance=?,Lieu_de_Naissance=?,Niveau_Scolaire=?,Statut=?,Adresse=?,Telephone=?,Zone=?  where ID=?");
            $stmt->execute(array($this->Nom,$this->Prenom,$this->Age,$this->Sexe,$this->Date_de_Naissance,$this->Lieu_de_Naissance,$this->Niveau_Scolaire,$this->Statut,$this->Adresse,$this->Telephone,$this->Zone,$id));
            return $stmt;
        }

         //fonction permettant de Lister Par ID
         public function Lister_BE($id){
            include('ConnectionBD.php');
            $stmt = $BDD->prepare("SELECT * from Beneficiaire where ID=?");
            $stmt->execute(array($id));
            return $stmt;
            $stmt->closeCursor();
        }

        //fonction permettant d'archiver un Beneficiaire
        public function Archiver_BE($id){
            $reponse=false;
            include('ConnectionBD.php'); 
            $stmt = $BDD->prepare("INSERT into Archive_Beneficiaire(ID,CodeB,Nom,Prenom,Age,Sexe,Date_de_Naissance,Lieu_de_Naissance,Niveau_Scolaire,Statut,Adresse,Telephone,Zone) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->execute(array($this->IDB,$this->CodeB,$this->Nom,$this->Prenom,$this->Age,$this->Sexe,$this->Date_de_Naissance,$this->Lieu_de_Naissance,$this->Niveau_Scolaire,$this->Statut,$this->Adresse,$this->Telephone,$this->Zone));
            if($stmt){
                $reponse=true;
            }else{
                $reponse=false;
            }
            $stmt1=$BDD->prepare("DELETE from Beneficiaire where ID=?");
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

        public function Archiver_Beneficiant($id){
            $reponse=false;
            include('ConnectionBD.php'); 
            $stmt=$BDD->prepare('INSERT into archive_Beneficiant(ID,IDB,IDP,DateE,DateS) values(?,?,?,?,?)');
            $stmt->execute(array($id,$this->IDB,$this->IDP,$this->Date_Entree_Programme,$this->Date_Sortie_Programme));
            if($stmt){
                $reponse=true;
            }else{
                $reponse=false;
            }
            $stmt1=$BDD->prepare("DELETE from Beneficiant where ID=?");
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