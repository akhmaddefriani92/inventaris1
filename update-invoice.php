<?php
	

	session_start();
	error_reporting(E_ALL);
  	include "DB_Function.php";
  	$funcdb = new DB_Function();
  
  	$get_user = $funcdb->get_user_level($_SESSION['namaadmin']);
  	$level    = $get_user["level"];

	


		$id_invoice    		= $_POST["id_invoice"];
		$no_invoice    		= $_POST["no_invoice"];
        $tanggal_invoice    = date("Y-m-d H:i:s", strtotime($_POST["tanggal_invoice"]));
        $bandara            = $_POST["bandara"];
        $bulan              = $_POST["bulan"];
        $tanggal_rekon      = $_POST["tanggal_rekon"];
        $rekon_no           = $_POST["rekon_no"];
        $rekon_data         = $_POST["rekon_data"];
        $tanggal_invoice_diterima    = date("Y-m-d H:i:s", strtotime($_POST["tanggal_invoice_diterima"]));
        $pengirim           = $_POST["pengirim"];
        $penerima           = $_POST["penerima"];
        $informasi_invoice  = $_POST["informasi_invoice"];
        $jumlah             = $_POST["jumlah"];
        $ppn                = $_POST["ppn"];
        $total              = $_POST["total"];
        $kelengkapan_data   = $_POST["kelengkapan_data"];
        $tanggal_dibayar    = $_POST["tanggal_dibayar"];
        $bank               = $_POST["bank"];
        $keterangan         = $_POST["keterangan"];
     
    if ($level ==1){   
        
		if (!empty($_FILES['pdf']['name'])){
				
		        $filename =  $_FILES['pdf']['name'];
		        $no_pdfo   = explode("/", $no_invoice);
		        $namapdf   = $no_pdfo[0];

		        $file_ext  = substr($filename, strripos($filename, '.')); 
		        $new_file  = $namapdf.$file_ext;
		        $target ="pdffiles/$new_file";
		        $sumber = $_FILES['pdf']['tmp_name'];
		       
		        $upload   = $funcdb->upload($sumber, $target);

			 $update = $funcdb->update_invoice($id_invoice, $no_invoice, $tanggal_invoice, $bandara, $bulan, $tanggal_rekon, $rekon_no, $rekon_data, $tanggal_invoice_diterima, $pengirim, $penerima, $informasi_invoice, $jumlah, $ppn, $total, $kelengkapan_data, $tanggal_dibayar, $bank, $keterangan, $target);
		}else{
			 $update = $funcdb->update_invoice_tanpa_upload($id_invoice, $no_invoice, $tanggal_invoice, $bandara, $bulan, $tanggal_rekon, $rekon_no, $rekon_data, $tanggal_invoice_diterima, $pengirim, $penerima, $informasi_invoice, $jumlah, $ppn, $total, $kelengkapan_data, $tanggal_dibayar, $bank, $keterangan);
		}		

	}else{
			$update =$funcdb->update_invoice_user($id_invoice, $kelengkapan_data, $tanggal_dibayar, $bank, $keterangan);
	}		




			#echo $update;
			if($update){
				echo "<script>
						alert('update berhasil');
					 location.href=('invoice.php');
					 </script>";
					 

			}else{

				echo "<script>
						alert('update gagal');
					 location.href=('invoice.php');
					 </script>";
				
			}



?>