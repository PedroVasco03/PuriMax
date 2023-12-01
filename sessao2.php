<?php

  session_start();

  if(!isset($_SESSION['usu_nva2']))
    header("location:http://localhost/PuriMax/login.php");
  
?>