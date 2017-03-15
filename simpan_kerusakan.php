<?php
  
  include "DB_Function.php";
  ini_set("display_error", E_ALL);
  $dbfunc = new DB_Function();

  if(isset($_POST["save"])){ 
    
    
    $user    = $dbfunc->get_user_level($_POST["user"]);
    $id_user = $user["id_user"];

   if(isset($_POST["kode_kota"])){
      
      $kode_kota=$_POST["kode_kota"];
      $id_kota=$dbfunc->get_id_kota($kode_kota);
    }else{ 
      $id_kota      = $_POST["id_kota"];
    }

    if(!empty($_POST["id_inventaris"])){

      $id_inventaris=$_POST["id_inventaris"];

    }elseif(!empty($_POST["id_barang"])){
      # code...
      
      $id_barang = $_POST["id_barang"];
      
       $unit_add = $_POST["unit_add"];

      $sn_add   = $_POST["sn_add"];
      $ip_add   = $_POST["ip_add"];
      $lokasi_add   = $_POST["lokasi_add"];
    
    }else{
      $data_perangkat_add = $_POST["data_perangkat_add"];
      $merk_add = $_POST["merk_add"];
       $tipe_add = $_POST["tipe_add"];
       $sn_add   = $_POST["sn_add"];
      $ip_add   = $_POST["ip_add"];
      $lokasi_add   = $_POST["lokasi_add"];
      $unit_add = $_POST["unit_add"];
    }
      #$status_repair = $_POST["status_repair"]  ;
      $tanggal_kirim = $_POST["tanggal_kirim"]  ;
      $user = $_POST["user"]  ;
      #$lokasi_repair = $_POST["lokasi_repair"]  ;
      $keterangan = $_POST["keterangan"]  ;

        if(!empty($_POST["id_barang"]) && empty($_POST["id_inventaris"])){

          $id_status = $dbfunc->CariStatus("1");
          #echo "gaga";
          $insert_inventaris = $dbfunc->insert_inventaris_rusak($id_kota, $id_barang,$unit_add,  $sn_add, $lokasi_add, $keterangan, $ip_add, $id_status );

            if(!$insert_inventaris){
                echo "Gagal Input";
              }else{
                  sleep(1);
                  $id_inventaris = $dbfunc->Cari_id_inventaris2($id_barang, $sn_add, $id_kota);
                  
                  $insert_kerusakan = $dbfunc->insert_kerusakan( $id_inventaris,  $tanggal_kirim, $id_user, $lokasi_repair ,$keterangan, $id_status, $id_kota);


                  if($insert_kerusakan){
                           echo "<script>
                                alert('Success Insert');
                              location.href=('kerusakan.php');
                              </script>";
                  }else{
                           echo "<script>
                                alert('Failed Insert');
                              location.href=('add-kerusakan.php');
                              </script>";
                  } 

              }

        }else if(!empty($data_perangkat_add)){
           
          #insert ke master barang
          $id_status = $dbfunc->CariStatus("1");

          $insert_barang =$dbfunc->InsertMasterBarang($data_perangkat_add, $merk_add, $tipe_add);
          sleep(1);
          #ambil id_barang
          $id_barang=$dbfunc->CariMasterBarang($data_perangkat_add, $merk_add, $tipe_add);
          sleep(1);
          $insert_inventaris = $dbfunc->insert_inventaris_rusak($id_kota, $id_barang,$unit_add,  $sn_add, $lokasi_add, $keterangan, $ip_add, $id_status );
           
                
              if(!$insert_inventaris){
                echo "Gagal Input";
              }else{
                  sleep(1);
                  $id_inventaris = $dbfunc->Cari_id_inventaris2($id_barang, $sn_add, $id_kota);
                  sleep(1);
                  echo "<br>id_inventaris ".$id_inventaris;
                  $insert_kerusakan = $dbfunc->insert_kerusakan($id_inventaris,  $tanggal_kirim, $id_user, $lokasi_repair ,$keterangan, $id_status, $id_kota);


                  if($insert_kerusakan){
                           echo "<script>
                                alert('Success Insert');
                              location.href=('kerusakan.php');
                              </script>";
                  }else{
                           echo "<script>
                                alert('Failed Insert');
                              location.href=('add-kerusakan.php');
                              </script>";
                  } 

              }

            

      }else{

        #cari id_status
          $id_status = $dbfunc->CariStatus("1");

      $insert_kerusakan = $dbfunc->insert_kerusakan($id_inventaris,  $tanggal_kirim, $id_user, $lokasi_repair ,$keterangan, $id_status, $id_kota);
            if($insert_kerusakan){
                    
                    $update_inventaris= $dbfunc->update_inventaris_rusak($id_inventaris, $keterangan, $id_status);
                    
                    if(!$update_inventaris){
                      echo "Failed Update inventaris status";
                    } 

                     echo "<script>
                          alert('Success Insert');
                        location.href=('kerusakan.php');
                        </script>";
                    

            }else{
                     echo "<script>
                          alert('Failed Insert');
                        location.href=('add-kerusakan.php');
                        </script>";
            }



      }


      

}
?>

