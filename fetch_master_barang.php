<?php
session_start();
error_reporting(E_ALL);
  include "DB_Function.php";
  $dbfunc = new DB_Function();
  
  $id = $_POST['rowid']; //escape string
  
  $data      = $dbfunc->get_master_barang($id);
  

?>
   <input type="hidden" name="id_barang" class="form-control" value="<?php echo $data['id_barang'];?>" >
      

      <div class="form-group">
              <label class="control-label col-sm-3" for="UserName">Data Perangkat:</label>
              <div class="col-sm-9">
                    <input type="text" name="data_perangkat" class="form-control" value="<?php echo $data['data_perangkat'];?>" >
              </div>
            </div>


      <div class="form-group">
              <label class="control-label col-sm-3" for="kota">Merk:</label>
              <div class="col-sm-9">
                   <?php

                    echo "<input type='text'  name='merk' class='form-control' value='$data[merk]' />";
                    ?>
              </div>
            </div>

      <div class="form-group">
              <label class="control-label col-sm-3" for="UserName">Tipe:</label>
              <div class="col-sm-9">
                    <input type="text" name="tipe" class="form-control" value="<?php echo $data['tipe'];?>" >
              </div>
            </div>      
