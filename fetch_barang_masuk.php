<?php
session_start();
error_reporting(E_ALL);
  include "DB_Function.php";
  $dbfunc = new DB_Function();
  
  $id = $_POST['rowid']; //escape string
  
  $data      = $dbfunc->get_barang_masuk($id);
  $id_surat  = $data["id_surat"];

  $data2      = $dbfunc->get_surat_jalan($id_surat);
#print_r($data);
#print_r($data2);

  $getkota   = $dbfunc->get_kota($data2["id_kota"]);
  $kota2     = $getkota["kode_kota"];

  $kode_kota = $dbfunc->get_user_kota($_SESSION["namaadmin"]);
  $get_user = $dbfunc->get_user_level($_SESSION['namaadmin']);
  $level    = $get_user["level"];
  $get_status   = $dbfunc->get_status($data2["id_status"]);
  $ket_status  = $get_status["ket_status"];

#  if ($level==1){
    echo "<input type='hidden' name='id_surat' value='$data[id_surat]'/>";
?>
         <input type="hidden" name="id_bm" class="form-control" value="<?php echo $data['id_bm'];?>" >
      

      <div class="form-group">
              <label class="control-label col-sm-2" for="UserName">No Surat:</label>
              <div class="col-sm-10">
                    <input type="text" name="no_surat" class="form-control" value="<?php echo $data2['no_surat'];?>" readonly>
              </div>
            </div>


      <div class="form-group">
              <label class="control-label col-sm-2" for="kota">Dari Kota:</label>
              <div class="col-sm-10">
                   <?php

                    echo "<input type='text'  name='kode_kota' class='form-control' value='$kota2' readonly/>";
                    ?>
              </div>
            </div>

            
           <div class="form-group">
              
              <?php
                if(!empty($data["tgl_terima"])){
              ?>
                  
                  <div class="col-sm-4">
                    <label>Status</label>
                     <input type="text" class="form-control" value="<?php echo "Sudah Diterima";?>" readonly>
                  </div>
                  <div class="col-sm-4">
                     <label>Tanggal Terima</label>
                     <input type="text" class="form-control" value="<?php echo $data["tgl_terima"];?>" readonly>
                  </div>
                  <div class="col-sm-4">
                     <?php
                        $getuser = $dbfunc->get_user($data["diterima_oleh"]);
                        $diterima_oleh=$getuser["username"];
                     ?>
                     <label>Diterima Oleh</label>
                     <input type="text" class="form-control" value="<?php echo $diterima_oleh;?>" readonly>
                  </div>
              <?php
              }else{
              ?> 
                <label class="control-label col-sm-2" for="Tipe">Status:</label>
                  <div class="col-sm-3">
                    <input  id='cekterima' type='checkbox'   name='checkbox'/>Sudah Diterima<br>
                  </div>
                  <div class="col-sm-7">
                     <input type="text" name="id_status" id="id_status" class="form-control" value="<?php echo $ket_status;?>" readonly>
                  </div>
              <?php
              }
            ?>
            </div>
            
            <div class="showterima" style="display:none;">
            <div class="form-group">
              <label class="control-label col-sm-2" for="Tipe">Tanggal Terima:</label>
              <div class="col-sm-10">
                <input type="text" placeholder="Tanggal terima" class="form-control input_tanggal"  name="tgl_terima" id="tanggal_terima"   />
              </div>
            </div>
          

            <div class="form-group">
              <label class="control-label col-sm-2" for="Tipe">Keterangan:</label>
              <div class="col-sm-10">
                 <textarea class="form-control textarea" name="ket_bm" ><?php echo $data["ket_bm"];?></textarea>
              </div>
            </div>
            </div> 

                        

