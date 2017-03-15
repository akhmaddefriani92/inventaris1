<?php
session_start();
error_reporting(E_ALL);
  include "DB_Function.php";
  $funcdb = new DB_Function();
  
  $id = $_POST['rowid']; //escape string
  
  $data = $funcdb->get_grup($id);
  print_r($data);
  

echo "
        <div class='row'>
        
                  <div class='col-md-6'>
                    <label>Menu</label> 
                     <input type='hidden' class='form-control' name='id_grup' value='$id'/>
                     <select name='id_menu' class='form-control'>";
                     $menu = $funcdb->listmenu();
                      foreach ($menu as $key => $value) {
                        
                          $selected="";
                          if ($data["id_menu"] == $value["id_menu"]){
                            $selected = 'selected="selected"';
                          }
                        echo "<option value='$value[id_menu]' $selected>$value[navi_menu]</option>";
                      }
                    echo"
                    </select>
                   </div>
          
                  <div class='col-md-6'> 
                  <label>Level</label> 
                    <select  name='level' class='form-control'>";
                      
                        # code...
                        if( $data["level"] == 1 ){
                            
                            echo "<option value='1' >1</option>";
                            echo "<option value='2' >2</option>";
                        }else{
                            echo "<option value='2' >2</option>";
                            echo "<option value='1' >1</option>";
                        }
                         
                          
                      
                      echo "
                      </select>

                    

                  </div>
                 
                 

                 
        </div>
          ";
          
          
     
        ?>
