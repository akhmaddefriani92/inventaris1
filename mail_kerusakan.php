<?php
include "DB_Function.php";
$dbfunc = new DB_Function();


//mail untuk kerusakan
$body='';
#cek num_row kerusakan
$cek_rusak = $dbfunc->numrows_kerusakan();

if($cek_rusak>=1){ 
	
	$data_rusak = $dbfunc->list_kerusakan();
	foreach ($data_rusak as $key => $value){
		# code...

		$no_repair			= $value["no_repair"];
		$data_perangkat		= $value["data_perangkat"];
		$sn					= $value["sn"];
		$keterangan			= $value["keterangan"];
		$getkota = $dbfunc->get_kota($value["kota"]);          
		$kota    = $getkota["kode_kota"];
		$tanggal			= $value["tanggal_kirim"];

		//update status_mail
		#$update  = $dbfunc->UpdateKerusakanMailStatus($no_repair);

		$body.="Kota : ".$kota."\r\n";
		$body.="Tanggal : ".$tanggal."\r\n";
		$body.="Data perangkat : ".$data_perangkat."\r\n";
		$body.="Serial number : ".$sn."\r\n";
		$body.="Kerusakan : ".$keterangan."\r\n";
		
		$body.="\r\n";

	}

	$subject ="Data Maintenance inventaris PWK";
	$to      = "defri@mcojaya.com";
	#$to      = "teknik@mcojaya.com, defri@mcojaya.com";
	echo $body;	
	if(!empty($body)){
		mail($to, $subject, $body);
	}

}



?>