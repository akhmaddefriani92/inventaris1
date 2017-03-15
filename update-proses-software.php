<?php
	session_start();
	error_reporting(E_ALL);
  	include "DB_Function.php";
  	$funcdb = new DB_Function();
  
  	$get_user = $funcdb->get_user_level($_SESSION['namaadmin']);
  	$level    = $get_user["level"];

	$id_software    = $_POST["id_software"];
	$nama_software  = $_POST["nama_software"];
	$id_user    	= $_POST["id_user"];
	$tanggal    	= $_POST["tanggal"];
	$id_status  	= $_POST["id_status"];
	

	$tanggal_ktr  	= $_POST["tanggal_ktr"];
	$keterangan_ktr = $_POST["keterangan_ktr"];
	
	if(!empty($tanggal_ktr)){
					
			$insert_keterangan=$funcdb->InsertKeteranganSoftware($id_software, $keterangan_ktr, $tanggal_ktr, $id_user);
					
					if(!$insert_keterangan){
						echo "insert gagal";
					}

	}	


     $update =$funcdb->update_software_rusak($id_software,  $id_status);
    if($update){
		echo "<script>
			alert('Success update ');
			location.href=('software.php');
				</script>";

	}else{

		echo "<script>
			alert('Failed update');
			location.href=('software.php');
			</script>";
	}



?>