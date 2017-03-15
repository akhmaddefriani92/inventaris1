<?php
$dbhandle = mysql_connect("localhost", "root", "mcojaya") or die (mysql_error());
		    mysql_select_db("inventaris", $dbhandle);

$sql  = "select * from inventaris where merk='Dell'";
$query = mysql_query($sql, $dbhandle);

while ($row=mysql_fetch_assoc($query)){
	echo $row["data_perangkat"];
	echo $row["merk"];
	echo $row["tipe"];
	echo "\r\n";


}


?>