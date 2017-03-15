<?php
session_start();
error_reporting(E_ALL);
  include "DB_Function.php";
  $dbfunc = new DB_Function();
  
  $id = $_POST['rowid']; //escape string
  
  $data = $dbfunc->get_kerusakan($id);


  $get_user = $dbfunc->get_user_level($_SESSION['namaadmin']);
  $level    = $get_user["level"];
  $get_kota = $dbfunc->get_kota($data["kota"]);
  $kota     = $get_kota["kode_kota"];


#  if ($level==1){
    echo "<input type='hidden' name='id_inventaris' value='$data[id_inventaris]'/>";
?>
         <input type="hidden" name="no_repair" class="form-control" value="<?php echo $data['no_repair'];?>" >
      

      <div class="form-group">
              <label class="control-label col-sm-2" for="UserName">UserName:</label>
              <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" value="<?php echo $data['username'];?>" readonly>
              </div>
            </div>


      <div class="form-group">
              <label class="control-label col-sm-2" for="kota">Kota:</label>
              <div class="col-sm-10">
                    <input type="text" name="kota" class="form-control" value="<?php echo $kota;?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="Data Perangkat">Data Perangkat:</label>
              <div class="col-sm-10">
              <input type="text" name="data_perangkat" class="form-control" value="<?php echo $data['data_perangkat'];?>" readonly>

              </div>
            </div>
            <!--
            <div class="form-group">
              <label class="control-label col-sm-2" for="Unit">Merk:</label>
              <div class="col-sm-10">
                 <input type="text" name="merk" class="form-control" value="<?php echo $data['merk'];?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="Unit">Serial Number:</label>
              <div class="col-sm-10">
                 <input type="text" name="sn" class="form-control" value="<?php echo $data['sn'];?>" readonly>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-sm-2" for="Merk">Status:</label>
              <div class="col-sm-10">
                 <select class="form-control" name="status_repair">
                   <?php
                   $options = array("Repair", "Shipping", "Done");
                   $select = $data["status_repair"];
                       foreach($options as $option){
                          if($select == $option){
                              echo "<option selected='selected' value='$option'>$option</option>" ;
                          }else{
                              echo "<option value='$option'>$option</option>" ;
                          }
                      }
                  ?>
                 </select>
              </div>
            </div>
            -->

            <div class="form-group">
              <label class="control-label col-sm-2" for="Merk">Tanggal:</label>
              <div class="col-sm-10">
                 <input type="text" name="tanggal" class="form-control" value="<?php echo $data['tanggal_kirim'];?>">
              </div>
            </div>

            <!--
            <div class="form-group">
              <label class="control-label col-sm-2" for="Merk">Lokasi Repair:</label>
              <div class="col-sm-10">
                 <input type="text" name="lokasi_repair" class="form-control" value="<?php echo $data['lokasi_repair'];?>">
              </div>
            </div>-->

            <div class="form-group">
              <label class="control-label col-sm-2" for="Tipe">Keterangan:</label>
              <div class="col-sm-10">
                 <textarea class="form-control textarea" name="keterangan" ><?php echo $data["keterangan"];?></textarea>
              </div>
            </div>

                        

