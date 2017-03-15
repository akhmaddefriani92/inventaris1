<?php
session_start();

  include "DB_Function.php";
  $dbfunc = new DB_Function();
  
  $id = $_POST['rowid']; //escape string
  
  $data = $dbfunc->get_surat_jalan($id);
  
  
  $id_inventaris = $data["id_inventaris"];

  $inventaris=explode(",", $id_inventaris);
  $sum = count($inventaris)-1;
  #print_r($inventaris);

?>
	<center><h3>Barang-barang yang dikirim</h3></center>

		<table class="table table-bordered table-stripped" style="font-size:small;">
			<thead style="background:#ddd;">
			<th>DataPerangkat</th>
			<th>Merk</th>
			<th>Tipe</th>
			<th>SerialNumber</th>
			<th>Unit</th>
			</thead>
			<?php
			for ($i=0; $i<=$sum; $i++){
				$id = $inventaris[$i];		
				
				$get =$dbfunc->get_inventaris($id);
				echo "<tr>";
					echo "<td>$get[data_perangkat]</td>";
					echo "<td>$get[merk]</td>";
					echo "<td>$get[tipe]</td>";
					echo "<td>$get[sn]</td>";
					echo "<td>$get[unit]</td>";

				echo "</tr>";
		
			}
			?>
		</table>

		