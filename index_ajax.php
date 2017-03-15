<?php

session_start();
/*if (empty($_SESSION['namaadmin'])) // Jika Session kosong maka tidak bisa Akses Halaman Ini alias kembali
{
 header('location:index.php');
}
else
{
 */
 
 ?> 
	
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BagTag</title>
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
    <p  class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>MCO</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MCOJAYA</b></span>
    </p>

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
              <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['namaadmin']?></span><span class="caret"></span>
                
            </a>
             <ul class="dropdown-menu">
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
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
        <!-- Optionally, you can add icons to the links -->
       <li class="active"><a href="index.php"><i class="fa fa-database"></i> <span>BagTag</span></a></li>
        <!--<li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>-->
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
              <h3 class="box-title">Search Table Daily</h3>
            </div>
            <form action="" method="post">
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
                <label>Date :</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" name="date1" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->


              <!-- Date range -->
              <div class="form-group">
                
                <button type="submit" class="btn btn-primary" name="cari">Submit</button>
                
              </div>
              <!-- /.form group -->
          </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      
      <?php
		 include "sql201.ini";
		 
		 if (!isset($_POST["cari"])){
			
			$datenow			= date("jM");
			$table 				= "Daily$datenow";
			$tampung1			= $datenow;
			$_SESSION["tabel"]  = "";
			$_SESSION["tabel"]	= $tampung1;
			$sql				= "SELECT  * from $table ";
			
		 }
		 if (isset($_POST["cari"])){
		  $date1    		 = $_POST['date1'];
		  $tampung			 = $date1;
		  $_SESSION["tabel"] = $tampung;
		  $sql				 = "SELECT   * from Daily$date1";
		  #echo $sql;
		  $table	= "Daily$date1";
		  
		 }
		 
	   
      ?> 
      <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><b>Data Keseluruhan Table <?php echo $table;?></b></h3>
            </div>
			<hr>
            <div class="box-body">
    <?php
	if (!isset($_POST['update'])){          
    ?>
	
	<table class="table table-hover" id="view_table" style="font-size: 10px;" >
        <thead style="background:#ccc;">
			<th>ID</th>
            <th>BagNo</th>
            <th>Flight1</th>
            <th>Tgl1</th>
            <th>To1</th>
			<th>Flight2</th>
            <th>Tgl2</th>
            <th>To2</th>
            <th>Nama</th>
            <th>KodePNR</th>
			<th>Berat</th>
			<th>Piece</th>
			<th>IPCetak</th>
			<th width="10%">Aksi</th>
        
        </thead>
        <tbody id="data-bagtag">
        <?php
          /*
		  $query		= mssql_query($sql, $dbhandle);
		  while($row = mssql_fetch_assoc($query)){
		   echo "<tr>";
		   echo "<td>$row[DailyID]</td>";
		   echo "<td>$row[BagNo]</td>";
		   echo "<td>$row[Flight1]</td>";
		   echo "<td>$row[Tgl1]</td>";
		   echo "<td>$row[To1]</td>";
		   echo "<td>$row[Flight2]</td>";
		   echo "<td>$row[Tgl2]</td>";
		   echo "<td>$row[To2]</td>";
		   echo "<td>$row[Nama]</td>";
		   echo "<td>$row[KodePNR]</td>";
		   echo "<td>$row[Berat]</td>";
		   echo "<td>$row[Piece]</td>";
		   echo "<td>$row[IPCetak]</td>";
		   echo "<td nowrap align='center' ><a class='btn btn-primary btn-xs'href='#myModal2' id='custId' data-toggle='modal' data-id='$row[DailyID]'><i class='glyphicon glyphicon-pencil'></i></a>
		           <a class='btn btn-danger btn-xs confirmation'  href='delete-bagtag.php?id=$row[DailyID]'  ><i class='glyphicon glyphicon-trash'></i></a>
				</td>";
		   echo "</tr>";
		  }
        
        */
        
          ?>
        
		</tbody>
      </table>
	
	<?php
	}// !isset
	?>
	  
              
<!--modal -->
<div class="modal fade" id="myModal2" role="dialog">

    <div class="modal-dialog" role="document">
        <form action="" method="post" >
		<div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit BagTag</h4>
            </div>
            <div class="modal-body">
                <div class="fetched-data">
                    <!--Here Will show the Data-->
                    
                    
                    
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name='update'>Save</button>
    
                    
                    
            </div>
         </div>
		</form>
    </div>

</div>
	<?php
	  if (isset($_POST['update'])){
		include "update-bagtag.php";
	
	  }
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
    <strong>Copyright &copy; 2016 <a href="#">MCOJAYA</a>.</strong> All rights reserved.
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
       dateFormat:"dM"
       //numberOfMonths:2
          });
        });
 
	  var main = "data-bagtag.php";
	  
	  $("#data-bagtag").load(main);
 
      $("#view_table").DataTable({
		responsive: true
		});  
    
    $('#myModal2').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'POST',
            url : 'fetch_bagtag.php', //Here you will fetch records 
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
#}//session admin

?>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
