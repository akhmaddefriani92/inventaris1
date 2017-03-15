<?php
session_start();
error_reporting(E_ALL);
  include "DB_Function.php";
  $funcdb = new DB_Function();
  
  $id = $_POST['rowid']; //escape string
  
  $data = $funcdb->get_menu($id);
  

echo "
        <div class='row'>
                  <div class='col-md-6'>
                    <label>Menu</label> 
                     <input type='hidden' class='form-control' name='id_menu' value='$id'/>
                    <input type='text' class='form-control' name='navi_menu' value='$data[navi_menu]'/>
                   </div>
                 
                  <div class='col-md-6'> 
                   <label>Link</label> 
                    <input type='text' class='form-control' name='navi_link' value='$data[navi_link]'/>
                  </div>
                 
                 

                 
        </div>
          ";
          
          
     
        ?>
