<?php
session_start();
error_reporting(E_ALL);
  include "DB_Function.php";
  $dbfunc = new DB_Function();
  
  $id = $_POST['rowid']; //escape string
  
  $data = $dbfunc->get_kerusakan($id);

#print_r($data);
$get_user = $dbfunc->get_user_level($_SESSION['namaadmin']);
$id_user    = $get_user["id_user"];


$get_kota = $dbfunc->get_kota($data["kota"]);
  $kota     = $get_kota["kode_kota"];

#  if ($level==1){
    echo "<input type='hidden' name='id_inventaris' value='$data[id_inventaris]'/>";
?>
         <input type="hidden" name="no_repair" class="form-control" value="<?php echo $data['no_repair'];?>" >

          <input type="hidden" name="id_user" class="form-control" value="<?php echo $id_user;?>" >


      <div class="form-group">
              
              
              <div class="col-md-2">
                  <label  for="kota">Kota:</label>
                    <input type="text" name="kota" class="form-control" value="<?php echo $kota;?>" readonly>
              </div>
        
            <div class="col-md-4">
              <label  for="Data Perangkat">Data Perangkat:</label>
              <input type="text" name="data_perangkat" class="form-control" value="<?php echo $data['data_perangkat'];?>" readonly>
            </div>

            <div class="col-md-4">
              <label>Serial Number:</label>
              <input type="text" name="sn" class="form-control" value="<?php echo $data['sn'];?>" readonly>
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
            <th width="10%">No</th>
            <th width="10%">User</th>
            <th width="15%">Tanggal</th>
            <th>Keterangan</th>
          </thead>
          <tbody>
            <?php
            $no=1;
              echo "<tr><td>$no</td><td>$data[username]</td><td>$data[tanggal_kirim]</td><td>$data[keterangan]</td></tr>";
              $ket=$dbfunc->list_keterangan($data['no_repair']);
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
          


<?php
/*
            <div class="form-group">
              <div class="col-md-3">
                <label for="UserName">UserName:</label>
                <input type="text" name="username" class="form-control" value="<?php echo $data['username'];?>" readonly>
              </div>

              <div class="col-md-3">
                <label >Tanggal:</label>
                <input type="text" name="tanggal_kirim" class="form-control" value="<?php echo $data['tanggal_kirim'];?>" readonly>
              </div>
              
              
              <div class="col-md-6">
                <label >Keterangan:</label>
                  
                <textarea class="form-control textarea" name="keterangan" readonly="readonly"><?php echo $data["keterangan"];?></textarea>
                  
              </div>
            </div>

        <!--proses 2-->
        <div class="form-group">
              <div class="col-md-3">
                
                    <?php
                        if(!empty($data["username2"])){
                          echo "<label>User 2:</label>";
                          echo "<input type='text' class='form-control'  name='username2' value='$data[username2]' readonly/>";
                        }else{
                          echo "<input type='hidden' class='form-control'  name='username2' value='$_SESSION[namaadmin]' readonly/>";
                        }
                    ?>

              </div>

              <div class="col-md-3">
                <label>Tanggal 2:</label>
                    <?php
                        if(!empty($data["tanggal2"]) && $data["tanggal2"]!='0000-00-00'){
                          echo "<input type='text' class='form-control'  name='tanggal2' value='$data[tanggal2]' readonly/>";
                        }else{
                          echo "<input type='text' class='form-control tanggal'  name='tanggal2'  />";
                        }
                    ?>

              </div>
              
              <div class="col-md-6">
                <label>Proses Repair 2:</label>
                 <?php
                    if(!empty($data["keterangan2"]) ){
                  ?>    
                       <textarea class="form-control textarea" name="keterangan2" readonly="readonly"><?php echo $data["keterangan2"];?></textarea>
                    <?php 
                    }else{
                    ?>  
                     <textarea class="form-control textarea" name="keterangan2" ></textarea>
                     <?php
                     }
                     ?>


                 
              </div>
      </div>

      <!--proses 3-->
        <div class="form-group">
              <div class="col-md-3">
                
                    <?php
                        if(!empty($data["username3"])){
                          echo "<label>User 3:</label>";
                          echo "<input type='text' class='form-control'  name='username3' value='$data[username3]' readonly/>";
                        }else{
                          echo "<input type='hidden' class='form-control'  name='username3' value='$_SESSION[namaadmin]' readonly/>";
                        }
                    ?>

              </div>

              <div class="col-md-3">
                <label>Tanggal 3:</label>
                    <?php
                        if(!empty($data["tanggal3"]) && $data["tanggal3"]!='0000-00-00'){
                          echo "<input type='text' class='form-control'  name='tanggal3' value='$data[tanggal3]' readonly/>";
                        }else{
                          echo "<input type='text' class='form-control tanggal'  name='tanggal3'  />";
                        }
                    ?>

              </div>
              
              <div class="col-md-6">
                <label>Proses Repair 3:</label>
                 <?php
                    if(!empty($data["keterangan3"])){
                  ?>    
                       <textarea class="form-control textarea" name="keterangan3" readonly="readonly"><?php echo $data["keterangan3"];?></textarea>
                    <?php 
                    }else{
                    ?>  
                     <textarea class="form-control textarea" name="keterangan3" ></textarea>
                     <?php
                     }
                     ?>


                 
              </div>
      </div>

      <!--proses 4-->
        <div class="form-group">
              <div class="col-md-3">
                
                    <?php
                        if(!empty($data["username4"])){
                          echo "<label>User 4:</label>";
                          echo "<input type='text' class='form-control'  name='username4' value='$data[username4]' readonly/>";
                        }else{
                          echo "<input type='hidden' class='form-control'  name='username4' value='$_SESSION[namaadmin]' readonly/>";
                        }
                    ?>

              </div>

              <div class="col-md-3">
                <label>Tanggal 4:</label>
                    <?php
                        if(!empty($data["tanggal4"]) && $data["tanggal4"]!='0000-00-00'){
                          echo "<input type='text' class='form-control'  name='tanggal4' value='$data[tanggal4]' readonly/>";
                        }else{
                          echo "<input type='text' class='form-control tanggal'  name='tanggal4'  />";
                        }
                    ?>

              </div>
              
              <div class="col-md-6">
                <label>Proses Repair 4:</label>
                 <?php
                    if(!empty($data["keterangan4"])){
                  ?>    
                       <textarea class="form-control textarea" name="keterangan4" readonly="readonly"><?php echo $data["keterangan4"];?></textarea>
                    <?php 
                    }else{
                    ?>  
                     <textarea class="form-control textarea" name="keterangan4" ></textarea>
                     <?php
                     }
                     ?>


                 
              </div>
      </div>
*/
?>                        

