<?php
    session_start();
    require_once('../MODEL/Budget.php');
    $BU=new Budget("","","","","","","","");
    if(isset($_POST['btn'])){
        $Mnt=htmlspecialchars($_POST['montant']);
        $Devise=htmlspecialchars($_POST['devise']);
        $DateD=htmlspecialchars($_POST['dateD']);
        $DateF=htmlspecialchars($_POST['dateF']);
        $desc=htmlspecialchars($_POST['desc']);
        $ID=htmlspecialchars($_POST['ID']);
        $dateDC=date($DateD);
        $dateFC=date($DateF);
        if($Mnt<0){
            $_SESSION['errP']='Montant incorrect';
            header("Location:../VIEW/EditBudget.php?ID=$ID&Montant=$Mnt&DateD=$DateD&DateF=$DateF&Devise=$Devise&Description=$desc");
        }else if($dateDC<date('Y-m-d')){
            $_SESSION['errP']='La date de debut doit etre superieur a la date du jour';
            header('Location:../VIEW/maps.php');
        }else if($dateFC<$dateDC){
            $_SESSION['errP']='La date de Fin doit etre superieur a la date du debut';
            header('Location:../VIEW/maps.php');
        }else{
            $_SESSION['errP']='';
            $BU->setMontant($Mnt);
            $BU->setDevise($Devise);
            $BU->setDate_DebutBU($DateD);
            $BU->setDate_FinBU($DateF);
            $BU->setDescription($desc);
            
            $rep=$BU->Modifier_BU($ID);
            if($rep){
                header('Location:../VIEW/ListerBudget.php');
            }
        }
    }
?>