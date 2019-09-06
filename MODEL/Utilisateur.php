<?php
    class Utilisateur{
        private $IDU;
        private $Nom;
        private $Email;
        private $Type_User;
        private $Etat_Compte;
        private $Password;
        //Constructeur de la classe Utilisateur
        public function __construct($IDU,$Nom,$Email,$Type_User,$Etat_Compte,$Password){
            $this->IDU=$IDU;
            $this->Nom=$Nom;
            $this->Prenom=$Email;
            $this->Type_User='Secretaire';
            $this->Etat_Compte='Actif';
            $this->Password=$Password;
        }


        //Accesseur
        public function getIDU(){return $this->IDU;}
        public function getNom(){return $this->Nom;}
        public function getEmail(){return $this->Email;}
        public function getType_User(){return $this->Type_User;}
        public function getEtat_Compte(){return $this->Etat_Compte;}
        public function getPassword(){return $this->Password;}

        //Mutateur
        public function setIDU($IDU){$this->IDU=$IDU;}
        public function setNom($Nom){$this->Nom=$Nom;}
        public function setEmail($Email){$this->Email=$Email;}
        public function setType_User($Type_User){$this->Type_User=$Type_User;}
        public function setEtat_Compte($Etat_Compte){$this->Etat_Compte=$Etat_Compte;}
        public function setPassword($Password){$this->Password=$Password;}

        //Methode Permettant a un user de se connecter
        public function Connecter(){
            include('ConnectionBD.php');
            $stmt=$BDD->prepare("SELECT * from Utilisateur where Email=? AND Password=? AND Etat_Compte=?");
            $stmt->execute(array($this->Email,$this->Password,'Actif'));
            return $stmt;       
        }

        //methode permettant d'inscrire un secretaire
        public function Inscrire_Secretaire(){
            include('ConnectionBD.php');
            $stmt=$BDD->prepare("INSERT INTO Utilisateur (Nom,Email,Password,Type_User,Etat_Compte) VALUES(?,?,?,?,?) ");
            $stmt->execute(array($this->Nom,$this->Email,$this->Password,$this->Type_User,$this->Etat_Compte));
            $stmt->closeCursor();
            return $stmt;
        }
          //methode permettantd Tester l'existence d un mail
          public function Check_Mail($mail){
            include('ConnectionBD.php');
            $stmt=$BDD->prepare("SELECT * from Utilisateur where Email=?");
            $stmt->execute(array($mail));
            return $stmt->rowCount();
        }
        //methode permettantd de lister les utilisateur
        public function List_User(){
            include('ConnectionBD.php');
            $stmt=$BDD->prepare('SELECT * from Utilisateur');
            $stmt->execute();
            return $stmt;
        }
    }
?>
