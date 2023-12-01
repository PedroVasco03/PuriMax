<?php

include "conexao.php"; 


if(isset($_POST['cad'])){
       
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = md5($_POST['senha']);
  $rua = $_POST['rua'];
  $muni = $_POST['mun'];
  $cont = $_POST['cont'];
  $bai = $_POST['bai'];

   $select = mysqli_query($con,"SELECT *FROM tb_usuario WHERE email='$email'");

   if(mysqli_num_rows($select) > 0){
     echo"
     <div class='row bg-white py-1 px-xl-5'>
     <div class='col-lg-6 d-none d-lg-block'>
       <div class='d-inline-flex align-items-center text-danger h-100'>
       O email já existe, tente outro
       </div>
     </div>
     <div class='col-lg-6 text-center text-lg-right'>
       <div class='d-inline-flex align-items-center'>
     <a class='text-body mr-3' href=''>X</a>       
       </div>
     </div>
     </div>
     ";
   }
   else{

    $insert = mysqli_query($con,"INSERT INTO tb_usuario(nome,email,senha,nva,rua,municipio,contacto,bairro) VALUES('$nome','$email','$senha',2,'$rua','$muni',$cont,'$bai')");

     header("location:http://localhost/PuriMax/login.php?email=$email");

   }
}
?>
<?php

    include "conexao.php";

    if(isset($_POST['cad'])){
       
       $nome = $_POST['nome'];
       $email = $_POST['email'];
       $senha = $_POST['senha'];
       $rua = $_POST['rua'];
       $muni = $_POST['mun'];
       $cont = $_POST['cont'];
       $bai = $_POST['bai'];

       $insert = mysqli_query($con,"INSERT INTO tb_usuario(nome,email,senha,nva,rua,municipio,contacto,bairro) VALUES('$nome','$email','$senha',2,'$rua','$muni',$cont,'$bai')");

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
          <div class="col-md-12 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img"> 
                  <h1 class="logo me-auto"> <img src="../assets/images/logos/favicon.png" alt=""> <a href="index.html"><span style="color: black;">Puri</span><span>Max</span></a></h1>
                </a>
                <p class="text-center">Cadastro</p>
                <form action="" method="POST" style="display:flex;justify-content:space-between;">
                  <div>
                    <div class="mb-3">
                      <label for="exampleInputtext1" class="form-label">Nome</label>
                      <input type="text" class="form-control" name="nome" id="exampleInputtext1" required aria-describedby="textHelp" placeholder="Insira o Nome">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Endereço Email</label>
                      <input type="email" class="form-control" name="email" id="exampleInputEmail1" required aria-describedby="emailHelp" placeholder="Insira o Email">
                    </div>
                    <div class="mb-4">
                    <label for="">Senha</label>
                      <input type="password" class="form-control" required name="senha" maxlength="16" minLength="8" placeholder="Insira o senha" />
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                      <p class="fs-4 mb-0 fw-bold">Já criou a conta?</p>
                      <a class="text-primary fw-bold ms-2" href="login.php">Faça login</a>
                    </div>
                  </div>
                  <div>
                    <div class="mb-3">
                      <label for="exampleInputtext1" class="form-label">Rua</label>
                      <input type="text" class="form-control" name="rua" id="exampleInputtext1" required aria-describedby="textHelp" placeholder="Insira o Rua">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Município</label>
                      <input type="text" class="form-control" name="mun" id="exampleInputEmail1" required aria-describedby="emailHelp" placeholder="Insira o Município" >
                    </div>
                    <div class="mb-4">
                    <label for="">Contacto</label>
                      <input type="text" class="form-control" required name="cont" maxlength="9" minLength="9" placeholder="Insira o contacto" />
                    </div>
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label">Bairro</label>
                      <input type="text" class="form-control" required name="bai" id="exampleInputPassword1"  placeholder="Insira o Bairro">
                    </div>
                    <input type="submit"class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" name="cad" value="Cadastrar">
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