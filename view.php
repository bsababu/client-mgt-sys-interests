<?php
require_once("perpage.php");	
require_once("dbcontroller.php");
$db_handle = new DBController();
require_once("insrt/conn.php");
require_once("insrt/session.php");

$id=$_SESSION['username_'];


$sql = "SELECT COUNT(*) as cnt FROM connector";
$rezu = mysqli_query($con, $sql);
$count = mysqli_fetch_assoc($rezu)['cnt'];


	
	
	$name = "";
  $code = "";
	$dt = date('yyyy-mm-dd');
	$queryCondition = "";
	if(!empty($_POST["search"])) {
		foreach($_POST["search"] as $k=>$v){
			if(!empty($v)) {

        
        $queryCases = array("username_","initial_invest","user_joined" );
        
				if(in_array($k,$queryCases)) {
					if(!empty($queryCondition)) {
						$queryCondition .= " AND ";
					} else {
						$queryCondition .= " WHERE ";
					}
				}
				switch($k) {
					case "username_":
						$name = $v;
						$queryCondition .= "username_ LIKE '" . $v . "%'";
						break;
					case "initial_invest":
						$code = $v;
						$queryCondition .= "initial_invest LIKE '" . $v . "%'";
            break;
          case "user_joined":
            $dt=$v;
            $queryCondition .= "user_joined LIKE '" . $v . "%'";
            break;
				}
			}
		}
	}
	$orderby = " ORDER BY id desc"; 
	$sql = "SELECT * FROM connector " . $queryCondition;
	$href = 'view.php';					
		
	$perPage = 10; 
	$page = 1;
	if(isset($_POST['page'])){
		$page = $_POST['page'];
	}
	$start = ($page-1)*$perPage;
	if($start < 0) $start = 0;
		
	$query =  $sql . $orderby .  " limit " . $start . "," . $perPage; 
	$reza = $db_handle->runQuery($query);
	if(!empty($reza)) {
		$reza["perpage"] = showperpage($sql, $perPage, $href);
	}
	
?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>View all</title>
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 
  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

  


  <!--  -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
            <a href="home.php"><i class="fa fa-home"></i> Home /</a> 
            <a href="#">income</a>
            </div>
          </div>
    
    <section class="content">
      <div class="row" >
        <div class="col-xs-12" id="box-body">
          
  

          <div class="box" >
            <div class="box-header">
               <h3 class="box-title">All members (<?php echo $count; ?>)</h3> 
            </div>
            
            
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
            <form name="frmSearch" method="post" action="view.php">
                <div class="search-box">
                      <p>
                      <input type="text" placeholder="Name" name="search[username_]" class="form-group" value="<?php echo $name; ?>"	/>
                      <input type="date" name="search[user_joined]" value="<?php echo $dt; ?>" />
                      <input type="number" placeholder="Investment" name="search[initial_invest]" class="demoInputBox" value="<?php echo $code; ?>"	/>
                      <input type="submit" name="go" class="btnSearch" value="Search">
                      <input type="reset" class="btnSearch" value="Reset" onclick="window.location='view.php'">
                      </p>
                </div>
              <table id="exam" class="table table-bordered table-striped" cellpadding="10" cellspacing="1">
                <thead>
                <tr>
                  <!-- <th>No</th> -->
                  <th>username</th>
                  <th>Names</th>
                  <th>Sponsor</th>
                  <th>Initial invest.</th>
                  <th>Profit</th>
                  <th>Wallet</th>
                  <th>Payed</th>
                  <th>Status</th>
                  <th >Edit</th>
                  <th>Delete</th>
                  <th></th>

                </tr>
                </thead>
                <tbody>
                  <?php
                  if(!empty($reza)) {
                    foreach($reza as $k=>$v) {
                      if(is_numeric($k)) {
                  ?>
                    <tr>
                      <td><?php echo $reza[$k]['username_']; ?></td>
                      <td><?php echo $reza[$k]["user_fname"]." ".$reza[$k]["user_lname"]; ?></td>
                      <td><?php echo $reza[$k]["user_sponsor"]; ?></td>
                      <td><?php echo $reza[$k]["initial_invest"]; ?></td>
                      <td><?php echo $reza[$k]["user_incentive"]; ?></td>
                      <td><?php echo $reza[$k]["user_stock"]; ?></td>
                      <td><?php echo $reza[$k]["payed"]; ?></td>
                      <td><?php echo $reza[$k]["user_ID"]; ?></td>
                      <td><a href="javascript:void(0)" class='open_modal btn btn-xs btn-info' id='<?php echo $reza[$k]["id"]; ?>'>Edit</a></td>
                      <td><button type='button' name='delete_btn' data-id3="<?php echo $reza[$k]["id"];?>" class="btn btn-xs btn-danger btn_delete">x</button></td>
                      <td><a href="javascript:void(1)" class='open_modal_reset btn btn-xs btn-warning' id='<?php echo $reza[$k]["id"]; ?>'>Reset</a></td>
                    </tr>
                  <?php
                      }
                    }
                  }
                  if(isset($reza["perpage"])) {
                  ?>
                  <tr>
                    <td colspan="11" align="left"> <?php echo $reza["perpage"]; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
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
  
    

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="#">New Lusail</a>.</strong> All rights
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
    
    $('#exam').DataTable({
      'paging'      : false,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        :false,
      'autoWidth'   : true,
    })
  })

  
</script>
<script>
  $(document).on('click', '.btn_delete', function(){  
          var id=$(this).data("id3");  
          if(confirm("Are you sure you want to delete this?"))  
          {  
              $.ajax({  
                  url:"delete.php",  
                  method:"POST",  
                  data:{id:id},  
                  dataType:"text",  
                  success:function(data){  
                      alert(data);  
                      location.reload(true); 
                  }  
              });  
          }  
  });  


        
</script>

<script type="text/javascript">
 $(document).ready(function () {
  
   $(".open_modal").click(function(e) {
    var id = $(this).attr("id");
		   $.ajax({
				   url: "modal_edit.php",
				   type: "GET",
				   data : {id:id,},
				   success: function (Data){
				   $("#ModalEdit").html(Data);
				   $("#ModalEdit").modal('show');
			   }
			});
        });
    });
</script>

<script type="text/javascript">
 $(document).ready(function () {
  
   $(".open_modal_reset").click(function(e) {
    var id = $(this).attr("id");
		   $.ajax({
				   url: "res_modal_edit.php",
				   type: "GET",
				   data : {id:id,},
				   success: function (Data){
				   $("#Modal_reset").html(Data);
				   $("#Modal_reset").modal('show');
			   }
			});
        });
    });
</script>

</body>
 
</html>
<!-- Updating this account -->
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>
<!-- resetting this account -->
<div id="Modal_reset" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>