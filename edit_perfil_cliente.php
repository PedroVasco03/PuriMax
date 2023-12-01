<?php

    include "sessao2.php";
    include "conexao.php";

    $id_usu = $_SESSION['usu_nva2'];

    if(isset($_POST['edit'])){

       $nome = $_POST['nome'];
       $email = $_POST['email'];
       $senha = $_POST['senha'];
       $rua = $_POST['rua'];
       $mun = $_POST['mun'];
       $cont = $_POST['cont'];
       $bai = $_POST['bai'];

       mysqli_query($con,"UPDATE tb_usuario SET nome='$nome', email='$email', senha='$senha', nva=2, rua='$rua',municipio='$mun',contacto=$cont,bairro='$bai' WHERE id_usu=$id_usu");

       echo "
       <h3 class='text-white bg-success text-center'>
          Editado com sucesso <a href='' style='color:lightgreen''>x<a>
       </h3>
    ";
    }
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PuriMax</title>
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
              <a class="sidebar-link" href="index_cliente.php" aria-expanded="false">
                <span>
                  <i class="ti ti-home-2"></i>
                </span>
                <span class="hide-home">Home</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="pedido_cliente.php" aria-expanded="false">
                <span>
                  <i class="ti ti-send"></i>
                </span>
                <span class="hide-menu">Fazer pedidos</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="chat_cli.php" aria-expanded="false">
                <span>
                  <i class="ti ti-mail"></i>
                </span>
                <span class="hide-menu">Chat</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="edit_perfil_cliente.php" aria-expanded="false">
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

                  $id_usu = $_SESSION['usu_nva2'];

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
                    <a href="edit_perfil_cliente.php" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">Perfil</p>
                    </a>
                    <a href="pedido_cliente.php" class="d-flex align-items-center gap-2 dropdown-item">
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
              <h5 class="card-title fw-semibold mb-4">Editar perfil</h5>
              <div class="card">
                <div class="card-body">
                  <form action="" method="POST">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nome de usuário</label>
                      <input type="text" class="form-control" name="nome" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Email</label>
                      <input type="text" class="form-control" name="email" id="exampleInputPassword1">
                    </div>
                    <div class="mb-8">
                      <label for="exampleInputPassword1" class="form-label">Senha</label>
                      <input type="password" class="form-control" name="senha" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Rua</label>
                      <input type="text" class="form-control" name="rua" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Município</label>
                      <input type="text" class="form-control" name="mun" id="exampleInputPassword1">
                    </div>
                    <div class="mb-8">
                      <label for="exampleInputPassword1" class="form-label">Contacto</label>
                      <input type="text" class="form-control" name="cont" id="exampleInputPassword1">
                    </div>
                    <div class="mb-8">
                      <label for="exampleInputPassword1" class="form-label">Bairro</label>
                      <input type="text" class="form-control" name="bai" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary" name="edit"><i class="ti ti-edit fs-6"></i>Editar</button>
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