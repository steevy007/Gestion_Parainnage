<?php
session_start();
require_once('../MODEL/Parrain_Morale.php');
require_once('../MODEL/Parrain.php');
    $PAR=new Parrain("","","","","","","","");
    $PAR_M=new ParrainM("","","","","","","","","","","","","","","");
    if(isset($_POST['btn'])){
        $nom=htmlspecialchars($_POST['nom']);
        $adresse=htmlspecialchars($_POST['adresse']);
        $telephone=htmlspecialchars($_POST['tel']);
        $email=htmlspecialchars($_POST['mail']);
        $fax=htmlspecialchars($_POST['fax']);
        $dateD=htmlspecialchars($_POST['dateD']);
        $dateF=htmlspecialchars($_POST['dateF']);
        $type=htmlspecialchars($_POST['type']);
        $id=htmlspecialchars($_POST['ID']);

        $dateDC=date($dateD);
        $dateFC=date($dateF);
        if($dateDC<date('Y-m-d')){
            $_SESSION['err']='La date de debut du parrainage ne doit pas etre inferieur a la date du jour ';
            header("Location:../VIEW/EditParrainMorale.php?ID=$id&Nom=$nom&Prenom=$prenom&Sexe=$sexe&Adresse=$adresse&Telephone=$telephone&Email=$email&DateD=$dateD&DateF=$dateF&Fax=$fax&Type=$type");
        }else if($dateFC<$dateDC){
            $_SESSION['err']='La date de fin parrainnage ne doit pas etre inferieur a la date de debut ';
            header('Location:../VIEW/ParrainPhysique.php');
        }else if(strlen($telephone)!=8){
            $_SESSION['err']='Le numero doit avoir 8 chiffre';
            header('Location:../VIEW/ParrainPhysique.php');
        }else{
            $_SESSION['err']="";
            $PAR_M->setType_Parrain('Morale');
            $PAR_M->setType_Parainnage($type);
            $PAR_M->setDate_Debut_Parainnage($dateD);
            $PAR_M->setDate_Cessession_Parainnage($dateF);

            //echo $PAR->getType_Parainnage();
            $PAR_M->setNom_Institution($nom);
            //echo $PAR_P->getNom();
            $PAR_M->setAdresse($adresse);
            $PAR_M->setTelehone($telephone);
            $PAR_M->setEmail($email);
            $PAR_M->setFax($fax);

            $reponse=$PAR_M->Modifier_PARP($id);

            if($reponse){
               header('Location:../VIEW/ListerParrain.php');
            }


        }
    }
?>