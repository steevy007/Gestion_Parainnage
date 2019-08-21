<?php
session_start();
require_once('../MODEL/Utilisateur.php');
    if(isset($_POST['btn'])){
        $User=new Utilisateur("","","","","","");
        $nom=htmlspecialchars($_POST['nom']);
        $Email=htmlspecialchars($_POST['email']);
        $Password=htmlspecialchars($_POST['password']);
        //echo $User->Check_Mail($Email)->rowCount();
        if($User->Check_Mail($Email)>0){
            $_SESSION['err']='Ce Mail Existe Deja';
            header('Location:../VIEW/register.php');
        }else{
            $User->setNom($nom);
            $User->setEmail($Email);
            $User->setPassword($Password);
            if($User->Inscrire_Secretaire()){
                header('Location:../VIEW/Dashboard.php');
            }
        }
    }
?>