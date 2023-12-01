<?php

    include "sessao1.php";
    include "conexao.php";

    if(isset($_POST['add'])){

        if(isset($_POST['quant'])){

          $quant = $_POST['quant'];
          
          $select_quant_db = mysqli_query($con,"SELECT *FROM tb_stock WHERE id_stock=1");

          $row_quant = mysqli_fetch_array($select_quant_db);

          $quant_db = $row_quant['quant'];

          $quant_total = $quant_db+$quant;

          mysqli_query($con,"UPDATE tb_stock SET quant=$quant_total WHERE id_stock=1");
        
          echo"
          <h3 class='text-white bg-success text-center'>
            Adicionado com sucesso <a href='' class='text-light'>x<a>
          </h3>
          ";
          }
          if(!isset($_POST['quant'])){
            echo"
            <h3 class='text-white bg-danger text-center'>
              Insira a quantidade <a href='' class='text-light'>x<a>
            </h3>
            "; 
          }
    }


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
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

                include "conexao.php";

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
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Add stock</h5>
              <div class="card">
                <div class="card-body">
                  <form action="" method="POST">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nova quantidade</label>
                      <input type="number" min="1" name="quant" class="form-control" id="exampleInputEmail1" requered aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary" name="add">Adicionar</button>
                  </form>
                </div>
              </div>
          </div>
      </div>
    </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sidebarmenu.js"></script>
  <script src="assets/js/app.min.js"></script>
  <script src="assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>