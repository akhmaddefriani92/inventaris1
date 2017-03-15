<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<?php
session_start();
include "DB_Function.php";
$yest =date('jMY', strtotime("-1 days"));
$dbfunc = new DB_Function();
#$get = $dbfunc->get_user_level($_SESSION['namaadmin']);
#if (count($get)<1){
if (empty($_SESSION['namaadmin'])) // Jika Session kosong maka tidak bisa Akses Halaman Ini alias kembali
{
 header('location:index.php');
}
else
{
  
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
  <link href="plugins/datatables2/css/buttons.dataTables.min.css" rel="stylesheet">
  
<!--choosen-->
  <link rel="stylesheet" href="dist/choosen/chosen.min.css">

  <!--jquery datepicker-->
    <link rel="stylesheet" type="text/css" href="jquery-ui-biru/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="jquery-ui-biru/jquery-ui.theme.min.css">
                
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<style>
/*
.clsdatepicker{
    z-index: 100000;
}

.modal.modal-wide .modal-dialog {
  width: 90%;
}
*/
body #myModal {
    /* new custom width */
    /*width: 900px;*/
    /* must be half of the width, minus scrollbar on the left (30px) */
    /*margin-left: 30px;*/
}
</style>
<script>
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
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
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
      <a href="#" class="sidebar-toggle" title="click ini untuk menampilkan menu" data-toggle="offcanvas" role="button">
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
      <h1>
        Barang Masuk
        <small>Data Perangkat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inventaris</a></li>
        <li class="active">Barang Masuk</li>
      </ol>
    </section>
    

    <!-- Main content -->
    <section class="content">
       
      <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><b>Data Keseluruhan Barang Masuk</b></h3>

            </div>
	        <div class="box-body">

      <?php      
        $get_user = $dbfunc->get_user_level($_SESSION['namaadmin']);
        $level    = $get_user["level"];
        $id_kota_user = $get_user["id_kota"];
        #if ($level==1){      
      ?>
        

          <table class="table table-hover table-bordered" id="view_table" style="font-size:small;">
              <thead style="background:#ccc;">
      			      <th width="4%">No</th>
                  <th width="10%">No.Surat</th>
                  <th width="5%">Pengirim</th>
                  <th width="8%">Dari Kota</th>
                  <th width="8%">Tgl Kirim</th>
                  <th width="10%">Status</th>
                  <th width="8%">Tgl Terima</th>
                  <th width="10%">Diterima</th>
                  <th>keterangan</th>
                  <th width="4%">Action</th>
              </thead>
              <tbody>
              <?php
             $kode_kota = $dbfunc->get_user_kota($_SESSION["namaadmin"]);
              if($kode_kota=="ALL"){
                  
                  $data = $dbfunc->list_barang_masuk();
                  
                  
              }else{

                  
                  $data = $dbfunc->list_barang_masuk_user($id_kota_user);
                   
              }  

            $no =1;
            foreach ($data as $key => $row) {
                 # code...
              
              if(!empty($row["diterima_oleh"])){
                $get = $dbfunc->get_user($row["diterima_oleh"]);
                $diterima_oleh = $get["username"];
              }else{
                  $diterima_oleh = '';
              }


             echo "<tr id='tr'>";
      		   echo "<td>$no</td>";
             #echo "<td>$row[no_repair]</td>";
             echo "<td><a href='#myModal2' id='custId' tabindex='-1' role='dialog'  data-toggle='modal'  data-id='$row[id_surat]/s'>$row[no_surat]</a></td>";
             #echo "<td>$row[sn]</td>";
             echo "<td>$row[username]</td>";
             echo "<td>".$row["kode_kota"]."</td>";
             echo "<td>$row[tgl_kirim]</td>";
             echo "<td>$row[ket_status]</td>";
             echo "<td>$row[tgl_terima]</td>";
             echo "<td>$diterima_oleh</td>";
             echo "<td>$row[ket_bm]</td>";
            echo "<td>";
            $get_user = $dbfunc->get_user_level($_SESSION['namaadmin']);
            $level    = $get_user["level"];
          #if ($level==1){
              echo "<a class='btn btn-primary btn-xs' href='#myModal2' id='custId' tabindex='-1' role='dialog'  data-toggle='modal' title ='edit' data-id='$row[id_bm]/edit'><span class='glyphicon glyphicon-pencil'></span></a>";
      		#}
          /*
          else{
            echo "<a class='btn btn-primary btn-xs' href='#myModal2' id='custId' tabindex='-1' role='dialog'  data-toggle='modal' title ='edit' data-id='$row[id_inventaris]/edit'><span class='glyphicon glyphicon-pencil'></span></a>";
          }	
          */	
              echo "</td>";

             #href='delete-bagtag.php?id=$row[ID]'  
      		   echo "</tr>";
            
      		  $no++;

            }
            
           
              
                ?>
              </tbody>
            </table>
            
      	<?php
      	#}// !isset
      	?>
	  <br>
              
