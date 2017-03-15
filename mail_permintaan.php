<?php
include "DB_Function.php";
$dbfunc = new DB_Function();


//mail untuk kerusakan
$body='';
#cek num_row kerusakan
$cek_minta = $dbfunc->numrows_permintaan();

if($cek_minta>=1){ 
	
	$data_minta = $dbfunc->list_permintaan_status();
	foreach ($data_minta as $key => $value){
		# code...

		$id_permintaan = $value["id_permintaan"];
		$data_perangkat		= $value["data_perangkat"];
		$merk		= $value["merk"];
		$tipe		= $value["tipe"];
		$unit		= $value["unit"];
		
		$keterangan			= $value["keterangan"];
		$getkota = $dbfunc->get_kota($value["id_kota"]);          
		$kota    = $getkota["kode_kota"];
		$tanggal			= $value["tgl"];

		//update status_mail
		#	$update  = $dbfunc->UpdatePermintaanMailStatus($id_permintaan);

		$body.="Data perangkat : ".$data_perangkat."\r\n";
		$body.="Merk : ".$merk."\r\n";
		$body.="Tipe : ".$tipe."\r\n";
		$body.="Unit : ".$unit."\r\n";
		$body.="keterangan : ".$keterangan."\r\n";
		$body.="Kota : ".$kota."\r\n";
		$body.="Tanggal : ".$tanggal."\r\n";
		$body.="\r\n";

	}

	$subject ="Data Request Barang inventaris pwk";
	$to      = "defri@mcojaya.com";
	
	if(!empty($body)){
		mail($to, $subject, $body);
	}

}



?>