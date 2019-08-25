<?php
session_start();
require_once('../MODEL/Programme.php');
$PR=new programme("","","","","","","","");
        if(isset($_POST['btn'])){
            $nom=htmlspecialchars($_POST['nom']);
            $dateP=htmlspecialchars($_POST['dateP']);
            $dateFP=htmlspecialchars($_POST['dateFP']);
            $desc=htmlspecialchars($_POST['desc']);
            $ID=htmlspecialchars($_POST['ID']);
            //conversion des date pour les test
            $CdateP=date('Y-m-d',strtotime($dateP));
            $CdateFP=date('Y-m-d',strtotime($dateFP));
            if($CdateP<date("Y-m-d")){
                $_SESSION['errP']='Desole la date de debut du programme doit etre superieur a la date du jour';
                header("Location:../VIEW/EditerProgramme.php?ID=$ID&Nom=$nom&dateP=$dateP&dateFP=$dateFP&desc=$desc");
            }else if($CdateFP<$CdateP){
                $_SESSION['errP']='Desole la date de Fin du Programme doit etre superieur a la date du debut';
                header("Location:../VIEW/EditerProgramme.php?ID=$ID&Nom=$nom&dateP=$dateP&dateFP=$dateFP&desc=$desc");
            }else{
                $_SESSION['errP']="";
                $PR->setNom($nom);
                $PR->setDate_DebutP($dateP);
                $PR->setDate_FinP($dateFP);
                $PR->setDescription($desc);
                $reponse=$PR->Modifier_PR($ID);
                if($reponse){
                    header('Location:../VIEW/ListerProgramme.php');
                }
            }
        }
?>