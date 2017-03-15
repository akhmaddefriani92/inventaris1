<?php
	
	include "DB_Function.php"	;
	$funcdb 	= new DB_Function();

	$id 		= $_POST["ID"];
	$username	= $_POST["username"];
	$password   = $_POST["password"];
	$fullname 	= $_POST["fullname"];
	$level   = $_POST["level"];
	$id_kota   = $_POST["id_kota"];
	
	$update = $funcdb->update_user($id, $username, $fullname, $password, $level, $id_kota);
	if($update){
		echo "<script>
				alert('update berhasil');
			 </script>";
		header("Location:users.php");	 

	}else{

		echo "<script>
				alert('update gagal');
			 </script>";
		header("Location:users.php");	 
	}



?>