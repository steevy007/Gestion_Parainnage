<?php
  require_once('../MODEL/Utilisateur.php');
  $UT=new Utilisateur("","","","","","");
    if(isset($_GET['ID'])){
        $reponse=$UT->Desactive($_GET['ID']);
        if($reponse){
            header('Location:../VIEW/ListUser.php');
        }
    }
?>