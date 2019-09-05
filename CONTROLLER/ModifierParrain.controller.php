<?php
    require_once('../MODEL/Parrain.php');
    $PA=new Parrain("","","","","","","");
    if(isset($_GET['ID'])){
    $rep=$PA->Lister_ID($_GET['ID']);
        $type="";
    if($rep){
        while($data=$rep->fetch()){
         $type=$data['Type_Parrain'];

         if($type=='Physique'){
            header("Location:../VIEW/EditParrainPhysique.php?ID=$data[ID]&Nom=$data[Nom]&Prenom=$data[Prenom]&Sexe=$data[Sexe]&Adresse=$data[Adresse]&Telephone=$data[Telephone]&Email=$data[Email]&DateD=$data[DateD]&DateF=$data[DateF]&Fax=$data[Fax]&Type=$data[Type_Parrainage]");
        }else{
            header("Location:../VIEW/EditParrainMorale.php?ID=$data[ID]&Telephone=$data[Telephone]&Email=$data[Email]&DateD=$data[DateD]&DateF=$data[DateF]&Fax=$data[Fax]&Type=$data[Type_Parrainage]&Nom=$data[Nom_Institution]&Adresse=$data[Adresse]");
         
        }

        }


    }
}
?>