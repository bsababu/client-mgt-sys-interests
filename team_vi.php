<?php
require_once 'insrt/conn.php';
require_once 'insrt/session.php';

$id=$_SESSION['username_'];

$sql = "SELECT * FROM connector WHERE user_sponsor = '$id'";
$query = $con->query($sql);
$countProduct = $query->num_rows;


?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Team view</title>
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

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<script>
function getDate(){
    var today = new Date();

document.getElementById("date1").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);


}
</script>
<?php
if (($countProduct >=9) && ($countProduct <=21) )
{
  echo '<style type="text/css">
#bronze {
    opacity: 0.3;
}
#golden {
  opacity: 0.3;
}
#diamond {
  opacity: 0.3;
}
</style>';
}else if (($countProduct >=22) && ($countProduct <=42) )
{
  echo '<style type="text/css">
  #bronze {
      opacity: 0.3;
  }
  #silver {
    opacity: 0.3;
  }
  #diamond {
    opacity: 0.3;
  }
  </style>';
}else if(($countProduct >=43))
{
  echo '<style type="text/css">
  #bronze {
      opacity: 0.3;
  }
  #silver {
    opacity: 0.3;
  }
  #gold {
    opacity: 0.3;
  }
  </style>';
}else{
  echo '<style type="text/css">
  
  #silver {
    opacity: 0.2;
  }
  #gold {
    opacity: 0.2;
  }
  #diamond {
    opacity: 0.2;
  }
  </style>';
}

?>
 
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
            <!--<div align="right">
        <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary">
        <i class="glyphicon glyphicon-plus-sign"></i> &nbsp;Add a member</button></div>-->
            </div>
            <!-- /.box-header -->
            
            <!-- /.box-body -->
          </div>
        <div class="col-lg-3 col-xs-6" id="bronze">
          <!-- small box -->
          <div class="small-box bg-aqua" >
            <div class="inner">
              <h3>B</h3>

              <p>Bronze</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker "></i>
            </div>
            <a href="#" class="small-box-footer">View team <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6" id="silver">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>S</h3>

              <p>Silver</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="#" class="small-box-footer">View team <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6" id="gold">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>G</h3>

              <p>Gold</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="#" class="small-box-footer">view team<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6" id="diamond">
          <!-- small box -->
          <div class="small-box bg-maroon" >
            <div class="inner">
              <h3>D</h3>

              <p>Diamond</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="#" class="small-box-footer">View team<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
  

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Team</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Username</th>
                  <th>Names</th>
                  <th>User Joined</th>
                  <th>Initial invest.</th>
                  <th>Profit</th>
                  <th>Wallet</th>
                  <th>Status</th>
                  
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php 
            
            $id=$_SESSION['username_'];
            if($id=='kagina'){
              $sql = "SELECT * FROM connector";
            $count=1;
            $result = mysqli_query($con, $sql);
            if($result)
            {
              while($row = mysqli_fetch_array($result))
              {
                ?>
                
                <tr>
                <?php
                  echo "<td>". $row['username_'] . "</td>";
                  echo "<td >". $row['user_fname'] . " ". $row['user_lname']."</td>";
                  echo "<td>". $row['user_joined'] . "</td>";
                  echo "<td>". $row['initial_invest'] . "&nbsp;$</td>";
                  echo "<td>". $row['user_incentive'] . " &nbsp;$</td>";
                  echo "<td>". $row['user_stock'] . "&nbsp;$</td>"; 
                  echo "<td >". $row['user_ID'] . "</td>";
                  
                  ?>
                    
                </tr>
                <?php 
                
              }
              mysqli_free_result($result);
            }
            mysqli_close($con);
                
            }else{
             $sql = "SELECT * FROM connector where user_sponsor = '$id'";
             $count=1;
             $result = mysqli_query($con, $sql);
             if($result)
             {
               while($row = mysqli_fetch_array($result))
               {
                echo "<td>". $row['username_'] . "</td>";
                echo "<td >". $row['user_fname'] . " ". $row['user_lname']."</td>";
                echo "<td>". $row['user_joined'] . "</td>";
                echo "<td>". $row['initial_invest'] . "&nbsp;$</td>";
                echo "<td>". $row['user_incentive'] . " &nbsp;$</td>";
                echo "<td>". $row['user_stock'] . "&nbsp;$</td>"; 
                echo "<td >". $row['user_ID'] . "</td>";
                  
                   ?>
                     
                 </tr>
                 <?php 
                 
               }
               mysqli_free_result($result);
             }
             mysqli_close($con);
            }
                 ?>
                </tbody>
                
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
    <strong>New lusail</strong> All rights
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
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
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

