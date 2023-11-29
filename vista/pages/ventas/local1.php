<?php
session_start();
//llamo la conexion a la BD
require_once '../../../models/MySQL.php';
// Intenta crear una instancia de la clase MySQL y establecer la conexión
$conexion = new Mysql();
$pdo = $conexion->conectar();
//TRAIGO DATOS CLIENTE
$traer = $pdo->prepare('SELECT nombreCompleto,numeroTelefono,
  correoElectronico,direccion,pass,idClientes 
  FROM clientes');
$traer->execute();

//TRAER PRODUCTOS Y PRECIOS
$traerPrecio = $pdo->prepare('SELECT precio 
  FROM precios');
$traerPrecio->execute();
//TRAE HUEVO TIPO A
$traerHuevoA = $pdo->prepare('SELECT precio FROM precios WHERE Tipo = "A"');
$traerHuevoA->execute();
$capHuevoA = $traerHuevoA->fetch(PDO::FETCH_ASSOC);
//capturo huevo TIPO A
$huevoA = $capHuevoA['precio'];
//TRAE HUEVO TIPO AA
$traerHuevoAA = $pdo->prepare('SELECT precio FROM precios WHERE Tipo = "AA"');
$traerHuevoAA->execute();
$capHuevoAA = $traerHuevoAA->fetch(PDO::FETCH_ASSOC);
//capturo HUEVO TIPO AA
$huevoAA = $capHuevoAA['precio'];
//TRAE HUEVO TIPO AAA
$traerHuevoAAA = $pdo->prepare('SELECT precio FROM precios WHERE Tipo = "AAA"');
$traerHuevoAAA->execute();
$capHuevoAAA = $traerHuevoAAA->fetch(PDO::FETCH_ASSOC);
//capturo HUEVO TIPO AAA
$huevoAAA = $capHuevoAAA['precio'];
//TRAE HUEVO TIPO PREMIUM
$traerHuevoPREMIUM = $pdo->prepare('SELECT precio FROM precios WHERE Tipo = "PREMIUM"');
$traerHuevoPREMIUM->execute();
$capHuevoPREMIUM = $traerHuevoPREMIUM->fetch(PDO::FETCH_ASSOC);
//capturo HUEVO TIPO PREMIUM
$huevoPREMIUM = $capHuevoPREMIUM['precio'];

//CONSULTA PARA LA TABLA FACTURA
$traerFactura = $pdo->prepare('SELECT
puntosventa.nombre AS lugarLocal,
encabezado.fechaCompra AS HoraDeVenta,
encabezado.idEncabezado AS IdFactura,
encabezado.total AS PrecioTotalFactura
FROM
encabezado
INNER JOIN puntosventa ON encabezado.PuntosVenta_idPuntosVenta = puntosventa.idPuntosVenta;');
$traerFactura->execute();
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
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Bootstrap JS (Popper.js and jQuery are required for Bootstrap JS) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
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
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../../index.php" class="nav-link">Inicio</a>
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
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Produccion
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../pages/layout/top-nav.html" class="nav-link">
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

              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Ventas
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../pages/ventas/local1.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      LOCAL 1
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../../pages/ventas/ingresosLocal1.php" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>VENTAS LOCAL 1</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../../pages/ventas/ingresosLocal1.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>INGRESOS LOCAL 1</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="../../pages/ventas/local2.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>LOCAL 2
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../../pages/ventas/local2.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>VENTAS LOCAL 2</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../../pages/ventas/ingresosLocal2.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>INGRESOS LOCAL 2</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="../../pages/ventas/local3.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>LOCAL 3
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../../pages/ventas/local3.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>VENTAS LOCAL 3</p>
                      </a>
                    </li>
                  </ul>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../../pages/ventas/ingresosLocal3.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>INGRESOS LOCAL 3</p>
                      </a>
                    </li>
                  </ul>
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
                <!-- <li class="nav-item">
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
                  </li> -->
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
            <div class="col-sm-6">
              <h1 class="m-0">Punto de Ventas 1</h1>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>

      <!-- Contenido Cuerpo -->
      <div class="container-fluid">
        <div class="row">
          <!-- SELECT2 EXAMPLE -->
          <div class="col m-2 d-flex justify-content-end">
            <div class="card card-default w-75">
              <div class="card-header">
                <h3 class="card-title">Modulo Clientes</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body ">
                <div class="row">
                  <div class="col-12 d-flex justify-content-center mx-0 px-0">
                    <!-- productos inventario -->
                    <div class="form-group" style="width:60%;">
                      <label>Cedula Cliente</label>
                      <select class=" form-control select2 select2-danger" data-dropdown-css-class="select2-danger" name="cedula" id="cedula" onchange="select(this)" style="width:100%;">
                        <option selected></option>
                        <?php while ($fila2 = $traer->fetch(PDO::FETCH_ASSOC)) { ?>
                          <option value="<?php echo $fila2["idClientes"]; ?>">
                            <?php echo $fila2["idClientes"]; ?>
                          </option>

                        <?php } ?>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 d-flex justify-content-center">
                    <!-- nombre  -->
                    <div class="form-group" style="width: 60%; ">
                      <label>Nombre:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                        </div>
                        <input type="text" class="form-control" readonly id="nombre">
                      </div>
                      <!-- /.input group -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12  d-flex justify-content-center">
                    <!-- telefono mask -->
                    <div class="form-group" style="width: 60%; ">
                      <label>Telefono:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-mobile"></i></span>
                        </div>
                        <input type="text" class="form-control" readonly id="telefono">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12  d-flex justify-content-center">
                    <!-- email mask -->
                    <div class="form-group" style="width: 60%; ">
                      <label>Email:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input type="text" class="form-control" readonly id="correo">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.card -->
          <div class="col m-2 d-flex justify-content-start">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Vender Productos </h3>
              </div>
              <div class="card-body">
                <!-- productos inventario -->
                <div class="form-group">
                  <label>Productos</label>
                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="huevos">
                    <option id="1-1">Huevo A</option>
                    <option id="2-1">Huevo AA</option>
                    <option id="3-1">Huevo AAA</option>
                    <option id="4-1">Huevo PREMIUM</option>
                    <option id="1-30">Panal de Huevo A</option>
                    <option id="2-30">Panal de Huevo AA</option>
                    <option id="3-30">Panal de Huevo AAA</option>
                    <option id="4-30">Panal de Huevo PREMIUM</option>
                    <option id="1-15">Medio Panal de Huevo A</option>
                    <option id="2-15">Medio Panal de Huevo AA</option>
                    <option id="3-15">Medio Panal de Huevo AAA</option>
                    <option id="4-15">Medio Panal de Huevo PREMIUM</option>
                  </select>
                </div>
                <!-- Cantidad mask -->
                <div class="form-group" style="width: 100%; ">
                  <label>Cantidad:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-check-square"></i></span>
                    </div>
                    <input type="number" class="form-control" id="cantidad">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
              <!-- /.form group -->
              <div class="form-group text-center">
                <button type="button" class="btn btn-success w-50 btn-lg border" id="agregar">
                  <i class="fa fa-cart-arrow-down"></i> Añadir</button>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->
      <div class="row mt-3 m-1">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">LISTA PRODUCTOS</h3>
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap" id="listarProductos">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
              <div class="col-10 text-left" id="total" style="font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                 font-size:large; font-weight: bold;"></div>
            </div>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <div class="row d-flex justify-content-center">
            <!-- left column -->
            <div class="col-md-6">
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Datos de Venta <small>Punto de venta-1</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Valor Recibido</label>
                    <input type="number" name="recibido" class="form-control" id="valorRecibido" placeholder="valorRecibido">
                  </div>
                  <div class="form-group">
                    <label>Metodos de Pago</label>
                    <select class="form-select" aria-label="Default select example" id="metodo" onchange="mostrarInput()" name="metodo">
                      <option value="1">Efectivo</option>
                      <option value="2">Debito</option>
                      <option value="3">Credito</option>
                    </select>
                  </div>

                  <div class="form-group" style="display: none;" id="inputContainer">
                    <label for="metodoPago">Número de Tarjeta:</label>
                    <input type="number" class="form-control" placeholder="Numero Tarjeta" id="numeroTarjeta">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary bi bi-bag" onclick="vender()"> Vender</button>
                </div>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
          </div>
        </div>
      </div>
      <!-- Table Facturas -->
      <div class="row m-2">
        <div class="card col-12">
          <div class="card-header">
            <h3 class="card-title">Registro de Ventas</h3>
          </div>
          <!-- /.card-header  -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Local 1</th>
                  <th>Hora Venta</th>
                  <th>N°Factura</th>
                  <th>Precio Total</th>
                  <th>Ver Factura</th>
                  <th>Devolucion</th>
                </tr>
              </thead>
              <tbody>
                <!-- <tr>
                  <td>Local 1 Huevo Feliz</td>
                  <td>Camilo Roncon</td>
                  <td>Niko Tesla</td>
                  <td>24/11/2023-8:00:00</td>
                  <td>101</td>
                  <td>46.000</td>
                  <td class="text-center"><button type="button" class="btn btn-info bi bi-eye"></button></td>
                  <td class="text-center"><button type="button" class="btn btn-danger bi bi-arrow-clockwise"></button></td>
                </tr> -->
                <?php while ($fila2 = $traerFactura->fetch(PDO::FETCH_ASSOC)) { ?>
                  <tr>
                    <th scope="row"> <?php echo $fila2['lugarLocal'] ?></th>
                    <th scope="row"> <?php echo $fila2['HoraDeVenta'] ?></th>
                    <th scope="row"> <?php echo $fila2['IdFactura'] ?></th>
                    <th scope="row"> <?php echo $fila2['PrecioTotalFactura'] ?></th>
                    <td class="text-center"><button type="button" class="btn btn-info bi bi-eye" onclick="descargar('<?php echo $fila2['IdFactura'] ?>')"></button></td>
                    <td class="text-center"><button type="button" class="btn btn-danger bi bi-arrow-clockwise" data-toggle="modal" data-target="#devolucion<?php echo $fila['IdFactura'] ?>"></button></td>
                  </tr>
                  <!-- modales -->
                  <div class="modal fade" id="devolucion<?php echo $fila['IdFactura'] ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Cantidad a Recibir</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="../../../controller/ventas/agregarDesc1.php" method="POST">
                          <div class="modal-body">
                            <!-- TOTAL RECIBIDO -->
                            <div class="form-group" style="width: 80%;">
                              <label>DESCUENTO %:</label>

                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-plus"></i></span>
                                </div>
                                <input type="number" name="descuento" class="form-control" data-mask name="recibido">
                                <input type="text" name="idIngresos" value="<?php echo $fila['idIngresos'] ?>" hidden>
                              </div>
                              <!-- /.input group -->
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary bi bi-cash-coin"> Comprar</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Local 1</th>
                  <th>Hora Venta</th>
                  <th>N° Factura</th>
                  <th>Precio Total</th>
                  <th>Ver factura</th>
                  <th>Devolucion</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>

    </div>

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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <!-- Mostrar Factura por el id del encabezado -->
  <script>
    function descargar(id2) {
      let ruta = window.location.href;
      let rutaBien = ruta.replace("vista/pages/ventas/local1.php", "");
      let rutaCompleta = `${rutaBien}controller/ventas/tickes/Ticket_Nro_${id2}.pdf`;
      const downloadLink = document.createElement("a");
      downloadLink.href = rutaCompleta;
      downloadLink.style.display = "none";
      downloadLink.download = `Ticket_Nro_${id2}.pdf`;
      document.body.appendChild(downloadLink);
      downloadLink.click();
      document.body.removeChild(downloadLink);
    }
  </script>
  <!-- script para Listar los productos -->
  <script>
    var boton = document.getElementById("agregar");
    var lista = document.getElementById("listarProductos");
    var data = [];
    var cant = 0;
    boton.addEventListener("click", agregar);

    function agregar() {
      var select = document.getElementById("huevos");
      var tipo = select.value;
      if (tipo == 'Huevo A') {
        var nombre = tipo;
        var precio = <?php echo json_encode($huevoA); ?>;
        var total2 = precio;
      } else if (tipo == 'Huevo AA') {
        var nombre = tipo;
        var precio = <?php echo json_encode($huevoAA); ?>;
        var total2 = precio;
      } else if (tipo == 'Huevo AAA') {
        var nombre = tipo;
        var precio = <?php echo json_encode($huevoAAA); ?>;
        var total2 = precio;
      } else if (tipo == 'Huevo PREMIUM') {
        var nombre = tipo;
        var precio = <?php echo json_encode($huevoPREMIUM); ?>;
        var total2 = precio;
      } else if (tipo == 'Panal de Huevo A') {
        var nombre = tipo;
        var precio = <?php echo json_encode($huevoA); ?>;
        var total2 = precio * 30;
      } else if (tipo == 'Panal de Huevo AA') {
        var nombre = tipo;
        var precio = <?php echo json_encode($huevoAA); ?>;
        var total2 = precio * 30;
      } else if (tipo == 'Panal de Huevo AAA') {
        var nombre = tipo;
        var precio = <?php echo json_encode($huevoAAA); ?>;
        var total2 = precio * 30;
      } else if (tipo == 'Panal de Huevo PREMIUM') {
        var nombre = tipo;
        var precio = <?php echo json_encode($huevoPREMIUM); ?>;
        var total2 = precio * 30;
      } else if (tipo == 'Medio Panal de Huevo A') {
        var nombre = tipo;
        var precio = <?php echo json_encode($huevoA); ?>;
        var total2 = precio * 15;
      } else if (tipo == 'Medio Panal de Huevo AA') {
        var nombre = tipo;
        var precio = <?php echo json_encode($huevoAA); ?>;
        var total2 = precio * 15;
      } else if (tipo == 'Medio Panal de Huevo AAA') {
        var nombre = tipo;
        var precio = <?php echo json_encode($huevoAAA); ?>;
        var total2 = precio * 15;
      } else if (tipo == 'Medio Panal de Huevo PREMIUM') {
        var nombre = tipo;
        var precio = <?php echo json_encode($huevoPREMIUM); ?>;
        var total2 = precio * 15;
      }
      var cantidad = parseFloat(document.getElementById("cantidad").value);
      const mismoProd = data.some((objeto) => objeto.nombre === tipo);
      var total = total2 * cantidad;
      if (cantidad > 0) {
        if (!mismoProd) {
          data.push({
            id: cant,
            nombre: nombre,
            total2: total2,
            cantidad: cantidad,
            total: total,
          });
          var id_row = "row" + cant;
          var fila =
            "<tr id=" +
            id_row +
            "> <td>" +
            cant +
            "</td> <td>" +
            nombre +
            "</td> <td>" +
            total2 +
            "</td> <td>" +
            cantidad +
            "</td> <td>" +
            total +
            // <button type="button" class="btn btn-danger bi bi-trash"></button>
            "</td> <td > <button class='btn btn-danger btn-lg bi bi-trash' onclick='eliminar(" +
            cant +
            ")'</button> </td> <td> <button class='btn btn-warning btn-lg bi bi-pencil-square' onclick='cantidad(" +
            cant +
            ")';></button> </td> </tr>";
          //agregar tabla
          $("#listarProductos").append(fila);
          $("#cantidad").val("");
          $("#huevos").focus();
          cant++;
          sumar();
        } else {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Este producto ya esta agregado modifique la cantidad",
          });
        }
      } else {
        Swal.fire({
          icon: "info",
          title: "Alerta",
          text: "Selecciona un Tipo y Cantidad",
        });
      }
    }

    function sumar() {
      var tot = 0;
      for (x of data) {
        tot = tot + x.total;
      }
      document.getElementById("total").innerHTML = "Total : " + tot;
      document.getElementById("valorRecibido").value = +tot;
    }


    function vender(e) {
      // e.preventDefault();
      const cedula2 = document.getElementById("cedula").value;
      let valorRecibido2 = document.getElementById("valorRecibido").value;
      //valorRecibido2 = valorRecibido2.replace(/\./g, "");
      const nombre = document.getElementById("nombre").value;
      const tipoPago = document.getElementById("metodo").value;
      const numeroTarjeta = document.getElementById("numeroTarjeta").value;
      let idUser = 1;
      // const cedulaCajero = document.getElementById("cajeroId").value;
      if (cedula2.length > 0 && nombre.length > 0) {
        let total2 = 0;
        for (const key of data) {
          total2 = total2 + key.total;
        }
        if (parseFloat(valorRecibido2) >= parseInt(total2)) {
          let xhr = new XMLHttpRequest();
          let datosUseryCajero = {
            idCliente: cedula2,
            nombreCliente: nombre,
            tipoPago: tipoPago,
            numeroTarjeta: numeroTarjeta,
            total: total2,
            valorRecibido: valorRecibido2,
            puntoVenta: 1,
            estadoEnca: 0,
            idUsuario: idUser
          };
          let datosFin = {
            datosUser: datosUseryCajero,
            datosCompra: data,
          };
          xhr.open("POST", "../../../controller/ventas/agregarComprar.php", true);
          xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
          xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
              let respuesta = xhr.responseText;
              Swal.fire("Factura Generada", "Venta Realizada", "success");
              setTimeout(() => {
                let ruta = window.location.href;
                console.log("RUTA", ruta);
                let rutaBien = ruta.replace("vista/pages/ventas/local1.php", "");
                console.log("RUTA BIEN", rutaBien);
                let rutaCompleta = `${rutaBien}controller/ventas/tickes/Ticket_Nro_${respuesta}.pdf`;
                console.log("RUTA COMPLETA", rutaCompleta)
                const downloadLink = document.createElement("a");
                downloadLink.href = rutaCompleta;
                downloadLink.style.display = "none";
                downloadLink.download = `Ticket_Nro_${respuesta}.pdf`;
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
                location.reload();
              }, 2000);
              $("#codProd").val("");
              $("#nombreProd").val("");
              $("#precioProd").val("");
              $("#cantidadProd").val("");
            }
          };
          let datos3 = JSON.stringify(datosFin);
          xhr.send(datos3);
        } else {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "La Cantidad Recibida es Menor al Total",
          });
        }
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Ingrese Algun Cliente",
        });
      }
    }


    function eliminar(row) {
      //remover la fila de la tabla
      $("#row" + row).remove();
      var i = 0;
      var pos = 0;
      for (x of data) {
        if (x.id == row) {
          pos = i;
        }
        i++;
      }
      data.splice(pos, 1);
      sumar();
    }

    function cantidad(row) {
      var canti = parseFloat(prompt("Nueva cantidad"));
      data[row].cantidad = canti;
      data[row].total = data[row].cantidad * data[row].total2;
      var filaId = document.getElementById("row" + row);
      celda = filaId.getElementsByTagName("td");
      celda[3].innerHTML = canti;
      celda[4].innerHTML = data[row].total;
      sumar();
    }
  </script>
  </div>
  <script src="../../dist/js/listarProductos.js"></script>
  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge("uibut            ton", $.ui.button);
  </script>
  <!-- Select2 -->
  <script src="../../plugins/select2/js/select2.full.min.js"></script>
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
  <!-- DataTables  & Plugins -->
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
  <!-- Sweel Alerts -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- actualizar inputs -->
  <!-- Mostrar Numero Tarjeta -->
  <script>
    function mostrarInput() {
      var selectPago = document.getElementById("metodo");
      var inputContainer = document.getElementById("inputContainer");
      var inputCambio = document.getElementById("valorRecibido")
      // Obtén el valor seleccionado del select
      var valorSeleccionado = selectPago.value;
      // Muestra u oculta el input según el valor seleccionado
      if (valorSeleccionado === "2" || valorSeleccionado === "3") {
        inputContainer.style.display = "block";
        inputCambio.readOnly = true;
      } else {
        inputContainer.style.display = "none";
        // También puedes limpiar el valor del input si lo ocultas
        document.getElementById("numeroTarjeta").value = "";
      }
    }
  </script>
  <!--- MENSAJE EXITOSO -->
  <script>
    <?php
    if (isset($_SESSION["mensajeExitoso"])) {
      echo  "Swal.fire({
        icon: 'success',
        title: 'Éxito',
        text: '" . $_SESSION["mensajeExitoso"] . "'
      });";
      unset($_SESSION["mensajeExitoso"]);
    }
    ?>
  </script>
  <!--- MENSAJE ERROR -->
  <script>
    <?php
    if (isset($_SESSION["mensajeError"])) {
      echo  "Swal.fire({
        icon: 'success',
        title: 'Éxito',
        text: '" . $_SESSION["mensajeError"] . "'
      });";
      unset($_SESSION["mensajeError"]);
    }
    ?>
  </script>
  <script>
    function select(e) {
      let cedula = document.getElementById("cedula").value;
      let xmr = new XMLHttpRequest();
      xmr.open("POST", "../../../controller/ventas/buscarCliente.php", true);
      xmr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xmr.onreadystatechange = function() {
        if (xmr.readyState == 4 && xmr.status == 200) {
          let response = JSON.parse(xmr.responseText);
          const nombreClienteInput = document.getElementById('nombre');
          const telefonoClienteInput = document.getElementById('telefono');
          const correoClienteInput = document.getElementById('correo');
          for (let index = 0; index < response.length; index++) {
            nombreClienteInput.value = response[index].nombreCompleto;
            telefonoClienteInput.value = response[index].numeroTelefono;
            correoClienteInput.value = response[index].correoElectronico;
          }
        }
      }
      xmr.send("cedula=" + cedula);
    }
  </script>
  <script>
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
      })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
      })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date picker
      $('#reservationdate').datetimepicker({
        format: 'L'
      });

      //Date and time picker
      $('#reservationdatetime').datetimepicker({
        icons: {
          time: 'far fa-clock'
        }
      });

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker({
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function(start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })

      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      })

      $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
      url: "/target-url", // Set the url
      thumbnailWidth: 80,
      thumbnailHeight: 80,
      parallelUploads: 20,
      previewTemplate: previewTemplate,
      autoQueue: false, // Make sure the files aren't queued until manually added
      previewsContainer: "#previews", // Define the container to display the previews
      clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
      // Hookup the start button
      file.previewElement.querySelector(".start").onclick = function() {
        myDropzone.enqueueFile(file)
      }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
      document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
      // Show the total progress bar when upload starts
      document.querySelector("#total-progress").style.opacity = "1"
      // And disable the start button
      file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
      document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
      myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
      myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
  </script>
  <!-- tables -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["excel", "pdf", "print"]
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
  <!-- tables -->
  <script>
    $(function() {
      $("#exampleNiko").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["excel", "pdf", "print"]
      }).buttons().container().appendTo('#exampleNiko_wrapper .col-md-6:eq(0)');
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
</body>

</html>