<?php

include "conexao.php";

if(isset($_POST['email'],$_POST['senha'])){
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $select1 = mysqli_query($con,"SELECT *FROM tb_usuario WHERE email='$email' AND senha='$senha' AND nva=1");
    $select2 = mysqli_query($con,"SELECT *FROM tb_usuario WHERE email='$email' AND senha='$senha' AND nva=2");

    if(mysqli_num_rows($select1) > 0){           
        $row_usu_nva1 = mysqli_fetch_array($select1);        
        session_start();
        $_SESSION['usu_nva1'] = $row_usu_nva1['id_usu'];
        header("location:http://localhost/PuriMax/index_admin.php");
    }
    else if(mysqli_num_rows($select2) > 0){        
        $row_usu_nva2 = mysqli_fetch_array($select2);
        session_start();
        $_SESSION['usu_nva2'] = $row_usu_nva2['id_usu'];
        header("location:http://localhost/PuriMax/index_cliente.php");
    }
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

  <style>
    body{
      background: url("1.jpg");
      background-size: cover;
    }
  </style>

</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img"> 
                  <h1 class="logo me-auto"> <img src="../assets/images/logos/favicon.png" alt=""> <a href="index.html"><span style="color: black;">Puri</span><span>Max</span></a></h1>
                </a>
                <p class="text-center">Login</p>
                <?php
                  if(isset($_GET['email'])){
                   $email = $_GET['email'];
                  }
                  else{
                    $email = "";
                  }
                ?>
                <form action="" method="POST">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nome de Usuário</label>
                    <input type="text" name="email" value="<?php echo $email ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-control" id="exampleInputPassword1">
                  </div>
                  <input type="submit"class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Entrar">
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold"><a class="text-primary fw-bold ms-2 text-dark" href="cadastro.php">Cria uma conta</a></p><a class="text-primary fw-bold ms-2" href="index.php">Voltar para o início</a>
                    
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>