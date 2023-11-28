<?php session_start();
include('../../../models/MySQL.php');
// Paso 1: Preparar una consulta SQL usando consultas preparadas.
// Paso 2: Ejecutar la consulta preparada.
$conexion = new MySQL();
$pdo = $conexion->conectar();
$stmt = $pdo->prepare("SELECT pedidos.idPedidos AS numeroDelPedido,pedidos.fecha,clientes.nombreCompleto AS nombreCliente,clientes.direccion,detallepedidos.cantidad,pedidos.tipoPago,pedidos.estado, usuario.nombreCompleto FROM pedidos
INNER JOIN clientes ON clientes.idClientes = pedidos.Clientes_idClientes
INNER JOIN detallepedidos ON detallepedidos.Pedidos_idPedidos = pedidos.idPedidos  
INNER JOIN usuario ON usuario.idUsuario = pedidos.Usuario_idUsuario 
WHERE pedidos.estado = 2;");
$stmt->execute();
?>


<!DOCTYPE html>
<html lang="en">
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
if (isset($_SESSION['error2'])) {
?>
  <script>
    let msj = '<?php echo $_SESSION['error'] ?>'
    let titulo = '<?php echo $_SESSION['error2'] ?>'
    Swal.fire(
      titulo,
      msj,
      'error'
    )
  </script>
<?php
  unset($_SESSION['error2']);
}
?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>El huevo | Feliz</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />


  <!-- CDN CSS BOOSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


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



  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css" />


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
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  inventario
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../../pages/inventario/index.php" class="nav-link ">
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
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                  Logistica
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="../../pages/logistica/AceptarPedidos.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Confirmar Pedidos</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../../pages/logistica/asignarConductores.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Asignar Conductores</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../../pages/logistica/ConfirmarEntrega.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Entregas Pendientes</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="../../pages/logistica/EntregasConfirmadas.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Entregas Confirmadas</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
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
                  <a href="../../pages/tables/simple.html" class="nav-link">
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
          <div class="row">
            <div class="col-sm-12">
              <h1 class="m-0 mb-3 text-center">Finalizar Entrega</h1>
              <div class="card mb-5">
                <div class="card-header">
                  <h3 class="card-title">Tabla Entrega de Pedidos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Id Pedido</th>
                        <th>Fecha Creación</th>
                        <th>Nombre Cliente</th>
                        <th>Dirección</th>

                        <th>Cantidad</th>
                        <th>Tipo de Pago</th>
                        <th>Estado</th>
                        <th>conductor</th>
                        <th>Finalizar Pedido</th>
                    </thead>
                    <tbody>
                      <?php

                      //  Cerrar la conexión a la base de datos.
                      $pdo = null;
                      try {
                        while ($fila1 = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      ?>
                          <tr>
                            <td><?php echo $fila1['numeroDelPedido'] ?></td>
                            <td><?php echo $fila1['fecha'] ?></td>
                            <td><?php echo $fila1['nombreCliente'] ?></td>
                            <td><?php echo $fila1['direccion'] ?></td>
                            <td><?php echo $fila1['cantidad'] ?></td>
                            <td><?php echo $fila1['tipoPago'] ?></td>
                            <td><?php echo $fila1['estado'] ?></td>
                            <td><?php echo $fila1['nombreCompleto'] ?></td>


                            <td>
                              <form action="../../../controller/confirmarEntrega.php" method="post">
                                <input type="text" class="form-control" id="numeroDelPedido" name="numeroDelPedido" aria-describedby="emailHelp" value="<?php echo $fila1['numeroDelPedido'] ?>" hidden>


                                <button type="submit" class="btn btn-success">Confirmar Entrega</button>
                              </form>
                            </td>
                          </tr>

                          <!-- Button trigger modal -->


                          <!-- Modal -->
                          <!-- <div class="modal fade" id="confirmarPedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Estado</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <form method="post" action="../../../controller/aceptarPedido.php">
                                    <div class="mb-3">
                                      <input type="text" class="form-control" id="idPedidos" name="idPedidos" aria-describedby="emailHelp" value="<?php echo $fila1['idPedidos'] ?>" hidden>
                                      <label for="exampleInputEmail1" class="form-label">Tipo de estado</label>
                                      <select class="form-select" aria-label="Default select example" name="estadoPedido">
                                        <option selected>Opciones</option>
                                        <option value="1">Aceptar</option>
                                        <option value="0">Rechazar</option>

                                      </select>
                                    </div>


                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                                      <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                  </form>
                                </div>

                              </div>
                            </div>
                          </div> -->


                      <?php
                        }
                      } catch (\Throwable $th) {
                        echo "Error: " . $e->getMessage();
                      }

                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Id Pedido</th>
                        <th>Fecha Creación</th>
                        <th>Nombre Cliente</th>
                        <th>Dirección</th>

                        <th>Cantidad</th>
                        <th>Tipo de Pago</th>
                        <th>Estado</th>
                        <th>Conductor</th>
                        <th>Finalizar Pedido</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div><!-- /.card -->
            </div><!-- /.col -->
          </div><!-- /.row -->



        </div><!-- /.container-fluid -->
      </div><!-- /.content-header -->
    </div><!-- /.content-wrapper -->






    <!-- Incio Modal Para Cancelar la entrega del pedido -->

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Cancelar Entrega De Pedido</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form action="">
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-4">

                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Id Pedido</label>
                      <input type="text" class="form-control" disabled id="exampleFormControlInput1" placeholder="Id Pedido">
                    </div>

                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Fecha Creación</label>
                      <input type="text" class="form-control" disabled id="exampleFormControlInput1" placeholder="Fecha Creación">
                    </div>

                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Cantidad</label>
                      <input type="text" class="form-control" disabled id="exampleFormControlInput1" placeholder="Cantidad">
                    </div>

                  </div>

                  <div class="col-4">

                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Nombre Cliente</label>
                      <input type="text" class="form-control" disabled id="exampleFormControlInput1" placeholder="Nombre Cliente">
                    </div>

                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Tipo de Pago</label>
                      <input type="text" class="form-control" disabled id="exampleFormControlInput1" placeholder="Tipo de Pago">
                    </div>

                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Id Lote</label>
                      <input type="text" class="form-control" disabled id="exampleFormControlInput1" placeholder="Id Lote">
                    </div>

                  </div>

                  <div class="col-4">

                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Dirección</label>
                      <input type="text" class="form-control" disabled id="exampleFormControlInput1" placeholder="Dirección">
                    </div>

                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Estado</label>
                      <input type="text" class="form-control" disabled id="exampleFormControlInput1" placeholder="Estado">
                    </div>

                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Conductor</label>
                      <input type="text" class="form-control" disabled id="exampleFormControlInput1" placeholder="Conductor">
                    </div>

                  </div>

                </div>

                <div class="row">
                  <div class="col-12">
                    <label for="exampleFormControlInput1" class="form-label">Motivo de Cancelación</label>
                    <textarea class="form-control" id="exampleTextarea" rows="5" style="resize: none;"></textarea>

                  </div>
                </div>
              </div>



            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button type="button" class="btn btn-danger btn-lg text-center" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary btn-lg text-center">Confirmar</button>
            </div>
        </div>

        </form>

      </div>
    </div>
  </div>

  <!-- Fin  Modal Para Cancelar la entrega del pedido -->


  <!-- /Fin de la cabecera del cuerpo index-header -->

  <!-- Cuerpo del contenido -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
        </div>
        sfsfs
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



  <!-- jQuery -->


  <!-- DataTables  & Plugins -->
  <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <!-- Opciones de los reportes -->
  <script src="../../plugins/jszip/jszip.min.js"></script>
  <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>





  <!-- Page specific script -->
  <script>
    $(function() {
      $("#example1")
        .DataTable({
          responsive: true,
          lengthChange: false,
          autoWidth: false,
          buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        })
        .buttons()
        .container()
        .appendTo("#example1_wrapper .col-md-6:eq(0)");
      $("#example2").DataTable({
        paging: true,
        lengthChange: false,
        searching: false,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
      });
    });
  </script>



  <!-- JS BOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>