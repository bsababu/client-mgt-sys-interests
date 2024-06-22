<?php   
  include "insrt/conn.php";
  require_once 'insrt/session.php';
  if ($_POST['submit'])
  {
    
    $sponsor = $_POST['username_'];
    $invest = $_POST['amount'];
    
    $receiver = $_POST['username'];
   				
    $package='Bronze';

    if(($invest == 30) || ($invest == 50) || ($invest == 100) || ($invest == 150) || ($invest == 200) ||
    ($invest == 300))
    {
      $package='Bronze';
    }else if($invest==500 || $invest==700 || $invest==900){
      $package='Bronze';
    }
    else if (($invest == 500) || ($invest == 2000) || ($invest == 3000) || ($invest == 4000)) {
      $package='Silver';
    } else if (($invest == 5000) || ($invest == 10000) || ($invest == 15000)){
      $package='Gold';
    } else if (($invest == 20000) || ($invest == 30000) || ($invest == 40000) || ($invest == 50000)){
      $package='Diamond';
    } else {
      $package='Diamond';
    }

    $two="SELECT * FROM connector where username_ = '$sponsor'";
    $transfer = mysqli_query($con,$two);
    $row = mysqli_fetch_assoc ($transfer);

    $purce= ($invest * 10)/100;
    $inyungu = ($invest * 15)/100;

    if ( $row['user_stock'] <= $invest )
    {
      echo "<script>alert('You have insufficient balance !!!'); 
      window.location.href='confirm.php';
      </script>";
      
    }
    if ($sponsor != 'kagina')
    {
    $store=($row['user_stock'] - $invest ) + $purce;
    
    $updatesponsor="UPDATE connector set user_stock= '$store', user_incentive = user_incentive + '$purce' WHERE username_='$sponsor'";
    //$updatesponsor="UPDATE connector set user_stock= '$kagina' WHERE username_='$sponsor'";
    mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    if ($sponsor == 'kagina')
    {
    $kagina = $row['user_stock'] - $invest ;
    // $store=($row['user_stock']) + $purce;

    $updatesponsor="UPDATE connector set user_stock= '$kagina'  WHERE username_='kagina'";
    mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
    }
    
    //$updateadmin="UPDATE connector set user_stock= user_stock +'$inyungu'  WHERE username_='kagina'";
    
    
    // $updateadmin="UPDATE connector set user_stock= user_stock  WHERE username_='kagina'";
    // mysqli_query($con,$updateadmin) or die("error".mysqli_error($con));
    
    

    // $queryy = "SELECT * FROM `connector` WHERE username_='$receiver'";
    // $resultt = mysqli_query($con,$queryy) or die(mysqli_error($con));
    // $rowss = mysqli_num_rows($resultt);


    // if( $rowss != 1){
    //   echo "<script>alert('no user found !!!'); </script>";
    // }else{
    



    // $statement = "UPDATE connector set initial_invest= '$invest', user_package='$package', user_stock='$invest', user_ID='Up' WHERE username_='$receiver'";
    $statement = "UPDATE connector set initial_invest= '$invest', user_package='$package', user_stock = '0', user_incentive = '0',  user_ID='Up' WHERE username_='$receiver'";
    $result=mysqli_query($con,$statement) or die("error".mysqli_error($con));

    $binary = "SELECT SUM(initial_invest) AS value_sum FROM connector WHERE user_sponsor = '$sponsor'";
    $py = mysqli_query($con, $binary);
    $querybina = mysqli_fetch_assoc($py);
    $summ = $querybina['value_sum'];


    if ($summ >=1000 && $summ <=1200){
      $updatebina="UPDATE connector set user_stock= user_stock + 100  WHERE username_='$sponsor'";
      mysqli_query($con,$updatebina) or die("error".mysqli_error($con));
    }
    if ($summ >=5000 && $summ <=5200) {
      $updatebina="UPDATE connector set user_stock= user_stock + 500  WHERE username_='$sponsor'";
      mysqli_query($con,$updatebina) or die("error".mysqli_error($con));
    }
     if ($summ >=10000 && $summ <=10200) {
      $updatebina="UPDATE connector set user_stock= user_stock + 1000  WHERE username_='$sponsor'";
      mysqli_query($con,$updatebina) or die("error".mysqli_error($con));
    }
    if ($summ >=20000 && $summ <=21000) {
      $updatebina="UPDATE connector set user_stock= user_stock + 2000  WHERE username_='$sponsor'";
      mysqli_query($con,$updatebina) or die("error".mysqli_error($con));
    }
    if ($summ >=30000 && $summ <=31000) {
      $updatebina="UPDATE connector set user_stock= user_stock + 3000  WHERE username_='$sponsor'";
      mysqli_query($con,$updatebina) or die("error".mysqli_error($con));
    }
    if ($summ >=40000 && $summ <=41000) {
      $updatebina="UPDATE connector set user_stock= user_stock + 4000  WHERE username_='$sponsor'";
      mysqli_query($con,$updatebina) or die("error".mysqli_error($con));
    }
    if ($summ >=50000 ){
      $updatebina="UPDATE connector set user_stock= user_stock + 5000  WHERE username_='$sponsor'";
      mysqli_query($con,$updatebina) or die("error".mysqli_error($con));
    }
    
        // echo "<script>alert('registered !!!'); </script>";
        // header("location: home.php");
        
        
        echo "<script>
            alert('registered !!');
            window.location.href='home.php';
            </script>";
        // exit();
    // }
  
    }
  else{
      echo "eroor".mysqli_error($con);
  }
  
?>