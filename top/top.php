<?php
require_once 'insrt/conn.php';
$id=$_SESSION['username_'] ;
$profile = mysqli_query($con,"SELECT * FROM connector where username_= '$id'");
$result = mysqli_fetch_array($profile);



$status ="unread";
$sql = "SELECT * FROM messages WHERE (msg_to = '$id') AND (msg_status= '$status')";
$query = $con->query($sql);
$countProduct = $query->num_rows; 


$one="SELECT * FROM income where username_to = '$id'";
$query = $con->query($one);
$income = $query->num_rows; 

$mem = "SELECT * FROM connector WHERE user_sponsor = '$id'";
$query = $con->query($mem);
$members = $query->num_rows;
// $lef = ;
// $right = $members/2;
?>
<header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>N</b>L</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>New</b>Lusail</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Expand</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"><?php echo $countProduct; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $countProduct; ?> messages</li>
              
              <li class="footer"><a href="./email_inb.php">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-handshake-o"></i>
              <span class="label label-warning"><?php echo $countProduct; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $countProduct; ?> incomes</li>
              <li class="footer"><a href="./income_w.php">See All incomes</a></li>
              
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-users"></i>
              <span class="label label-danger"><?php echo $members; ?></span>
            </a>
            <ul class="dropdown-menu">
              
              <li class="header">You have <?php echo (ceil($members/2)); ?> members on your right</li>
              <li class="footer">
                <a href="./team_vi.php">View all members of you</a>
              </li>
            </ul>
           
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $result['user_fname']; ?></span>
              
            </a>
            
            <ul class="dropdown-menu">
              
              
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>