<?php
session_start();
require_once('../MODEL/Beneficiaire.php');
$BE=new Beneficiaire("","","","","","","","","","","","","","","","","");
    if(isset($_POST['btn'])){
       $nom=htmlspecialchars($_POST['nom']);
       $prenom=htmlspecialchars($_POST['prenom']);
       $age=htmlspecialchars($_POST['age']);
       $sexe=htmlspecialchars($_POST['sexe']);
       $niveau=htmlspecialchars($_POST['niveau']);
       $statut=htmlspecialchars($_POST['statut']);
       $adresse=htmlspecialchars($_POST['adresse']);
       $zoneO=htmlspecialchars($_POST['zoneO']);
       $tel=htmlspecialchars($_POST['tel']);
        $zone=htmlspecialchars($_POST['zone']);
       $dateN=htmlspecialchars($_POST['dateN']);
       $lieu=htmlspecialchars($_POST['lieu']);
       
       if($zone=='Autre'){
           $zone=$zoneO;
       }
        $dateC=date($dateN);
       
       if(strlen($age)>2){
        $_SESSION['errP']='Age Incorrect';
        header('Location:../VIEW/tables.php');
       }else if($zone=='Autre' AND empty($zoneO)){
            $_SESSION['errP']='Veuilez Choisir ou Saisir la Zone';
            header('Location:../VIEW/tables.php'); 
       }else if(strlen($tel)!=8){
            $_SESSION['errP']='Le Numero Doit Contenir 8 Caractere';
            header('Location:../VIEW/tables.php'); 
       }else if($BE->checkTel($tel)!=0){
            $_SESSION['errP']='Le Numero Existe deja';
            header('Location:../VIEW/tables.php'); 
       }else if($dateC>date('Y-m-d')){
           $_SESSION['errP']='La date doit etre inferieur a la date du jour';
            header('Location:../VIEW/tables.php'); 
            //echo date('Y-m-d');
          
       }else{
        $_SESSION['errP']="";
        $BE-> setNom($nom);
        $BE-> setPrenom($prenom);
        $BE-> setAge($age);
        $BE-> setSexe($sexe);
        $BE-> setDate_de_Naissance($dateN);
        $BE-> setLieu_de_Naissance($lieu);
        $BE-> setNiveau_Scolaire($niveau);
        $BE-> setStatut($statut);
        $BE-> setAdresse($adresse);
        $BE-> setTelephone($tel);
        $BE-> setZone($zone);

        //echo $BE->verifierCode("");

        
        $reponse=$BE->Inscrire_Benefiaire();
        if($reponse){
            header('Location:../VIEW/ListerBeneficiaire.php');
        }
       }
    }
?>