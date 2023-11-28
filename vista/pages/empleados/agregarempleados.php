<?php
session_start();
include("../../../models/MySQL.php");
$conexion = new MySQL();
$pdo = $conexion->conectar();

$sql2 =  "SELECT * FROM roles";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute();
$fila = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$sql3 = "SELECT * FROM usuario WHERE estado=0";
$stmt3 = $pdo->prepare($sql3);
$stmt3->execute();
$fila2 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>El huevo | Feliz</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css" />
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php if (isset($_SESSION['mensaje'])) {
    ?>
        <script>
            Swal.fire({
                title: "Felecitaciones",
                text: "<?php echo $_SESSION['mensaje'] ?>",
                icon: "success"
            });
        </script>
    <?php
    }
    unset($_SESSION['mensaje']);
    ?>

    <?php if (isset($_SESSION['mensajeError'])) {
    ?>
        <script>
            Swal.fire({
                title: "Error",
                text: "<?php echo $_SESSION['mensajeError'] ?>",
                icon: "error"
            });
        </script>
    <?php
    }
    unset($_SESSION['mensajeError']);
    ?>

    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60" />
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">4</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle" />
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted">
                                        <i class="far fa-clock mr-1"></i> 4 Hours Ago
                                    </p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3" />
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted">
                                        <i class="far fa-clock mr-1"></i> 4 Hours Ago
                                    </p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3" />
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted">
                                        <i class="far fa-clock mr-1"></i> 4 Hours Ago
                                    </p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index.php" class="brand-link">
                <img src="../../dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
                <span class="brand-text font-weight-light">Huevo Feliz</span>
            </a>

            <!-- Sidebar General -->
            <div class="sidebar">
                <!-- Aqui va el rol del usuario-->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="./dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Aqui va el Rol</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!--Aca va el index Del Drop menu 305-333-->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Inicios
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../index.html" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inicio v1</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Produccion
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../pages/produccion/index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Logistica</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    inventario
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../pages/inventario/index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>POS 1</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                    <a href="./pages/charts/flot.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>POS 2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/charts/inline.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>POS 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/charts/uplot.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Reportes</p>
                    </a>
                  </li> -->
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tree"></i>
                                <p>
                                    Logistica
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../pages/logistica/index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>General</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                    <a href="./pages/UI/icons.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Agregar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/UI/buttons.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>En proceso</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/UI/sliders.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Seguimiento</p>
                    </a>
                  </li> -->
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Venta
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../pages/ventas/local1.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>LOCAL 1</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Facturacion
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../pages/facturacion/index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Factura General</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                    <a href="./pages/tables/data.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>DataTables</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/tables/jsgrid.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>jsGrid</p>
                    </a>
                  </li> -->
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Empleados
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../pages/empleados/agregarempleados.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Agregar Empleados</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                    <a href="./pages/tables/data.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>DataTables</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./pages/tables/jsgrid.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>jsGrid</p>
                    </a>
                  </li> -->
                            </ul>
                        </li>
                        <li class="nav-header">OTROS</li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Correos
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./pages/mailbox/mailbox.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Recibidos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/mailbox/compose.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Enviar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/mailbox/read-mail.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Read</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Pages
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./pages/examples/invoice.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Invoice</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/examples/profile.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Profile</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/examples/e-commerce.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>E-commerce</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/examples/projects.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Projects</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/examples/project-add.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/examples/project-edit.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project Edit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/examples/project-detail.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project Detail</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/examples/contacts.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contacts</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/examples/faq.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>FAQ</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./pages/examples/contact-us.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contact us</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!--contenido del Inicio. -->
        <div class="content-wrapper">
            <!-- Cabecera de la pagina del cuerpo index (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-2">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-center" style=" font-weight: bold;">Agregar Empleados</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <h1 class="text-center"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Agregar
                                        </button></h1>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-sm-6">

                        </div>
                        <!-- /.col -->
                        <div class="col-sm-12">
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Formulario Para Agregar Empleados</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="../../../controller/empleados/agregarempleados.php">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Cedula</label>
                                                    <input type="number" name="cedula" min="1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Nombre Completo</label>
                                                    <input type="text" name="nombreCompleto" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Fecha de Nacimiento</label>
                                                    <input type="date" name="fechaNac" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Direccion de Residencia</label>
                                                    <input type="text" name="direccion" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Numero de Telefono</label>
                                                    <input type="number" name="telefono" min="1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                                                    <input type="mail" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Cargo</label>
                                                    <br>
                                                    <?php
                                                    foreach ($fila as $key) {
                                                        if ($key['nombre'] != "Cliente" && $key['nombre'] != "Empresa") {
                                                    ?>
                                                            <input type="checkbox" name="checkCargo[]" id="cbox2" value="<?php echo $key['idRoles'] ?>" />
                                                            <label for="cbox2"><?php echo $key['nombre'] ?></label>
                                                            <br>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Numero de Cuenta</label>
                                                    <input type="number" class="form-control" name="numeroCuenta" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Numero de Emergencia</label>
                                                    <input type="number" min="1" name="numeroEmergencia" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Nivel de Educacion</label>
                                                    <input type="text" class="form-control" name="nivelEducacion" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Experiencia Laboral</label>
                                                    <input type="text" class="form-control" name="experienciaLaboral" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Evaluacion de Desempeño</label>
                                                    <input type="text" class="form-control" name="evaluacionDesempeño" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Salario</label>
                                                    <input type="number" class="form-control" name="salario" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Contraseña para el Software</label>
                                                    <input type="text" class="form-control" name="pass" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Agregar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card" style="width: 100%">
                                <div class="card-header">
                                    <h3 class="card-title">Listado de Empleados</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Cedula</th>
                                                <th>Nombre Completo</th>
                                                <th>Fecha de Nacimiento</th>
                                                <th>Direccion de Residencia</th>
                                                <th>Telefono</th>
                                                <th>Fecha de Ingreso</th>
                                                <th>Numero de Emergencia</th>
                                                <th>Acciones</th>
                                                <th>Eliminar</th>


                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php foreach ($fila2 as $key) {

                                            ?>
                                                <tr>
                                                    <td><?php echo $key['idUsuario'] ?></td>
                                                    <td><?php echo $key['nombreCompleto'] ?></td>
                                                    <td><?php echo $key['fechaNacimiento'] ?></td>
                                                    <td><?php echo $key['direccionResidencia'] ?></td>
                                                    <td><?php echo $key['numeroTelefono'] ?></td>
                                                    <td><?php echo $key['fechaIngreso'] ?></td>
                                                    <td><?php echo $key['datosEmergencia'] ?></td>
                                                    <td> <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalVer<?php echo $key['idUsuario'] ?>"><i class="bi bi-eye-fill"></i></button> <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalEditarrol<?php echo $key['idUsuario'] ?>"><i class="bi bi-arrow-clockwise"></i></button><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModalEditar<?php echo $key['idUsuario'] ?>"><i class="bi bi-pencil-square"></i></button></td>
                                                    <td> <a href="../../../controller/empleados/eliminarempleado.php?id=<?php echo $key['idUsuario'] ?>" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a> </td>
                                                </tr>
                                                <div class="modal fade" id="exampleModalVer<?php echo $key['idUsuario'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Formulario Para Agregar Empleados</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Cedula</label>
                                                                    <input type="number" readonly value="<?php echo $key['idUsuario'] ?>" name="cedula" min="1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Nombre Completo</label>
                                                                    <input type="text" readonly value="<?php echo $key['nombreCompleto'] ?>" name="nombreCompleto" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Fecha de Nacimiento</label>
                                                                    <input type="date" readonly value="<?php echo $key['fechaNacimiento'] ?>" name="fechaNac" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Direccion de Residencia</label>
                                                                    <input type="text" name="direccion" readonly value="<?php echo $key['direccionResidencia'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Numero de Telefono</label>
                                                                    <input type="number" name="telefono" readonly value="<?php echo $key['numeroTelefono'] ?>" min="1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                                                                    <input type="mail" name="correo" class="form-control" readonly value="<?php echo $key['correo'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Cargo</label>
                                                                    <br>
                                                                    <?php
                                                                    $sql4 = "SELECT roles.idRoles, roles.nombre FROM roles INNER JOIN usuario_has_roles INNER JOIN usuario WHERE usuario.idUsuario = usuario_has_roles.Usuario_idUsuario AND usuario_has_roles.Roles_idRoles = roles.idRoles AND usuario.idUsuario = :idUsuario";
                                                                    $stmt4 = $pdo->prepare($sql4);
                                                                    $stmt4->bindParam(":idUsuario", $key['idUsuario'], PDO::PARAM_INT);
                                                                    $stmt4->execute();
                                                                    $fila3 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
                                                                    foreach ($fila3 as $key2) {
                                                                    ?>
                                                                        <label for="cbox2"><?php echo $key2['nombre'] ?></label>
                                                                        <br>
                                                                    <?php

                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Numero de Cuenta</label>
                                                                    <input type="number" readonly value="<?php echo $key['numCuenta'] ?>" class="form-control" name="numeroCuenta" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Numero de Emergencia</label>
                                                                    <input type="number" min="1" readonly value="<?php echo $key['datosEmergencia'] ?>" name="numeroEmergencia" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Nivel de Educacion</label>
                                                                    <input type="text" class="form-control" readonly value="<?php echo $key['nivelEducacion'] ?>" name="nivelEducacion" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Experiencia Laboral</label>
                                                                    <input type="text" class="form-control" readonly value="<?php echo $key['experenciaLaboral'] ?>" name="experienciaLaboral" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Evaluacion de Desempeño</label>
                                                                    <input type="text" class="form-control" readonly value="<?php echo $key['evalucacion'] ?>" name="evaluacionDesempeño" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Salario</label>
                                                                    <input type="number" class="form-control" readonly value="<?php echo $key['salario'] ?>" name="salario" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="exampleInputEmail1" class="form-label">Contraseña para el Software</label>
                                                                    <input type="text" class="form-control" name="pass" readonly value="<?php echo  base64_decode($key['pass']) ?>" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="exampleModalEditar<?php echo $key['idUsuario'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Formulario Para Agregar Empleados</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="../../../controller/empleados/editarempleados.php">
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Cedula</label>
                                                                        <input type="number" readonly value="<?php echo $key['idUsuario'] ?>" name="cedula" min="1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Nombre Completo</label>
                                                                        <input type="text" value="<?php echo $key['nombreCompleto'] ?>" name="nombreCompleto" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Fecha de Nacimiento</label>
                                                                        <input type="date" value="<?php echo $key['fechaNacimiento'] ?>" name="fechaNac" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Direccion de Residencia</label>
                                                                        <input type="text" name="direccion" value="<?php echo $key['direccionResidencia'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Numero de Telefono</label>
                                                                        <input type="number" name="telefono" value="<?php echo $key['numeroTelefono'] ?>" min="1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                                                                        <input type="mail" name="correo" class="form-control" value="<?php echo $key['correo'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Cargo</label>
                                                                        <p>Cargos Anteriores</p>
                                                                        <?php
                                                                        $sql4 = "SELECT roles.idRoles, roles.nombre FROM roles INNER JOIN usuario_has_roles INNER JOIN usuario WHERE usuario.idUsuario = usuario_has_roles.Usuario_idUsuario AND usuario_has_roles.Roles_idRoles = roles.idRoles AND usuario.idUsuario = :idUsuario";
                                                                        $stmt4 = $pdo->prepare($sql4);
                                                                        $stmt4->bindParam(":idUsuario", $key['idUsuario'], PDO::PARAM_INT);
                                                                        $stmt4->execute();
                                                                        $fila3 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
                                                                        foreach ($fila3 as $key2) {
                                                                        ?>
                                                                            <p for="cbox2"><?php echo $key2['nombre'] ?></p>
                                                                            <br>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        <p>Cargos Nuevos</p>
                                                                        <?php
                                                                        foreach ($fila as $key3) {
                                                                            if ($key3['nombre'] != "Cliente" && $key3['nombre'] != "Empresa") {
                                                                        ?>
                                                                                <input type="checkbox" name="checkCargo[]" id="cbox2" value="<?php echo $key3['idRoles'] ?>" />
                                                                                <label for="cbox2"><?php echo $key3['nombre'] ?></label>
                                                                                <br>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Numero de Cuenta</label>
                                                                        <input type="number" value="<?php echo $key['numCuenta'] ?>" class="form-control" name="numeroCuenta" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Numero de Emergencia</label>
                                                                        <input type="number" min="1" value="<?php echo $key['datosEmergencia'] ?>" name="numeroEmergencia" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Nivel de Educacion</label>
                                                                        <input type="text" class="form-control" value="<?php echo $key['nivelEducacion'] ?>" name="nivelEducacion" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Experiencia Laboral</label>
                                                                        <input type="text" class="form-control" value="<?php echo $key['experenciaLaboral'] ?>" name="experienciaLaboral" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Evaluacion de Desempeño</label>
                                                                        <input type="text" class="form-control" value="<?php echo $key['evalucacion'] ?>" name="evaluacionDesempeño" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Salario</label>
                                                                        <input type="number" class="form-control" value="<?php echo $key['salario'] ?>" name="salario" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Contraseña para el Software</label>
                                                                        <input type="text" class="form-control" name="pass" value="<?php echo  base64_decode($key['pass']) ?>" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                    </div>
                                                                    <h1 class="text-center"><button type="submit" class="btn btn-primary">Editar</button></h1>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="exampleModalEditarrol<?php echo $key['idUsuario'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Formulario Para Agregar Empleados</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="../../../controller/empleados/editarroles.php">
                                                                    <div class="mb-3">
                                                                        <input type="number" hidden value="<?php echo $key['idUsuario'] ?>" name="cedula" min="1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <h3>Cargos Anteriores</h3>
                                                                        <br>
                                                                        <?php
                                                                        $sql4 = "SELECT roles.idRoles, roles.nombre FROM roles INNER JOIN usuario_has_roles INNER JOIN usuario WHERE usuario.idUsuario = usuario_has_roles.Usuario_idUsuario AND usuario_has_roles.Roles_idRoles = roles.idRoles AND usuario.idUsuario = :idUsuario";
                                                                        $stmt4 = $pdo->prepare($sql4);
                                                                        $stmt4->bindParam(":idUsuario", $key['idUsuario'], PDO::PARAM_INT);
                                                                        $stmt4->execute();
                                                                        $fila3 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
                                                                        foreach ($fila3 as $key2) {
                                                                        ?>
                                                                            <label for="cbox2"><?php echo $key2['nombre'] ?></label>
                                                                            <br>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                        <br>
                                                                        <h3>Cargos Nuevos</h3>
                                                                        <br>
                                                                        <?php
                                                                        foreach ($fila as $key3) {
                                                                            if ($key3['nombre'] != "Cliente" && $key3['nombre'] != "Empresa") {
                                                                        ?>
                                                                                <input type="checkbox" name="checkCargo[]" id="cbox2" value="<?php echo $key3['idRoles'] ?>" />
                                                                                <label for="cbox2"><?php echo $key3['nombre'] ?></label>
                                                                                <br>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <h1 class="text-center"><button type="submit" class="btn btn-primary">Editar</button></h1>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot class="text-center">
                                            <tr>
                                                <th>Cedula</th>
                                                <th>Nombre Completo</th>
                                                <th>Fecha de Nacimiento</th>
                                                <th>Direccion de Residencia</th>
                                                <th>Telefono</th>
                                                <th>Fecha de Ingreso</th>
                                                <th>Numero de Emergencia</th>
                                                <th>Acciones</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /Fin de la cabecera del cuerpo index-header -->

            <!-- Cuerpo del contenido -->
            <section class="content">
                <div class="container-fluid"></div>
                <!-- / fin del cuerpo del contenido container-fluid -->
            </section>
            <!-- /  cierre del section todo el cuerpo del index-->
        </div>
        <!-- /.fin del contenedor general -wrapper -->

        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021
                <a href="https://adminlte.io">Adso.Work</a>.</strong>
            Todos los derechos Reservados
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 0.0.1
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../../plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../../plugins/moment/moment.min.js"></script>
    <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../dist/js/pages/dashboard.js"></script>
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        var idiomaDataTable = {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        };

        // Configuración de idioma para los botones de DataTables
        var idiomaBotones = {
            "decimal": ",",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ".",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
            "aria": {
                "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        };
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "language": idiomaDataTable
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)').buttons().language.ide = idiomaBotones;
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Spanish.json"
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>