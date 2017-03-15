<?php
	include "DB_Function.php";
	$funcdb = new DB_Function();
	$id     = $_POST["id"];
	$delete = $funcdb->delete_surat_jalan($id);
	if($delete){
		
		echo "<script>
				alert('berhasil');
			</script>";
		header('location:surat_jalan.php')	;
	}else{
	echo "Error deleting Data";
	echo "<script>
				alert('gagal');
			</script>";
			header('location:surat_jalan.php')	;
	
	}

?>