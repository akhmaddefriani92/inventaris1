<?php
class DB_Function {
	
	private $db;
	public $db48;
	public $db482;
	public $dbaodb;
	public $CariStatus;	
	function __construct(){
		require_once 'DB_Connect.php';
		$this->db   = new DB_Connect();
		$this->db48 = $this->db->connect("48");
		#$this->db482 = $this->db->connect("482");
		
	}
	
	function __destruct(){
	
	}
	
	
	
	public function cek_login($username, $password){
		$sql  ="SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$query=mysql_query($sql, $this->db48);
		
		return $query;

	}
	
	public function cek_menu($username){
		$sql  ="SELECT * FROM users WHERE UserName = '$username'";
		$query=mysql_query($sql, $this->dbaodb);
		
		return $query;

	}
	public function sidemenu($username){
		$sql  ="select a.level, b.navi_link, b.navi_menu, c.id_menu, c.level from users a inner join grup c on a.level=c.level inner join menu b on c.id_menu=b.id_menu where a.username='$username'";
		$query=mysql_query($sql, $this->db48);
		while ($row = mysql_fetch_assoc($query)){
			$data[]=$row;
		}
		
		return $data;

	}

	public function listkota(){
		
		$sql="select * from kota ";
		#$sql="select * from kota where kode_kota!='ALL'";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());

		while($row = mysql_fetch_assoc($query)){
				$array_result[] = $row;
				
		}
			
		return $array_result;
	}
	public function insert_kota($kode_kota, $nama_kota, $no_telp, $fax, $alamat){

		$sql ="insert into  kota (kode_kota, nama_kota, no_telp, fax, alamat) values('$kode_kota', '$nama_kota', '$no_telp', '$fax', '$alamat')";
		$query= mysql_query($sql, $this->db48);

		return $query;
	}

	public function get_kota($id){
		
		$sql="select * from kota where id_kota=$id";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		
		return $row;

	}

	public function get_id_kota($id){
		
		$sql="select * from kota where kode_kota='$id'";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		$id_kota=$row["id_kota"];
		
		return $id_kota;

	}

	public function update_kota($id, $kode_kota, $nama_kota, $no_telp, $fax, $alamat){

		$sql ="update kota set kode_kota='$kode_kota', nama_kota='$nama_kota', no_telp='$no_telp', fax='$fax', alamat='$alamat' where id_kota=$id";
		$query= mysql_query($sql, $this->db48) or die (mysql_error());

		return $query;
	}

	public function delete_kota($id){

		$sql ="delete from kota where id_kota=$id";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;
	}

	public function listmenu(){
		
		$sql="select * from menu";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());

		while($row = mysql_fetch_assoc($query)){
				$array_result[] = $row;
				
		}
			
