<?php
session_start();
   require_once('../MODEL/Beneficiaire.php');
   require_once('../MODEL/Programme.php');
   
   $BE=new Beneficiaire("","","","","","","","","","","","","","","","","");
   $PR=new programme("","","","","","","","");
    $codeB=htmlspecialchars($_POST['CodeB']);
    $codeP=htmlspecialchars($_POST['CodeP']);
   if(isset($_POST['btn'])){
    $IDB=$BE->Find_ID($codeB);
    $IDP=$PR->Find_ID($codeP);
    $DateS=$PR->Find_DateS($codeP);

    if($BE->Verif_BEN($IDB,$IDP)>0){
        $_SESSION['errP']='Desole ce beneficiaire est deja inscrit a ce programme';
        header('Location:../VIEW/inscBeneficiant.php');
    }else{
        $_SESSION['errP']='';
        $BE->setIDB($IDB);
        $BE->setIDP($IDP);
        $BE->setDate_Sortie_Programme($DateS);

        $rep=$BE->Inscrire_Beneficiant();
        if($rep){
            header('Location:../VIEW/ListerBeneficiant.php');
        }
    }
   }
?>