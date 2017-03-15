<?php
session_start();
include "sql201.ini";                     
$datenow			= date("jM");

$tabel      = $_POST['tbl'];
$dalyid     = $_POST['DailyID'];
$bagno      = $_POST['BagNo'];
$fno1       = $_POST['Flight1'];
$tgl1       = $_POST['Tgl1'];
$to1        = $_POST['To1'];
$fno2       = $_POST['Flight2'];
$tgl2       = $_POST['Tgl2'];
$to2        = $_POST['To2'];
$nama       = $_POST['Nama'];
$pnr        = $_POST['KodePNR'];
$berat      = $_POST['Berat'];
$piece      = $_POST['Piece'];
$ipcetak    = $_POST['IPCetak'];


if  ($tabel==""){    
      
      
        if ($tgl2==NULL){      
                $update     = "update Daily$datenow set BagNo='$bagno', Flight1='$fno1', Tgl1='$tgl1' , To1='$to1',
                                nama='$nama', KodePNR='$pnr', berat='$berat', Piece='$piece' ,IPCetak='$ipcetak' where DailyID=$dalyid";
            }
          else{
       
            $update     = "update Daily$datenow set BagNo='$bagno', Flight1='$fno1', Tgl1='$tgl1' , To1='$to1', Flight2='$fno2', Tgl2='$tgl2',
                         To2='$to2', nama='$nama', KodePNR='$pnr', berat='$berat', Piece='$piece' ,IPCetak='$ipcetak' where DailyID=$dalyid";
            
            }
            
}          
else{
            $date         = $_SESSION["tabel"];
        if ($tgl2==NULL){      
    
            $update        = "update Daily$tabel set BagNo='$bagno', Flight1='$fno1', Tgl1='$tgl1' , To1='$to1',
                           nama='$nama', KodePNR='$pnr', berat='$berat', Piece='$piece' ,IPCetak='$ipcetak' where DailyID=$dalyid";
       }
       else{
          
          $update     = "update Daily$tabel set BagNo='$bagno', Flight1='$fno1', Tgl1='$tgl1' , To1='$to1', Flight2='$fno2', Tgl2='$tgl2',
                         To2='$to2', nama='$nama', KodePNR='$pnr', berat='$berat', Piece='$piece' ,IPCetak='$ipcetak' where DailyID=$dalyid";
        }                
}
echo $tabel."<br>";


$r_update=mssql_query($update, $dbhandle);

if ($r_update)
{
    echo "berhasil <br>";
    echo $update;
    echo "
          <script>
          alert('update berhasil');
         
          </script>
          ";
}
    else{
            echo "
             <script>
          alert('update gagal');
          
          </script>";
        echo $update;
        }

       
    if ($tabel==""){
      $sql ="select * from Daily$datenow where DailyID=$dalyid";
      
    }
    else{
      $sql ="select * from Daily$tabel where DailyID=$dalyid";
      
    }
    echo "<br>".$sql;
    ?>
     <table class="table table-hover" id="view_table" style="font-size: 10px;">
        <thead style="background:#ccc;">
			<th>ID</th>
            <th>BagNo</th>
            <th>Flight1</th>
            <th>Tgl1</th>
            <th>To1</th>
			<th>Flight2</th>
            <th>Tgl2</th>
            <th>To2</th>
            <th>Nama</th>
            <th>KodePNR</th>
			<th>Berat</th>
			<th>Piece</th>
			<th>IPCetak</th>
			
        
        </thead>
        <tbody>
<?php
    $query		= mssql_query($sql, $dbhandle);
	  $row = mssql_fetch_assoc($query);
	  echo "<tr>";
		   echo "<td>$row[DailyID]</td>";
		   echo "<td>$row[BagNo]</td>";
		   echo "<td>$row[Flight1]</td>";
		   echo "<td>$row[Tgl1]</td>";
		   echo "<td>$row[To1]</td>";
		   echo "<td>$row[Flight2]</td>";
		   echo "<td>$row[Tgl2]</td>";
		   echo "<td>$row[To2]</td>";
		   echo "<td>$row[Nama]</td>";
		   echo "<td>$row[KodePNR]</td>";
		   echo "<td>$row[Berat]</td>";
		   echo "<td>$row[Piece]</td>";
		   echo "<td>$row[IPCetak]</td>";
           echo "</tr>"; 	 
    echo "  </tbody>
     </table>";
     
?>