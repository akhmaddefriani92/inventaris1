<?php
include "DB_Function.php";
$dbfunc = new DB_Function();

$kota ="ASI";


$data = $dbfunc->list_inventaris_lama($kota);

foreach ($data as $key => $value) {
	# code...id_inventaris | id_kota | data_perangkat | unit | merk | tipe           | sn      | status | lokasi              | data_pemeliharaan | ip   
	
	$data_perangkat = $value["data_perangkat"];
	$unit = $value["unit"];
	$merk = $value["merk"];
	$tipe = $value["tipe"];
	$sn = $value["sn"];
	$status = $value["status"];
	$lokasi = $value["lokasi"];
	$data_pemeliharaan = $value["data_pemeliharaan"];
	$ip = $value["ip"];
	$id_kota = $value["id_kota"];

	$id_barang = $dbfunc->CariMasterBarang($data_perangkat, $merk, $tipe);

	$id_status = $dbfunc->CariStatus($status);

	$insert = $dbfunc->InsertDataLama($id_kota, $id_barang, $unit, $sn, $id_status, $lokasi, $data_pemeliharaan, $ip);

	if(!$insert){
		echo "Gagal insert \r\n";
	}



}







?>