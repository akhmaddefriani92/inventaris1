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

  .hidden {
     display:none;
  }
  </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<script>

function fetch_select(){
  
  var myval   = document.getElementById('id_kota').value;
             //alert(myval);
      $.ajax({
            type: 'POST',
            url: 'fetch_dataperangkat.php',
            data: {
                  get_option:myval
                 },
            success: function (response) {
                   //if (response.success){
                 $('#id_inventaris').html(response);

                    //$("#id_inventaris").load("#id_inventaris");
                    //document.getElementById("id_inventaris").innerHTML=response;
                    $('.id_inventaris').prop('disabled', false).chosen('destroy');  
                    $(".choosen-select").chosen({max_selected_options: 5});            
                    //}   

                    

                //$('.id_inventaris').prop('disabled', false).chosen('destroy');  
                //$(".id_inventaris").chosen({no_results_text: "Oops, nothing found!"});
                //$('.required').attr('disabled', 'disabled');
                  
                },
                error: function(jqXHR, textStatus, errorThrown){
                  alert('error(s):'+textStatus, errorThrown);
                }
            });
}

function attr(){
  //$(".id_inventaris").chosen({max_selected_options: 5});             
  $(".choosen-select").chosen({max_selected_options: 5});            
}


</script>

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
          <h3 class="box-title"><b>Add Surat Jalan</b></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <a class="btn btn-box-tool" href="kerusakan.php"><i class="fa fa-arrow-left"></i></a>
            </div>
        </div>

        <div class="box-body">
        <form method="post" enctype="multipart/form-data" class="form-horizontal" action="simpan_surat_jalan.php">
           
            <div class="form-group">
              <label class="control-label col-sm-2" for="kota">Kota Pengirim:</label>
              <div class="col-sm-10">
                    <?php
                      $getuser=$dbfunc->get_user_level($_SESSION["namaadmin"]);
                      $level    = $getuser["level"];



                      $kode_kota = $dbfunc->get_user_kota($_SESSION["namaadmin"]);
                        
                     if ($kode_kota!="ALL"){ 
                      $id_kota    = $getuser["id_kota"];
                     echo "<input type='text'  name='kode_kota' class='form-control' value='$kode_kota' readonly/>";
                     echo "<input type='hidden'  name='id_kota' class='form-control' value='$id_kota' readonly/>";
                    
                       }else{ 
                    ?>
                        <select name="id_kota" id="id_kota" class="form-control" onchange="fetch_select()">
                        <?php
                        $listkota=$dbfunc->listkota();
                        echo "<option>--Silahkan Pilih--</option>";
                        foreach ($listkota as $key => $value) {
                          # code...
                          if($value["kode_kota"]!="ALL"){
                          echo "<option value='$value[id_kota]'>$value[kode_kota]</option>";
                          }
                        }
                        echo "</select>";
                      }
                        ?>
                        

              </div>
              
            </div>
           

            <div class="form-group">
              <label class="control-label col-sm-2" for="Data Perangkat">Data Perangkat:</label>
              <div class="col-sm-8" id='test_refresh'>
                  <?php
                    if($kode_kota!="ALL"){
                      ?><select name="id_inventaris[]" id='select2' class="form-control choosen-select"  style="width:100%;" multiple class="chosen-select2">
                      <?php
                      $data_perangkat  = $dbfunc->list_inventaris_daerah2($kode_kota);
                      echo "<option>--Silahkan Pilih--</option>";
                      foreach ($data_perangkat as $key => $nilai) {
                            # code...
                      echo "<option value='$nilai[id_inventaris]'>$nilai[data_perangkat]  SN: $nilai[sn]  Merk: $nilai[merk]</option>";
                      #echo "<option value='$nilai[id_inventaris]|$nilai[merk]'>$nilai[data_perangkat]</option>";

                      }
                   }else{
                   ?>
                   <select name="id_inventaris[]" id="id_inventaris" class="id_inventaris form-control choosen-select " onchange="attr()" style="width:100%;">
                   <?php
                   }
                   ?> 

                  </select>
              </div>
              
            </div>
            
            
            
             <div class="form-group">
              <label class="control-label col-sm-2" for="Unit">No Surat :</label>
              <div class="col-sm-10">
                 <input type="text" class="form-control" name="no_surat"  required/>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-2" for="Unit">Tanggal Kirim:</label>
              <div class="col-sm-10">
                 <input type="text" class="form-control" name="tanggal_kirim" id="tanggal" required/>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="Unit">Nama PT:</label>
              <div class="col-sm-10">
                 <input type="text" class="form-control" name="nama_pt"  required/>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="Unit">No Telp/HP:</label>
              <div class="col-sm-10">
                 <input type="text" class="form-control" name="no_telp"  required/>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="Unit">Alamat</label>
              <div class="col-sm-10">
                 <textarea class="form-control" name="alamat"></textarea>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-sm-2" for="Unit">Kota Tujuan</label>
              <div class="col-sm-10">
                <select name="kota_tujuan" id="kota_tujuan" class="form-control">
                        <?php
                        $listkota=$dbfunc->listkota();
                        echo "<option>--Silahkan Pilih--</option>";
                        foreach ($listkota as $key => $value) {
                          # code...
                          if($value["kode_kota"]!="ALL"){
                          echo "<option value='$value[id_kota]'>$value[nama_kota]</option>";
                          }
                        }
                        ?>
                </select>
              </div>
            </div>            


            <div class="form-group">
              <label class="control-label col-sm-2" for="Merk">User:</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="dikirim"  value="<?php echo $_SESSION["namaadmin"];?>" readonly/>
                 
              </div>
            </div>

            

            <div class="form-group">
              <label class="control-label col-sm-2" for="Merk">Keterangan:</label>
              <div class="col-sm-10">
                 <textarea class="form-control textarea" name="keterangan" required></textarea>
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

<!--choosen-->
<script src="dist/choosen/chosen.jquery.js"></script>

<!--<script type="text/javascript" src="jquery-ui/jquery.js"></script>-->
<script type="text/javascript" src="jquery-ui/jquery-ui.js"></script>
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
    $("#select2").chosen({max_selected_options: 5});            
    
       




 
  /*    
 $(".textarea").on("keydown", function (e) {
    return e.which !== 32;
});
    */
      //$("#target").html(keyed);

  $("#tanggal").datepicker({
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
