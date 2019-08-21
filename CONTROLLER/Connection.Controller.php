<?php
session_start();
require_once('../MODEL/Utilisateur.php');
    if(isset($_POST['btn'])){
        $mail=htmlspecialchars($_POST['email']);
        $password=htmlspecialchars($_POST['password']);
        $User=new Utilisateur("","","","","","");
        $User->setEmail($mail);
        $User->setPassword($password);
        $resultat=$User->Connecter();
        $nombre=$User->Connecter()->rowCount();
        if($nombre==1){
           while($data=$resultat->fetch()){
                $_SESSION['nom']=$data['Nom'];
                $_SESSION['type']=$data['Type_User'];
                $_SESSION['id']=$data['ID'];
                header('Location:../VIEW/Dashboard.php');
           }
        }else{
            $_SESSION['err']='Mot de passe ou Email Incorrect';
            header('Location:../index.php');
        }
    }
?>