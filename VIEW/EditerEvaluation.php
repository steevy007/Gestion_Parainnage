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
$id="";
$Age="";
$Poid="";
$Hauteur="";
$Perimetre="";
$DateR="";
$Reference="";
$Maladie="";
$Diagnostique="";
$Traitement="";
$Vaccin="";
if(isset($_SESSION['id']) AND !empty($_SESSION['id'])){
        if(isset($_GET['ID']) AND !empty($_GET['ID'])){
            $id=$_GET['ID'];
            $Age=$_GET['Age'];
            $Poid=$_GET['Poid'];
            $Hauteur=$_GET['Hauteur'];
            $Perimetre=$_GET['Perimetre'];
            $DateR=$_GET['DateR'];
            $Reference=$_GET['Reference'];
            $Maladie=$_GET['Maladie'];
            $Diagnostique=$_GET['Diagnostique'];
            $Traitement=$_GET['Traitement'];
            $Vaccin=$_GET['Vaccin'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
   Lister Beneficiaire
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./Dashboard.php">Lister Beneficiaire</a>
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
                <form action="../CONTROLLER/EditEvaluation1.controller.php" method="POST">
                   

                    <div class="row">
                        <div class="col col-lg-6">
                            <div class="form-group">
                                <label for="">Saisir l'Age du beneficiaire</label>
                                <input type="number" value="<?php print($Age) ?>" class="form-control" name="age" placeholder="Age du Beneficiaire" required>
                            </div>
                        </div>

                        <div class="col col-lg-6">
                            <div class="form-group">
                                <label for="">Saisir le poid du beneficiaire</label>
                                <input type="number" value="<?php print($Poid) ?>" class="form-control" name="poid" placeholder="Poid du Beneficiaire" required>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="ID" value="<?php print($id)?>">
                    <div class="row">
                        <div class="col col-lg-6">
                        <div class="form-group">
                                <label for="">Hauteur du Beneficiaire</label>
                                <input type="number" value="<?php print($Hauteur) ?>" class="form-control" name="hauteur" placeholder="Hauteur du Beneficiaire" required>
                            </div>
                        </div>

                        <div class="col col-lg-6">
                        <div class="form-group">
                                <label for="">Perimetre Branchial</label>
                                <input type="number" value="<?php print($Perimetre) ?>" class="form-control" name="perimetre" placeholder="Hauteur du Beneficiaire" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-lg-6">
                        <div class="form-group">
                                <label for="">Date Rendez-Vous</label>
                                <input type="date" value="<?php print($DateR) ?>" class="form-control" name="dateR" >
                            </div>
                        </div>

                        <div class="col col-lg-6">
                        <div class="form-group">
                                <label for="">Reference Hospital</label>
                                <input type="text" value="<?php print($Reference) ?>" class="form-control" name="reference" placeholder="Hauteur du Beneficiaire">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="form-group">
                                <label for="">Maladie</label>
                                <textarea name="maladie" id="" cols="30" rows="2" class="form-control"><?php print($Maladie) ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="form-group">
                                <label for="">Diagnostique</label>
                                <textarea name="diagnostique" id="" cols="30" rows="2" class="form-control"><?php print($Diagnostique) ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="form-group">
                                <label for="">traitement</label>
                                <textarea name="traitement" id="" cols="30" rows="2" class="form-control"><?php print($Traitement) ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="form-group">
                                <label for="">Vaccin</label>
                                <textarea name="vaccin" id="" cols="30" rows="2" class="form-control"><?php print($Vaccin) ?></textarea>
                            </div>
                        </div>
                    </div>
                   <center><span style="color:red"><?php print($err) ?></span></center>
                   <div class="text-right">
                    <input type="submit" name="btn" value="Modifier" class="btn btn-danger">
                  
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
  <script>
    $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
  </script>
</body>

</html>
<?php
}else{
  header("Location:../CONTROLLER/Connection.Controller.php?Message=ou pa konekte");
}
?>