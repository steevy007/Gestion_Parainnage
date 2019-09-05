<?php
    require_once('../MODEL/Parrain.php');
    require_once('../MODEL/Parrain_Physique.php');
    require_once('../MODEL/Parrain_Morale.php');
   
    $PR=new Parrain("","","","","","","");
    $ID=$_GET['ID'];
   
    $reponse=$PR->Lister_ID($ID);
    $type="";
    if($reponse){
        while($data=$reponse->fetch()){
            $type=$data['Type_Parrain'];                
        if($type=='Morale'){
            $PRM=new ParrainM("","","","","","","","","","","","");
            $PRM-> setIDP($data['ID']);
            $PRM-> setCodeP($data['Code']);
            $PRM-> setType_Parrain($type);
            $PRM-> setType_Parainnage($data['Type_Parrainage']);
            $PRM-> setDate_Debut_Parainnage($data['DateD']);
            $PRM-> setDate_Cessession_Parainnage($data['DateF']);
            $PRM-> setEnregistrement($data['Date_Enr']);
            $PRM-> setNom_Institution($data['Nom_Institution']);
            $PRM-> setAdresse($data['Adresse']);
            $PRM-> setTelehone($data['Telephone']);
            $PRM-> setEmail($data['Email']);
            $PRM-> setFax($data['Fax']);
            $reponse=$PRM->Archiver($ID);
            if($reponse){
                header('Location:../VIEW/ListerParrain.php');
            }
           
        }else if($type=='Physique'){
            $PRP=new Parrain_P("","","","","","","","","","","","","","");
            $PRP-> setIDP($data['ID']);
            $PRP-> setCodeP($data['Code']);
            $PRP-> setType_Parrain($type);
            $PRP-> setType_Parainnage($data['Type_Parrainage']);
            $PRP-> setDate_Debut_Parainnage($data['DateD']);
            $PRP-> setDate_Cessession_Parainnage($data['DateF']);
            $PRP-> setEnregistrement($data['Date_Enr']);
            $PRP-> setNom($data['Nom']);
            $PRP-> setAdresse($data['Adresse']);
            $PRP-> setTelephone($data['Telephone']);
            $PRP-> setEmail($data['Email']);
            $PRP-> setFax($data['Fax']);
            $PRP-> setPrenom($data['Prenom']);
            $PRP-> setSexe($data['Sexe']);
            $reponse=$PRP-> Archiver($ID);
            if($reponse){
                header('Location:../VIEW/ListerParrain.php');
            }
      
        }
       
    }
}
    ?>