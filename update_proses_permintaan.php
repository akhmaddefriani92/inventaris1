<?php
	session_start();
	error_reporting(E_ALL);
  	include "DB_Function.php";
  	$funcdb = new DB_Function();
  
  	$get_user = $funcdb->get_user_level($_SESSION['namaadmin']);
  	$level    = $get_user["level"];

	$id_permintaan  = $_POST["id_permintaan"];
	$id_user    	= $_POST["id_user"];
	$lokasi_repair  = $_POST["lokasi_repair"];

	$tanggal_ktr  	= $_POST["tanggal_ktr"];
	$keterangan_ktr = $_POST["keterangan_ktr"];
	
	if(!empty($tanggal_ktr)){
					
			$insert_keterangan=$funcdb->InsertKetMinta($id_permintaan, $keterangan_ktr, $tanggal_ktr, $id_user );
					
					if($insert_keterangan){
						
						echo "<script>
								alert('Success Insert');
							 	location.href=('permintaan.php');
					 		</script>";
				

					}else{

						echo "<script>
								alert('Failed Insert');
							 	location.href=('permintaan.php');
					 		</script>";

					}

	}	




?>