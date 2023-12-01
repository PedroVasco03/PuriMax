<?php

      include "sessao2.php";
      include "conexao.php";

     
      $id_usu = $_SESSION['usu_nva2'];

      $select_email_usu = mysqli_query($con,"SELECT *FROM tb_usuario WHERE id_usu=$id_usu");

      $row_email_usu = mysqli_fetch_array($select_email_usu);

      $email = $row_email_usu['email'];


      $select_quant_stock = mysqli_query($con,"SELECT *FROM tb_stock WHERE id_stock=1");

      $row_quant_stock = mysqli_fetch_array($select_quant_stock);

      $quant_stock = $row_quant_stock['quant'];

      if(isset($_POST['quant'])){

        $quant = $_POST['quant'];
        $preco = 1000;
        $total = $quant*$preco;
        $estado = "Pendente";
        $data = date("d/m/y");

        if($quant > $quant_stock){
          echo "
          <h3 class='text-white bg-danger text-center'>
              Quantidade inválida, temos apenas $quant_stock ml <a href='' style='color:red'>x<a>
          </h3>
       ";
        }
        else{  

          mysqli_query($con,"INSERT INTO tb_pedido(cliente,quant,preco,total,estado,data_now) VALUES('$email',$quant,$preco,$total,'$estado','$data')");

          echo "
          <h3 class='text-white bg-success text-center'>
             Pedido efectuado com sucesso <a href='' style='color:lightgreen''>x<a>
          </h3>
       ";

        }
      }


    if(isset($_GET['id'])){
      $id = $_GET['id'];

      $delete = mysqli_query($con,"DELETE FROM tb_pedido WHERE id_ped=$id");

      header("location:http://localhost/PuriMax/pedido_cliente.php");
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


      <div class="row">

        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Fazer pedido</h5>
              <div class="card">
                <div class="card-body">
                  <form action="" method="POST">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Selecione a quantidade(em ML)</label>
                       <input type="number" name="quant" id="" min="1" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success m-1">Enviar</button>
                  </form>
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