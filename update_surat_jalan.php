<?php
	session_start();
	error_reporting(E_ALL);
  	include "DB_Function.php";
  	$funcdb = new DB_Function();
  
  	$get_user = $funcdb->get_user_level($_SESSION['namaadmin']);
  	$level    = $get_user["level"];
    $id_user  = $get_user["id_user"];

	
	$id_surat          = $_POST["id_surat"];
    $id_kota    	   = $_POST["id_kota"];
	
    $no_surat          = $_POST["no_surat"];
	$tanggal_kirim     = $_POST["tanggal_kirim"];
    $nama_pt           = $_POST["nama_pt"];
    $no_telp           = $_POST["no_telp"];
    $alamat            = $_POST["alamat"];
    $kota_tujuan       = $_POST["kota_tujuan"];
    $dikirim           = $id_user;
    $keterangan        = $_POST["keterangan"];

    if(!empty($_POST["id_inventaris"])){
        $id_inventaris     = $_POST["id_inventaris"];
        #beri koma untuk pemisahnya
        $data_inventaris   = implode(', ', $id_inventaris);

        $update = $funcdb->update_surat_jalan1($data_inventaris, $id_kota, $no_surat, $nama_pt, $no_telp, $alamat, $kota_tujuan, $dikirim, $keterangan, $id_surat);

    }else{

        $update = $funcdb->update_surat_jalan2($no_surat, $nama_pt, $no_telp, $alamat, $kota_tujuan, $dikirim, $keterangan, $id_surat);
       
    }


    
    if($update){
                
                echo "<script>
                    alert('Success Update');
                    location.href=('surat_jalan.php');
                </script>";

                
                                 

        }else{

            echo "<script>
                    alert('Failed Update');
                location.href=('surat_jalan.php');
                </script>";
                            
        }

?>