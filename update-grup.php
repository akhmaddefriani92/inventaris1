<?php
	
	include "DB_Function.php"	;
	$funcdb 	= new DB_Function();

	$id 		= $_POST["id_grup"];
	$id_menu	= $_POST["id_menu"];
	$level  	= $_POST["level"];
	
	
	echo $update = $funcdb->update_grup($id, $id_menu, $level);
	if($update){
		echo "<script>
				alert('update berhasil');
			 </script>";
		header("Location:grup.php");	 

	}else{

		echo "<script>
				alert('update gagal');
			 </script>";
		header("Location:grup.php");	 
	}



?>