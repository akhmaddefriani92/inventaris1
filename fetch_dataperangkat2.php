<?php
session_start();
error_reporting(E_ALL);
include "DB_Function.php";
$dbfunc = new DB_Function();

$id_kota = $_POST['get_option'];

$get = $dbfunc->get_kota($id_kota) ;
$kode_kota = $get["kode_kota"];
$data = $dbfunc->list_inventaris_daerah3($kode_kota);
echo "<option>ALL</option>";
foreach ($data as $key => $value){
  echo "<option value='$value[data_perangkat]'>$value[data_perangkat] </option>";
}

?>
