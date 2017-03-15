<?php
  $dbtifa = mysql_connect("172.16.20.2", "root", "tiketDom") or die (mysql_error());
            mysql_select_db("inventaris1", $dbtifa);
            
$sql = "select * from inventaris limit 5";
$query=mysql_query($sql, $dbtifa) or die(mysql_error());
while($row=mysql_fetch_assoc($query)){

  print_r($row);
}           

?>