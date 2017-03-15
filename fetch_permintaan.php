<?php
session_start();
error_reporting(E_ALL);
  include "DB_Function.php";
  $dbfunc = new DB_Function();
  
  $id = $_POST['rowid']; //escape string
  
  $data = $dbfunc->get_permintaan($id);

#print_r($data);
$get_user = $dbfunc->get_user_level($_SESSION['namaadmin']);
$id_user    = $get_user["id_user"];

function is_in_array($array, $key, $key_value){
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



#  if ($level==1){
    echo "<input type='hidden' name='id_permintaan' value='$data[id_permintaan]'/>";
?>
         

      <div class="form-group">
              
              <div class="col-md-5">
                  <label  for="kota">Kota:</label>
                    <input type="text" name="kode_kota" class="form-control" value="<?php echo $data['kode_kota'];?>" readonly>
              </div>

              <div class="col-md-7">
                  <label  for="kota">Username:</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $data['username'];?>" readonly>
              </div>
      </div> 
      <div class="form-group" >
            <div class="col-md-8">
              <label  for="Data Perangkat">Data Perangkat:</label>
              <?php
                  
                $data_per = $dbfunc->list_master_barang();
                $id_barang = $data["id_barang"];
                
                #$array_values = is_in_array($data_per, "data_perangkat", $data_perangkat);
                #$count =count($array_values)  ;
                
                
                  #if ($array_values=="yes"){
                    echo "<select name='id_barang' id='id_barang' class='form-control'>";

                        foreach ($data_per as $key => $value){
                            
                          if($id_barang==$value["id_barang"]){
                            $selected='selected="selected"';
                          }else{
                            $selected='';
                          }
                          echo "<option value='$value[id_barang]' $selected>$value[data_perangkat] merk:$value[merk] tipe:$value[tipe] </option>";
                        }
                    echo "</select>";
                    
                  #}
                  /*
                  else{
                      
                   echo"   <input type='text' name='data_perangkat' class='form-control' value='$data[data_perangkat]' >";                    
                  }
                  */

              ?>

            </div>
            <!--
            <div class="col-md-3">
              <label>Merk:</label>
              <input type="text" name="merk" class="form-control" value="<?php echo $data[merk];?>" >
            </div>

            <div class="col-md-3">
              <label>Tipe:</label>
              <input type="text" name="tipe" class="form-control" value="<?php echo $data[tipe];?>" >
            </div>-->

            <div class="col-md-2">
              <label>Unit:</label>
              <input type="text" name="unit" id="unit" class="form-control" value="<?php echo $data['unit'];?>" readonly>
            </div>
      </div> 
      <div class="form-group">
      <div class="col-md-12">
      <label>Keterangan:</label>
      <textarea name="keterangan" class="form-control"><?php echo $data["keterangan"] ;?></textarea>
      </div>

      </div>

        <div class="form-group">
              <div class="col-md-6">
                <label >Status:</label>
                  <br>
                  
                  <?php
                  $status = $data["status"];
                  if ($status=="4"){
                    $opt = "Sudah Beli";
                  }else{
                    $opt = "Belum Beli";
                   echo "<input  id='cekbeli' type='checkbox'   name='checkbox' value='beli' />Sudah Beli";
                  }
                  echo "<input type='text' id='status1' name='status1' value='$opt' class='form-control' readonly/>";
                  
                  echo "<input type='hidden' name='id_status' value='$data[id_status]' class='form-control'/>";
                  ?>
                      
              </div>
              <div class="col-md-6">
              
              <?php
                if ($data["status"]=="4"){
                  echo "<label>Tanggal Beli :</label>";    
                  echo "<input type='text'  value='$data[tgl_acc]' class='form-control' disabled/>";
                }

              ?>
              </div>
      </div>
      
        <div class="showbeli" style="display:none;">
            <div class="form-group">
              <div class="col-md-4 ">
                <input type="text" placeholder="Tanggal Beli" class="form-control input_tanggal"  name="tanggal_beli" id="tanggal_beli"   />
              </div>
            </div>
            <div class="form-group">
                <div class="input_fields_wrap">
                  <!-- sn textboxt fetch in here -->                      
                </div>
        </div>
       </div> 
      


      