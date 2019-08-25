<?php
require_once('../MODEL/Programme.php');
$PR=new programme("","","","","","","","");
    if(isset($_GET['ID'])){
        $reponse=$PR->Lister_ID($_GET['ID']);
        while($data=$reponse->fetch()){
            header("Location:../VIEW/EditerProgramme.php?ID=$data[ID]&Nom=$data[Nom]&dateP=$data[date_DebutP]&dateFP=$data[date_FP]&desc=$data[Description]");;
        }
    }
?>