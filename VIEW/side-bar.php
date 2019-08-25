<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./Dashboard.php">
        <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="../assets/img/theme/team-1-800x800.jpg
">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="./VIEW/profile.php" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="./view/profile.php" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="./VIEW/profile.php" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="./VIEW/profile.php" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.php">
               
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->

        <!-- Navigation -->
        <ul class="navbar-nav">
        <?php
          if($_SESSION['type']=='Administrateur'){
        ?>
          <li class="nav-item">
            <a class="nav-link " href="./icons.php">
              <i class=""><img src="ICONES/icons8_Create_24px.png" alt=""></i> Creer Programme
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link " href="./maps.php">
              <i class=""><img src="ICONES/icons8_Cheap_2_24px.png" alt=""></i> Allouer Budget
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./profile.php">
              <i class=""><img src="ICONES/icons8_People_24px.png" alt=""></i> Enregistrer Parrain
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">
              <i class=""><img src="ICONES/icons8_Add_User_Female_24px.png" alt=""></i> Inscrire Secretaire
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="./ListUser.php">
              <i class=""><img src="ICONES/icons8_Features_List_24px.png" alt=""></i> Lister Les Utilisateurs
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./tables.php">
              <i class=""><img src="ICONES/icons8_User_Groups_24px_1.png" alt=""></i> Inscrire Beneficiaire
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">
              <i class=""><img src="ICONES/icons8_Hospital_24px.png" alt=""></i> Consultation
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./ListerProgramme.php">
              <i class=""><img src="ICONES/icons8_Features_List_24px.png" alt=""></i> Lister Programme
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">
              <i class=""><img src="ICONES/icons8_Features_List_24px.png" alt=""></i> Lister Budget
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">
              <i class=""><img src="ICONES/icons8_Features_List_24px.png" alt=""></i> Lister Parrain
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./ListerBeneficiaire.php">
              <i class=""><img src="ICONES/icons8_Features_List_24px.png" alt=""></i> Lister Beneficiaire
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">
              <i class=""><img src="ICONES/icons8_Features_List_24px.png" alt=""></i> Lister Rendez-Vous
            </a>
          </li>

          <?php
            }else{
          ?>
          <li class="nav-item">
            <a class="nav-link " href="./tables.php">
              <i class=""><img src="ICONES/icons8_User_Groups_24px_1.png" alt=""></i> Inscrire Beneficiaire
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">
              <i class=""><img src="ICONES/icons8_Hospital_24px.png" alt=""></i> Consultation
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">
              <i class=""><img src="ICONES/icons8_Features_List_24px.png" alt=""></i> Lister Programme
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">
              <i class=""><img src="ICONES/icons8_Features_List_24px.png" alt=""></i> Lister Budget
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">
              <i class=""><img src="ICONES/icons8_Features_List_24px.png" alt=""></i> Lister Parrain
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">
              <i class=""><img src="ICONES/icons8_Features_List_24px.png" alt=""></i> Lister Beneficiaire
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./register.php">
              <i class=""><img src="ICONES/icons8_Features_List_24px.png" alt=""></i> Lister Rendez-Vous
            </a>
          </li>
          <?php
            }
          ?>
        </ul>

        </ul>
      </div>
    </div>
  </nav>