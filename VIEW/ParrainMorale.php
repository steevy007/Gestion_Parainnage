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
if(isset($_SESSION['err'])){
  $err=$_SESSION['err'];
}
if(isset($_SESSION['id']) AND !empty($_SESSION['id'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Parrain Morale
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./Dashboard.php">Parrain Morale</a>
        <!-- Form -->
        
        <!-- User -->
        <?php require_once('usernav.php')?>
    <!-- End Navbar -->
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
              
            <form action="../CONTROLLER/AddParrainM.php" method="POST">

                
            <div class="row">
                <div class="col col-lg-6">
                    <div class="form-group">
                        <label for="">Nom de L'institution</label>
                        <input type="text" name="nom" class="form-control" placeholder="Saisir le nom" required>
                    </div>
                </div>

                <div class="col col-lg-6">
                    <div class="form-group">
                        <label for="">Adresse</label>
                        <input type="text" name="adresse" class="form-control" placeholder="Saisir l'adresse" required>
                    </div>
                </div>
            </div>

            <div class="row">
            <div class="col col-lg-6">
                    <div class="form-group">
                        <label for="">Telephone</label>
                        <input type="number" name="tel" class="form-control" placeholder="Saisir le Numero de Telephone" required>
                    </div>
                </div>

                <div class="col col-lg-6">
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="mail" class="form-control" placeholder="Saisir Email" required>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col col-lg-6">
                    <div class="form-group">
                        <label for="">Date Debut Parrainnage</label>
                        <input type="date" name="dateD" class="form-control"  required>
                    </div>
                </div>

                <div class="col col-lg-6">
                    <div class="form-group">
                        <label for="">Date Fin Parrainnage</label>
                        <input type="date" name="dateF" class="form-control" required>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col col-lg-6">
                    <div class="form-group">
                        <label for="">Fax</label>
                        <input type="number" name="fax" class="form-control" placeholder="Saisir le numero du fax">
                    </div>
                </div>

                <div class="col col-lg-6">
                    <div class="form-group">
                        <label for="">Type Parrainnage</label>
                        <select name="type" id="" class="form-control">
                          <option value="Simple">Simple</option>
                          <option value="Combine">Combine</option>
                        </select>
                    </div>
                </div>
            </div>

            <center><span style="color:red"><span style="color:red"><?php print($err) ?></center>
                <div class="row">
                  <div class="col col-lg-12 text-right">
                  <button type="submit" name="btn" class="btn btn-primary">Enregistrer</button>
                  </div>
                </div>


            </form>

          </div>
        </div>
      </div>
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