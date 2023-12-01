<?php

      include "sessao1.php";
      include "conexao.php";

     
      $id_usu = $_SESSION['usu_nva1'];

      $select_email_usu = mysqli_query($con,"SELECT *FROM tb_usuario WHERE id_usu=$id_usu");
      $row_email_usu = mysqli_fetch_array($select_email_usu);
  
      if(!isset($_GET['id'])){
        $id_user_sms = 0;
      }
      else{
        $id_user_sms = $_GET['id'];
      }

      if(isset($_POST['btn_env'])){

       
              $id_user_sms = $_GET['id'];
              
              $mensagem = $_POST['sms'];
                        
            $img="imagens/".$_FILES['img']['name'];

            move_uploaded_file($_FILES['img']['tmp_name'],$img);
    
            $data = date("d/m/y");
            $hora = date("h:m");
    
            $email = $row_email_usu['email'];
    
            $insert_sms = mysqli_query($con,"INSERT INTO tb_sms(id_usu,sms,data_now,hora,env_por,imagem) VALUES($id_user_sms,'$mensagem','$data','$hora','$email','$img')");
    
            header("location:http://localhost/PuriMax/chat_ad.php?id=$id_user_sms");
        
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

                include "conexao.php";

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
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <div class="mb-4">
                  <h5 class="card-title fw-semibold">Clientes</h5>
                </div>
                <ul class="timeline-widget mb-0 position-relative mb-n5">
                <?php
                  $select_users = mysqli_query($con,"SELECT *FROM tb_usuario WHERE nva=2");

                  while($row_users = mysqli_fetch_array($select_users)){
                 ?>  
                <li class="timeline-item d-flex position-relative overflow-hidden">
                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                      <span class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
                      <span class="timeline-badge-border d-block flex-shrink-0"></span>
                    </div>
                    <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold"><?php echo $row_users['email'] ?>
                    <a href="chat_ad.php?id=<?php echo $row_users['id_usu'] ?>" class="text-success d-block fw-normal">Nova sms</a>
                    </div>
                </li>
                <?php
                }
                ?>
                <br><br>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Chat</h5>
                <div class="table-responsive">
                    <form action="" method="POST" enctype="multipart/form-data">
                    <?php
                        $select_sms = mysqli_query($con,"SELECT *FROM tb_sms WHERE id_usu=$id_user_sms ORDER by id_sms");

                        while($row_sms = mysqli_fetch_array($select_sms)){
                    ?> 
                    <div>                
                    <b><?php echo $row_sms['env_por'] ?></b> <br>
                        <b class="mx-4 text-primary"><?php echo $row_sms['sms'] ?></b><br>
                        <img class="mx-4" width="100px" style="display:block" src="<?php echo $row_sms['imagem'] ?>" alt="">
                        <?php echo $row_sms['hora'] ?> <br><br>
                    </div>
                    <?php
                    }
                    ?>
                        <br>
                        <i>Mensagem</i>
                          <input type="text" name="sms" class="form-control"><br>
                          <input type="file" name="img" id="">
                        
                        <input type="submit" class="btn btn-success m-1" name="btn_env" value="Enviar">
                    </form>
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
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sidebarmenu.js"></script>
  <script src="assets/js/app.min.js"></script>
  <script src="assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>