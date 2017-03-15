<?php
session_start();
error_reporting(E_ALL);
  include "DB_Function.php";
  $funcdb = new DB_Function();
  
  $id = $_POST['rowid']; //escape string
  
  $data = $funcdb->get_kota($id);
  

echo "<div class='row'>
                  <div class='col-md-6'>
                    <label>Kode Kota : </label> 
                     <input type='hidden' class='form-control' name='id_kota' value='$id'/>
                    <input type='text' class='form-control' name='kode_kota' value='$data[kode_kota]'/>
                   </div>
                 
                  <div class='col-md-6'> 
                   <label>Nama Kota : </label> 
                    <input type='text' class='form-control' name='nama_kota' value='$data[nama_kota]'/>
                  </div>
        </div>
<br>
        <div class='row'>
                  <div class='col-md-3'>
                    <label>No.Telp : </label> 
                    <input type='text' class='form-control' name='no_telp' value='$data[no_telp]'/>
                   </div>
                 
                  <div class='col-md-3'> 
                   <label>Fax : </label> 
                   <input type='text' class='form-control' name='fax' value='$data[fax]'/>
                  </div>

                  <div class='col-md-6'> 
                   <label>Alamat : </label> 
                    <textarea class='form-control' name='alamat' >$data[alamat]</textarea>
                  </div>
        </div>
          ";
          
          
     
        ?>
