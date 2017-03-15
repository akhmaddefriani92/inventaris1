<?php
	session_start();
	error_reporting(E_ALL);
  	include "DB_Function.php";
  	$funcdb = new DB_Function();
  
  	$get_user = $funcdb->get_user_level($_SESSION['namaadmin']);
  	$level    = $get_user["level"];

	$no_repair    	= $_POST["no_repair"];
	$id_user    	= $_POST["id_user"];
	$id_inventaris  = $_POST["id_inventaris"];
	$id_status  = $_POST["id_status"];
	$lokasi_repair  = $_POST["lokasi_repair"];

	$tanggal_ktr  	= $_POST["tanggal_ktr"];
	$keterangan_ktr = $_POST["keterangan_ktr"];
	
	if(!empty($tanggal_ktr)){
					
			$insert_keterangan=$funcdb->InsertKeterangan($no_repair, $keterangan_ktr, $tanggal_ktr, $id_user );
					
					if(!$insert_keterangan){
						echo "insert gagal";
					}

			}	


     $update =$funcdb->update_kerusakan2($no_repair,  $id_status);
     $status= $funcdb->get_status($id_status);		

     $status_repair= $status["status"];
    		if($status_repair=="0"){
    			$update_inventaris = $funcdb->update_inventaris_ok($id_status, $id_inventaris);
    			if(!$update_inventaris){

    				echo "Failed update inventaris status ok";
    			}
    		}
		if($update){
				
			
				sleep(1);

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