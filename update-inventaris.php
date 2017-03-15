<?php
	session_start();
	error_reporting(E_ALL);
  	include "DB_Function.php";
  	$funcdb = new DB_Function();
  
  	$get_user = $funcdb->get_user_level($_SESSION['namaadmin']);
  	$level    = $get_user["level"];

	$id_inventaris    		= $_POST["id_inventaris"];
	$id_kota    		= $_POST["id_kota"];
    #$data_perangkat            = $_POST["data_perangkat"];
    #$merk      = $_POST["merk"];
    #$tipe           = $_POST["tipe"];
    $unit              = $_POST["unit"];
    $sn         = $_POST["sn"];
    $lokasi           = $_POST["lokasi"];
    $data_pemeliharaan           = $_POST["data_pemeliharaan"];
    $ip           = $_POST["ip"];
    $status           = $_POST["status"];

    

     $update =$funcdb->update_inventaris($id_inventaris, $id_kota,  $unit, $sn, $lokasi, $data_pemeliharaan, $ip, $status);
    		
			if($update){
				echo "<script>
						alert('update berhasil');
					 location.href=('inventaris.php');
					 </script>";
					 

			}else{

				echo "<script>
						alert('update gagal');
					 location.href=('inventaris.php');
					 </script>";
				
			}



?>