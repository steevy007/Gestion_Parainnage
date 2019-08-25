<?php
session_start();
require_once('../MODEL/Programme.php');
$PR=new programme("","","","","","","","");
    if(isset($_POST['btn'])){
        $nom=htmlspecialchars($_POST['nom']);
        $dateP=htmlspecialchars($_POST['dateP']);
        $dateFP=htmlspecialchars($_POST['dateFP']);
        $desc=htmlspecialchars($_POST['desc']);
        
        //conversion des date pour les test
        $CdateP=date('Y-m-d',strtotime($dateP));
        $CdateFP=date('Y-m-d',strtotime($dateFP));
        if($CdateP<date("Y-m-d")){
            $_SESSION['errP']='Desole la date de debut du programme doit etre superieur a la date du jour';
            header('Location:../VIEW/icons.php');
        }else if($CdateFP<$CdateP){
            $_SESSION['errP']='Desole la date de Fin du Programme doit etre superieur a la date du debu';
            header('Location:../VIEW/icons.php');
        }else{
            $_SESSION['errP']="";
            $PR->setNom($nom);
            $PR->setDate_DebutP($dateP);
            $PR->setDate_FinP($dateFP);
            $PR->setDescription($desc);
            $reponse=$PR->creer_programme();
            if($reponse){
                header('Location:../VIEW/ListerProgramme.php');
            }
        }
    }
?>