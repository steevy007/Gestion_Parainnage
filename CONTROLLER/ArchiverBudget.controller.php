<?php
    require_once('../MODEL/Budget.php');
    $BU=new Budget("","","","","","","","");
    if(isset($_GET['ID'])){
        $rep=$BU->Lister_ID($_GET['ID']);
        if($rep){
            while($data=$rep->fetch()){
                $BU->setID($data['ID']);
                $BU->setCodeBU($data['Code']);
                $BU->setIDP($data['IDP']);
                $BU->setMontant($data['Montant']);
                $BU->setDevise($data['Devise']);
                $BU->setDate_DebutBU($data['DateD']);
                $BU->setDate_FinBU($data['DateF']);
                $BU->setDescription($data['Description']);
    
            }

            $rep1=$BU->Archiver_BU($_GET['ID']);
            if($rep1){
                header('Location:../VIEW/ListerBudget.php');
            }
        }
    }
?>