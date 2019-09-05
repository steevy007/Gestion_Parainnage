<?php
      require_once('../MODEL/Evaluation.php');
      $EV=new Evaluation("","","","","","","","","","","","","");
      $reponse=$EV->Lister_ID($_GET['ID']);
      if($reponse){
         while($data=$reponse->fetch()){
                $EV->setIDE($data['ID']);
                $EV->setCodeE($data['Code']);
                $EV->setIDB($data['IDB']);
                $EV->setPoid($data['Poid']);
                $EV->setAge($data['Age']);
                $EV->setHauteur($data['Hauteur']);
                $EV->setPerimetre_Branchial($data['Perimetr_B']);
                $EV->setDate_Rendez_Vous($data['Date_R']);
                $EV->setReferences_Hopital($data['Reference']);
                $EV->setMaladie($data['Maladie']);
                $EV->setDiagnostique($data['Diagnostique']);
                $EV->setTraitement($data['Traitement']);
                $EV->setVaccin($data['Vaccin'])      ;
         }

         $reponse=$EV->Archiver_BE($_GET['ID']);

         if($reponse){
             header('Location:../VIEW/ListerConsultation.php');
         }
      }
?>;