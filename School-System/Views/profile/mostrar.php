<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
  header('location: ../home.php');
  exit;
}

$profileImage = isset($_SESSION['profileImage']) ? "../../" . $_SESSION['profileImage'] : "../../images/default-avatar.png";
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Perfil | Sistema Escolar</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../../Assets/css/bootstrap-1.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../../Assets/css/custom.css">
  <link rel="icon" type="image/png" sizes="96x96" href="../../Assets/img/logo1-preview.png">
  <!-- Google Fonts -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <!-- Google Material Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="../../Assets/css/font-awesome.min.css" rel="stylesheet" />
</head>

<body>

  <div class="wrapper">

    <div class="body-overlay"></div>

    <!-------------------------sidebar------------>
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <h3><img src="../../Assets/img/logo1-preview.png" class="img-fluid" /><span>Sistema escolar</span></h3>
      </div>

      <ul class="list-unstyled components">

        <li class="dropdown">
          <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">

            <span><?php echo ucfirst($_SESSION['nombre']); ?></span></a>
          <ul class="collapse list-unstyled menu" id="pageSubmenu3">
            <li>
              <a href="mostrar.php">Perfil</a>
            </li>
            <li>
              <a href="../pages-logout.php">Cerrar sesión</a>
            </li>
          </ul>
        </li>

        <li class="">
          <a href="../admin/pages-admin.php" class="dashboard"><i class="material-icons">dashboard</i>
            <span>INICIO</span></a>
        </li>

        <li class="">
          <a href="../period/mostrar.php"><i class="material-icons">calendar_month</i>
            <span>PERIODO ESCOLAR</span></a>
        </li>

        <li class="">
          <a href="../users/mostrar.php"><i class="material-icons">person_outline</i>
            <span>USUARIOS</span></a>
        </li>

        <li class="">
          <a href="../fathers/mostrar.php"><i class="material-icons">supervisor_account</i>
            <span>PADRES</span></a>
        </li>

        <li class="">
          <a href="../teachers/mostrar.php"><i class="material-icons">psychology</i>
            <span>DOCENTES</span></a>
        </li>

        <li class="">
          <a href="../students/mostrar.php"><i class="material-icons">sentiment_very_satisfied</i>
            <span>ALUMNOS</span></a>
        </li>

        <li class="">
          <a href="../careers/mostrar.php"><i class="material-icons">school</i>
            <span>CURSOS</span></a>
        </li>

        <li class="">
          <a href="../subgrade/mostrar.php"><i class="material-icons">dynamic_feed</i>
            <span>SUBGRADOS</span></a>
        </li>

        <li class="">
          <a href="../grade/mostrar.php"><i class="material-icons">diversity_3</i>
            <span>GRADOS</span></a>
        </li>

        <li class="">
          <a href="../groups/mostrar.php"><i class="material-icons">card_membership</i>
            <span>SECCIÓN</span></a>
        </li>

        <li class="">
          <a href="../assists/mostrar.php"><i class="material-icons">assignment_turned_in</i>
            <span>ASISTENCIAS</span></a>
        </li>

      </ul>
    </nav>

    <!--------page-content---------------->

    <div id="content">

      <!--top--navbar----design--------->

      <div class="top-navbar">
        <div class="xp-topbar">

          <!-- Start XP Row -->
          <div class="row">
            <!-- Start XP Col -->
            <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
              <div class="xp-menubar">
                <span class="material-icons text-white">signal_cellular_alt</span>
              </div>
            </div>
            <!-- End XP Col -->

            <!-- Start XP Col -->
            <div class="col-md-5 col-lg-3 order-3 order-md-2">
              <div class="xp-searchbar">
                <form>
                  <div class="input-group">
                    <input type="search" class="form-control" placeholder="Buscar...">
                    <div class="input-group-append">
                      <button class="btn" type="submit" id="button-addon2">Buscar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- End XP Col -->

            <!-- Start XP Col -->
            <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
              <div class="xp-profilebar text-right">
                <nav class="navbar p-0">
                  <ul class="nav navbar-nav flex-row ml-auto">
                    <!-- <li class="dropdown nav-item active">
                      <a href="#" class="nav-link" data-toggle="dropdown">
                        <span class="material-icons">notifications</span>
                        <span class="notification">4</span>
                      </a>
                      <ul class="dropdown-menu">
                        <li>
                          <a href="#">You have 5 new messages</a>
                        </li>
                        <li>
                          <a href="#">You're now friend with Mike</a>
                        </li>
                        <li>
                          <a href="#">Wish Mary on her birthday!</a>
                        </li>
                        <li>
                          <a href="#">5 warnings in Server Console</a>
                        </li>

                      </ul>
                    </li> -->

                    <!-- ACTUALIZAR y/o COLORCAR IMAGEN -->
                    <li class="nav-item dropdown">
                      <a class="nav-link" href="#" data-toggle="dropdown">
                        <?php if (isset($_SESSION['profileImage'])) : ?>
                          <img src="../../<?php echo $_SESSION['profileImage']; ?>" style="width:40px; border-radius:50%;" />
                        <?php else : ?>
                          <img src="../../Assets/img/user.jpg" style="width:40px; border-radius:50%;" />
                        <?php endif; ?>
                        <span class="xp-user-live"></span>
                      </a>
                      <ul class="dropdown-menu small-menu">
                        <li><a href="../profile/mostrar.php">
                          <span class="material-icons">person_outline</span>Perfil</a>
                        </li>
                        <li><a href="#">
                          <span class="material-icons">settings</span>Configuración</a>
                        </li>
                        <li><a href="../pages-logout.php">
                          <span class="material-icons">logout</span>Cerrar sesión</a>
                        </li>
                      </ul>
                    </li>
                  </ul>

                </nav>

              </div>
            </div>
            <!-- End XP Col -->

          </div>
          <!-- End XP Row -->

        </div>
        <div class="xp-breadcrumbbar text-center">
          <h4 class="page-title">Bienvenido&nbsp;<?php echo ucfirst($_SESSION['usuario']); ?></h4>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><?php echo ucfirst($_SESSION['correo']); ?></li>

          </ol>
        </div>

      </div>

      <div class="container">
        <div class="main-body">
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../admin/pages-admin.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img id="profileImage" src="<?php echo $profileImage; ?>" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo ucfirst($_SESSION['nombre']); ?></h4>
                      <p class="text-secondary mb-1"><?php echo ucfirst($_SESSION['correo']); ?></p>
                      <button class="btn btn-outline-primary" onclick="document.getElementById('fileInput').click();">Actualizar imagen</button>
                      <form id="imageUploadForm" action="upload.php" method="POST" enctype="multipart/form-data" style="display:none;">
                        <input type="file" name="profileImage" id="fileInput" onchange="document.getElementById('imageUploadForm').submit();">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nombre completo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo ucfirst($_SESSION['nombre']); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Correo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo ucfirst($_SESSION['correo']); ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Usuario</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo ucfirst($_SESSION['usuario']); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <script src="../../Assets/js/jquery-3.3.1.slim.min.js"></script>
  <script src="../../Assets/js/popper.min.js"></script>
  <script src="../../Assets/js/bootstrap-1.min.js"></script>
  <script src="../../Assets/js/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".xp-menubar").on('click', function() {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
      });

      $(".xp-menubar,.body-overlay").on('click', function() {
        $('#sidebar,.body-overlay').toggleClass('show-nav');
      });
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</body>

</html>