<?php
	ini_set('error_reporting', E_ALL);	
		include "DB_Function.php";
		include "csv_to_array.php";
		$dbfunc = new DB_Function();
		
	
		$kota = "BDO";
		$id_kota = $dbfunc->get_id_kota($kota);

		require_once "ClassCSV/parsecsv.lib.php";
		echo $file_csv ="csv/update_".$kota."_stock.csv"; 
		#$file_csv ='csv/BADGE.csv'; 
		
		$data = csv_to_array($filename=$file_csv, $delimiter=',');

		echo "<pre>";
		#print_r($data);
		
		#print_r($csv->titles);
		#print_r($csv->data[0]);
		
		
		foreach ($data as $key => $value) {
			# code...
			
			$daper 		= addslashes($value["Data perangkat"]);
			$unit 		= addslashes($value["Unit"]) ; 
            $merk 		= addslashes($value["Merk"]) ; 
            $tipe 		= addslashes($value["Tipe"]) ; 
            $sn 		= addslashes($value["S/N"]) ; 
            $lokasi 	= addslashes($value["Lokasi"]); 
            $data_pemeliharaan 	= addslashes($value["Data Pemeliharaan"]); 
            $ip 		= addslashes($value["IP"]) ; 
            $status = "0";

            if(!empty($daper)){

            	#echo $key .$daper." ".$unit." ".$merk." ".$tipe." ".$sn." ".$lokasi." ".$data_pemeliharaan." ".$ip."<br>";
            	$insert=$dbfunc->insert_inventaris($id_kota, $daper, $unit, $merk, $tipe, $sn, $lokasi, $data_pemeliharaan, $ip, $status);

            #echo $key."<br>"	;
            }


		}
		echo "</pre>";
		
?>