<?php
    require_once('../MODEL/Beneficiaire.php');
    $BE=new Beneficiaire("","","","","","","","","","","","","","","","","");
    $reponse=$BE->Lister_BE($_GET['ID']);
    if($reponse){
        while($data=$reponse->fetch()){
            header("Location:../VIEW/EditerBeneficiaire.php?IDB=$data[ID]&Zone=$data[Zone]&cel=$data[Telephone]&LieuN=$data[Lieu_de_Naissance]&dateN=$data[Date_de_Naissance]&Nom=$data[Nom]&Prenom=$data[Prenom]&Sexe=$data[Sexe]&Age=$data[Age]&Niveau=$data[Niveau_Scolaire]&Statut=$data[Statut]&Adresse=$data[Adresse]");
        }
    }
?>