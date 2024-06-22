<?php
require_once 'insrt/conn.php';
require_once 'insrt/session.php';
$id=$_SESSION['username_'];


$sql = "SELECT COUNT(*) as cnt FROM connector where user_sponsor='$id'";
$result = mysqli_query($con, $sql);
$count = mysqli_fetch_assoc($result)['cnt'];



?>
<!DOCTYPE html>
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
            <a href="index.php"><i class="fa fa-home"></i> Home /</a> 
            <a href="#">income</a>
            </div>
            <!-- /.box-header -->
            
            <!-- /.box-body -->
          </div>
    
    <section class="content">
      <div class="row" >
        <div class="col-xs-12" id="box-body">
          
  

          <div class="box" >
            <!--<div class="box-header">-->
            <!--  <h3 class="box-title">All members (<?php echo $count; ?>)</h3>-->
            <!--</div>-->
            
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
              <table id="exam" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <!-- <th>No</th> -->
                  <th>username</th>
                  <th>Names</th>
                  <th>Sponsor</th>
                  <th>Initial invest.</th>
                  <th>Profit</th>
                  <th>Wallet</th>
                  <th>Status</th>
                  <th>members</th>
                  <th >Edit</th>
                  <!-- <th>Delete</th>
                  <th></th> -->

                </tr>
                </thead>
                <tbody>
                
                <?php 
            
            if (isset($_GET['pageno'])) {
                  $pageno = $_GET['pageno'];
              } else {
                  $pageno = 1;
              }
              $no_of_records_per_page = 10;
              $offset = ($pageno-1) * $no_of_records_per_page;

            $total_pages_sql = "SELECT COUNT(*) FROM connector";
            $result = mysqli_query($con,$total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);

            $sql = "SELECT * FROM connector LIMIT $offset, $no_of_records_per_page";
            $res_data = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($res_data)){

              $person=$row['username_'];

              $mem = "SELECT * FROM connector WHERE user_sponsor = '$person'";
              $query = $con->query($mem);
              $members = $query->num_rows;

              if($members == 0){
                ?> 
                <tr>
              <?php
                // echo "<td>". $count . "</td>";
                //echo "<td>". $row['username_'] . "</td>";
                ?>
                <td><?php echo $row['username_']; ?></td>
                <?php
                echo "<td >". $row['user_fname'] . " ". $row['user_lname']."</td>";
                echo "<td>". $row['user_sponsor'] . "</td>";
                echo "<td>". $row['initial_invest'] . "</td>";
                echo "<td>". $row['user_incentive'] . "</td>";
                echo "<td>". $row['user_stock'] . "</td>"; 
                echo "<td >". $row['user_ID'] . "</td>";
                echo "<td >". $members. "</td>";
                ?>
                
                <td><a href="javascript:void(0)" class='open_modal btn btn-xs btn-info' id='<?php echo $row['id']; ?>'>Edit</a></td>
                
                <!-- <td><button type='button' name='delete_btn' data-id3="<?php echo $row['id'];?>" class="btn btn-xs btn-danger btn_delete">x</button></td>
                <td><a href="javascript:void(1)" class='open_modal_reset btn btn-xs btn-warning' id='<?php echo $row['id']; ?>'>Reset</a></td>
                -->
              </tr>
              <?php
              }
                
                 
                // $count++;
                
              }
              
              mysqli_free_result($result);
            
          
            mysqli_close($con);
                ?>
              </table>
              <ul class="pagination">
                <li><a href="?pageno=1">First</a></li>
                <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                </li>
                <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                    <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                </li>
                <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
              </ul>
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
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
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