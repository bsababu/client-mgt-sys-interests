<?php
date_default_timezone_set('Africa/Cairo');
require_once 'insrt/conn.php';
require_once 'insrt/session.php';
$id=$_SESSION['username_'];
$tot = "SELECT * FROM connector where username_='$id'";
$tota = mysqli_query($con, $tot);
$row = mysqli_fetch_array($tota);
$max = $row['user_stock']; 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pay out</title>
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

  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="css/jquery.orgchart.css">
 
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">    
    function injectDay() {
      $('#containerr').hide();
      $('#containerr2').hide();
      var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday','Friday', 'Saturday'];
      var date = new Date();
      var today= days[date.getDay()];

    //   if (days[date.getDay()] == 'Tuesday' || days[date.getDay()] == 'Friday') {
          if (days[date.getDay()] == 'Friday') {
          $('#containerr').hide();
          $('#containerr2').hide();
      }
      else {
          $('#containerr2').show();
          $('#containerr').hide();
      }
    }
  </script>
  <style>

.blink {
  animation: blink 1s steps(1, end) infinite;
}

@keyframes blink {
  0% {
    opacity: 1;
  }
  50% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

  </style>
</head>
<body class="hold-transition skin-green sidebar-mini" onload="injectDay()">
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
            <a href="index.php"><i class="fa fa-home"></i> Home / <?php echo date('Y-m-d: H:i'); ?></a> 
            <a href="#">Tables</a>
            </div>
            <!-- /.box-header -->
            
            <!-- /.box-body -->
          </div>
    
    <section class="content">
      <div class="row">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Request a payout</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-12">
                <div class="box box-primary" id="containerr">
                  <div class="box-header with-border">
              
                  </div>
                  
                  
                  <?php 
                  if ( date('H:i') >= "07:30" && date('H:i') <= "17:00" ) {
                    ?>

                  <form action="" method="post" name="form_token">
                    <div class="box-body">
                     <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Amount</label>
                            <input type="hidden" class="form-control" name="usernamee" value="<?php echo $_SESSION['username_']; ?>">
                            <input type="number" class="form-control" name="amount" id=""  min="40" max=<?php echo $max; ?> placeholder="amount should be less than 100 frw..." required>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Payment</label>
                            <select name="bank" id="" class="form-control">
                                <option value="MOMO">Momo</option>
                                <option value="BK">BK</option>
                                <option value="EQUITY">Equity</option>
                              
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Number</label>
                            
                            <input type="number" class="form-control" name="account" id="" placeholder="Enter the bank account numbers.." required>
                          </div>
                        </div>
                      </div>
                
                    </div>
                    <div class="box-footer">
                      <button type="submit" name="request" class="btn btn-primary" <?php echo isset($_POST["request"]) ? "disabled" : "";?>>Request</button>
                    </div>
                  </form>
                       
              
                </div> 
                <div class="box box-primary" id="containerr2">
                  <?php }?>
                  <!--<span class="blink"> Attention: This service of withdrawing is done only on thursday, from 07:30 in the morning to friday 17:30 afternoon';</span>-->
                   <i class="fa fa-warning" style="font-size:48px;color:#e6ca27"></i><span style="font-size:36px;"> Attention: This service of withdrawing is done only on thursday, from 07:30 in the morning to friday 17:30 afternoon </span>
                     
                </div>
              </div>
            </div>

            


          </div>
        </div>

        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Terms and Conditions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-12">
                <div class="box box-primary">
                  <div class="box-header with-border">
              
                  </div>
        
                  
                    <div class="box-body">
                     <div class="row">
                      <div class="alert alert-success alert-dismissible">
                        To request payment should be done on friday and the process takes 24 hours (i.e on saturday)
                        to receive the money.<br>

                        The amount should not over 40 $ and not less than 10 $.
                         
                      </div>
                    </div>
                    
                    <div class="box-footer">
                      <div class="direct-chat-msg right">
                 
                            
                            <div class="direct-chat-text">
                              It's a privilegies to be working with you!!
                            </div>
                  
                      </div>
                    </div>
                  
                </div> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
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
    });
  })
</script>

</body>
</html>



<?php   
  include "insrt/conn.php";

  
  if (isset($_POST['request'])) {
    
    $amount = trim($_POST['amount']);
    $account = trim($_POST['account']);
   
    $date = date('Y-m-d H:i:s');
    $status = 'requested';
    $id=$_POST['usernamee'];
    $bank = $_POST['bank'];
    

    $deduct = "SELECT * FROM connector where username_='$id'";
    $results = mysqli_query($con, $deduct);
    $raw = mysqli_fetch_array($results);
    $phone=$raw['user_phone'];
    $store=($raw['user_stock'] - $_POST['amount']);
    $update="UPDATE connector set user_stock='$store'  WHERE username_='$id'";
    mysqli_query($con,$update) or die("error".mysqli_error($con));

    $updateadmin="UPDATE connector set user_stock= user_stock +'$amount'  WHERE username_='bosco'";
    mysqli_query($con,$updateadmin) or die("error".mysqli_error($con));


    $updatepay="UPDATE connector set payed= payed +'$amount'  WHERE username_='$id'";
    mysqli_query($con,$updatepay) or die("error".mysqli_error($con));

    $statement = "INSERT INTO payout(`receiver`,`phone`,`amount`,`destination`,`date`,`status`,`stock`, `bank`)
    VALUES ('$id','$phone','$amount','$account','$date','$status','$store', '$bank')";
    mysqli_query($con,$statement) or die("error".mysqli_error($con));

    

      echo "<script>
            alert('Wait for the Admin to give you money you requested !!');
            window.location.href='home.php';
            </script>";
    
   
  }else{
      echo "eroor".mysqli_error($con);
  }
  
?>