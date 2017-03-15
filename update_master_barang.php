<?php
	
	include "DB_Function.php"	;
	$funcdb 	= new DB_Function();

	$id_barang   	= $_POST["id_barang"];
	$data_perangkat	= addslashes($_POST["data_perangkat"]);
	$merk   		= $_POST["merk"];
	$tipe 			= $_POST["tipe"];
	
	
	$update = $funcdb->update_master_barang($data_perangkat, $merk, $tipe, $id_barang);
	if($update){
		echo "<script>
				alert('Success update');
			 </script>";
		header("Location:master_barang.php");	 

	}else{

		echo "<script>
				alert('Failed update');
			 </script>";
		header("Location:master_barang.php");	 
	}



?>