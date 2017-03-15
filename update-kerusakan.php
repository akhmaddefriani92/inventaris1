<?php
	session_start();
	error_reporting(E_ALL);
  	include "DB_Function.php";
  	$funcdb = new DB_Function();
  
  	$get_user = $funcdb->get_user_level($_SESSION['namaadmin']);
  	$level    = $get_user["level"];

	$no_repair    		= $_POST["no_repair"];
	#$status_repair    		= $_POST["status_repair"];
	$tanggal    		= $_POST["tanggal"];
	#$lokasi_repair    		= $_POST["lokasi_repair"];
    $keterangan            = $_POST["keterangan"];
    
    

     $update =$funcdb->update_kerusakan($no_repair,  $tanggal,   $keterangan);
    		
			if($update){
				echo "<script>
						alert('update berhasil');
					 location.href=('kerusakan.php');
					 </script>";
					 

			}else{

				echo "<script>
						alert('update gagal');
					 location.href=('kerusakan.php');
					 </script>";
				
			}



?>