<?php
session_start();
error_reporting(E_ALL);
  include "DB_Function.php";
  $dbfunc = new DB_Function();
  
  $id = $_POST['rowid']; //escape string
  
  $data = $dbfunc->get_software_rusak($id);

#print_r($data);
$get_user = $dbfunc->get_user_level($_SESSION['namaadmin']);
$id_user    = $get_user["id_user"];


$get_kota = $dbfunc->get_kota($data["kota"]);
  $kota     = $get_kota["kode_kota"];

#  if ($level==1){
    echo "<input type='hidden' name='id_software' value='$data[id_software]'/>";
?>
         
    <input type="hidden" name="id_user" class="form-control" value="<?php echo $id_user;?>" >


      <div class="form-group">
              
              
              <div class="col-md-2">
                  <label  for="kota">Kota:</label>
                    <input type="text" name="kota" class="form-control" value="<?php echo $kota;?>" readonly>
              </div>
        
            <div class="col-md-4">
              <label  for="Data Perangkat">Nama Software:</label>
              <input type="text" name="nama_software" class="form-control" value="<?php echo $data['nama_software'];?>" readonly>
            </div>

            <div class="col-md-4">
              <label>Tanggal:</label>
              <input type="text" name="tanggal" class="form-control" value="<?php echo $data['tanggal'];?>" readonly>
            </div>

            <div class="col-md-2">
                <label >Status:</label>
                 <select class="form-control" name="id_status">
                   <?php
                   $options = array("0", "1");
                   $select = $data["id_status"];
                      $status = $dbfunc->list_status();
                      foreach ($status as $key => $value) {
                        # code...
                        if($value["status"]=="0" || $value["status"]=="1"){
                          if($select==$value["id_status"]){
                            $selected="selected='selected'";
                            echo "<option value='$value[id_status]' selected>$value[status]</option>";
                          }else{
                            echo "<option value='$value[id_status]'>$value[status]</option>";
                          }
                        }  
                      } 

                  ?>
                 </select>
        </div>
        
      </div>

      <div class="form-group">
        <div class="col-md-12">
        <button type="button" class="btn btn-warning btn-xs"><b>Proses Repair <span class="glyphicon glyphicon-arrow-down"></span></b></button>
        </div>
      </div>  

      <div class="form-group">
      <div class="col-md-12">
        <table class="table table-bordered table-striped">
          <thead  style="background:#ddd;">
            <th width="5%">No</th>
            <th width="15%">User</th>
            <th width="10%">Tanggal</th>
            <th>Keterangan</th>
          </thead>
          <tbody>
            <?php
            $no=1;
              echo "<tr><td>$no</td><td>$data[fullname]</td><td>$data[tanggal]</td><td>$data[keterangan]</td></tr>";
              $ket=$dbfunc->list_keterangan_software($data['id_software']);
              #print_r($ket);
              foreach ($ket as $key => $value) {
                # code...
                $no++;
                echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>$value[fullname]</td>";
                echo "<td>$value[tanggal]</td>";
                echo "<td>$value[keterangan]</td>";
                echo "</tr>";
              }

            ?>
          </tbody>
          

        </table>
        </div>
     </div>
        <h4><span class="label label-default">Add</span> Proses Repair</h4>
        

          <div id="add_ktr" style="">
              <div class="form-group">
                      <div class="col-xs-4">
                        <label>Tanggal:</label>
                            <input type="text" class="form-control tanggal" name="tanggal_ktr" />
                        </div>
                        <div class="col-xs-8">
                        <label>Keterangan:</label>
                            <textarea class="form-control" name="keterangan_ktr"></textarea>
                        </div>
                  </div>

                        
            
      </div>

