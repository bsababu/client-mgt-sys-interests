<?php
require_once 'insrt/conn.php';
$id=$_SESSION['username_'] ;
$profile = mysqli_query($con,"SELECT * FROM connector where username_= '$id'");
$result = mysqli_fetch_array($profile);
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $result['user_fname']." ".$result['user_lname']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li >
          
            <a href="home.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="ion ion-person-stalker "></i>
            <span>Geneology</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="team_vi.php"><i class="fa fa-circle-o"></i> Team View</a></li>
            
            <?php 
                if ($result['user_ID']=='Admin'){
                    echo " <li><a href='team_sponsor.php'><i class='fa fa-circle-o'></i> Sponsor Geneology</a></li>";
                    
                }
                if ($result['username_']=='kagina'){
                  echo " <li><a href='view.php'><i class='fa fa-circle-o'></i>view all members</a></li>";
                  echo " <li><a href='view_desc.php'><i class='fa fa-circle-o'></i>Zero members</a></li>";
                }
              
            ?>   
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Wallets</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="confirm.php"><i class="fa fa-circle-o"></i> Comfirm new wallet</a></li>
            <li><a href="income_w.php"><i class="fa fa-circle-o"></i>Income history</a></li>
            <li><a href="wallet_history.php"><i class="fa fa-circle-o"></i> E-wallet history</a></li>
            <li><a href="transfer_w.php"><i class="fa fa-circle-o"></i> Transfer e-wallet</a></li>
            <li><a href="transfer_hi.php"><i class="fa fa-circle-o"></i> Transfer history</a></li>
            <!-- <li><a href="credit_wal.php"><i class="fa fa-circle-o"></i> Credit wallet</a></li> -->
            <li><a href="payout.php"><i class="fa fa-circle-o"></i> Pay out</a></li>
            <?php 
              if ($result['user_ID']=='Admin'){
                echo " <li><a href='payout_v.php'><i class='fa fa-circle-o'></i>view Pay out</a></li>";
                
              }
               if ($result['username_']=='kagina'){
                   
               echo " <li><a href='update_currency.php'><i class='fa fa-circle-o'></i>Update wallet</a></li>";
               echo " <li><a href='update_ini.php'><i class='fa fa-circle-o'></i>Update Initial investment</a></li>";
               }
               if ($result['username_']!='kagina'){
                   
               echo " <li><a href='payment.php'><i class='fa fa-circle-o'></i>My History</a></li>";
               
               }
              
            ?>
           
          </ul>
        </li>
        <!-- <li>
          <a href="join.php">
            <i class="fa fa-edit"></i> <span>Join premium</span>
        </a> -->
          
        </li>
        <li>
          <a href="#">
            <i class="fa fa-edit"></i> <span>Incentives</span>
        </a>
          
        </li>
        <li>
          <a href="profile.php">
              <i class="fa fa-circle-o"></i><span>Profile</span>
        </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Email</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="email_comp.php"><i class="fa fa-circle-o"></i>Compose</a></li>
            <li><a href="email_inb.php"><i class="fa fa-circle-o"></i> Inbox</a></li>
            
            
          </ul>
        </li>
        <!-- <li>
          <a href="ticket.php">
            <i class="fa fa-ticket"></i> <span>Ticket</span>
        </a>
        </li> -->
        <li>
          <a href="logout.php">
            <i class="fa fa-envelope"></i> <span>Log Out</span>
        </a>
        </li>
      </ul>
  </section>
  
</aside>