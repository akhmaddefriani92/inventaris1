<?php
session_start();
error_reporting(E_ALL);
  include "DB_Function.php";
  $dbfunc = new DB_Function();
  
  $id = $_POST['rowid']; //escape string
  
  $data = $dbfunc->get_permintaan($id);

  #print_r($data);

#print_r($data);
$get_user = $dbfunc->get_user_level($_SESSION['namaadmin']);
$id_user    = $get_user["id_user"];


#  if ($level==1){
    
?>
         <input type="hidden" name="id_permintaan" class="form-control" value="<?php echo $data['id_permintaan'];?>" >

          <input type="hidden" name="id_user" class="form-control" value="<?php echo $id_user;?>" >


      <div class="form-group">
              
              
              <div class="col-md-2">
                  <label  for="kota">Kota:</label>
                    <input type="text" name="kota" class="form-control" value="<?php echo $data['kode_kota'];?>" readonly>
              </div>
        
            <div class="col-md-4">
              <label  for="Data Perangkat">Data Perangkat:</label>
              <input type="text" name="data_perangkat" class="form-control" value="<?php echo $data['data_perangkat'];?>" readonly>
            </div>

            <div class="col-md-2">
              <label>Merk:</label>
              <input type="text" name="merk" class="form-control" value="<?php echo $data['merk'];?>" readonly>
            </div>

            <div class="col-md-4">
              <label>Tipe:</label>
              <input type="text" name="tipe" class="form-control" value="<?php echo $data['tipe'];?>" readonly>
            </div>

            
        
      </div>
      
      
      <div class="form-group">
        <div class="col-md-12">
        <button type="button" class="btn btn-warning btn-xs"><b>Proses Permintaan <span class="glyphicon glyphicon-arrow-down"></span></b></button>
        </div>
      </div>  

      <div class="form-group">
      <div class="col-md-12">
        <table class="table table-bordered ">
          <thead  style="background:#ddd;">
            <th width="10%">No</th>
            <th width="10%">User</th>
            <th width="15%">Tanggal</th>
            <th>Keterangan</th>
          </thead>
          <tbody>
            <?php
            $no=1;
              echo "<tr><td>$no</td><td>$data[username]</td><td>$data[tgl]</td><td>$data[keterangan]</td></tr>";
              $ket=$dbfunc->list_ket_minta($data['id_permintaan']);
              #print_r($ket);
              foreach ($ket as $key => $value) {
                # code...
                $no++;
                echo "<tr>";
                echo "<td>".$no."</td>";
                echo "<td>$value[username]</td>";
                echo "<td>$value[tanggal]</td>";
                echo "<td>$value[keterangan]</td>";
                echo "</tr>";
              }

            ?>
          </tbody>
          

        </table>
        </div>
     </div>
        <h4><span class="label label-default">Add</span> Process Permintaan</h4>
        

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
          
