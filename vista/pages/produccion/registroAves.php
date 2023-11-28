<?php
//////////////////////////////////
session_start();
//traigo el modelo
include('../../../models/MySQL.php');
$conexion = new MySQL();
$pdo = $conexion->conectar();


//traigo las aves activas
$sql = "SELECT * from `aves` where fechaDeRetiro is null";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$fila = $stmt->fetchAll(PDO::FETCH_ASSOC);

//traigo las aves inactivas
$sql4 = "SELECT * FROM aves WHERE fechaDeRetiro is NOT Null; ";
$stmt4 = $pdo->prepare($sql4);
$stmt4->execute();
$fila4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

//traigo las aves 
$sql3 = "SELECT * from `aves`";
$stmt3 = $pdo->prepare($sql3);
$stmt3->execute();
$fila3 = $stmt->fetchAll(PDO::FETCH_ASSOC);


//traigo Id de un ave
$sql2 = "SELECT idAves from aves WHERE idAves = 1;";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute();
$fila2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

//traigo los lotes
$sql1 = "SELECT idLoteAves,nombre from `loteaves`";
$stmt1 = $pdo->prepare($sql1);
$stmt1->execute();
$fila1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
//traigo los nombres de la vacunas
$sql5 = "SELECT * FROM vacunas;";
$stmt5 = $pdo->prepare($sql5);
$stmt5->execute();
$fila5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>El huevo | Feliz</title>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.html" class="nav-link">Inicio</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contacto</a>
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
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
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
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Inicios
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../index.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inicio v1</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Produccion
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../produccion/registroAves.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Registro aves</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../produccion/registroLotesAves.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lote de aves</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../produccion/registrohuevos.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Registro de huevos</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../produccion/registroLoteshuevos.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lote de huevos</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../produccion/seguimientoSalud.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Seguimiento de Salud</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../produccion/compras.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Compras</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../produccion/proovedor.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Proovedores</p>
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
                    <a href="../../pages/charts/flot.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>POS 2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/charts/inline.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>POS 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/charts/uplot.html" class="nav-link">
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
                    <a href="../../pages/UI/icons.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Agregar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/UI/buttons.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>En proceso</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/UI/sliders.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Seguimiento</p>
                    </a>
                  </li> -->
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Ventas
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../pages/ventas/local1.php" class="nav-link ">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>LOCAL 1</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                    <a href="../../pages/forms/advanced.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Advanced Elements</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/forms/editors.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Editors</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/forms/validation.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Validation</p>
                    </a>
                  </li> -->
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
                                        <p>Simple Tables</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                    <a href="../../pages/tables/data.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>DataTables</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="../../pages/tables/jsgrid.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>jsGrid</p>
                    </a>
                  </li> -->
                            </ul>
                        </li>
                        <li class="nav-header">FECHAS</li>
                        <li class="nav-item">
                            <a href="index.html" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Correos
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../../pages/mailbox/mailbox.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Recibidos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/mailbox/compose.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Enviar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/mailbox/read-mail.html" class="nav-link">
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
                                    <a href="../../pages/examples/invoice.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Invoice</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/examples/profile.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Profile</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/examples/e-commerce.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>E-commerce</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/examples/projects.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Projects</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/examples/project-add.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/examples/project-edit.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project Edit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/examples/project-detail.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project Detail</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/examples/contacts.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contacts</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/examples/faq.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>FAQ</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../../pages/examples/contact-us.html" class="nav-link">
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
                        <div class="col-sm-12">
                            <h1 style="text-align: center;" class="m-0">Registro de Aves</h1>

                            <hr>
                        </div>
                        <!-- /.col -->

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /Fin de la cabecera del cuerpo index-header -->
            <?php
            if (isset($_SESSION['mensaje'])) {
            ?>
                <script>
                    let msj = '<?php echo $_SESSION['mensaje'] ?>'
                    let titulo = '<?php echo $_SESSION['mensaje2'] ?>'
                    Swal.fire(
                        titulo,
                        msj,
                        'success'
                    )
                </script>
            <?php
                unset($_SESSION['mensaje']);
            }
            ?>

            <?php
            if (isset($_SESSION['mensajeErr'])) {
            ?>
                <script>
                    let msj = '<?php echo $_SESSION['mensajeErr2'] ?>'
                    let titulo = '<?php echo $_SESSION['mensajeErr'] ?>'
                    Swal.fire(
                        titulo,
                        msj,
                        'success'
                    )
                </script>
            <?php
                unset($_SESSION['mensajeErr']);
            }
            ?>
            <?php
            if (isset($_SESSION['mensajeErr3'])) {
            ?>
                <script>
                    let msj = '<?php echo $_SESSION['mensajeErr4'] ?>'
                    let titulo = '<?php echo $_SESSION['mensajeErr3'] ?>'
                    Swal.fire(
                        titulo,
                        msj,
                        'error'
                    )
                </script>
            <?php
                unset($_SESSION['mensajeErr3']);
            }
            ?>
            <!-- Cuerpo del contenido -->
            <!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                                Registrar Ave
                            </button>

                            <div class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Registro</h4>

                                        </div>
                                        <div class="modal-body">
                                            <form action="../../../controller/registroAves.php" method="post">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Especie</label>
                                                        <input name="especie" min="1" type="text" class="form-control" id="exampleInputEmail1" placeholder="Especie">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Peso</label>
                                                        <input type="number" min="1" name="peso" step="0.01" class="form-control" id="exampleInputPassword1" placeholder="Kg">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleSelectBorder">Estado de salud</label>
                                                        <select name="estadoSalud" class="custom-select form-control-border" id="exampleSelectBorder">
                                                            <option value="0">Enfermo</option>
                                                            <option value="1">Saludable</option>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Fecha de vacunacion</label>
                                                        <input type="date" name="fechaVa" class="form-control" id="exampleInputPassword1">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="exampleSelectBorder">Lote de aves</label>
                                                        <select name="loteave" class="custom-select form-control-border" id="exampleSelectBorder">
                                                            <?php foreach ($fila1 as $loteave) { ?>

                                                                <option value="<?php echo $loteave['idLoteAves'] ?>"><?php echo $loteave['nombre'] ?></option>

                                                            <?php } ?>

                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->

                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <hr>
                            <h1 style="text-align: center;">Aves Activas</h1>
                            <br>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id ave</th>
                                            <th>Especie</th>
                                            <th>Peso</th>
                                            <th>Estado de salud</th>
                                            <th>Fecha de vacunacion</th>
                                            <th>Fecha Ingreso</th>
                                            <th>lote del ave</th>
                                            <th>seguimiento Salud</th>
                                            <th>Fecha de retiro</th>
                                            <th>Vacunas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($fila as $aves) { ?>
                                            <tr>
                                                <td scope="row"><?php echo $aves['idAves'] ?></td>
                                                <td><?php echo $aves['especie'] ?></td>
                                                <td><?php echo $aves['peso'] ?></td>
                                                <td><?php echo $aves['estadoSalud'] ?></td>
                                                <td><?php echo $aves['fechaVacunacion'] ?></td>
                                                <td><?php echo $aves['fechaIngreso'] ?></td>
                                                <td><?php echo $aves['LoteAves_idLoteAves'] ?></td>

                                                <td> <button value="<?php echo $aves['idAves'] ?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-salud<?php echo $aves['idAves'] ?>">
                                                        Seguimiento de salud
                                                    </button></td>

                                                <td><button value="<?php echo $aves['idAves'] ?>" style="margin-left: 20px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $aves['idAves'] ?>">
                                                        <i class="bi bi-calendar-date"></i>
                                                    </button></td>

                                                <td><button value="<?php echo $aves['idAves'] ?>" style="margin-left: 20px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-va<?php echo $aves['idAves'] ?>">
                                                        <i class="bi bi-clipboard-heart-fill"></i>
                                                    </button></td>

                                                <div class="modal fade" id="modal-salud<?php echo $aves['idAves'] ?>">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Seguimiento de las aves</h4>

                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="../../../controller/seguimientoSalud.php" method="post">
                                                                    <div class="card-body">


                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Entorno</label>
                                                                            <input name="entorno" min="1" type="text" class="form-control" id="exampleInputEmail1" placeholder="Entorno">
                                                                            <input name="idAve" value="<?php echo $aves['idAves'] ?>" min="1" type="text" class="form-control" id="exampleInputEmail1" hidden>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Sintomas</label>
                                                                            <input name="sintoma" min="1" type="text" class="form-control" id="exampleInputEmail1" placeholder="Sintomas">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Comentario adicional</label>
                                                                            <textarea class="form-control" name="comentarioAd" rows="3" placeholder="Agregar comentario"></textarea>
                                                                        </div>

                                                                    </div>
                                                                    <!-- /.card-body -->
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <div class="modal fade" id="modal<?php echo $aves['idAves'] ?>">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Fecha de retiro del ave</h4>

                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="../../../controller/fechaRetiroave.php" method="post">
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">Fecha de Retiro</label>
                                                                            <input type="datetime-local" name="fechaRe" class="form-control" id="exampleInputPassword1">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">Motivo del Retiro</label>
                                                                            <input type="text" name="retirada" class="form-control" id="exampleInputPassword1">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input name="idAve" value="<?php echo $aves['idAves'] ?>" min="1" type="text" hidden class="form-control" id="exampleInputEmail1">
                                                                        </div>

                                                                    </div>
                                                                    <!-- /.card-body -->
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>

                                                <div class="modal fade" id="modal-va<?php echo $aves['idAves'] ?>">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Vacunas del ave</h4>

                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="../../../controller/vacunas.php" method="post">
                                                                    <div class="card-body">

                                                                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                                                            <?php foreach ($fila5 as $vacu) { ?>

                                                                                <input type="checkbox" value="<?php echo $vacu['idvacunas']  ?>" name="vacunas_idvacunas[]" id="btncheck<?php echo $vacu['idvacunas']; ?>" autocomplete="off">
                                                                                <hr>
                                                                                <label for="btncheck1"><?php echo $vacu['detalle']  ?></label>
                                                                            <?php } ?>

                                                                            <input name="aves_idAves" value="<?php echo $aves['idAves'] ?>" min="1" type="text" class="form-control" id="exampleInputEmail1" hidden>

                                                                            <input name="aves_idAves" value="<?php echo $aves['idAves'] ?>" min="1" type="text" class="form-control" id="exampleInputEmail1" hidden>
                                                                        </div>


                                                                        <div class="form-group">
                                                                            <input name="idAve" value="<?php echo $aves['idAves'] ?>" min="1" type="text" hidden class="form-control" id="exampleInputEmail1">
                                                                        </div>

                                                                    </div>
                                                                    <!-- /.card-body -->
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-header -->

                            <h1 style="text-align: center;">Aves Inactivas</h1>
                            <br>
                            <div class="card-body">
                                <table id="example3" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id ave</th>
                                            <th>Especie</th>
                                            <th>Peso</th>
                                            <th>Estado de salud</th>
                                            <th>Fecha de vacunacion</th>
                                            <th>Fecha Ingreso</th>
                                            <th>lote del ave</th>
                                            <th>seguimiento Salud</th>
                                            <th>Fecha de retiro</th>
                                            <th>Motivo de </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($fila4 as $aves) { ?>
                                            <tr>
                                                <td scope="row"><?php echo $aves['idAves'] ?></td>
                                                <td><?php echo $aves['especie'] ?></td>
                                                <td><?php echo $aves['peso'] ?></td>
                                                <td><?php echo $aves['estadoSalud'] ?></td>
                                                <td><?php echo $aves['fechaVacunacion'] ?></td>
                                                <td><?php echo $aves['fechaIngreso'] ?></td>
                                                <td><?php echo $aves['LoteAves_idLoteAves'] ?></td>

                                                <td> <button value="<?php echo $aves['idAves'] ?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-salud<?php echo $aves['idAves'] ?>">
                                                        Seguimiento de salud
                                                    </button></td>

                                                <td><?php echo $aves['fechaDeRetiro'] ?>
                                                <td><?php echo $aves['motivoRetiro'] ?>
                                                    </button></td>


                                                <div class="modal fade" id="modal-salud<?php echo $aves['idAves'] ?>">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Seguimiento de las aves</h4>

                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="../../../controller/seguimientoSalud.php" method="post">
                                                                    <div class="card-body">

                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Nombre de la vacuna</label>
                                                                            <input name="nombreva" min="1" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre de la vacuna">


                                                                            <input name="idAve" value="<?php echo $aves['idAves'] ?>" min="1" type="number" class="form-control" id="exampleInputEmail1">

                                                                        </div>
                                                                        <div class="form-group">n 
                                                                            <label for="exampleInputEmail1">Entorno</label>
                                                                            <input name="entorno" min="1" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre de lote">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Sintomas</label>
                                                                            <input name="sintoma" min="1" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre de lote">
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Comentario adicional</label>
                                                                            <textarea class="form-control" name="comentarioAd" rows="3" placeholder="Agregar comentario"></textarea>
                                                                        </div>

                                                                    </div>
                                                                    <!-- /.card-body -->
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <div class="modal fade" id="modal-default<?php echo $aves['idAves'] ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Fecha de retiro del ave</h4>

                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="../../../controller/fechaRetiroave.php" method="post">
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputPassword1">Fecha de Retiro</label>
                                                                            <input type="date" name="fechaRe" class="form-control" id="exampleInputPassword1">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <input name="idAve" value="<?php echo $aves['idAves'] ?>" min="1" type="text" class="form-control" id="exampleInputEmail1">
                                                                        </div>

                                                                    </div>
                                                                    <!-- /.card-body -->
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            <?php } ?>
                                    </tbody>
                                </table>
                            </div>


                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
        </div>
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
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        $(function() {
            $("#example3").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
            $('#example4').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>