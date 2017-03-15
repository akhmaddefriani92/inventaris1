<?php
	
	include "DB_Function.php"	;
	$funcdb 	= new DB_Function();

	
	$data_perangkat	= addslashes($_POST["data_perangkat"]);
	$merk   		= $_POST["merk"];
	$tipe 			= $_POST["tipe"];
	
	
	$insert = $funcdb->InsertMasterBarang($data_perangkat, $merk, $tipe);
	if($insert){
		echo "<script>
				alert('Success Insert');
			 </script>";
		header("Location:master_barang.php");	 

	}else{

		echo "<script>
				alert('Failed Insert');
			 </script>";
		header("Location:master_barang.php");	 
	}



?>