<!--modal -->
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog" role="document">
      <form action="update_barang_masuk.php" method="post" enctype="multipart/form-data" class="form-horizontal" >
		    <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="myModalLabel" class="modal-title">Edit Surat Jalan</h4>
            </div>
            <div class="modal-body">
                <div class="fetched-data">
                    <!--Here Will show the Data-->
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
                <button type="submit" id="update" class="btn btn-primary" name="update">Save</button>
           
            </div>
         </div>
		</form>
    </div>
</div>
	          </div><!-- /.box-body -->
      </div><!-- /.box -->
      

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

<!-- REQUIRED JS SCRIPTS -->

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
<script src="plugins/datatables2/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables2/js/jszip.min.js"></script>
<script src="plugins/datatables2/js/pdfmake.min.js"></script>
<script src="plugins/datatables2/js/vfs_fonts.js"></script>
<script src="plugins/datatables2/js/buttons.html5.min.js"></script>


<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>


<!-- Page script -->
<script>
  $(document).ready(function(){
      $("#view_table").DataTable({
		      responsive: true
		    });  
   
  
     $(function() {
      $('#myModal2').on("shown.bs.modal", function(event){
          $(".input-tanggal").datepicker({
                  defaultDate:"today",
                   dateFormat:"ddMyy"
            });
        
        var row = $(event.relatedTarget).data('id');
        var splitrow = row.split('/');
        var rowid = splitrow[0];
        var name = splitrow[1];
     
      
        //alert(name);
        if (name=='edit'){
          $.ajax({
              type : 'POST',
              url : 'fetch_barang_masuk.php', //Here you will fetch records 
              data :  'rowid='+ rowid, //Pass $id
              success : function(data){
                $("#myModalLabel").html("Approval Barang Masuk");
                $('.fetched-data').html(data);//Show fetched data from database
                $( "#update" ).show(); 
              

                  $("#cekterima").change(function(){
                  if($(this).prop("checked")) {
                    $('.showterima').show();
                    $('#id_status').hide();
                    

                  } else {
                    $('.showterima').hide();
                    $('#id_status').show();
                  }
                  
                  $("#tanggal_terima").datepicker({
                  defaultDate:"today",
                   dateFormat:"yy-mm-dd"
                });

                });


              }
              
          });
        }else{
            $.ajax({
              type : 'POST',
              url : 'fetch_detail_surat_jalan.php', //Here you will fetch records 
              data :  'rowid='+ rowid, //Pass $id
              success : function(data){
              $("#myModalLabel").html("Detail Surat Jalan");
              $('.fetched-data').html(data);//Show fetched data from database
              $( "#update" ).hide();
              }
              
          });

        }
       
     }); 
   }).on('hidden.bs.modal', function (event) {
            //$('#tanggal_invoice, #tanggal_rekon, #tanggal_invoice_diterima, #tanggal_dibayar').datepicker('remove');
        });

     $("#close").bind("click", function(event) {
    
     });
    
    
      $(function() {
      $('#myModal').on("shown.bs.modal", function(event){
          
        
        var row = $(event.relatedTarget).data('id');
        var splitrow = row.split('/');
        var rowid = splitrow[0];
        var name = splitrow[1];
     
      
        //alert(name);
        if (name=='edit2'){
          $.ajax({
              type : 'POST',
              url : 'fetch_proses_kerusakan.php', //Here you will fetch records 
              data :  'rowid='+ rowid, //Pass $id
              success : function(data){
              $("#myModalLabel2").html("Edit Proses Repair");
              $('.fetched-data').html(data);//Show fetched data from database
              $(".tanggal").datepicker({
                 defaultDate:"today",
                 dateFormat:"yy-mm-dd"
              });     
              

              }
              
          });

       
        }
       
     }); 
   }).on('hidden.bs.modal', function (event) {
            //$('#tanggal_invoice, #tanggal_rekon, #tanggal_invoice_diterima, #tanggal_dibayar').datepicker('remove');
        });

     $("#close").bind("click", function(event) {
    
     });
   

  



});




</script>


<script>
  $(document).on('click', " tr td .hapus", function() {
    var del_id = $(this).attr('id')    ;
    //var del_id = $(this).parent("tr").attr("id");
    //var parent = $(this).parent('tr');
    //var parent = $(this).parent('' );
    //alert(del_id);        
    confirm('are you sure delete this row ?');
    //if (sa == true) {
    $.post('delete_surat_jalan.php', {id:del_id},function(data){
    //parent.slideUp('slow', function() {
    //$(this).remove();
     //$("#view_table").html(del_id);
    $(location).attr('href', 'surat_jalan.php');
    //})
     });
   //} 
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
