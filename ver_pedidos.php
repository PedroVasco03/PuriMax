<?php
    
    include "sessao1.php";

    include "conexao.php";


    if(isset($_GET['id_del'])){
      $id = $_GET['id_del'];

      $delete = mysqli_query($con,"DELETE FROM tb_pedido WHERE id_ped=$id");



      header("location:http://localhost:8081/PuriMax/ver_pedidos.php");

    }

    if(isset($_GET['id_est'])){
      $id = $_GET['id_est'];

      $estado = "Aceite";

      $select_quant_stock = mysqli_query($con,"SELECT *FROM tb_stock WHERE id_stock=1");
      $row_quant_stock = mysqli_fetch_array($select_quant_stock);
      $quant_stock = $row_quant_stock['quant'];


      $select_quant_ped = mysqli_query($con,"SELECT *FROM tb_pedido WHERE id_ped=$id");
      $row_quant_ped = mysqli_fetch_array($select_quant_ped);
      $quant_ped = $row_quant_ped['quant'];

      $nova_quant = $quant_stock - $quant_ped;

      mysqli_query($con,"UPDATE tb_pedido SET estado='$estado' WHERE id_ped=$id");

      mysqli_query($con,"UPDATE tb_stock SET quant=$nova_quant WHERE id_stock=1");

     // header("location:http://localhost:8081/PuriMax/ver_pedidos.php");
    }

    if(isset($_GET['id_cont'])){

      $id_pedd = $_GET['id_cont'];
      
      $select_ped = mysqli_query($con,"SELECT *FROM tb_pedido WHERE id_ped=$id_pedd");

      $row_ped = mysqli_fetch_array($select_ped);

      $nome_ped = $row_ped['cliente'];

      $select_usuario = mysqli_query($con,"SELECT *FROM tb_usuario WHERE email='$nome_ped'");
                      
      $row_cont = mysqli_fetch_array($select_usuario);

    }

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PuriMax</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img"> 
            <h1 class="logo me-auto"> <img src="assets/images/logos/favicon.png" alt=""> <a href="index.html"><span style="color: black;">Puri</span><span>Max</span></a></h1>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu"></span>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Menu do usuário</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index_admin.php" aria-expanded="false">
                <span>
                  <i class="ti ti-home-2"></i>
                </span>
                <span class="hide-home">Home</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="stock.php" aria-expanded="false">
                <span>
                  <i class="ti ti-shopping-cart-plus"></i>
                </span>
                <span class="hide-menu">Add stock</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="ver_pedidos.php" aria-expanded="false">
                <span>
                  <i class="ti ti-send"></i>
                </span>
                <span class="hide-menu">Ver pedidos</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="chat_ad.php" aria-expanded="false">
                <span>
                  <i class="ti ti-mail"></i>
                </span>
                <span class="hide-menu">Chat</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="edit_perfil_admin.php" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Perfil</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Sessão</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="sair.php" aria-expanded="false">
                <span>
                  <i class="ti ti-logout"></i>
                </span>
                <span class="hide-menu">Terminar Sessão</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item col-sm-12">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Consultar pedidos" aria-describedby="emailHelp">
               
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <div
            class="text-success rounded-circle p-8 d-flex align-items-center justify-content-center">
            <i class="ti ti-search fs-6"></i>
          </div>
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
            <?php

                $id_usu = $_SESSION['usu_nva1'];

                $select_usu =  mysqli_query($con,"SELECT *FROM tb_usuario WHERE id_usu=$id_usu");

                $row_usu = mysqli_fetch_array($select_usu);
            ?>    
            <?php echo $row_usu['email'] ?>   
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <i class="ti ti-user fs-6"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="edit_perfil_admin.php" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">Perfil</p>
                    </a>
                    <a href="ver_pedidos.php" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">Pedidos</p>
                    </a>
                    <a href="sair.php" class="btn btn-outline-primary mx-3 mt-2 d-block"><i class="ti ti-logout"></i> Terminar Sessão</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->

      

      <div class="container-fluid">
        <!--  Row 1 -->







        <div class="row">

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Pedidos efectuados</h5>
              <div class="card">
                <div class="card-body p-4">
                  <div class="table-responsive">
                    <table class="table tabble-striped text-nowrap mb-0 align-middle">
                      <thead class="bg-primary fs-4">
                        <tr>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0" style="color: white;">Cliente</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0"  style="color: white;">Quantidade</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0"  style="color: white;">Preço</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0"  style="color: white;">Total</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0"  style="color: white;">Estado</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0"  style="color: white;">Data</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0"  style="color: white;">Operações</h6>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                        $select_pedidos = mysqli_query($con,"SELECT *FROM tb_pedido");
                        
                        while($row_pedido = mysqli_fetch_array($select_pedidos)){
                        ?>
                        <tr>
                          <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1"><?php echo $row_pedido['cliente'] ?></h6>                        
                          </td>
                          <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1"><?php echo $row_pedido['quant'] ?></h6>                        
                          </td>
                          <td class="border-bottom-0">
                            <p class="mb-0 fw-normal"><?php echo $row_pedido['preco'] ?></p>
                          </td>
                          <td class="border-bottom-0">
                            <div class="d-flex align-items-center gap-2">
                              <h6><?php echo $row_pedido['total'] ?></h6>
                            </div>
                          </td>
                          <td class="border-bottom-0">
                            <h6><?php echo $row_pedido['estado'] ?></h6>
                          </td>
                         
                          <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 fs-4"><?php echo $row_pedido['data_now'] ?></h6>
                          </td>
                          <td class="border-bottom-0">
                            <a href="ver_pedidos.php?id_del=<?php echo $row_pedido['id_ped'] ?>"><span class="badge bg-danger rounded-3 fw-semibold"><i class="ti ti-trash fs-6"></i></span></a> 
                            <a  href="ver_pedidos.php?id_est=<?php echo $row_pedido['id_ped'] ?>"><span class="badge bg-success rounded-3 fw-semibold"><i class="ti ti-check fs-6"></i></span></a>    
                          <!--  <a  href="ver_pedidos.php?id_vc=<?php echo $row_pedido['id_ped'] ?>"><span class="badge bg-warning rounded-3 fw-semibold"><i class="ti ti-map fs-6"></i></span></a>  -->
                          </td>
                        </tr> 
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
          </div>
         <!-- </div class="card">
              <div class="card-body">
                  <p><b>Rua:</b><?php echo $row_cont['rua'] ?></p>
                  <p><b>Município:</b><?php echo $row_cont['municipio'] ?></p>
                  <p><b>Contacto:</b><?php echo $row_cont['contacto'] ?></p>
                  <p><b>Bairro:</b><?php echo $row_cont['bairro'] ?></p>
              </div>
          </div> -->
        </div>
      </div>






        



        
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sidebarmenu.js"></script>
  <script src="assets/js/app.min.js"></script>
  <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="assets/js/dashboard.js"></script>
</body>

</html>