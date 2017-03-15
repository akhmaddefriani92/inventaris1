<?php
session_start();
error_reporting(E_ALL);
  include "DB_Function.php";
  $funcdb = new DB_Function();
  
  $id = $_POST['rowid']; //escape string
  
  $data = $funcdb->get_user($id);
  

echo "
        <div class='row'>
                  <div class='col-md-5'>
                    <label>UserName</label> 
                     <input type='hidden' class='form-control' name='ID' value='$id'/>
                    <input type='text' class='form-control' name='username' value='$data[username]'/>
                   </div>
                 
                  <div class='col-md-7'> 
                   <label>FullName</label> 
                    <input type='text' class='form-control' name='fullname' value='$data[fullname]'/>
                  </div>
                                                                                             
                 
        </div>
        <br>
        <div class='row'>
                 <div class='col-md-4'>
                   <label>Password</label>
                     <input type='password' class='form-control' name='password' value='$data[password]'/>
                  </div>
                  
                  <div class='col-md-4'>
                    <label>Level</label> 
                     <select  name='level' class='form-control'>";
                      
                        # code...
                        if( $data["level"] == 1 ){
                            
                            echo "<option value='1' $selected>1</option>";
                            echo "<option value='2' $selected>2</option>";
                        }else{
                            echo "<option value='2' $selected>2</option>";
                            echo "<option value='1' $selected>1</option>";
                        }
                         
                          
                      
                      echo "
                      </select>
                   </div>
                   <div class='col-md-4'>
                    <label>Kota</label> 
                     <select  name='id_kota' class='form-control'>";
                      
                        # code...
                        $listkota=$funcdb->listkota();
                        foreach ($listkota as $key => $value) {
                        # code...
                          if($data["id_kota"]==$value["id_kota"]){
                            $selected ='selected="selected"';
                          }else{
                            $selected='';
                          }
                        
                        echo "<option value='$value[id_kota]' $selected>$value[kode_kota]</option>";

                        }                        
                         
                          
                      
                      echo "
                      </select>
                   </div>
          </div> <br>
          
          ";
          
          
     
        ?>
