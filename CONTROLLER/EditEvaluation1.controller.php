<?php
session_start();
require_once('../MODEL/Evaluation.php');
$EV=new Evaluation("","","","","","","","","","","","","");
    if(isset($_POST['btn'])){
       $age=htmlspecialchars($_POST['age']);
       $poid=htmlspecialchars($_POST['poid']);
       $hauteur=htmlspecialchars($_POST['hauteur']);
       $perimetre=htmlspecialchars($_POST['perimetre']);
       $dateR=htmlspecialchars($_POST['dateR']);
       $reference=htmlspecialchars($_POST['reference']);
       $maladie=htmlspecialchars($_POST['maladie']);
       $diagnostique=htmlspecialchars($_POST['diagnostique']);
       $traitement=htmlspecialchars($_POST['traitement']);
       $vaccin=htmlspecialchars($_POST['vaccin']);
       $id=htmlspecialchars($_POST['ID']);
        $dateC=date($dateR);
       

       if($age<0 OR strlen($age)>2){
        $_SESSION['errP']='Veuillez Saisir une age Correct';
        header('Location:../VIEW/Consultation.php');
       }else if($poid<0 or strlen($poid)>3){
        $_SESSION['errP']='Veuillez Saisir le poid  Correct';
        header('Location:../VIEW/Consultation.php');
       }else if($hauteur<0 or $hauteur>3){
        $_SESSION['errP']='Veuillez Saisir une hauteur Correct';
        header('Location:../VIEW/Consultation.php');
       }else if($perimetre<0 or strlen($perimetre)>3){
        $_SESSION['errP']='Veuillez Saisir une Perimetre Correct';
        header('Location:../VIEW/Consultation.php');
       }else if($dateC<date('Y-m-d')){
        $_SESSION['errP']='date Rendez Vous Incorrect';
        header('Location:../VIEW/Consultation.php');
       }else{
         $_SESSION['errP']="";
        $EV->setPoid($poid);
        $EV->setAge($age);
        $EV->setHauteur($hauteur);
        $EV->setPerimetre_Branchial($perimetre);
        $EV->setDate_Rendez_Vous($dateR);
        $EV->setReferences_Hopital($reference);
        $EV->setMaladie($maladie);
        $EV->setDiagnostique($diagnostique);
        $EV->setTraitement($traitement);
        $EV->setVaccin($vaccin);

        $reponse=$EV->Modifier_EV($id);
        
        if($reponse){
            header('Location:../VIEW/ListerConsultation.php');
        }

       }
    }
?>