<?php
session_start();

  include "DB_Function.php";
  $dbfunc = new DB_Function();
  
  $id = $_POST['rowid']; //escape string
  
  $data = $dbfunc->get_inventaris($id);
  #print_r($data);

  $kode_kota 	  = $data["kode_kota"];
  $data_perangkat = $data["data_perangkat"];
  $merk 	  = $data["merk"];
  $tipe 	  = $data["tipe"];

  $totalunit = $dbfunc->TotalUnit($kode_kota, $data_perangkat, $merk, $tipe);


?>
		<table class="table" style="font-size:medium">
			<tr>
				<td>Data Perangkat</td>
				<td>: <?php echo $data["data_perangkat"];?></td>
			</tr>
			<tr>
				<td>Merk</td>
				<td>: <?php echo $data["merk"];?></td>
			</tr>
			<tr>
				<td>Total</td>
				<td>: <?php echo $totalunit;?></td>
			</tr>
			<tr>
				<td>Kota</td>
				<td>: <?php echo $kode_kota;?></td>
			</tr>
		</table>	