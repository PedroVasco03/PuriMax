<?php

  session_start();

  if(!isset($_SESSION['usu_nva1']))
    header("location:http://localhost/PuriMax/login.php");
  
?>