<?php
	ini_set('error_reporting', E_ALL);	
		include "DB_Function.php";
		$dbfunc = new DB_Function();
		
	
		$kota = "PKU";
		$id_kota = $dbfunc->get_id_kota($kota);

		require_once "ClassCSV/parsecsv.lib.php";
		echo $file_csv ="csv/".$kota."_stock.csv"; 
		#$file_csv ='csv/BADGE.csv'; 
		

		$csv = new parseCSV($file_csv);
		
		
		echo "<pre>";
		print_r($csv->titles);
		#print_r($csv->data[0]);
		

		foreach ($csv->data as $key => $value) {
			# code...
			
			$daper 		= addslashes($value["Data perangkat"]);
			$unit 		= addslashes($value["Unit"]) ; 
            $merk 		= addslashes($value["Merk"]) ; 
            $tipe 		= addslashes($value["Tipe"]) ; 
            $sn 		= addslashes($value["S/N"]) ; 
            $lokasi 	= addslashes($value["Lokasi"]); 
            $data_pemeliharaan 	= addslashes($value["Data Pemeliharaan"]); 
            $ip 		= addslashes($value["IP"]) ; 

            if(!empty($daper)){

            	$insert=$dbfunc->insert_inventaris($id_kota, $daper, $unit, $merk, $tipe, $sn, $lokasi, $data_pemeliharaan, $ip);

            echo $key."<br>"	;
            }


		}
		echo "</pre>";
?>