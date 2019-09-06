<?php
require_once('../MODEL/Budget.php');
$BU=new Budget("","","","","","","","");
if(isset($_GET['ID'])){
    $rep=$BU->Lister_ID($_GET['ID']);
    while($data=$rep->fetch()){
        header("Location:../VIEW/EditBudget.php?ID=$_GET[ID]&Montant=$data[Montant]&DateD=$data[DateD]&DateF=$data[DateF]&Devise=$data[Devise]&Description=$data[Description]");
    }
}
?>