		return $array_result;
	}

	public function get_menu($id){
		
		$sql="select * from menu where id_menu=$id";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		
		return $row;

	}

	public function insert_menu($navi_menu, $navi_link){

		$sql ="insert into  menu values('$navi_menu', '$navi_link', 0, null)";
		$query= mysql_query($sql, $this->db48);

		return $query;
	}

	public function update_menu($id, $navi_menu, $navi_link){

		$sql ="update menu set navi_menu='$navi_menu', navi_link='$navi_link' where id_menu=$id";
		$query= mysql_query($sql, $this->db48) or die (mysql_error());

		return $query;
	}
	
	public function delete_menu($id){

		$sql ="delete from menu where id_menu=$id";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;
	}

	public function users(){
		
		$sql="select * from  users ";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());

		while($row = mysql_fetch_assoc($query)){
				$array_result[] = $row;
				#print_r($array_result);
			}
			
			return $array_result;

	}
	public function get_user($id){
		
		$sql="select * from users where id_user=$id";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		
		return $row;

	}

	public function get_user_level($username){
		
		$sql="select * from users where username='$username'";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		
		return $row;

	}

	public function get_user_kota($username){
		
		$sql="select a.*, b.kode_kota from users a inner join kota b on a.id_kota=b.id_kota where a.username='$username'";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		$kode_kota=$row["kode_kota"];
		
		return $kode_kota;

	}
	
	public function update_user($id, $username, $fullname, $password, $level, $id_kota){

		$sql ="update users set username='$username', fullname='$fullname', password='$password', level='$level', id_kota='$id_kota' where id_user=$id";
		$query= mysql_query($sql, $this->db48);

		return $query;
	}

	public function delete_user($id){

	 	$sql ="delete from users where id_user=$id";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;
	}

	public function insert_user($username, $fullname, $password, $level , $id_kota){

		$sql ="insert into  users (username, fullname, password, level, id_kota)values('$username', '$fullname', '$password', '$level', '$id_kota')";
		$query= mysql_query($sql, $this->db48);

		return $query;
	}


	public function listgrup(){
		
		$sql="select a.*, b.navi_menu from grup a inner join menu b on a.id_menu=b.id_menu";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());

		while($row = mysql_fetch_assoc($query)){
				$array_result[] = $row;
				#print_r($array_result);
			}
			
			return $array_result;

	}


	public function insert_grup($id_menu,  $level){

		$sql ="insert into  grup values(null, '$id_menu', '$level')";
		$query= mysql_query($sql, $this->db48);

		return $query;
	}	

	public function get_grup($id){
		
		$sql="select * from grup where id_grup=$id";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		
		return $row;

	}

	public function update_grup($id, $id_menu, $level){

		$sql ="update grup set id_menu='$id_menu', level='$level' where id_grup=$id";
		$query= mysql_query($sql, $this->db48) or die (mysql_error());

		return $query;
	}

	public function upload($filetmp ,$target){

		
 		 if(move_uploaded_file($filetmp, $target)){
				
		 	$result = "success";
		 }else{
		 	$result="failed";
		 }	

		return $result; 

	}

	public function delete_grup($id){

	 	$sql ="delete from grup where id_grup=$id";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;
	}

	public function insert_inventaris($id_kota, $id_barang, $unit, $sn, $id_status, $lokasi, $data_pemeliharaan, $ip, $tanggal){
		$insert = "insert into inventaris (id_kota, id_barang, unit, sn, id_status, lokasi, data_pemeliharaan, ip, tanggal) values ($id_kota, $id_barang, '$unit',  '$sn', $id_status, '$lokasi', '$data_pemeliharaan', '$ip', '$status')";
		#echo $insert."<br>";
		$query= mysql_query($insert, $this->db48) or die(mysql_error());

		return $query;

	}

	#$id_kota, $id_barang,$unit_add,  $sn_add, $lokasi_add, $keterangan, $ip_add
	public function insert_inventaris_rusak($id_kota, $id_barang, $unit,  $sn, $lokasi, $keterangan, $ip, $status){
		
		$insert = "insert into inventaris (id_kota, id_barang, unit, sn, lokasi, data_pemeliharaan, ip, id_status) values ($id_kota, $id_barang, '$unit',  '$sn', '$lokasi', '$keterangan', '$ip', $status)";
		#echo $insert."<br>";
		$query= mysql_query($insert, $this->db48) or die(mysql_error());

		return $query;

	}

	public function list_inventaris(){
		 $sql = "select a.*, b.kode_kota from inventaris a inner join kota b on a.id_kota=b.id_kota order by a.data_perangkat  limit 500";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;	

	}

	

	public function Cari_id_inventaris($data_perangkat, $tipe, $merk, $sn, $id_kota){
		 $sql = "select id_inventaris from inventaris  where data_perangkat='$data_perangkat' and merk='$merk' and sn='$sn' and tipe='$tipe' and id_kota=$id_kota";

		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		$row  = mysql_fetch_assoc($query);
		$id_inventaris = $row["id_inventaris"];
		return $id_inventaris;	

	}

	public function Cari_id_inventaris2($id_barang, $sn, $id_kota){
		 $sql = "select id_inventaris from inventaris  where id_barang='$id_barang'  and sn='$sn' and id_kota=$id_kota";

		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		$row  = mysql_fetch_assoc($query);
		$id_inventaris = $row["id_inventaris"];
		return $id_inventaris;	

	}

	public function list_inventaris_post_kota($kota, $data_perangkat){
	 	if($data_perangkat!=="ALL" && $data_perangkat!=="" && $kota!=="ALL"){
	 	$sql = "select a.*, b.kode_kota, c.data_perangkat, c.tipe, c.merk, d.status from inventaris a inner join kota b on a.id_kota=b.id_kota inner join master_barang c on a.id_barang=c.id_barang inner join status d on a.id_status=d.id_status where a.id_kota='$kota' and c.data_perangkat='$data_perangkat' order by c.data_perangkat";
	 	}elseif ($data_perangkat==="ALL") {
	 		# code...
	 	$sql = "select a.*, b.kode_kota, c.data_perangkat, c.tipe, c.merk, d.status from inventaris a inner join kota b on a.id_kota=b.id_kota inner join master_barang c on a.id_barang=c.id_barang inner join status d on a.id_status=d.id_status  where a.id_kota='$kota'  order by c.data_perangkat";
	 	}elseif ($kota==="ALL") {
	 		# code...
	 	$sql = "select a.*, b.kode_kota, c.data_perangkat, c.tipe, c.merk, d.status from inventaris a inner join kota b on a.id_kota=b.id_kota  inner join master_barang c on a.id_barang=c.id_barang  inner join status d on a.id_status=d.id_status  order by c.data_perangkat";
	 	}
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;	

	}

	public function list_inventaris_daerah($kode_kota){
		$sql = "select a.*, b.kode_kota from inventaris a inner join kota b on a.id_kota=b.id_kota where b.kode_kota='$kode_kota' order by a.data_perangkat ";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;		
	}

	public function list_inventaris_daerah2($kode_kota){
		$sql = "select a.*, b.kode_kota, c.data_perangkat, c.merk, c.tipe from inventaris a inner join kota b on a.id_kota=b.id_kota inner join master_barang c on a.id_barang=c.id_barang  where b.kode_kota='$kode_kota' order  by c.data_perangkat";
		#$sql="select distinct(a.data_perangkat) from inventaris a inner join kota b on a.id_kota=b.id_kota where b.kode_kota='$kode_kota'";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;		
	}

	public function list_inventaris_daerah3($kode_kota){
		 $sql = "select distinct (b.data_perangkat) from inventaris a inner join master_barang b on a.id_barang=b.id_barang inner join kota c on a.id_kota=c.id_kota where c.kode_kota='$kode_kota' order  by b.data_perangkat";
		#$sql="select distinct(a.data_perangkat) from inventaris a inner join kota b on a.id_kota=b.id_kota where b.kode_kota='$kode_kota'";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;		
	}

	public function list_merk_user($kode_kota, $data_perangkat){
		$sql = "select a.merk, b.kode_kota from inventaris a inner join kota b on a.id_kota=b.id_kota where b.kode_kota='$kode_kota' and a.data_perangkat='$data_perangkat'";
		#$sql="select distinct(a.data_perangkat) from inventaris a inner join kota b on a.id_kota=b.id_kota where b.kode_kota='$kode_kota'";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;		
	}
	public function list_merk($data_perangkat){
		$sql = "select a.merk, b.kode_kota from inventaris a inner join kota b on a.id_kota=b.id_kota where b.kode_kota='$kode_kota' and a.data_perangkat='$data_perangkat'";
		#$sql="select distinct(a.data_perangkat) from inventaris a inner join kota b on a.id_kota=b.id_kota where b.kode_kota='$kode_kota'";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;		
	}


	public function delete_inventaris($id){

	 	$sql ="delete from inventaris where id_inventaris=$id";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;
	}

	public function get_inventaris($id){
		
		$sql="select a.*, b.kode_kota, c.data_perangkat, c.merk, c.tipe, d.status from inventaris a inner join kota b on a.id_kota=b.id_kota inner join master_barang c on c.id_barang=a.id_barang  inner join status d on a.id_status=d.id_status where a.id_inventaris=$id";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		
		
		return $row;

	}

	public function get_sn($id_kota, $sn){
		
		$sql="select * from inventaris  where id_kota=$id_kota and sn like '%$sn%'";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_num_rows($query);
		
		return $row;

	}

	public function TotalUnit($kode_kota, $data_perangkat, $merk, $tipe){
		if(empty($tipe)){
		 $sql="select sum(unit) as total  from inventaris a inner join kota b on a.id_kota=b.id_kota inner join master_barang c on a.id_barang=c.id_barang where b.kode_kota='$kode_kota' and c.data_perangkat='$data_perangkat' AND c.merk='$merk'";
		}else{
		 $sql="select sum(unit) as total  from inventaris a inner join kota b on a.id_kota=b.id_kota inner join master_barang c on a.id_barang=c.id_barang where b.kode_kota='$kode_kota' and c.data_perangkat='$data_perangkat' AND c.merk='$merk' and c.tipe='$tipe'";	
		}
		#echo $sql;
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		$total = $row["total"];
		
		
		return $total;

	}
	#
	public function update_inventaris($id_inventaris, $id_kota,  $unit, $sn, $lokasi, $data_pemeliharaan, $ip, $status){
	 $sql = "update inventaris set id_kota=$id_kota, unit='$unit', sn='$sn', lokasi='$lokasi', data_pemeliharaan='$data_pemeliharaan', ip='$ip' , id_status='$status' where id_inventaris=$id_inventaris";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;

	}

	public function update_inventaris_rusak($id_inventaris, $keterangan, $id_status){
	 $sql = "update inventaris set id_status=$id_status , data_pemeliharaan='$keterangan' where id_inventaris=$id_inventaris";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;

	}

	public function update_inventaris_ok($id_status, $id_inventaris){
	 $sql = "update inventaris set id_status=$id_status where id_inventaris=$id_inventaris";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;

	}

	public function update_inventaris_diterima($kota_tujuan, $id_inventaris){
	$sql = "update inventaris set id_kota=$kota_tujuan where id_inventaris=$id_inventaris";
	$query= mysql_query($sql, $this->db48) or die(mysql_error());

	return $query;

	}


	public function insert_kerusakan($id_inventaris, $tanggal, $id_user, $lokasi_repair, $keterangan, $id_status, $id_kota){
		$insert = "insert into kerusakan ( id_inventaris, id_status, tanggal_kirim, id_user, lokasi_repair, keterangan, kota) values ($id_inventaris, $id_status,'$tanggal', $id_user , '$lokasi_repair','$keterangan', $id_kota)";
		$query= mysql_query($insert, $this->db48) or die(mysql_error());

		return $query;

	}

	public function list_kerusakan(){
		
		$sql = "select a.*, b.sn, b.id_inventaris, c.data_perangkat, d.username, e.kode_kota, f.status from kerusakan a inner join inventaris b on a.id_inventaris=b.id_inventaris inner join master_barang c on b.id_barang=c.id_barang inner join users d on a.id_user=d.id_user inner join kota e on b.id_kota=e.id_kota inner join status f on a.id_status=f.id_status where a.mail_status='0' and f.status='1'	order by no_repair desc";

		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;		
	}

	public function numrows_kerusakan(){
		
		$sql = "select a.*, b.status from kerusakan a inner join status b on a.id_status=b.id_status where a.mail_status='0' and b.status='1' ";

		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		$array_result = mysql_num_rows($query);
	
		return $array_result;		
	}

	public function UpdateKerusakanMailStatus($no_repair){

		$sql = "update kerusakan set mail_status='1' where no_repair=$no_repair";

		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;

	}

	public function list_kerusakan_daerah($kode_kota){
		$sql = "select a.*, b.data_perangkat,b.data_pemeliharaan, b.sn,c.kode_kota, d.username from kerusakan a inner join inventaris b  on a.id_inventaris=b.id_inventaris inner join kota c on b.id_kota=c.id_kota inner join users d on a.id_user=d.id_user	where c.kode_kota='$kode_kota'";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;		
	}

	public function list_kerusakan_filter($kode_kota, $status){
		if($status!=="ALL" && $kode_kota!=="ALL"){

		$sql = "select a.*, b.id_inventaris, c.data_perangkat, d.username, e.kode_kota, f.status from kerusakan a inner join inventaris b on a.id_inventaris=b.id_inventaris inner join master_barang c on b.id_barang=c.id_barang inner join users d on a.id_user=d.id_user inner join kota e on b.id_kota=e.id_kota inner join status f on a.id_status=f.id_status
		where e.kode_kota='$kode_kota' and f.status='$status' order by no_repair desc";

		}else if($status!=="ALL"){

		$sql = "select a.*, b.id_inventaris, c.data_perangkat, d.username, e.kode_kota, f.status from kerusakan a inner join inventaris b on a.id_inventaris=b.id_inventaris inner join master_barang c on b.id_barang=c.id_barang inner join users d on a.id_user=d.id_user inner join kota e on b.id_kota=e.id_kota inner join status f on a.id_status=f.id_status where f.status='$status' order by no_repair desc";

		}else if($kode_kota!=="ALL"){
		
		 $sql = "select a.*, b.id_inventaris, c.data_perangkat, d.username, e.kode_kota, f.status from kerusakan a inner join inventaris b on a.id_inventaris=b.id_inventaris inner join master_barang c on b.id_barang=c.id_barang inner join users d on a.id_user=d.id_user inner join kota e on b.id_kota=e.id_kota inner join status f on a.id_status=f.id_status where e.kode_kota='$kode_kota' order by no_repair desc";

		}else if($kode_kota==="ALL"){
		
			$sql = "select a.*, b.id_inventaris, c.data_perangkat, d.username, e.kode_kota, f.status from kerusakan a inner join inventaris b on a.id_inventaris=b.id_inventaris inner join master_barang c on b.id_barang=c.id_barang inner join users d on a.id_user=d.id_user inner join kota e on b.id_kota=e.id_kota inner join status f on a.id_status=f.id_status	order by no_repair desc";

		}

		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;		
	}

	public function get_kerusakan($id){
		
		$sql = "select a.*, b.sn, e.tipe ,e.merk,e.data_perangkat,c.kode_kota, d.username from kerusakan a inner join inventaris b  on a.id_inventaris=b.id_inventaris inner join master_barang e on b.id_barang=e.id_barang inner join kota c on b.id_kota=c.id_kota inner join users d on a.id_user=d.id_user where a.no_repair='$id'";

		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		
		
		return $row;

	}

	public function update_kerusakan($no_repair, $tanggal,  $keterangan){
		
	 $sql = "update kerusakan set   tanggal_kirim='$tanggal', keterangan='$keterangan' where no_repair='$no_repair'";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;

	}
	/*
	public function update_kerusakan2($no_repair, $lokasi_repair, $status_repair, $tanggal2,$username2, $keterangan2, $tanggal3, $username3, $keterangan3, $tanggal4, $username4, $keterangan4){
		
	 $sql = "update kerusakan set  lokasi_repair='$lokasi_repair', status_repair='$status_repair', tanggal2='$tanggal2', username2='$username2', keterangan2='$keterangan2', tanggal3='$tanggal3', username3='$username3', keterangan3='$keterangan3', tanggal4='$tanggal4', username4='$username4', keterangan4='$keterangan4' where no_repair=$no_repair";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		echo $sql;
		return $query;

	}
	*/
	public function update_kerusakan2($no_repair,  $id_status){
		
	 $sql = "update kerusakan set   id_status=$id_status where no_repair=$no_repair";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		#echo $sql;
		return $query;

	}

	public function delete_kerusakan($id){

	 	$sql ="delete from kerusakan where no_repair='$id'";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;
	}

	
	public function InsertKeterangan($no_repair, $keterangan_ktr, $tanggal_ktr, $id_user ){
		$insert = "insert into keterangan (no_repair, keterangan, tanggal, id_user) values ($no_repair, '$keterangan_ktr','$tanggal_ktr', $id_user)";
		#echo $insert."<br>";
		$query= mysql_query($insert, $this->db48) or die(mysql_error());

		return $query;

	}	

	public function list_keterangan($no_repair){
		$sql = "select a.*, b.username from keterangan a inner join users b  on a.id_user=b.id_user where no_repair=$no_repair";

		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;		
	}
	

	public function insert_permintaan($id_user, $id_kota, $id_barang ,$id_status, $unit, $tgl,$keterangan){
		 $insert = "insert into permintaan ( id_user, id_kota, id_barang, unit, tgl, keterangan, id_status) values ($id_user, $id_kota, $id_barang, '$unit',  '$tgl','$keterangan', $id_status)";
		$query= mysql_query($insert, $this->db48) or die(mysql_error());

		return $query;

	}

	public function list_permintaan(){
		 $sql="select a.*, b.data_perangkat, b.merk, b.tipe, c.kode_kota, d.username, e.ket_status from permintaan a inner join master_barang b on a.id_barang=b.id_barang inner join kota c on a.id_kota=c.id_kota inner join users d on a.id_user=d.id_user inner join status e on a.id_status=e.id_status order by b.data_perangkat";
		 #$sql="select a.*, b.data_perangkat, b.merk, b.tipe, c.kode_kota, d.username from permintaan a inner join master_barang b on a.id_barang=b.id_barang inner join kota c on a.id_kota=c.id_kota inner join users d on a.id_user=d.id_user order by b.data_perangkat";
		 
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;	

	}

	public function list_permintaan_status(){
		 $sql="select a.*, b.data_perangkat, b.merk, b.tipe, c.kode_kota, d.username, e.ket_status from permintaan a inner join master_barang b on a.id_barang=b.id_barang inner join kota c on a.id_kota=c.id_kota inner join users d on a.id_user=d.id_user inner join status e on a.id_status=e.id_status where a.mail_status='0' and e.status='3' order by b.data_perangkat";
		 
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;	

	}

	public function numrows_permintaan(){
		
		$sql = "select a.*, b.status from permintaan a inner join status b on a.id_status=b.id_status  where a.mail_status='0' and b.status='3'";

		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		$array_result = mysql_num_rows($query);
	
		return $array_result;		
	}

	public function UpdatePermintaanMailStatus($id_permintaan){

		$sql = "update permintaan set mail_status='1' where id_permintaan=$id_permintaan";

		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;

	}


	public function list_permintaan_daerah($kota){
		 $sql="select a.*, b.data_perangkat, b.merk, b.tipe, c.kode_kota, d.username, e.ket_status from permintaan a inner join master_barang b on a.id_barang=b.id_barang inner join kota c on a.id_kota=c.id_kota inner join users d on a.id_user=d.id_user inner join status e on a.id_status=e.id_status where c.kode_kota='$kota' order by b.data_perangkat";
		 

		 #$sql = "select a.*, b.kode_kota, c.username from permintaan a inner join kota b on a.id_kota=b.id_kota inner join users c on a.id_user=c.id_user where b.kode_kota='$kota' order by a.data_perangkat";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;	

	}

	public function delete_permintaan($id){

	 	$sql ="delete from permintaan where id_permintaan=$id";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;
	}

	public function get_permintaan($id){
		
		$sql="select a.*, b.kode_kota, c.username, d.data_perangkat, d.merk, d.tipe, e.status, e.ket_status from permintaan  a inner join kota b on a.id_kota=b.id_kota inner join users c on a.id_user=c.id_user inner join master_barang d on a.id_barang=d.id_barang inner join status e on a.id_status=e.status where id_permintaan=$id";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		
		
		return $row;

	}

	public function is_in_array($array, $key, $key_value){
                  $within_array = 'no';
                  foreach( $array as $k=>$v ){
                    if( is_array($v) ){
                        $within_array = is_in_array($v, $key, $key_value);
                        if( $within_array == 'yes' ){
                            break;
                        }
                    } else {
                            if( $v == $key_value && $k == $key ){
                                    $within_array = 'yes';
                                    break;
                            }
                    }
                  }
        return $within_array;
    }

    public function insert_request_inventaris($id_kota, $id_barang, $unit, $sn, $id_status ){
    	
    	 $sql ="insert into inventaris(id_kota, id_barang ,unit, sn, id_status) values ($id_kota, $id_barang, '$unit', '$sn', $id_status)";
    	$query = mysql_query($sql, $this->db48) or die (mysql_error());

    	return $query;

    }

    public function update_permintaan_status_beli($id_barang, $unit, $id_status,$tanggal_beli, $keterangan, $id_permintaan){
    	 $sql ="update permintaan set id_barang=$id_barang, unit='$unit', id_status=$id_status, tgl_acc='$tanggal_beli' ,keterangan='$keterangan' where id_permintaan=$id_permintaan";	

    	$query = mysql_query($sql, $this->db48) or die (mysql_error());

    	return $query;



    }

    public function update_permintaan_status_belumbeli($id_barang, $unit, $keterangan, $id_permintaan){
    	 $sql ="update permintaan set id_barang=$id_barang, unit='$unit', keterangan='$keterangan' where id_permintaan=$id_permintaan";
	
		$query = mysql_query($sql, $this->db48) or die (mysql_error());

    	return $query;    	
    }

    public function list_ket_minta($id_permintaan){
		$sql = "select a.*, b.username from ket_minta a inner join users b  on a.id_user=b.id_user where id_permintaan=$id_permintaan";

		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;		
	}

	public function InsertKetMinta($id_permintaan, $keterangan_ktr, $tanggal_ktr, $id_user ){
		$insert = "insert into ket_minta (id_permintaan, keterangan, tanggal, id_user) values ($id_permintaan, '$keterangan_ktr','$tanggal_ktr', $id_user)";
		#echo $insert."<br>";
		$query= mysql_query($insert, $this->db48) or die(mysql_error());

		return $query;

	}	

	/*
	public function list_inventaris_lama($kota){
		 $sql = " select a.* from inventaris a inner join kota b on a.id_kota=b.id_kota where b.kode_kota='$kota'";
		$query= mysql_query($sql, $this->db482) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;	

	}
	*/

	public function list_master_barang(){
		 $sql = " select * from master_barang";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;	

	}

	public function list_status(){
		 $sql = " select * from status";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;	

	}
	 
	public function list_status_sj(){
		$sql = "select * from status where status = '6' or status='7'";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;	

	}

	public function CariMasterBarang($data_perangkat, $merk, $tipe){
		
		$sql="select id_barang from master_barang where data_perangkat='$data_perangkat' and merk='$merk' and tipe='$tipe'";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		$id_barang = $row["id_barang"];
		
		return $id_barang;

	}

	public function get_master_barang($id_barang){
		
		$sql="select * from master_barang where id_barang=$id_barang";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		
		
		return $row;

	}

	public function InsertMasterBarang($data_perangkat, $merk, $tipe){
		
		$sql="insert into master_barang(data_perangkat, merk, tipe) values ('$data_perangkat', '$merk', '$tipe')";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		
		#echo $sql."\r\n";
		return $query;

	}

	public function update_master_barang($data_perangkat, $merk, $tipe, $id_barang){
		
		$sql="update master_barang set data_perangkat='$data_perangkat', merk='$merk', tipe='$tipe' where id_barang=$id_barang";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		
		#echo $sql."\r\n";
		return $query;

	}

	public function delete_master_barang($id_barang){
		
		$sql="delete from master_barang where id_barang=$id_barang";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		
		#echo $sql."\r\n";
		return $query;

	}

	public function CariStatus($status){
		
		$sql="select id_status from status where  status='$status'";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		$id_status = $row["id_status"];
		
		return $id_status;

	}

	public function get_status($id_status){
		
		$sql="select * from status where  id_status=$id_status";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		
		return $row;

	}
	

	public function InsertDataLama($id_kota, $id_barang, $unit, $sn, $id_status, $lokasi, $data_pemeliharaan, $ip){
		
		$sql="insert into inventaris(id_kota, id_barang, unit, sn, id_status, lokasi, data_pemeliharaan, ip) values ($id_kota, $id_barang, '$unit', '$sn', $id_status, '$lokasi', '$data_pemeliharaan', '$ip')";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		
		#echo $sql."\r\n";
		return $query;

	}

	public function insert_surat_jalan($no_surat, $id_kota, $data_inventaris, $nama_pt, $alamat, $kota_tujuan,$no_telp, $dikirim, $tgl_kirim, $id_status, $keterangan){
		 $sql="insert into surat_jalan (no_surat, id_kota, id_inventaris,  nama_pt, alamat, kota_tujuan, no_tlp, dikirim, tgl_kirim, id_status, keterangan) values ('$no_surat', $id_kota, '$data_inventaris', '$nama_pt', '$alamat', '$kota_tujuan','$no_telp', '$dikirim', '$tgl_kirim', $id_status, '$keterangan')";
		$query = mysql_query($sql, $this->db48) or die (mysql_error());

		return $query;

	}

	public function list_surat_jalan(){
		$sql=" select a.*, d.kode_kota, d.kode_kota,e.ket_status, f.username, f.fullname from surat_jalan a  inner join kota d on a.id_kota=d.id_kota inner join status e on e.id_status=a.id_status inner join users f on a.dikirim=f.id_user";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;	

	}

	public function list_surat_jalan_user($id_kota){
		$sql=" select a.*, d.kode_kota, e.ket_status, f.username,  f.fullname from surat_jalan a  inner join kota d on a.id_kota=d.id_kota inner join status e on e.id_status=a.id_status inner join users f on a.dikirim=f.id_user where a.id_kota=$id_kota";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;	

	}

	public function list_surat_jalan_filter($kode_kota, $id_status){
		
		if($id_status!=="ALL" && $kode_kota!=="ALL"){
		
		$sql=" select a.*, d.kode_kota, d.kode_kota,e.ket_status, f.username , f.fullname from surat_jalan a  inner join kota d on a.id_kota=d.id_kota inner join status e on e.id_status=a.id_status inner join users f on a.dikirim=f.id_user where d.kode_kota='$kode_kota' and a.id_status=$id_status";

		}else if($id_status!=="ALL"){

		$sql=" select a.*, d.kode_kota, d.kode_kota,e.ket_status, f.username , f.fullname  from surat_jalan a  inner join kota d on a.id_kota=d.id_kota inner join status e on e.id_status=a.id_status inner join users f on a.dikirim=f.id_user where  a.id_status=$id_status";

		}else if($kode_kota!=="ALL"){

			$sql=" select a.*, d.kode_kota, d.kode_kota,e.ket_status, f.username, f.fullname from surat_jalan a  inner join kota d on a.id_kota=d.id_kota inner join status e on e.id_status=a.id_status inner join users f on a.dikirim=f.id_user where  d.kode_kota='$kode_kota'";

		}else if($kode_kota==="ALL"){

			$sql=" select a.*, d.kode_kota, d.kode_kota,e.ket_status, f.username, f.fullname from surat_jalan a  inner join kota d on a.id_kota=d.id_kota inner join status e on e.id_status=a.id_status inner join users f on a.dikirim=f.id_user";
		}

		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;	

	}

	public function get_surat_jalan($id_surat){
		
		$sql="select * from surat_jalan where  id_surat=$id_surat";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		
		return $row;

	}

	public function get_id_surat_jalan($no_surat, $tanggal_kirim, $kota_tujuan){
		
		$sql="select id_surat from surat_jalan where  no_surat='$no_surat' and tgl_kirim='$tanggal_kirim' and kota_tujuan=$kota_tujuan";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		$id_surat=$row["id_surat"];
		
		return $id_surat;

	}

	public function delete_surat_jalan($id){

	 	$sql ="delete from surat_jalan where id_surat=$id";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;
	}


	

	public function update_surat_jalan1($data_inventaris, $id_kota, $no_surat, $nama_pt, $no_telp, $alamat, $kota_tujuan, $dikirim, $keterangan, $id_surat){
		$sql="update surat_jalan set id_inventaris='$data_inventaris', id_kota=$id_kota, no_surat='$no_surat', nama_pt='$nama_pt', no_tlp='$no_telp', alamat='$alamat', kota_tujuan=$kota_tujuan, dikirim='$dikirim', keterangan='$keterangan' where id_surat=$id_surat";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;
	}

	public function update_surat_jalan2($no_surat, $nama_pt, $no_telp, $alamat, $kota_tujuan, $dikirim, $keterangan, $id_surat){
		$sql="update surat_jalan set no_surat='$no_surat', nama_pt='$nama_pt', no_tlp='$no_telp', alamat='$alamat', kota_tujuan=$kota_tujuan, dikirim='$dikirim', keterangan='$keterangan' where id_surat=$id_surat";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;
	}

	public function update_surat_jalan_status_done($id_status, $id_surat){

		$sql = "update surat_jalan set id_status=$id_status where id_surat=$id_surat";	
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

	return $query;

	}	

	public function insert_barang_masuk($id_surat){
		$sql = "insert into barang_masuk (id_surat) values ($id_surat)";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;

	}

	public function list_barang_masuk(){
		$sql="select a.*, b.no_surat, b.tgl_kirim, d.kode_kota,e.ket_status, f.username from barang_masuk  a inner join surat_jalan b on  a.id_surat=b.id_surat   inner join kota d on b.id_kota=d.id_kota inner join status e on e.id_status=b.id_status inner join users f on b.dikirim=f.id_user ";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;	

	}

	public function list_barang_masuk_user($kota_tujuan){
		$sql="select a.*, b.no_surat, b.tgl_kirim,  d.kode_kota,e.ket_status, f.username from barang_masuk  a inner join surat_jalan b on  a.id_surat=b.id_surat   inner join kota d on b.id_kota=d.id_kota inner join status e on e.id_status=b.id_status inner join users f on b.dikirim=f.id_user where b.kota_tujuan=$kota_tujuan";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;	

	}

	public function get_barang_masuk($id_bm){
		
		$sql="select * from barang_masuk where  id_bm=$id_bm";
		$query=mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		
		return $row;

	}

	public function update_barang_masuk($tgl_terima, $diterima_oleh, $ket_bm, $id_bm){

	$sql = "update barang_masuk set tgl_terima='$tgl_terima', diterima_oleh=$diterima_oleh, ket_bm='$ket_bm' where id_bm=$id_bm";

	$query= mysql_query($sql, $this->db48) or die(mysql_error());

	return $query;


	}

	public function insert_software_rusak($nama_software, $kota, $tanggal, $id_user, $keterangan){
		$sql = "insert into software_rusak (nama_software, kota, id_status, tanggal, id_user, keterangan) values('$nama_software', $kota, 2, '$tanggal', $id_user, '$keterangan')";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;
	}

	public function list_software_rusak(){
		$sql="select a.*, b.kode_kota, c.fullname, d.status from software_rusak a inner join kota b on a.kota=b.id_kota inner join users c on a.id_user=c.id_user inner join status d on a.id_status=d.id_status";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while($row=mysql_fetch_assoc($query)){
			$data[]=$row;
		}
		return $data;
	}

	public function numrows_software(){
		$sql = "select a.*, d.status from software_rusak a  inner join status d on a.id_status=d.id_status where a.mail_status='0' and d.status='1'";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		$row = mysql_num_rows($query);

		return $row;
	}

	public function list_software_rusak2(){
		$sql="select a.*, b.kode_kota, c.fullname, d.status from software_rusak a inner join kota b on a.kota=b.id_kota inner join users c on a.id_user=c.id_user inner join status d on a.id_status=d.id_status where a.mail_status='0' and d.status='1'";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while($row=mysql_fetch_assoc($query)){
			$data[]=$row;
		}
		return $data;
	}

	public function UpdateSoftwareRusakMailStatus($id_software){

		$sql = "update software_rusak set mail_status='1' where id_software=$id_software";

		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;

	}

	public function list_software_rusak_daerah($kode_kota){
		$sql="select a.*, b.kode_kota, c.fullname, d.status from software_rusak a inner join kota b on a.kota=b.id_kota inner join users c on a.id_user=c.id_user inner join status d on a.id_status=d.id_status where b.kode_kota='$kode_kota'";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while($row=mysql_fetch_assoc($query)){
			$data[]=$row;
		}
		return $data;
	}

	public function get_software_rusak($id){
		$sql="select a.*, b.kode_kota, c.fullname, d.status from software_rusak a inner join kota b on a.kota=b.id_kota inner join users c on a.id_user=c.id_user inner join status d on a.id_status=d.id_status where a.id_software=$id";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		$row=mysql_fetch_assoc($query);

		return $row;
	}

	public function list_keterangan_software($id_software){
		$sql = "select a.*, b.fullname from keterangan_software a inner join users b  on a.id_user=b.id_user where id_software=$id_software";

		$query= mysql_query($sql, $this->db48) or die(mysql_error());
		while ($data = mysql_fetch_assoc($query)){
				$array_result[] = $data;
		}
		return $array_result;		
	}

	public function InsertKeteranganSoftware($id_software, $keterangan_ktr, $tanggal_ktr, $id_user ){
		$insert = "insert into keterangan_software (id_software, keterangan, tanggal, id_user) values ($id_software, '$keterangan_ktr','$tanggal_ktr', $id_user)";
		#echo $insert."<br>";
		$query= mysql_query($insert, $this->db48) or die(mysql_error());

		return $query;

	}	

	public function update_software_rusak($id_software, $id_status){
		
	 $sql = "update software_rusak  set    id_status='$id_status' where id_software='$id_software'";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;

	}

	public function delete_software($id){

		$sql ="delete from software_rusak where id_software=$id";
		$query= mysql_query($sql, $this->db48) or die(mysql_error());

		return $query;
	}
	
	public function hello(){
  	  $data="hahaha";
  	  
  	  
	 return $data;
	}
}
?>