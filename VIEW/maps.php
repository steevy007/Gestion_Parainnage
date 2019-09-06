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

  require_once('../MODEL/Programme.php');
  $PR=new programme("","","","","","","","");
  $resultat=$PR->Lister_PR2();
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
            <form action="../CONTROLLER/AllouerBudget.controller.php" method="POST">


              <div class="row">
                <div class="col col-lg-12">
                  <div class="form-group">
                    <label for="">Selectionner le code du Programme</label>
                    <select name="codeP" id="" class="form-control" required> 
                      <?php
                        while($data=$resultat->fetch()){
                      ?>
                        <option value="<?php print($data['CodePR'])?>" ><?php print($data['CodePR'])?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>

                
              </div>

              <div class="row">
                <div class="col col-lg-6">
                  <div class="form-group">
                    <label for="">Montant Budget</label>
                    <input type="number" name="montant" class="form-control" placeholder="Montant du Budget" required>
                  </div>
                </div>


                <div class="col col-lg-6">
                  <div class="form-group">
                    <label for="">Devise</label>
                    <select name="devise" id="" class="form-control" >
                    <option value="US">US</option>
                      <option value="USCA">USCA</option>
                      <option value="PESO">PESO</option>
                      <option value="EURO">EURO</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col col-lg-6">
                  <div class="form-group">
                    <label for="">Date debut Budget</label>
                    <input type="date" name="dateD" class="form-control" required>
                  </div>
                </div>

                <div class="col col-lg-6">
                  <div class="form-group">
                    <label for="">Date Fin Budget</label>
                    <input type="date" name="dateF" class="form-control" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col col-lg-12">
                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" name="desc" id=""  rows="3"></textarea>
                  </div>
                </div>
              </div>

              <center><i style="color:red"><?php print($err) ?></i></center>

              <div class="text-right">
                <button type="submit" name="btn" class="btn btn-primary">Allouer</button>
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