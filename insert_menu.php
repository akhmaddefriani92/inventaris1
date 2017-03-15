<?php
	
	include "DB_Function.php"	;
	$funcdb 	= new DB_Function();

	
	$navi_menu	= $_POST["navi_menu"];
	$navi_link   = $_POST["navi_link"];
	
	
	
	echo $update = $funcdb->insert_menu($navi_menu, $navi_link);
	if($update){
		echo "<script>
				alert('update berhasil');
			 </script>";
		header("Location:manage-menu.php");	 

	}else{

		echo "<script>
				alert('update gagal');
			 </script>";
		header("Location:manage-menu.php");	 
	}



?>