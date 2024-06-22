<?php
require_once 'insrt/conn.php';
require_once 'insrt/session.php';
// require_once ('src/Blockchain.php');



$id=$_SESSION['username_'];
$one="SELECT * FROM income where username_to = '$id'";
$income = mysqli_query($con,$one);
$qty= 0;
while ($num = mysqli_fetch_assoc ($income)) {
    $qty += $num['Amount'];
}

$tot = "SELECT * FROM connector where username_='$id'";
$tota = mysqli_query($con, $tot);
$row = mysqli_fetch_array($tota);




$all_="SELECT SUM(initial_invest) as value_sum from connector";
$t = mysqli_query($con, $all_);
$row_all = mysqli_fetch_assoc($t); 
$tot_all = $row_all['value_sum'];

$payment_="SELECT SUM(payed) as value_s from connector";
$py = mysqli_query($con, $payment_);
$row_pay = mysqli_fetch_assoc($py); 
$tot_pay = $row_pay['value_s'];


$two="SELECT * FROM income where username_ = '$id'";
$transfer = mysqli_query($con,$two);
$trans= 0;
while ($num = mysqli_fetch_assoc ($transfer)) {
    $trans += $num['Amount'];
}



$link="http://newlusail.com/register.php?id=".$id;
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home |</title>
  <link rel="icon" href="img/favicon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

 

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
      <h1>
        Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-lg-3 col-xs-6" >
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $row['initial_invest']; ?> &nbsp; &nbsp; $</h3>
               
              <p>My Investment</p>
            </div>
            
            <a href="#" class="small-box-footer">more... <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-teal">
            <div class="inner">
              <h3><?php echo $trans; ?> &nbsp; &nbsp; $</h3>

              <p>Total tranfered</p>
            </div>
            <div class="icon">
              <!-- <i class="fa fa-exchange"></i> -->
            </div>
            <a href="#" class="small-box-footer">more... <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-teal">
            <div class="inner">
              <h3><?php echo $qty; ?> &nbsp; &nbsp; $</h3>

              <p>Total income</p>
            </div>
            <div class="icon">
              <!-- <i class="fa fa-info-circle"></i> -->
            </div>
            <a href="#" class="small-box-footer">more... <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php echo $row['user_incentive']; ?> &nbsp; &nbsp; $</h3>

              <p>Profit</p>
            </div>
            <div class="icon">
              <!-- <i class="fa fa-info-circle"></i> -->
            </div>
            <a href="#" class="small-box-footer">more... <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
          <!-- small box -->
          <?php
            if ($_SESSION['username_'] != 'bosco') {
              ?>
              <div class="col-lg-3 col-xs-6">
              <div class="small-box bg-green">
              <?php
              echo "<div class='inner'>";
              echo "<h3>".$row['payed']." &nbsp; &nbsp; $</h3>";
              echo "<p>Payed</p>";
              echo "</div>";
              ?>
              <div class="icon">
              <!-- <i class="fa fa-exchange"></i> -->
            </div>
            <a href="#" class="small-box-footer"> ->>>>>>> <i class="fa fa-arrow-circle-right"></i></a>
          </div></div>
          <?php
            }
            ?>    
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-black">
            <div class="inner">
              <h3><?php echo $row['user_stock']; ?> &nbsp; &nbsp; $</h3>

              <p>Total wallet</p>
            </div>
            <div class="icon">
              <i class="fa fa-google-wallet"></i>
            </div>
            <a href="#" class="small-box-footer">more... <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
            if ($_SESSION['username_'] == 'bosco') {
              ?>
              <div class="small-box bg-maroon">
              <?php
              echo "<div class='inner'>";
              echo "<h3>".$tot_all." &nbsp; &nbsp; $</h3>";
              echo "<p>Total invested</p>";
              echo "</div>";

              ?>
              <div class="icon">
              <!-- <i class="fa fa-exchange"></i> -->
            </div>
            <a href="#" class="small-box-footer"> ->>>>>>> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          <?php
            }

            
            ?>
              
            
            
        </div>
        
        
        <!-- <div class="col-lg-3 col-xs-6">
           small box
          <div class="small-box bg-black">
            <div class="inner">
              <h3><?php echo $tot_pay; ?> &nbsp; &nbsp; $</h3>

              <p>Payed</p>
            </div>
            <div class="icon">
              <i class="fa fa-google-wallet"></i>
            </div>
            <a href="#" class="small-box-footer">more... <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> -->
        
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
            if ($_SESSION['username_'] == 'bosco') {
              ?>
              <div class="small-box bg-green">
              <?php
              echo "<div class='inner'>";
              echo "<h3>".$tot_pay." &nbsp; &nbsp; $</h3>";
              echo "<p>Total Payment</p>";
              echo "</div>";
              ?>
              <div class="icon">
              <!-- <i class="fa fa-exchange"></i> -->
            </div>
            <a href="#" class="small-box-footer"> ->>>>>>> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          <?php
            }
            ?>    
        </div>

        <!-- ./col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Referral link</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <p class="text-center">
                    <strong>Copy your link to share it</strong>
                  </p>

                  <div class="chart">
                  
                    <input type="text" class="form-control" id="copyTarget" value="<?php echo $link; ?>" readonly>
                    
                    
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-3 col-xs-6">
                  
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-6 col-xs-9">
                  <div class="description-block border-right">
                  
                  <button  onclick="copyToClipboard('#copyTarget')">Copy text</button>
                  
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                
                <!-- /.col -->
                <div class="col-sm-3 col-xs-6">
                  
                  <!-- /.description-block -->
                </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        
            <div class="col-md-6">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Users join</h3>

              
            </div>
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Weekly joining</a></li>
              <li><a href="#tab_2" data-toggle="tab">Monthly joining</a></li>
              <li><a href="#tab_3" data-toggle="tab">Year Joinig</a></li>
              
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <b>How to use:</b>

                <div class="box-body text-center">
              <div class="sparkline" data-type="pie" data-offset="90" data-width="100px" data-height="100px">
                6,4,8
              </div>
            </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                The European languages are members of the same family. Their separate existence is a myth.
                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                in their grammar, their pronunciation and their most common words. Everyone realizes why a
                new common language would be desirable: one could refuse to pay expensive translators. To
                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                words. If several languages coalesce, the grammar of the resulting language is more simple
                and regular than that of the individual languages.
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        </div>
            <!-- /.box-body -->
            
            <!-- /.box-footer -->
         

        <div class="col-md-6">
          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Activities</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  
                </li>
                <!-- /.item -->
                <li class="item">
                  
                </li>
                <!-- /.item -->
                <li class="item">
                  
                </li>
                <!-- /.item -->
                <li class="item">
                  
                </li>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">View All Products</a>
            </div>
            <!-- /.box-footer -->
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
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
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
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
                    function copyToClipboard(element) {
                      var $temp = $("<input>");
                      $("body").append($temp);
                      $temp.val($(element).text()).select();
                      document.execCommand("copy");
                      $temp.remove();
                    }
                  </script>
</body>
</html>
