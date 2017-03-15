<?php
session_start();
error_reporting(E_ALL);
include "DB_Function.php";
$dbfunc = new DB_Function();

$data_perangkat = $_POST['get_option'];

$kode_kota = $dbfunc->get_user_kota($_SESSION["namaadmin"]);


$data = $dbfunc->list_merk_user($kode_kota, $data_perangkat);
echo "<option>--Silahkan Pilih--</option>";
foreach ($data as $key => $value){
  echo "<option value='$value[data_perangkat]'>$value[data_perangkat]</option>";
}

?>
