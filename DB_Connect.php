<?php
class DB_Connect {
	
	function __construct() {
	
	}
	
	function __destruct() {
	
	}
	
	public function connect($params){
		#echo "db_connect".$paramy."<br>";
		if ($params == "48")
		{
			$dbhandle  = mysql_connect("localhost", "root", "mcojaya", true) or die (mysql_error());
						 mysql_select_db("inventaris1", $dbhandle);
		     return $dbhandle;
			
		}
		elseif ($params == "aodb"){
			$dbhandle = mysql_connect("172.16.20.90","sa","Hello123", true) or die("koneksi error HLP aodb");
						mysql_select_db("aodb", $dbhandle);
			return $dbhandle;
		}
		/*
		elseif ($params == "482")
		{
			$dbhandle  = mysql_connect("localhost", "root", "mcojaya", true) or die (mysql_error());
						 mysql_select_db("inventaris", $dbhandle);
		     return $dbhandle;
			
		}
		*/
		
		
		
	}
	
	
	
	public function close($params){
		mysql_close();
		//mysql_close($dbhandle2);
	}
}
?>