<?php
	include "DB_Function.php";
	$funcdb = new DB_Function();
	$id     = $_POST["id"];
	$delete = $funcdb->delete_inventaris($id);
	if($delete){
		echo  "Success";
		echo "<script>
				alert('berhasil');
			</script>";
		header('location:inventaris.php')	;
	}else{
	echo "Error deleting Data";
	echo "<script>
				alert('gagal');
			</script>";
			header('location:inventaris.php')	;
	
	}

?>