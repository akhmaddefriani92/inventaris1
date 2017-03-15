<?php
	session_start();
	error_reporting(E_ALL);
  	include "DB_Function.php";
  	$funcdb = new DB_Function();
  
  	$get_user = $funcdb->get_user_level($_SESSION['namaadmin']);
  	$level    = $get_user["level"];
    $id_user  = $get_user["id_user"];

	
	$id_surat          = $_POST["id_surat"];
    $id_bm             = $_POST["id_bm"];
    #$id_kota    	   = $_POST["id_kota"];
    
    $ket_bm            = $_POST["ket_bm"];
	
    


    
    if(!empty($_POST["tgl_terima"])){
        
        $tgl_terima        = $_POST["tgl_terima"];
        $diterima_oleh     = $id_user;

        //update barang masuk
        $update_bm = $funcdb->update_barang_masuk($tgl_terima, $diterima_oleh, $ket_bm, $id_bm);


        
        #status sudah diterima
        $id_status = $funcdb->CariStatus("7");
        //update status di surat jalan update_surat_jalan_status_done
        $update_sj = $funcdb->update_surat_jalan_status_done($id_status, $id_surat);

        //update inventaris
        $get_surat         = $funcdb->get_surat_jalan($id_surat);
        $data_inventaris     = $get_surat["id_inventaris"];
        $kota_tujuan       = $get_surat["kota_tujuan"];

        $inventaris=explode(",", $data_inventaris);
        $sum = count($inventaris)-1;
        for ($i=0; $i<=$sum; $i++){
             $id_inventaris = $inventaris[$i];    
             
             //update pindah kota inventaris
             $update_inventaris = $funcdb->update_inventaris_diterima($kota_tujuan, $id_inventaris);
        }

        
                if($update_bm && $update_sj){
                        
                    echo "<script>
                        alert('Success Update');
                        location.href=('barang_masuk.php');
                        </script>";

                }else{

                    echo "<script>
                            alert('Failed Update');
                            location.href=('barang_masuk.php');
                        </script>";
                                    
                }


    }


    
    

?>