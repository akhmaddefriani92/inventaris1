 <?php
	#session_start();

	$side 		= $dbfunc->sidemenu($_SESSION['namaadmin']);
	foreach ($side as $key => $value) {

		if ($value["navi_menu"]=="Manage Users"){
				$icons = '<i class="fa fa-user"></i>';
		}elseif ($value["navi_menu"]=="Manage Grup") {
				$icons = '<i class="fa fa-group"></i>';
		}elseif ($value["navi_menu"]=="Inventaris") {
				$icons = '<i class="fa fa-archive"></i>';
		}elseif ($value["navi_menu"]=="Manage Menu") {
				$icons = '<i class="fa fa-tasks"></i>';
		}elseif ($value["navi_menu"]=="Manage Kota") {
				$icons = '<i class="fa fa-building"></i>';
		}elseif ($value["navi_menu"]=="Maintenance") {
				$icons = '<i class="fa fa-wrench"></i>';
		}elseif ($value["navi_menu"]=="Request Barang") {
				$icons = '<i class="fa fa-shopping-cart"></i>';
		}elseif($value["navi_menu"]=="Surat Jalan") {
				$icons = '<i class="fa fa-envelope"></i>';
		}elseif($value["navi_menu"]=="Accept Surat Jalan") {
				$icons = '<i class="fa fa-folder-open"></i>';
		}elseif($value["navi_menu"]=="Master Barang") {
				$icons = '<i class="fa fa-bank"></i>';
		}elseif($value["navi_menu"]=="Maintenance Software") {
				$icons = '<i class="fa fa-cogs"></i>';
		}

		else{
				$icons = '<i class="fa fa-link"></i>';
		}

?>
 <!-- Optionally, you can add icons to the links -->
<li><a href="<?php echo $value["navi_link"];?>" ><?php echo $icons;?><span><?php echo $value['navi_menu'];?></span></a></li>
   
<?php
}
?>

   <!--     <li><a href="users.php"><i class="fa fa-users"></i> <span>Users</span></a></li>
        <li><a href="grup.php"><i class="fa fa-users"></i> <span>Grup</span></a></li>
       -->
 