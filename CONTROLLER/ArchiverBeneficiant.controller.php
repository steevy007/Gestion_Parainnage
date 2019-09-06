<?php
       require_once('../MODEL/Beneficiaire.php');
       
       $BE=new Beneficiaire("","","","","","","","","","","","","","","","","");
        if(isset($_GET['ID'])){
            $reponse=$BE->Lister_BeneficiantID($_GET['ID']);
            while($data=$reponse->fetch()){
                $BE->setIDB($data['IDB']);
                $BE->setIDP($data['IDP']);
                $BE->setDate_Entree_Programme($data['DateE']);
                $BE->setDate_Sortie_Programme($data['DateS']);
            }
            $rep=$BE->Archiver_Beneficiant($_GET['ID']);
            if($rep){
                header('Location:../VIEW/ListerBeneficiant.php');
            }
        }
?>