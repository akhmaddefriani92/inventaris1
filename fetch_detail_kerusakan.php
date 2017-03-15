<?php
session_start();

  include "DB_Function.php";
  $dbfunc = new DB_Function();
  
  $id = $_POST['rowid']; //escape string
  
  $data = $dbfunc->get_kerusakan($id);
  
  
  $kode_kota 	  	= $data["kode_kota"];
  $data_perangkat 	= $data["data_perangkat"];
  $merk 	  		= $data["merk"];
  $tipe 	  		= $data["tipe"];

  


?>
		<table class="table table-bordered" style="font-size:medium;">
			<tr>
				<td><b>Data Perangkat</b></td>
				<td>: <?php echo $data["data_perangkat"];?></td>
				
				<td><b>Tipe</b></td>
				<td>: <?php echo $data["tipe"];?></td>

				
			</tr>
			<tr>
				<td><b>Merk</b></td>
				<td>: <?php echo $data["merk"];?></td>

				<td><b>Serial Number</b></td>
				<td>: <?php echo $data["sn"];?></td>
			</tr>
			

			
		</table>	
		
		<?php
		/*
		<table class="table table-bordered" style="font-size:medium;">
			<?php
			if (!empty($data["keterangan2"])){
			?>	
			<tr>
				<td><b>Proses Repair 2</b></td>				
				<td>: <?php echo $data["keterangan2"];?></td>

				<td><b>User 2</b></td>
				<td>: <?php echo $data["username2"];?></td>

				<td><b>Tanggal 2</b></td>
				<td>: <?php echo $data["tanggal2"];?></td>
			</tr>
			<?php
			}
			if (!empty($data["keterangan3"])){
			?>

				<tr>
					<td><b>Proses Repair 3</b></td>				
					<td>: <?php echo $data["keterangan3"];?></td>

					<td><b>User 3</b></td>
					<td>: <?php echo $data["username3"];?></td>

					<td><b>Tanggal 3</b></td>
					<td>: <?php echo $data["tanggal3"];?></td>
				</tr>
			<?php
			}
			if (!empty($data["keterangan4"])){

			?>	
				<tr>
					<td><b>Proses Repair 4</b></td>				
					<td>: <?php echo $data["keterangan4"];?></td>

					<td><b>User 4</b></td>
					<td>: <?php echo $data["username4"];?></td>

					<td><b>Tanggal 4</b></td>
					<td>: <?php echo $data["tanggal4"];?></td>
					
				</tr>
			<?php
			}
			?>
		</table>
		*/
		?>