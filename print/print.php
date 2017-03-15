<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>SURAT JALAN</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<!--<script type='text/javascript' src='js/example.js'></script>-->
<style>
#items th 
{
    border:3px solid #535354;
}
#items tr 
{
    border:3px solid #535354;
}
#items td 
{
    border:3px solid #535354;
}
</style>
</head>

<body>

<br>
<br>
<center>
<input type="button" onclick="printDiv('printableArea')" value="Print" />
 <input type="button" value="Print Preview" class="btn" onclick="PrintPreview()"/>
 </center>
<div id="printableArea">		

<div id="page-wrap">



		<h3 id="header"><b><u>SURAT JALAN</u></b></h3>

		<?php
		include ('/var/www/inventaris1/DB_Function.php' );
		$dbfunc = new DB_Function();

		$id  = $_GET["data"];

		$data = $dbfunc->get_surat_jalan($id);
		#print_r($data);

		$address = explode(",", $data["alamat"]);
		$alamat1 = $address[0];
		$alamat2 = $address[1];

		#alamat asal
		$asal  = $data["id_kota"];
		$get_asal = $dbfunc->get_kota($asal);
		$alamat_asal = $get_asal["alamat"];
		$pecah_asal = explode(",", $alamat_asal);
		$alamat_asal1 = $pecah_asal[0];
		$alamat_asal2 = $pecah_asal[1];
		$alamat_asal3 = $pecah_asal[2];

	?>	

		<div id="identity">
		<p id="address"><b>PT. MCO JAYA</b><br>
            <?php echo $alamat_asal1;?>,<br> 
            <?php echo $alamat_asal2;?><br> 
            <?php 
            	 if (!empty($alamat_asal3)){
            	 	echo $alamat_asal2." <br>";
            	 }
            ?>
            Telp. <?php echo $get_asal["no_telp"]."<br>";?>
             <?php
             	if(!empty($get_asal["fax"])){
             	echo $get_asal["fax"];			
             	}
             ?>
            </p>

            	<div id="logo">
				<div id="Yth"><p align='left'><b>Kepada Yth</b>,<br>
	            <b><?php echo $data["nama_pt"];?></b><br> 
	            <?php echo $alamat1;?><br>
	            <?php if(!empty($alamat2)){
	            ?>
	            		<?php echo $alamat2;?><br>
	            <?php
	            }
	            ?>
	            Telp. <?php echo $data["no_tlp"];?><br>
	            <!--Jakarta Timur 14350<br>--></p>
	            </div>			
	            </div>	
            
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">
		   <h4> No. Surat : <?php echo $data["no_surat"];?></h4>
		</div>
		<br>
		
		<table id="items" border="2" style="font-size:medium;">
		  <thead style="background-color:#CCCCCC;">
		      <th width="5%">No</th>
		      <th width="20%">Data Perangkat</th>
		      <th width="15%">Merk</th>
		      <th width="15%">Tipe</th>
		      <th width="5%">Unit</th>
		      <th width="30%">Serial Number</th>
		      <!--<th>Keterangan</th>-->
		  </thead>
		  
		  <tr>
		      <?php
		      $no =1;
		      $data_inventaris = $data["id_inventaris"];
		      $inventaris=explode(",", $data_inventaris);
  			  $sum = count($inventaris)-1;
  			  for ($i=0; $i<=$sum; $i++){
				$id = $inventaris[$i];		
				
				$get =$dbfunc->get_inventaris($id);
				if(!empty($get)){
					echo "<tr align='center'>";
						echo "<td>$no</td>";
						echo "<td>$get[data_perangkat]</td>";
						echo "<td>$get[merk]</td>";
						echo "<td>$get[tipe]</td>";
						echo "<td>$get[unit]</td>";
						echo "<td>$get[sn]</td>";

					echo "</tr>";
			     $no++;
		 		}
			}

		      ?>
		  </tr>
		  <tfoot>
		  <th>Keterangan</th>
		  <td colspan="5"><?php echo $data["keterangan"];?></td>
		  </tfoot>
		 
		</table>
		<br>
		
		<div style="margin-left:20px; margin-bottom: 20px; float:left; width:150px; text-align:center;">
		<p ><b>Yang Menerima, </b><br><br><br><br><br>
        
            (......................)
        </p>
        </div>

        <div style="margin-left:5px; margin-bottom: 20px;float:right; width:250px; text-align:center;">
		<?php
			$getkota = $dbfunc->get_kota($data["id_kota"]);
			$kota    = $getkota["nama_kota"];
			$tgl_kirim=date("d M Y", strtotime($data["tgl_kirim"]));
		?>
		<p id="address2"><b><?php echo $kota.", ". $tgl_kirim;?> </b><br><br><br><br><br>
        
         <?php 
				$getuser = $dbfunc->get_user($data["dikirim"]);
				$nama    = $getuser["fullname"];
			echo "<b>".$nama."</b>";	         	
         ?>   
        </p>
        </div>

            	
		
		
        <br><br><br><br><br><br>

		<div id="terms">
		  <h5>Terms</h5>
		  <!--
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>-->
		</div>
	
	</div>
</div>	


	<script type="text/javascript"> 
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
	}

	
	 
/*--This JavaScript method for Print Preview command--*/
    function PrintPreview() {
        var toPrint = document.getElementById('printableArea');
        var popupWin = window.open('', '_blank','width=350px,height=150px,location=no,left=200px');
        popupWin.document.open();
        popupWin.document.write('<html><title>::Print Preview::</title><link rel="stylesheet" type="text/css" href="css/print.css" media="screen"/><link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>        	</head><body">')
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }


    


  </script> 
</body>

</html>