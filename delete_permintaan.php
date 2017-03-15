<?php
	include "DB_Function.php";
	$funcdb = new DB_Function();
	$id     = $_POST["id"];
	$delete = $funcdb->delete_permintaan($id);
	if($delete){
		
		echo "<script>
				alert('berhasil');
			</script>";
		header('location:permintaan.php')	;
	}else{
	echo "Error deleting Data";
	echo "<script>
				alert('gagal');
			</script>";
			header('location:permintaan.php')	;
	
	}

?>