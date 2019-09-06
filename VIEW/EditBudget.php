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
$montant="";
$devise="";
$dated="";
$datef="";
$desc="";
$ID="";
if(isset($_SESSION['id']) AND !empty($_SESSION['id'])){
    if(isset($_GET['ID'])){
        $montant=$_GET['Montant'];
        $devise=$_GET['Devise'];
        $dated=$_GET['DateD'];
        $datef=$_GET['DateF'];
        $desc=$_GET['Description'];
        $ID=$_GET['ID'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Allocation de Budget
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./Dashboard.php">Allouer un Budget</a>
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
            <form action="../CONTROLLER/EditBudget1.controller.php" method="POST">




              <div class="row">
                <div class="col col-lg-6">
                  <div class="form-group">
                    <label for="">Montant Budget</label>
                    <input type="number" value="<?php print($montant) ?>" name="montant" class="form-control" placeholder="Montant du Budget" required>
                  </div>
                </div>


                <div class="col col-lg-6">
                  <div class="form-group">
                    <label for="">Devise</label>
                    <select name="devise" id="" class="form-control" >
                    <option value="US" <?php if($devise=='US') print('selected') ?>>US</option>
                      <option value="USCA" <?php if($devise=='USCA') print('selected') ?>>USCA</option>
                      <option value="PESO" <?php if($devise=='PESO') print('selected') ?>>PESO</option>
                      <option value="EURO" <?php if($devise=='EURO') print('selected') ?>>EURO</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col col-lg-6">
                  <div class="form-group">
                    <label for="">Date debut Budget</label>
                    <input type="date" value="<?php print($dated) ?>" name="dateD" class="form-control" required>
                  </div>
                </div>
                <input type="hidden" name="ID" value="<?php print($ID) ?>">
                <div class="col col-lg-6">
                  <div class="form-group">
                    <label for="">Date Fin Budget</label>
                    <input type="date" value="<?php print($datef) ?>" name="dateF" class="form-control" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col col-lg-12">
                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" name="desc" id=""  rows="3"><?php print($desc) ?></textarea>
                  </div>
                </div>
              </div>

              <center><i style="color:red"><?php print($err) ?></i></center>

              <div class="text-right">
                <button type="submit" name="btn" class="btn btn-primary">Modifier</button>
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