<?php
	include "DB_Function.php";
	$funcdb = new DB_Function();
	$id     = $_POST["id"];
	$delete = $funcdb->delete_master_barang($id);
	if($delete){
		echo "<script>
				alert('Success Delete');
			</script>";
		header('location:users.php')	;
	}else{
	
	echo "<script>
				alert('Failed Delete');
			</script>";
	
	}

?>