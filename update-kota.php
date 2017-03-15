<?php
	
	include "DB_Function.php"	;
	$funcdb 	= new DB_Function();

	$id 		= $_POST["id_kota"];
	$kode_kota	= $_POST["kode_kota"];
	$nama_kota   = $_POST["nama_kota"];
	$no_telp   = $_POST["no_telp"];
	$fax   = $_POST["fax"];
	$alamat   = $_POST["alamat"];
	
	
	
	$update = $funcdb->update_kota($id, $kode_kota, $nama_kota, $no_telp, $fax, $alamat);
	if($update){
		echo "<script>
				alert('update berhasil');
			 </script>";
		header("Location:kota.php");	 

	}else{

		echo "<script>
				alert('update gagal');
			 </script>";
		header("Location:kota.php");	 
	}



?>