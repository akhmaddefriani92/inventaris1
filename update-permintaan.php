<?php
	session_start();
	error_reporting(E_ALL);
  	include "DB_Function.php";
  	$funcdb = new DB_Function();
  
  	$get_user = $funcdb->get_user_level($_SESSION['namaadmin']);
  	$level    = $get_user["level"];

	$id_permintaan     = $_POST["id_permintaan"];
	$kode_kota    	   = $_POST["kode_kota"];
	$id_kota		   = $funcdb->get_id_kota($kode_kota);

    $username          = $_POST["username"];
	$id_barang         = $_POST["id_barang"];
    $unit              = $_POST["unit"];
    $keterangan        = $_POST["keterangan"];
    $id_status         = $_POST["id_status"];
    $tanggal_beli      = $_POST["tanggal_beli"];
    
    $sn                = $_POST["sn"];



    if(!empty($tanggal_beli)){

    	$no="1";
        //status 0 barang ok
        $id_status = $funcdb->CariStatus("0");

        $id_kota2           = $funcdb->get_id_kota("JKT");
        //insert ke table inventaris kota HO 
        for ($i=0; $i < count($_POST['sn']); $i++ ) {
             $serial = $_POST['sn'][$i];
             #insert into inventaris(id_kota, id_barang ,unit, sn, id_status) values ($id_kota, $id_barang, '$unit', '$sn', $id_status)";
            $insert = $funcdb->insert_request_inventaris($id_kota2, $id_barang, $no, $serial, $id_status);
        }
    	
    	//status 4 barang sudah dibeli
        $id_status2 = $funcdb->CariStatus("4");

        $update = $funcdb->update_permintaan_status_beli($id_barang, $unit, $id_status2,$tanggal_beli, $keterangan, $id_permintaan);
    

    }

    else{
        #$id_barang, $unit, $keterangan, $id_permintaan
    	$update = $funcdb->update_permintaan_status_belumbeli($id_barang, $unit, $keterangan, $id_permintaan);
    	
    	
    }	

		if($update){
			echo "<script>
					alert('Success Update');
					location.href=('permintaan.php');
				</script>";
								 

		}else{

			echo "<script>
					alert('Failed Update');
				location.href=('permintaan.php');
				</script>";
							
		}
			    

?>