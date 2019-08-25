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
$nom="";
$dateP="";
$dateFP="";
$desc="";
$ID="";
if(isset($_GET['ID'])){
    $nom=$_GET['Nom'];
    $dateP=$_GET['dateP'];
    $dateFP=$_GET['dateFP'];
    $desc=$_GET['desc'];
    $ID=$_GET['ID'];
}
if(isset($_SESSION['id']) AND !empty($_SESSION['id'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
   Modifier Programme
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./Dashboard.php">Modifier Programme</a>
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
          <form action="../CONTROLLER/EditProgramme.controller1.php" method="POST">

          <div class="row">
              <div class="col col-lg-12">
              <div class="form-group">
                  <label for="exampleInputNom">Nom du programme</label>
                  <input type="text" class="form-control" value="<?php print($nom) ?>" aria-describedly="nom" name="nom" placeholder="Saisir Le nom du Programme" required>
                </div>
              </div>
            </div>

          <div class="row">
              <div class="col col-lg-6">
              <div class="form-group">
                  <label for="exampleInputdateP">Date Debut Programme</label>
                  <input type="date" value="<?php print($dateP) ?>" class="form-control" name="dateP" aria-describedly="dateP" required>
                  <input type="hidden" name="ID" value="<?php print($ID) ?>">
                </div>
              </div>
              <div class="col col-lg-6">
              <div class="form-group">
                  <label for="exampleInputdateFP">Date Fin Programme</label>
                  <input type="date" value="<?php print($dateFP)?>" class="form-control" name="dateFP" aria-describedly="dateP" required>
                </div>
                </div>
            </div>

            <div class="row">
              <div class="col col-lg-12">
              <div class="form-group">
                  <label for="exampleInputNom">Description du Programme</label>
                  <textarea class="form-control rounded-0" name="desc" rows="3"><?php print($desc)?></textarea>
                </div>
              </div>
            </div>
              <center><span style="color:red"><?php print($err) ?></span></center>
            <div class="row">
              <div class="col col-lg-12 text-right">
              <button type="submit" name="btn" class="btn btn-primary">Modifier</button>
              
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