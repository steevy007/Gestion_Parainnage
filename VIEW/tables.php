<!--

=========================================================
* Argon Dashboard - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<?php
session_start();
$err="";
if(isset($_SESSION['errP']) AND !empty($_SESSION['errP'])){
  $err=$_SESSION['errP'];
}
if(isset($_SESSION['id']) AND !empty($_SESSION['id'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
   Inscrire Beneficiaire
  </title>
  <?php require_once('STYLES.php') ?>
</head>

<body class="">
<?php require_once('side-bar.php')?>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./Dashboard.php"> Inscrire Beneficiaire</a>
        <!-- Form -->
       
        <!-- User -->
       
    <!-- End Navbar -->
    <?php require_once('usernav.php')?>
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <?php require_once ('card.php')?>
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col">
          <div class="card shadow border-0 b1">
          <form action="../CONTROLLER/AddBeneficiaire.controller.php" method="POST">
                
                <div class="row">
                  <div class="col col-lg-6">
                  <div class="form-group">
                      <label for="exampleInputNom">Nom Beneficiaire</label>
                      <input type="text" class="form-control" value="" aria-describedly="nom" name="nom" placeholder="Saisir Le nom du Beneficiaire" required>
                    </div>
                  </div>
    
                  <div class="col col-lg-6">
                  <div class="form-group">
                      <label for="exampleInputNom">Prenom Beneficiaire</label>
                      <input type="text" class="form-control" value="" aria-describedly="nom" name="prenom" placeholder="Saisir Le Prenom du Beneficiaire" required>
                    </div>
                  </div>
                  </div>
    
                  <div class="row">
                  <div class="col col-lg-6">
                  <div class="form-group">
                      <label for="exampleInputNom">Age Beneficiaire</label>
                      <input type="number" class="form-control" value="" aria-describedly="nom" name="age" placeholder="Saisir L'age du Beneficiaire" required>
                    </div>
                  </div>

                  <div class="col col-lg-6">
                  <div class="form-group">
                  <label for="">Sexe</label>
                  <select name="sexe" id="" class="form-control">
                  <option value="M">M</option>
                  <option value="F">F</option>
                  </select>
                 </div>
                  </div>
                  </div>
                  
                  <div class="row">
                    <div class="col col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputNom">Niveau Scolaire</label>
                      <input type="text" class="form-control" value="" aria-describedly="nom" name="niveau" placeholder="Saisir Le Niveau Scolaire du Beneficiaire" required>
                    </div>
                    </div>
    
                    <div class="col col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputNom">Statut Matrimonial</label>
                      <select name="statut" id="" class="form-control">
                      <option value="Marié">Marié</option>
                      <option value="Divorcé">Divorcé</option>
                      <option value="En Couple">En Couple</option>
                      <option value="Celibataire">Celibataire</option>
                      </select>
                    </div>
                    </div>
                  </div>
    
                  <div class="row">
                    <div class="col col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputNom">Adresse</label>
                      <input type="text" class="form-control" value="" aria-describedly="nom" name="adresse" placeholder="Saisir Ladresse du Beneficiaire" required>
                    </div>
                    </div>
    
                    <div class="col col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputNom">Telephone</label>
                      <input type="number" class="form-control" value="" aria-describedly="nom" name="tel" placeholder="Saisir Le Telephone du Beneficiaire" required>
                    </div>
                    </div>
                  </div>
    
    
                  <div class="row">
                  <div class="col col-lg-6">
                  <div class="form-group">
                      <label for="exampleInputdateFP">Lieu De Naissance</label>
                      <input type="text" class="form-control" name="lieu" aria-describedly="dateP" placeholder="Saisir Le Lieu de Naissance du Beneficiaire" required>
                    </div>
                    </div>
    
                    <div class="col col-lg-6">
                  <div class="form-group">
                      <label for="exampleInputdateFP">Date De Naissance</label>
                      <input type="date" class="form-control" name="dateN" aria-describedly="dateP" required>
                    </div>
                    </div>
                
                  </div>
    
                  <div class="row">
                  <div class="col col-lg-6">
                  <div class="form-group">
                      <label for="exampleInputdateFP">Autre Zone</label>
                      <input type="text" class="form-control" name="zoneO" placeholder="Précisé Aute Zone" aria-describedly="dateP" >
                    </div>
                  </div>
                  <div class="col col-lg-6">
                    <div class="form-group">
                      <label for="exampleInputNom">Zone</label>
                      <select name="zone" id="" class="form-control">
                      <option value="Delmas">Delmas</option>
                      <option value="Carrefour">Carrefour</option>
                      <option value="Martissant">Martissant</option>
                      <option value="Leogane">Leogane</option>
                      <option value="Petion-Ville">Petion-Ville</option>
                      <option value="Thomassain">Thomassain</option>
                      <option value="Laboule">Laboule</option>
                      <option value="Pernier">Pernier</option>
                      <option value="Autre">Autre</option>
                      </select>
                    </div>
                    </div>
                  </div>
                  <center><span style="color:red"><span style="color:red"><?php print($err) ?></center>
                <div class="row">
                  <div class="col col-lg-12 text-right">
                  <button type="submit" name="btn" class="btn btn-primary">Creer</button>
                  <button type="reset" name="btn" class="btn btn-dark">Nouveau</button>
                  </div>
                </div>
                  </form>
      
       </div> 
      </div>
      </div>
      <!-- Footer -->
      <!-- Footer -->
      <?php require_once('footer.php') ?>
    </div>
  </div>
  <?php require_once('JS.php')?>
</body>

</html>
<?php
}else{
  header("Location:../CONTROLLER/Connection.Controller.php?Message=ou pa konekte");
}
?>