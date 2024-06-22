<?php   
  include "insrt/conn.php";
  if ($_POST['submit']) {
    
    $sender = $_POST['username_'];
    $amount = $_POST['amount'];
    $notes = $_POST['notes'];
    $receiver = $_POST['username'];
    $dt = $_POST['date_'];				

    $queryy = "SELECT * FROM `connector` WHERE username_='$receiver'";
    $resultt = mysqli_query($con,$queryy) or die(mysqli_error($con));
    $rowss = mysqli_num_rows($resultt);


    if( $rowss == 0){
      echo "<script>alert('no user found !!!'); </script>";
    }else{
     $deduct = "SELECT * FROM connector where username_='$sender'";
    $results = mysqli_query($con, $deduct);
    $raw = mysqli_fetch_array($results);
    
    if($raw['user_stock'] <=10 || $raw['user_stock'] <= $amount){
      echo "<script>alert('insufficient wallet, please buy tokens to Admin !!!'); </script>";
    }else{
      $store=($raw['user_stock'] - $_POST['amount']);
    $updatesponsor="UPDATE connector set user_stock='$store'  WHERE username_='$sender'";
    mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));


    $deductt = "SELECT * FROM connector where username_='$receiver'";
    $result = mysqli_query($con, $deductt);
    $roww = mysqli_fetch_array($result);
    $upd_temp=$roww['user_stock'];
    $tempo=$upd_temp + $amount;
    
    $updaterecept="UPDATE connector set user_stock='$tempo'  WHERE username_='$receiver'";
    $result=mysqli_query($con,$updaterecept) or die("error".mysqli_error($con));


    $statement = "INSERT INTO income (username_,username_to,Amount,description,date) VALUES ('$sender','$receiver','$amount','$notes','$dt')";
    $result=mysqli_query($con,$statement) or die("error".mysqli_error($con));
    
        echo "<script>alert('registered !!!'); </script>";
        header("location: transfer_w.php");
    }

    
    }
  
    }
    else{
      echo "eroor".mysqli_error($con);
    }
  
?>