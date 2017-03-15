<?php
error_reporting(0);
session_start();
$_SESSION = array();
session_unset($_SESSION['namaadmin']);
//session_destroy();
header('location:index.php');

?>