<?php
require_once 'insrt/conn.php';
require_once 'insrt/session.php';
$user=$_SESSION['username_'];
$profile = mysqli_query($con,"SELECT * FROM connector where username_= '$user'");
$result = mysqli_fetch_array($profile);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Transfer</title>
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
  <link rel="stylesheet" href="css/jquery.orgchart.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
    <?php
        require_once 'session.php';
    ?>
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
            <a href="#">Tables</a>
            </div>
            <!-- /.box-header -->
            
            <!-- /.box-body -->
          </div>
    
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
  

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">register new wallet</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!-- <form role="form" method="post" action="insrt/transa.php"> -->
            <form action="transa_confirm.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">username's receiver':</label>
                  <select name="username" class="form-control" required>
                  <?php
                  
                  if ($result['user_ID']=='Admin'){
                    $sql="SELECT * FROM connector  where connector.initial_invest = 0 and connector.user_stock = 0";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($result))
                    {    
                    echo '<option value='.$row["username_"].'>'.$row["user_fname"]. ' ' . $row["user_lname"].'( @'.$row["username_"].')</option>';
                    }
                  }else {

                  
                    $sql="SELECT * FROM connector  where connector.initial_invest = '0' and connector.user_sponsor = '$user' and connector.user_stock = '0'";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($result))
                    {    
                    echo '<option value='.$row["username_"].'>'.$row["user_fname"]. ' ' . $row["user_lname"].' </option>';
                    }
                  }
                  ?>
                       
                  </select>
                  
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Amount</label>
                  <input type="number" name="amount" class="form-control" id="exampleInputPassword1" placeholder="Amount..." required>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Transaction note</label>
                  <input type="hidden" name="username_"   class="form-control" id="exampleInputPassword1" value="<?php echo $_SESSION['username_']; ?>">
                  
                  <input type="text" name="notes" class="form-control" id="exampleInputPassword1" placeholder="transaction note..">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-primary" value="submit">Add amount</button>
              </div>
            </div>
          </form>

   
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
  
  <?php
  include "footer/footer.php";
  ?>

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
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

</body>
</html>
