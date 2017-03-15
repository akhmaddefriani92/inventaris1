<?php
include "DB_Function.php";
$dbfunc = new DB_Function();


//mail untuk kerusakan
$body='';
#cek num_row kerusakan
$cek_rusak = $dbfunc->numrows_software();

if($cek_rusak>=1){ 
	
	$data_rusak = $dbfunc->list_software_rusak2();
	foreach ($data_rusak as $key => $value){
		# code...

		$id_software		= $value["id_software"];
		$nama_software		= $value["nama_software"];
		$fullname			= $value["fullname"];
		$keterangan			= $value["keterangan"];
		$kota    			= $value["kode_kota"];
		$tanggal			= $value["tanggal"];

		//update status_mail
		#$update  = $dbfunc->UpdateSoftwareRusakMailStatus($id_software);

		#$body.="User : ".$fullname."\r\n";
		$body.="Kota : ".$kota."\r\n";
		$body.="Tanggal : ".$tanggal."\r\n";
		$body.="Nama Software : ".$nama_software."\r\n";
		$body.="Kerusakan : ".$keterangan."\r\n";
		
		$body.="\r\n";

	}

	$subject ="Data Maintenance SoftWare PWK";
	$to      = "defri@mcojaya.com";
	#echo $body;	
	if(!empty($body)){
		mail($to, $subject, $body);
	}

}



?>