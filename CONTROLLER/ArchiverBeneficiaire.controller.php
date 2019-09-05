<?php
       require_once('../MODEL/Beneficiaire.php');
       $BE=new Beneficiaire("","","","","","","","","","","","","","","","","");
       $reponse=$BE->Lister_BE($_GET['ID']);
       if($reponse){
          while($data=$reponse->fetch()){
              $BE->setIDB($data['ID']);
              $BE->setCodeB($data['CodeB']);
              $BE->setNom($data['Nom']);
              $BE->setPrenom($data['Prenom']);
              $BE->setAge($data['Age']);
              $BE->setSexe($data['Sexe']);
              $BE->setDate_de_Naissance($data['Date_de_Naissance']);
              $BE->setLieu_de_Naissance($data['Lieu_de_Naissance']);
              $BE->setNiveau_Scolaire($data['Niveau_Scolaire']);
              $BE->setStatut($data['Statut']);
              $BE->setAdresse($data['Adresse']);
              $BE->setTelephone($data['Telephone']);
              $BE->setZone($data['Zone']);
          }

          $reponse=$BE->Archiver_BE($_GET['ID']);
          if($reponse){
              header('Location:../VIEW/ListerBeneficiaire.php');
          }
       }
?>