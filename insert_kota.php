<?php
	
	include "DB_Function.php"	;
	$funcdb 	= new DB_Function();

	
	$kode_kota	= $_POST["kode_kota"];
	$nama_kota   = $_POST["nama_kota"];
	$no_telp   = $_POST["no_telp"];
	$fax   = $_POST["fax"];
	$alamat   = $_POST["alamat"];
	
	
	
	$insert = $funcdb->insert_kota($kode_kota, $nama_kota, $no_telp, $fax, $alamat);
	if($insert){
		echo "<script>
				alert('insert berhasil');
			 </script>";
		header("Location:kota.php");	 

	}else{

		echo "<script>
				alert('insert gagal');
			 </script>";
		header("Location:kota.php");	 
	}



?>