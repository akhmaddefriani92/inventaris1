<?php
session_start();
error_reporting(E_ALL);
  include "DB_Function.php";
  $dbfunc = new DB_Function();
  
  $id = $_POST['rowid']; //escape string
  
  $data = $dbfunc->get_inventaris($id);

#print_r($data);
$get_user = $dbfunc->get_user_level($_SESSION['namaadmin']);
  $level    = $get_user["level"];

  $data_perangkat = str_replace("<br />", "", $data["data_perangkat"]);
  $merk = str_replace("<br />", "", $data["merk"]);
  $unit = str_replace("<br />", "", $data["unit"]);
  $ip = str_replace("<br />", "", $data["ip"]);
  $tipe = str_replace("<br />", "", $data["tipe"]);
  $sn = str_replace("<br />", "", $data["sn"]);
  $lokasi = str_replace("<br />", "", $data["lokasi"]);

#  if ($level==1){
    echo "<input type='hidden' name='id_inventaris' value='$id'/>";
?>
      <div class="form-group">
              <label class="control-label col-sm-2" for="kota">Kota:</label>
              <div class="col-sm-10">
                    <?php
                      #$level=$dbfunc->get_user_level($_SESSION["namaadmin"]);
                      #if ($level==1){} 
                    ?>
                        <select name="id_kota" class="form-control">
                        <?php
                        $listkota=$dbfunc->listkota();
                        echo "<option>--Silahkan Pilih--</option>";
                        foreach ($listkota as $key => $value) {
                          # code...
                          if ($value["kode_kota"]==$data["kode_kota"]){
                            $selected = 'selected="selected"';
                          }else{
                            $selected='';
                          }
                          echo "<option value='$value[id_kota]' $selected>$value[kode_kota]</option>";
                        }

                        ?>
                        </select>

              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="Data Perangkat">Data Perangkat:</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="data_perangkat" value="<?php echo $data['data_perangkat'];?>" readonly/>
              <!--<textarea class="form-control textarea" name="data_perangkat" ><?php echo $data_perangkat;?></textarea>-->
              </div>
            </div>

            

            <div class="form-group">
              <label class="control-label col-sm-2" for="Merk">Merk:</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="merk" value="<?php echo $data['merk'];?>" readonly/>
                 <!--<textarea class="form-control textarea" name="merk" ><?php echo $merk;?></textarea>-->
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="Tipe">Tipe:</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="tipe" value="<?php echo $data['tipe'];?>" readonly/>
                 <!--<textarea class="form-control textarea" name="tipe" ><?php echo $tipe;?></textarea>-->
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="Unit">Unit:</label>
              <div class="col-sm-10">
                 <input type="text" class="form-control" name="unit" value="<?php echo $data['unit'];?>"/>
                 <!--<textarea class="form-control textarea" name="unit" ><?php echo $unit;?></textarea>-->
                 
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="S/N">S/N:</label>
              <div class="col-sm-10">
                 <textarea class="form-control textarea" name="sn" ><?php echo $sn;?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="Lokasi">Lokasi:</label>
              <div class="col-sm-10">
                 <textarea class="form-control textarea" name="lokasi" ><?php echo $lokasi;?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="Data Pemeliharaan">Data Pemeliharaan:</label>
              <div class="col-sm-10">
                 <input type="text" class="form-control" name="data_pemeliharaan" value="<?php echo $data["data_pemeliharaan"];?>"/>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="Data Pemeliharaan">Status:</label>
              <div class="col-sm-10">
                 <select class="form-control" name="status">
                   <?php
                   $options = array("0", "1");
                   $select = $data["status"];
                   $list = $dbfunc->list_status();
                       foreach($list as $key=> $value){
                          if($select == $value["status"]){
                              echo "<option selected='selected' value='$value[id_status]'>$select</option>" ;
                          }else{
                              echo "<option value='$value[id_status]'>$value[status]</option>" ;
                          }
                      }
                  ?>
                 </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="IP">IP:</label>
              <div class="col-sm-10">
                 <textarea class="form-control textarea" name="ip" ><?php echo $ip;?></textarea>
              </div>
            </div>
            
<?php


#}
/*
else{
    echo "<div class='row'>
              <div class='col-md-6'>
                <label>Kelengkapan Data</label>
                  <input type='hidden' class='form-control' name='id_invoice' value='$id' />
                  <input type='text' class='form-control' name='kelengkapan_data' value='$data[kelengkapan_data]' />
                </div> 
               <div class='col-md-6'>
                <label>Tanggal Dibayar</label>
                    <input type='text' placeholder='isi tanggal dibayar'class='form-control'  name='tanggal_dibayar_date' value='$data[tanggal_dibayar]'id='tanggal_dibayar'   />
                  </div> 
          </div> 
          <br>
          <div class='row'>
                <div class='col-md-4'>
                <label>Bank</label>
                  <input type='text' class='form-control' name='bank'  value='$data[bank]' />
                </div> 
            
              <div class='col-md-8'>
                <label>Keterangan</label>
                  <input type='text' class='form-control' name='keterangan' value='$data[keterangan]' />
                </div>
          </div>";
  
}
 */   
?>
