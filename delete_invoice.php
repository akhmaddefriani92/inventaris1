<?php
	include "DB_Function.php";
	$funcdb = new DB_Function();
	$id     = $_POST["id"];
	$delete = $funcdb->delete_invoice($id);
	if($delete){
		echo  "Success";
		echo "<script>
				alert('berhasil');
			</script>";
		header('location:invoice.php')	;
	}else{
	echo "Error deleting Data";
	echo "<script>
				alert('gagal');
			</script>";
			header('location:invoice.php')	;
	
	}

?>