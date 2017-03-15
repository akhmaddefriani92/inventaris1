<?php
	session_start();
	error_reporting(E_ALL);
  	include "DB_Function.php";
  	$funcdb = new DB_Function();
  
  	$get_user = $funcdb->get_user_level($_SESSION['namaadmin']);
  	$level    = $get_user["level"];
    $id_user  = $get_user["id_user"];

	
	$id_kota    	   = $_POST["id_kota"];
	$id_inventaris     = $_POST["id_inventaris"];
    #beri koma untuk pemisahnya
    $data_inventaris   = implode(', ', $id_inventaris);
    $no_surat          = $_POST["no_surat"];
	$tanggal_kirim     = $_POST["tanggal_kirim"];
    $nama_pt           = $_POST["nama_pt"];
    $no_telp           = $_POST["no_telp"];
    $alamat            = $_POST["alamat"];
    $kota_tujuan       = $_POST["kota_tujuan"];
    $dikirim           = $id_user;
    $keterangan        = $_POST["keterangan"];


    $id_status = $funcdb->CariStatus("6");

$insertsj = $funcdb->insert_surat_jalan($no_surat, $id_kota, $data_inventaris, $nama_pt, $alamat, $kota_tujuan,$no_telp, $dikirim, $tanggal_kirim, $id_status, $keterangan);


    
    if($insertsj){
            sleep(1);
            #insert ke barang masuk
            $id_surat = $funcdb->get_id_surat_jalan($no_surat, $tanggal_kirim, $kota_tujuan);

            $inserbm = $funcdb->insert_barang_masuk($id_surat);

            if($inserbm){
                
                echo "<script>
                    alert('Success Insert');
                    location.href=('surat_jalan.php');
                </script>";

            }    
                                 

        }else{

            echo "<script>
                    alert('Failed Insert');
                location.href=('surat_jalan.php');
                </script>";
                            
        }

/*

    if(!empty($tanggal_beli)){

    	$no="1";
        //status 0 barang ok
        $id_status = $funcdb->CariStatus("0");

        //insert ke table inventaris
        for ($i=0; $i < count($_POST['sn']); $i++ ) {
             $serial = $_POST['sn'][$i];
             #insert into inventaris(id_kota, id_barang ,unit, sn, id_status) values ($id_kota, $id_barang, '$unit', '$sn', $id_status)";
            $insert = $funcdb->insert_request_inventaris($id_kota, $id_barang, $no, $serial, $id_status);
        }
    	
    	//status 4 barang sudah dibeli
        $id_status2 = $funcdb->CariStatus("4");

        $update = $funcdb->update_permintaan_status_beli($id_barang, $unit, $id_status2,$tanggal_beli, $keterangan, $id_permintaan);
    

    }

    else{
        #$id_barang, $unit, $keterangan, $id_permintaan
    	$update = $funcdb->update_permintaan_status_belumbeli($id_barang, $unit, $keterangan, $id_permintaan);
    	
    	
    }	

		
			    
*/
?>