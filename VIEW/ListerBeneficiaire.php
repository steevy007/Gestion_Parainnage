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
if(isset($_SESSION['id']) AND !empty($_SESSION['id'])){
    require_once('../MODEL/Beneficiaire.php');
    $BE=new Beneficiaire("","","","","","","","","","","","","","","","","");
    $reponse=$BE->Lister_BEN();

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
            <div class="table-responsive">
            <table id="dtBasicExample" class="table table-striped table-hover table-borderless table-sm" cellspacing="0" width="100%">
            <thead>
    <tr>
      <th class="th-sm">Code Beneficiaire

      </th>
      <th class="th-sm">Nom Programme

      </th>
      <th class="th-sm">Date Debut

      </th>
      <th class="th-sm">Date Fin

      </th>
      <th class="th-sm">Description

      </th>
      <th class="th-sm">Date Creation

      </th>
      <th class="th-sm">Etat Budget

      </th>
    </tr>
  </thead>
  <tbody>
  <?php
        while($data=$reponse->fetch()){
            
    ?>
        <tr>

            <td><?php print($data['CodeB']) ?></td>
            <td><?php print($data['Nom']) ?></td>
            <td><?php print($data['Prenom']) ?></td>
            <td><?php print($data['Age']) ?></td>
            <td><?php print($data['Sexe']) ?></td>
            <td><?php print($data['Date_de_Naissance']) ?></td>
            
            <td>
              <a href="../CONTROLLER/ArchiverProgramme.controller.php?ID=<?php print($data['ID']) ?> "><i><img src="ICONES/icons8_Trash_16px.png" alt=""></i></a>
                <a  href="../CONTROLLER/EditProgramme.controller.php?ID=<?php print($data['ID']) ?> "><i><img src="ICONES/icons8_Edit_16px.png" alt=""></i></a>
                <input type="hidden" <?php ?>>
            </td>
        </tr>
    <?php
    }
    ?>
  </tbody>
  <tfoot>
  <tr>
      <th class="th-sm">Code Programme

      </th>
      <th class="th-sm">Nom Programme

      </th>
      <th class="th-sm">Date Debut

      </th>
      <th class="th-sm">Date Fin

      </th>
      <th class="th-sm">Description

      </th>
      <th class="th-sm">Date Creation

      </th>
      <th class="th-sm">Etat Budget

      </th>
    </tr>
  </tfoot>
</table>
            </div>
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