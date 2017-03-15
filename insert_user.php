<?php
	
	include "DB_Function.php"	;
	$funcdb 	= new DB_Function();

	
	$username	= $_POST["username"];
	$password   = $_POST["password"];
	$fullname 	= $_POST["fullname"];
	$level   = $_POST["level"];
	$id_kota   = $_POST["id_kota"];
	
	$insert = $funcdb->insert_user($username, $fullname, $password, $level, $id_kota);
	if($insert){
		echo "<script>
				alert('insert berhasil');
			 </script>";
		header("Location:users.php");	 

	}else{

		echo "<script>
				alert('insert gagal');
			 </script>";
		header("Location:users.php");	 
	}



?>