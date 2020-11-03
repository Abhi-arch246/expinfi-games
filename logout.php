<?php 
session_start();
session_destroy();
unset($_SESSION['logged']);
header("location:index.php")

 ?>