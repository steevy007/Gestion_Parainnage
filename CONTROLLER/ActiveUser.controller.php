<?php
  require_once('../MODEL/Utilisateur.php');
  $UT=new Utilisateur("","","","","","");
    if(isset($_GET['ID'])){
        $reponse=$UT->Active($_GET['ID']);
        if($reponse){
            header('Location:../VIEW/ListUser.php');
        }
    }
?>