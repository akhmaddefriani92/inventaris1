<?php
session_start();
error_reporting(E_ALL);
  include "DB_Function.php";
  $funcdb = new DB_Function();
  
  $id = $_POST['rowid']; //escape string
  
  $data = $funcdb->get_invoice($id);

?>
		<table class="table">
			<tr>
				<td>No Invoice</td>
				<td>: <?php echo $data["no_invoice"];?></td>
			</tr>
			<tr>
				<td>Tanggal Rekon</td>
				<td>: <?php echo $data["tanggal_rekon"];?></td>
			</tr>
			<tr>
				<td>No Rekon</td>
				<td>: <?php echo $data["rekon_no"];?></td>
			</tr>
			
			<tr>
				<td>Data Rekon</td>
				<td>: <?php echo $data["rekon_data"];?></td>
			</tr>
			
			<tr>
				<td>Pengirim</td>
				<td>: <?php echo $data["pengirim"];?></td>
			</tr>
			<tr>
				<td>Penerima</td>
				<td>: <?php echo $data["penerima"];?></td>
			</tr>
			<tr>
				<td>Kelengkapan Data</td>
				<td>: <?php echo $data["kelengkapan_data"];?></td>
			</tr>
			
			<tr>
				<td>Bank</td>
				<td>: <?php echo $data["bank"];?></td>
			</tr>
			<tr>
				<td>Keterengan</td>
				<td>: <?php echo $data["keterangan"];?></td>
			</tr>
		</table>

