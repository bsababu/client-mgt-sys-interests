<?php   
  include "insrt/conn.php";
  
  if (isset($_POST['request'])) {
    
    $amount = $_POST['amount'];
    $account = $_POST['account'];
    $date = date('Y-m-d H:i:s');
    $status = 'requested';
    $id=$_POST['usernamee'];
    // $today=$_POST['today'];
   
    

    $deduct = "SELECT * FROM connector where username_='$id'";
    $results = mysqli_query($con, $deduct);
    $raw = mysqli_fetch_array($results);
    $store=($raw['user_stock'] - $_POST['amount']);
    $update="UPDATE connector set user_stock='$store'  WHERE username_='$id'";
    mysqli_query($con,$update) or die("error".mysqli_error($con));

    $updateadmin="UPDATE connector set user_stock= user_stock +'$amount'  WHERE username_='kagina'";
    mysqli_query($con,$updateadmin) or die("error".mysqli_error($con));






    $statement = "INSERT INTO payout(receiver,amount,destination,date,status)
     VALUES ('$id','$amount','$account','$date','$status')";
    mysqli_query($con,$statement) or die("error".mysqli_error($con));

    $_SESSION['message']="password has been updated";
    header("location: payout.php");
    exit;
  }else{
      echo "eroor".mysqli_error($con);
  }
  
  
?>