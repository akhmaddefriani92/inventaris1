
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
  $funcdb = new DB_Function();
   

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
  </style>
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
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini ">
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
              Hallo <?php echo $_SESSION['namaadmin']?>  
              <img src="dist/img/avatar04.png" class="user-image" alt="User Image">
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
          <h3 class="box-title">Add Invoice</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <a class="btn btn-box-tool" href="invoice.php"><i class="fa fa-arrow-left"></i></a>
            </div>
        </div>

        <div class="box-body">
        <form method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-3">
                <label>No. Invoice</label>
                  <input type="text" class="form-control" name="no_invoice" required />
                </div> 
               <div class="col-md-3">
                <label>Tanggal Invoice</label>
                  <input type="text" class="form-control" name="tanggal_invoice" id="tanggal_invoice" required />
                </div> 
                <div class="col-md-3">
                <label>Bandara</label>
                  <input type="text" class="form-control" name="bandara" required />
                </div> 
                <div class="col-md-3">
                <label>Bulan</label>
                  <input type="text" class="form-control bulan" name="bulan" id="bulan" required />
                </div> 
            </div>
            <br>

            <div class="row">
                <div class="col-md-3">
                <label>Tanggal Rekon</label>
                  <input type="text" class="form-control" name="tanggal_rekon" id="tanggal_rekon" />
                </div> 
                <div class="col-md-3">
                <label>No Rekon</label>
                  <input type="text" class="form-control" name="rekon_no"  />
                </div> 
                <div class="col-md-6">
                <label>Data Rekon</label>
                  <input type="text" class="form-control" name="rekon_data"  required />
                </div> 
            </div>
            <br>

            <div class="row">
                <div class="col-md-2">
                <label>Tanggal Invoice Diterima</label>
                  <input type="text" class="form-control" name="tanggal_invoice_diterima" id="tanggal_invoice_diterima" required />
                </div> 

                <div class="col-md-3">
                <label>Pengirim</label>
                  <input type="text" class="form-control" name="pengirim" required />
                </div> 
               <div class="col-md-3">
                <label>Penerima</label>
                  <input type="text" class="form-control" name="penerima"  required />
                </div>   

                <div class="col-md-4">
                <label>Informasi Invoice</label>
                  <input type="text" class="form-control" name="informasi_invoice"  required />
                </div> 
            </div>
            <br>

            <div class="row">
              <div class="col-md-4">
                <label>SubTotal</label>
                  <input type="digit" class="form-control" name="jumlah" id="jumlah" onchange="hitung()" required />
                </div> 
               <div class="col-md-4">
                <label>PPN</label>
                  <input type="digit" class="form-control" name="ppn"   id="ppn" onchange="hitung()" required />
                </div> 
                <div class="col-md-4">
                <label>Total</label>
                  <input type="digit" class="form-control" name="total" id="total" onchange="hitung()" required />
                </div> 
            </div>
            <br>

            <div class="row">
              <div class="col-md-5">
                <label>Kelengkapan Data</label>
                  <input type="text" class="form-control" name="kelengkapan_data"  />
                </div> 
               <div class="col-md-4">
                <label>Tanggal Dibayar</label>
                  <div class="row">
                    <div class="col-md-4">
                        <input  id="cekbayar" type="checkbox" data-toggle="tooltip" class="red-tooltip" title="Click ini apabila sudah dibayar" name="checkbox" value="bayar" /><b><small>Sudah bayar</small></b>
                    </div>  
                    <div class="col-md-8">
                      <input type="text" class="form-control" value="Belum Bayar" name="tanggal_dibayar_text" id="belum_dibayar" readonly/>
                       <input type="text" placeholder="isi tanggal dibayar"class="form-control"  name="tanggal_dibayar_date" id="tanggal_dibayar"   />
                    </div>
                  </div>  
                </div> 
                <div class="col-md-3">
                <label>Bank</label>
                  <input type="text" class="form-control" name="bank"   />
                </div> 
            </div>
            <br>

            <div class="row">
              <div class="col-md-6">
                <label>Keterangan</label>
                  <input type="text" class="form-control" name="keterangan"  />
                </div> 
               <div class="col-md-6">
                <label>Upload Pdf</label>
                  <input type="file" name="pdf"required required />
                </div> 
            </div>
            <br>

            <div class="row">
              <div class="col-md-offset-3 col-md-6">
                <input type="submit" class="btn btn-primary btn-lg btn-block" name="save" value="Submit"/>
                </div> 
               
            </div>
            <br>


        </form>



        </div><!--box-body-->

       

       </div> <!--box-->
     
          <script>
            function jumlah()
          {  
            var jumlah =document.getElementById('jumlah').value;
            
            return jumlah;
          }

          function ppn(){

            var subtotal = jumlah();
            var ppn      = subtotal*0.1;
            
            
            return ppn;
            
          }
          function hitung(){
            var subtotal = jumlah();
            var ppn1    = ppn();
            var total   = parseInt(subtotal)+ppn1;

            document.getElementById('ppn').value=ppn1;
            document.getElementById('total').value=total;
          }

          </script>
      

      <!-- Your Page Content Here -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
    if (isset($_POST["save"])){

        $no_invoice    = $_POST["no_invoice"];
        $tanggal_invoice    = date("Y-m-d H:i:s", strtotime($_POST["tanggal_invoice"]));
        $bandara            = $_POST["bandara"];
        $bulan              = $_POST["bulan"];
        $tanggal_rekon      = $_POST["tanggal_rekon"];
        $rekon_no           = addslashes($_POST["rekon_no"]);
        $rekon_data         = addslashes($_POST["rekon_data"]);
        $tanggal_invoice_diterima    = date("Y-m-d H:i:s", strtotime($_POST["tanggal_invoice_diterima"]));
        $pengirim           = $_POST["pengirim"];
        $penerima           = $_POST["penerima"];
        $informasi_invoice  = addslashes($_POST["informasi_invoice"]);
        $jumlah             = $_POST["jumlah"];
        $ppn                = $_POST["ppn"];
        $total              = $_POST["total"];
        $kelengkapan_data   = $_POST["kelengkapan_data"];
        $checkbox   = $_POST["checkbox"];
        
        $tanggal_dibayar_date    = $_POST["tanggal_dibayar_date"];
        
        $tanggal_dibayar_text    = $_POST["tanggal_dibayar_text"];

        if ($tanggal_dibayar_date!=''){
             $tanggal_dibayar = $tanggal_dibayar_date;
        }else{
          $tanggal_dibayar = $tanggal_dibayar_text;
        }
        
        $bank               = $_POST["bank"];
        $keterangan         = $_POST["keterangan"];
        


        $filename =  $_FILES['pdf']['name'];
        $no_pdfo   = explode("/", $no_invoice);
        $namapdf   = $no_pdfo[0];

        $file_ext  = substr($filename, strripos($filename, '.')); 
        $new_file  = $namapdf.$file_ext;
        $target ="pdffiles/$new_file";
        $sumber = $_FILES['pdf']['tmp_name'];
       
        $upload   = $funcdb->upload($sumber, $target);
        
        if ($upload =="success"){
          echo "<script>
                  var bayar= \"$tan\";
                  alert('file berhasil diupload');
                </script>";
        
            $insert = $funcdb->insert_invoice($no_invoice, $tanggal_invoice, $bandara, $bulan, $tanggal_rekon, $rekon_no, $rekon_data, $tanggal_invoice_diterima, $pengirim, $penerima, $informasi_invoice, $jumlah, $ppn, $total, $kelengkapan_data, $tanggal_dibayar, $bank, $keterangan, $target);

             if ($insert){
                    echo "<script>
                        alert('Success Insert');
                      location.href=('invoice.php');
                      </script>";
              }
              else{
                    echo "<script>
                              alert('Failed insert');
                              location.href=('invoice.php');
                            </script>";    

                }
        }else{
          echo "<script>
                  alert('file gagal diupload');
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
  $(document).ready(function () {
          $("#cekbayar").tooltip();
    
    $(function () {
        $('#tanggal_dibayar').hide();

        //show it when the checkbox is clicked
        $('#cekbayar').on('click', function () {
            if ($(this).prop('checked')) {
                $('#tanggal_dibayar').fadeIn();
                $('#belum_dibayar').hide();
              }else{
                $('#tanggal_dibayar').hide();
                $('#belum_dibayar').fadeIn();
            }
        });
    });


  /*
$('#jumlah').keyup(function(event) {

  // skip for arrow keys
  if(event.which >= 37 && event.which <= 40) return;

  // format number
  $(this).val(function(index, value) {
    return value
    .replace(/\D/g, "")
    .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    ;
  });
});
*/

  //$(function() {
   $("#tanggal_invoice, #tanggal_rekon, #tanggal_invoice_diterima, #tanggal_dibayar").datepicker({
       defaultDate:"today",
      
       dateFormat:"yy-mm-dd"
      
    });
    //    });
    
   $(function() {
    $(".bulan").datepicker({
       //defaultDate:"today",
       
       dateFormat:"Myy",
       changeMonth: true,
    changeYear: true,
    showButtonPanel: true
    
  }).focus(function() {
    var thisCalendar = $(this);
    $('.ui-datepicker-calendar').detach();
    $('.ui-datepicker-close').click(function() {
        var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
        thisCalendar.datepicker('setDate', new Date(year, month, 1));
    }); 
      
  });
        
 });


      $("#view_table").DataTable({
		responsive: true
		});  
    
    $('#myModal2').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'POST',
            url : 'fetch_users.php', //Here you will fetch records 
            data :  'rowid='+ rowid, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
            }
        });
     });  
      
    
  });
</script>
<script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure delete this row ?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
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
