<?php
require_once 'insrt/conn.php';
require_once 'insrt/session.php';
$id=$_SESSION['username_'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Payout request</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="jquery.tabledit.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

<?php 
  include "top/top.php" ;
?> 
  <!-- Left side column. contains the logo and sidebar -->
<?php 
include "menu/nav.php" ;
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>
    <div class="box">
            <div class="box-header">
            <a href="index.php"><i class="fa fa-home"></i> Home /</a> 
            <a href="#">income</a>
            </div>
            <!-- /.box-header -->
            
            <!-- /.box-body -->
          </div>
    
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
  

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pay out</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Receiver</th>
                  <th>Amount</th>
                  <th>Destination</th>
                  <th>Date</th>
                  <th>Payment</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php 

            
            
            $sql = "SELECT * FROM payout where receiver = '$id' ORDER BY payout.date DESC ";
            $count=1;
            $result = mysqli_query($con, $sql);
            if($result)
            {
              while($row = mysqli_fetch_array($result))
              {
                  echo "<td>". $row['receiver'] . "</td>";
                  echo "<td>". $row['amount'] . "</td>";
                  echo "<td>". $row['destination'] . "</td>";
                  echo "<td>". $row['date'] . "</td>";
                  echo "<td> Payed </td>";
                  
                  
                  ?>
                  
                </tr>
                <?php 
                
              }
              mysqli_free_result($result);
            }
            mysqli_close($con);
                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://newlusail.com">New Lusaill</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
    
  })
</script>
<script type="text/javascript">
 $(document).ready(function () {
   $(".open_modal").click(function(e) {
       var m = $(this).attr("id");
		   $.ajax({
				   url: "pay_edit.php",
				   type: "GET",
				   data : {id: m,},
				   success: function (ajaxData){
				   $("#ModalEdit").html(ajaxData);
				   $("#ModalEdit").modal('show',{backdrop: 'true'});
			   }
			});
        });
    });
</script>

</body>
</html>
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>