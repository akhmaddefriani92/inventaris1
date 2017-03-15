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
  <title>Mco Jaya</title>
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
    <link rel="stylesheet" type="text/css" href="jquery-ui/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="jquery-ui/jquery-ui.theme.css">
                
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
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
<body class="hold-transition skin-blue sidebar-mini">
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
      <!--judul
	  <h1>
        BagTag
        <small></small>
      </h1>-->
      
    </section>

    <!-- Main content -->
    <section class="content">




       
      <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><b>Data Keseluruhan Table Grup</b></h3>
            </div>
	        <div class="box-body">


      <a class='btn btn-primary btn-sm' href='#myModal'  data-toggle='modal' >Add Grup</a>
      <br/><br/>
        <!--modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog" role="document">
        <form action="insert_grup.php" method="POST" >
          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Tambah  Grup</h4>
            </div>
            <div class="modal-body">
                <div class='row'>
                  <div class='col-md-6'>
                    <label>Menu</label> 
                     <select name="id_menu" class="form-control">
                     <?php
                      $data = $dbfunc->listmenu();
                      
                      foreach ($data as $key => $value) {
                        # code...
                        echo "<option value=$value[id_menu]>$value[navi_menu]</option>";
                      }
                    
                     ?>
                      </select>
                   </div>
                 
                  <div class='col-md-6'> 
                   <label>Level</label> 
                    <select name="level" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    </select>
                  </div>
        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" id="update" class="btn btn-primary" name='update'>Save</button>
            </div>
         </div>
    </form>
    </div>
  </div>    

  
      	  <table class="table table-hover" id="view_table">
              <thead style="background:#ccc;">
      			      <th>No</th>
                  <th>Menu</th>
                  <th>Level</th>
      			      <th>Aksi</th>
              </thead>
              <tbody>
              <?php
             $data = $dbfunc->listgrup();

            foreach ($data as $key => $row) {
                 # code...
             echo "<tr id='tr'>";
      		   echo "<td>$key</td>";
      		   echo "<td>$row[navi_menu]</td>";
      		   echo "<td>$row[level]</td>";
      		   echo "<td><a class='btn btn-primary btn-xs'href='#myModal2' id='custId' data-toggle='modal' data-id='$row[id_grup]'>edit</a>  <a href='#' id='$row[id_grup]' class='btn btn-danger btn-xs hapus'>hapus</a>
      				</td>";
             #href='delete-bagtag.php?id=$row[ID]'  
      		   echo "</tr>";
      		  $key++;
            }
              
           
              
                ?>
              </tbody>
       
                    
            </table>
      	<?php
      	#}// !isset
      	?>
	  
              
<!--modal -->
<div class="modal fade" id="myModal2" role="dialog">

    <div class="modal-dialog" role="document">
        <form action="update-grup.php" method="post" >
		<div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Grup</h4>
            </div>
            <div class="modal-body">
                <div class="fetched-data">
                    <!--Here Will show the Data-->
                    
                    
                    
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="update" class="btn btn-primary" name='update'>Save</button>
    
                    
                    
            </div>
         </div>
		</form>
    </div>

</div>
	<?php
	 # if (isset($_POST['update'])){
		#include "update-bagtag.php";
	
	  #}
	?>



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
       
  $(function() {
   $("#datepicker ").datepicker({
       defaultDate:"today",
      // changeMonth:true,
       //changeYear:true,
       dateFormat:"dMyy"
       //numberOfMonths:2
          });
        });
 
      $("#view_table").DataTable({
		responsive: true
		});  
    
    $('#myModal2').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'POST',
            url : 'fetch_grup.php', //Here you will fetch records 
            data :  'rowid='+ rowid, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
            }
        });
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
    $.post('delete_grup.php', {id:del_id},function(data){
    //parent.slideUp('slow', function() {
    //$(this).remove();
     //$("#view_table").html(del_id);
    $(location).attr('href', 'grup.php');
    //})
     });
   //} 
});
     
$(document).ready(function(){
 
auto_load(); //Call auto_load() function when DOM is Ready
 
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