<div id="add_data_Modal" tabindex="-1" class="modal fade">
      <div class="modal-dialog">
           <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title">Form: Add a a member to your tree</h4>
                </div>
                  <div class="modal-body">
                  <form action="insrt/insert_user.php" method="post">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Sponsor username</label>
                          <input class="form-control" required id="exampleInputEmail1" type="text" placeholder="Enter Sponsor name" name="user_sponsor" readonly value="<?php echo $_SESSION['username_']; ?>">
                        </div>
                        <!-- <div class="form-group">
                          <label for="exampleInputEmail1">Identification</label>
                          <input required class="form-control" name ="user_ID" id="exampleInputEmail1" type="text" placeholder="National ID / passport number">
                        </div> -->
                        <div class="form-group">
                          <label for="exampleInputPassword1">First Name</label>
                          <input class="form-control" name="user_fname" id="exampleInputPassword1" type="text" placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Last Name</label>
                          <input class="form-control" name="user_lname" id="exampleInputPassword1" type="text" placeholder="Last name" required>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Date of birth</label>
                          <input class="form-control" name="user_dob" id="exampleInputEmail1" max="2005-12-31" type="date" placeholder="Date of birth" required>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputPassword1">Gender</label>
                          <select  id="" name="user_gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                          </select>
                        </div>


                        

                        <div class="form-group">
                          <label for="exampleInputPassword1">Phone</label>
                          <input class="form-control" name="user_phone" id="exampleInputPassword1" type="tel" placeholder="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input class="form-control" name="user_email" id="exampleInputPassword1" type="email" placeholder="Email..." required>
                          </div>

                      </div>

                        <div class="col-md-6">
                          
                          <div class="form-group">
                          <label for="exampleInputPassword1">Address</label>
                          <textarea name="user_address" id="" cols="100" rows="4" required  class="form-control"></textarea>
                        </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input class="form-control" name="username_" id="exampleInputEmail1" type="text" placeholder="Enter Username">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="user_password" required>
                          </div>  
                          <div class="form-group">
                            <label for="exampleInputPassword1">Package</label>
                            <select name="user_package" id="" class="form-control" onchange="java_script_:show(this.options[this.selectedIndex].value)">
                              <option value="Bronze">Bronze (30$,50$,100$,150$,200$,300$,500$,700$,900$)</option>
                              <option value="Silver">Silver(1500$, 2000$, 3000$, 4000$)</option>
                              <option value="Gold">Gold (5000$,, 10000$, 15000$)</option>
                              <option value="Diamond">Diamond (20000$, 30000$, 40000$, 50000$)</option>
                            </select>
                          </div> 
                          <div class="form-group" id="initial" style="display:inline-block" >
                            <label for="exampleInputEmail1" id="bronze">Initial payment</label>
                            <input class="form-control" id="exampleInputEmail1" type="text"  min="30" max="50000" placeholder="Enter Amount" name="initial_invest">
                          </div>
                          
                          

                          
                          
                          <div class="form-group">
                            <label for="exampleInputPassword1">Date joined</label>
                            <input class="form-control" id="date1" type="date" name="user_joined" value="<?php echo date('Y-m-d'); ?>">
                          </div>
                          <div class="form-group">
                           
                            <button type="submit" name="insert" id="insert" value="Insert" class="btn btn-success">Submit</button>
                            <!-- <button type="submit" name="submit" class="btn btn-info pull-right">Submit</button> -->
                            
                           </div>
                        </div>
                     </form>
                  </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                </div>

           </div>
      </div>
</div>


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
