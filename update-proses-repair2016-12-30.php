<?php
	session_start();
	error_reporting(E_ALL);
  	include "DB_Function.php";
  	$funcdb = new DB_Function();
  
  	$get_user = $funcdb->get_user_level($_SESSION['namaadmin']);
  	$level    = $get_user["level"];

	$no_repair    	= $_POST["no_repair"];
	$status_repair  = $_POST["status_repair"];
	$lokasi_repair  = $_POST["lokasi_repair"];
	
	//proses 2
		$username2    =  '';
		$tanggal2  	  =  NULL;
		$keterangan2  =  '';

	//proses 3
		$username3    =  '';
		$tanggal3  	  =  NULL;
		$keterangan3  =  '';
	
	//proses 4
		$username4    =  '';
		$tanggal4  	  =  NULL;
		$keterangan4  =  '';
		


	if(!empty($_POST["tanggal2"]) && $_POST["tanggal2"]!== "0000-00-00"){
		$username2  	  =  $_POST["username2"];
		$tanggal2  	  =  $_POST["tanggal2"];
		$keterangan2  =  $_POST["keterangan2"];
	}

	if(!empty($_POST["tanggal3"]) && $_POST["tanggal3"]!== "0000-00-00" ){
		$username3  	  =  $_POST["username3"];
		$tanggal3  	  =  $_POST["tanggal3"];
		$keterangan3  =  $_POST["keterangan3"];
	}

	if(!empty($_POST["tanggal4"]) && $_POST["tanggal4"]!== "0000-00-00" ){
		$username4  	  =  $_POST["username4"];
		$tanggal4  	  =  $_POST["tanggal4"];
		$keterangan4  =  $_POST["keterangan4"];
	}
	
	
    

     $update =$funcdb->update_kerusakan2($no_repair, $lokasi_repair, $status_repair, $tanggal2,$username2, $keterangan2, $tanggal3, $username3, $keterangan3, $tanggal4, $username4, $keterangan4);
    		
			if($update){
				echo "<script>
						alert('Success update ');
					 	location.href=('kerusakan.php');
					 </script>";
					 

			}else{

				echo "<script>
						alert('Failed update');
					 	location.href=('kerusakan.php');
					 </script>";
				
			}



?>