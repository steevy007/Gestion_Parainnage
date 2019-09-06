<?php
    session_start();
    require_once('../MODEL/Budget.php');
    $BU=new Budget("","","","","","","","");
    if(isset($_POST['btn'])){
        $Codep=htmlspecialchars($_POST['codeP']);
        $Mnt=htmlspecialchars($_POST['montant']);
        $Devise=htmlspecialchars($_POST['devise']);
        $DateD=htmlspecialchars($_POST['dateD']);
        $DateF=htmlspecialchars($_POST['dateF']);
        $desc=htmlspecialchars($_POST['desc']);
        $IDP=$BU->GetIDPR($Codep);
        $dateDC=date($DateD);
        $dateFC=date($DateF);
        if($Mnt<0){
            $_SESSION['errP']='Montant incorrect';
            header('Location:../VIEW/maps.php');
        }else if($dateDC<date('Y-m-d')){
            $_SESSION['errP']='La date de debut doit etre superieur a la date du jour';
            header('Location:../VIEW/maps.php');
        }else if($dateFC<$dateDC){
            $_SESSION['errP']='La date de Fin doit etre superieur a la date du debut';
            header('Location:../VIEW/maps.php');
        }else{
            $_SESSION['errP']='';
            $BU->setIDP($IDP);
            $BU->setMontant($Mnt);
            $BU->setDevise($Devise);
            $BU->setDate_DebutBU($DateD);
            $BU->setDate_FinBU($DateF);
            $BU->setDescription($desc);
            
            $rep=$BU->Allouer_BU();
            if($rep){
                header('Location:../VIEW/ListerBudget.php');
            }
        }
    }
?>