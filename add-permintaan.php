<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<?php

session_start();
if (empty($_SESSION['namaadmin'])) // Jika Session kosong maka tidak bisa Akses Halaman Ini alias kembali
{
 header('location:index.php');
}
else
{
  include "DB_Function.php";
  $yest =date('jMY', strtotime("-1 days"));
  $dbfunc = new DB_Function();
   

 ?> 
  
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MCOJAYA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
  
    <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/jquery.dataTables.css">

  <!--choosen-->
  <link rel="stylesheet" href="dist/choosen/chosen.min.css">
  
  <!--jquery datepicker-->
    <link rel="stylesheet" type="text/css" href="jquery-ui-biru/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="jquery-ui-biru/jquery-ui.theme.min.css">
                
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <style>

  #cekbayar + .tooltip> .tooltip-inner {background-color: #f00;}
  textarea{
    height: 5%;
  }
  </style>
  <script>
function fetch_select(){
  var myval   = document.getElementById('kode_kota').value;
                // alert(myval);
      $.ajax({
            type: 'POST',
            url: 'fetch_dataperangkat2.php',
            data: {
                  get_option:myval
                 },
            success: function (response) {
                  document.getElementById("data_perangkat").innerHTML=response; 
                }
            });
}

</script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue  sidebar-mini sidebar-collapse ">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>CO</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">MCOJAYA</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              Hallo <b><?php echo $_SESSION['namaadmin']?></b>  
              <!--<img src="dist/img/avatar04.png" class="user-image" alt="User Image">-->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"></span><span class="caret"></span>
            </a>
             <ul class="dropdown-menu">
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-primary btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <?php
        include "side_menu.php";
        ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      </section>

    <!-- Main content -->
    <section class="content">
       <!-- SELECT2 EXAMPLE -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><b>Add Permintaan</b></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <a class="btn btn-box-tool" href="inventaris.php"><i class="fa fa-arrow-left"></i></a>
            </div>
        </div>

        <div class="box-body">
        <form method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="form-group">
              <label class="control-label col-sm-2" for="kota">Kota:</label>
              <div class="col-sm-10">
                    <?php
                      $getuser=$dbfunc->get_user_level($_SESSION["namaadmin"]);
                      $level    = $getuser["level"];
                      $id_user  = $getuser["id_user"];

                      echo "<input type='hidden'  name='id_user' value='$id_user' />";

                      $kode_kota = $dbfunc->get_user_kota($_SESSION["namaadmin"]);
                        
                      if ($kode_kota!="ALL"){ 
                          echo "<input type='text'  name='kode_kota' class='form-control' value='$kode_kota' readonly/>";
                       }else{ 
                    ?>
                        <select name="id_kota" id="kode_kota" class="form-control" onchange="fetch_select()">
                        <?php
                        $listkota=$dbfunc->listkota();
                        echo "<option>--Silahkan Pilih--</option>";
                        foreach ($listkota as $key => $value) {
                          # code...
                          if($value["kode_kota"]!="ALL"){
                          echo "<option value='$value[id_kota]'>$value[nama_kota]</option>";
                          }
                        }
                        echo "</select>";
                      }
                        ?>
                        

              </div>
            </div>

            <!--<div class="form-group">
              <label class="control-label col-sm-2" for="Data Perangkat">Data Perangkat:</label>
              <div class="col-sm-8">
                 
                 <select name="data_perangkat" id="data_perangkat" class="form-control" >
                <?php
                    if($kode_kota!="ALL"){
                      
                      $data_perangkat  = $dbfunc->list_inventaris_daerah3($kode_kota);
                      echo "<option>ALL</option>";
                      foreach ($data_perangkat as $key => $nilai) {
                            # code...
                      echo "<option value='$nilai[data_perangkat]'>$nilai[data_perangkat]</option>";
                      #echo "<option value='$nilai[id_inventaris]|$nilai[merk]'>$nilai[data_perangkat]</option>";

                      }
                   } 
                  ?>

              </select>
              </div>
              <div class="col-sm-2">
                <button class='btn btn-success' title="jika data perangkat tidak  ada di inventaris klik ini" type="button" href='#form_demo' id='list'>+</button>         
              </div>
            </div>-->

            <!--<div id="form_demo" style="display:none;">-->
              <div class="form-group">
              <label class="control-label col-sm-2" for="Data Perangkat">Barang:</label>
              <div class="col-sm-8">
                <select name="id_barang" id="id_barang" class="form-control choosen-select id_barang ">
                  <?php
                      
                      #echo "<option>--Silahkan Pilih--</option>";
                      $data_perangkat  = $dbfunc->list_master_barang();
                      foreach ($data_perangkat as $key => $nilai) {
                            # code...
                      echo "<option value='$nilai[id_barang]'>$nilai[data_perangkat] Merk: $nilai[merk] Tipe: $nilai[tipe]</option>";
                      

                      }
                      
                   
                  ?>
                  </select>
              </div>
              <div class="col-sm-2">
                <button class='btn btn-success' title="jika barang tidak  ada  klik ini" type="button" href='#master_barang' id='list2'>+</button>         
              </div>
              
            </div>  
                

                <div id="master_barang" style="display:none;"> 

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="Unit">Data Perangkat:</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control required2" name="data_perangkat_add" />
                          </div>
                    </div>

                    

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="Merk">Merk :</label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control required2" name="merk_add" />
                          </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="Tipe">Tipe :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control required2" name="tipe_add" />
                        </div>
                    </div>

                </div>  

           <!-- </div>    -->

                        

            <div class="form-group">
              <label class="control-label col-sm-2" for="Unit">Unit:</label>
              <div class="col-sm-10">
                 <input type="text" class="form-control" name="unit" id="unit"/><span id="errmsg" style="color:red;"></span>
              </div>
            </div>

            
            <div class="form-group">
              <label class="control-label col-sm-2" for="Tipe">Tanggal:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="tgl" id="tgl"/>
                
              </div>
            </div>

            
            
            <div class="form-group">
              <label class="control-label col-sm-2" for="IP">Keterangan:</label>
              <div class="col-sm-10">
                      <textarea class="form-control" name="keterangan"></textarea>
              </div>
            </div>
            
             <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="save" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </div>

        </form>




        </div><!--box-body-->

                      
                 

       </div> <!--box-->
     
      

      

      <!-- Your Page Content Here -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
    if (isset($_POST["save"])){

        if(isset($_POST["kode_kota"])){
         
          $kode_kota=$_POST["kode_kota"];
          $id_kota=$dbfunc->get_id_kota($kode_kota);

        }else{ 
          
          $id_kota    = $_POST["id_kota"];

        }

        $id_user      = $_POST["id_user"];
        $unit         = $_POST["unit"];
        $tgl          = $_POST["tgl"];
        $keterangan   = addslashes($_POST["keterangan"]);
        

        
        
        
        if(!empty($_POST["data_perangkat_add"])){
        
          $data_perangkat_add=addslashes($_POST["data_perangkat_add"]);
          $merk_add      = $_POST["merk_add"];
          $tipe_add      = $_POST["tipe_add"];

          $insert_barang =$dbfunc->InsertMasterBarang($data_perangkat_add, $merk_add, $tipe_add);
          sleep(1);
          #ambil id_barang
          $id_barang=$dbfunc->CariMasterBarang($data_perangkat_add, $merk_add, $tipe_add);
        
        }else{
          
          $id_barang     = $_POST["id_barang"];

        }

        //status 3 belum beli
        $id_status = $dbfunc->CariStatus("3");
        
        $insert = $dbfunc->insert_permintaan($id_user, $id_kota, $id_barang ,$id_status, $unit, $tgl,$keterangan);

             if ($insert){
                    echo "<script>
                        alert('Success Insert');
                      location.href=('permintaan.php');
                      </script>";
              }
              else{
                    echo "<script>
                          alert('Failed insert');
                          location.href=('permintaan.php');
                            </script>";    

                }
       


    }




?>


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="http://mcojaya.com/">PT. MCOJAYA</a>.</strong> All rights reserved.
  </footer>

 
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!--  JS SCRIPTS -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!--<script type="text/javascript" src="jquery-ui/jquery.js"></script>-->
<script type="text/javascript" src="jquery-ui/jquery-ui.js"></script>
<!--choosen-->
<script src="dist/choosen/chosen.jquery.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<!--<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>-->



<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>


<!-- Page script -->
<script>
 $(document).ready(function(){
 
  var click=0;
  var click2=0;
       
            $(".id_barang").chosen({no_results_text: "Oops, nothing found!"});       
          $("#list2").click(function(){
              
                $("#master_barang").toggle();
                  click2 += 1;
                  if(click2 %2 ==1){
                    $('.id_barang').prop('disabled', true).chosen('destroy');
                    $('.required2').removeAttr("disabled");
                  }else if(click2 %2 ==0) {
                    //alert(click2);
                    $('.id_barang').prop('disabled', false).chosen({no_results_text: "Oops, nothing found!"});  
                    $('.required2').attr("disabled", true);
                    
                    
                }

            
      
     });

  $("#unit").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Hanya angka").show().fadeOut("slow");
               return false;
    }
   });  

  /*    
 $(".textarea").on("keydown", function (e) {
    return e.which !== 32;
});
*/
      //$("#target").html(keyed);
 $("#tgl").datepicker({
                  defaultDate:"today",
                   dateFormat:"yy-mm-dd"
                });
 
});
 
</script>
<?php
}//session admin

?>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
