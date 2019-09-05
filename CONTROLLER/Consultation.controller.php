<?php
session_start();
require_once('../MODEL/Evaluation.php');
$EV=new Evaluation("","","","","","","","","","","","","");
    if(isset($_POST['btn'])){
       $code=htmlspecialchars($_POST['code']);
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
        $dateC=date($dateR);
       
        require_once('../MODEL/Beneficiaire.php');
        $BE=new Beneficiaire("","","","","","","","","","","","","","","","","");
        $reponse=$BE->Lister_BENC($code);
        $ID="";
        if($reponse){
            while($data=$reponse->fetch()){
                $ID=$data['ID'];
            }
        }

       if($EV->Verifier_IDB($ID)>0){
        $_SESSION['errP']='Ce Beneficiaire a deja pris un rendez-Vous';
        header('Location:../VIEW/Consultation.php');
       }else if($age<0 OR strlen($age)>2){
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
        
        
        $EV->setIDB($ID);
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

        $reponse=$EV->Rendez_Vous();

        if($reponse){
            header('Location:../VIEW/ListerConsultation.php');
        }else{
            echo 'pas de rendez vous';
        }

       }
    }
?>