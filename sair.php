<?php

session_start();
session_destroy();
header("location:http://localhost/PuriMax/login.php");
exit;


?>