<?php
    require_once('../MODEL/Evaluation.php');
    $EV=new Evaluation("","","","","","","","","","","","","");
    $reponse=$EV->Lister_ID($_GET['ID']);
    if($reponse){
        while($data=$reponse->fetch()){
            header("Location:../VIEW/EditerEvaluation.php?ID=$data[ID]&Age=$data[Age]&Poid=$data[Poid]&Hauteur=$data[Hauteur]&Perimetre=$data[Perimetr_B]&DateR=$data[Date_R]&Reference=$data[Reference]&Maladie=$data[Maladie]&Diagnostique=$data[Diagnostique]&Traitement=$data[Traitement]&Vaccin=$data[Vaccin]");
        }
    }
?>