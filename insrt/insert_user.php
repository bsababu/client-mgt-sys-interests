<?php   
  include "conn.php";
  if ($_POST['insert']) {
    
    // $Id = $_POST['user_ID'];
    $fname = $_POST['user_fname'];
    $lname = $_POST['user_lname'];
    $dob = $_POST['user_dob'];
    $gender = $_POST['user_gender'];
    $address = $_POST['user_address'];
    $email = $_POST['user_email'];
    $invest = $_POST['initial_invest'];
    // $package = $_POST['user_package'];
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
    $incentive=0;
    $joined = $_POST['user_joined'];
    $username = $_POST['username_'];
    $password = $_POST['user_password'];
    $password_ = hash("sha256",$password);
    
    $sponsor = $_POST['user_sponsor'];
    $phone = $_POST['user_phone'];
    
  //   
  //   $stock = $bitc;
  //   $statement = "INSERT INTO connector(user_fname,user_lname,user_dob,user_gender,user_address,user_email,user_package,
  //   user_stock,user_joined,username_,user_password,user_sponsor,user_phone,initial_invest,user_incentive) VALUES ('$fname','$lname','$dob','$gender','$address','$email','$package','$stock','$joined','$username','$$password_','$sponsor','$phone','$bitc','$incentive')";

  //   mysqli_query($con,$statement) or die("error".mysqli_error($con));
  // }
  
    $bitc=$invest;
    $stock = $bitc;

    if ($_POST['user_password'] != $_POST['user_password_']) {
      $message = 'Passwords should be same<br>';
      $type = "error";
  }

    $deduct = "SELECT * FROM connector where username_='$sponsor'";
    $result = mysqli_query($con, $deduct);
    $row = mysqli_fetch_array($result);

    $purce= ($invest * 10)/100;
    $inyungu = ($invest * 15)/100;
    if ($sponsor != 'kagina'){

    
    $store=($row['user_stock'] - $invest ) + $purce;

    $updatesponsor="UPDATE connector set user_stock= '$store'  WHERE username_='$sponsor'";
    mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
  }

  if ($sponsor == 'kagina'){
    $store=($row['user_stock']) + $purce;

    $updatesponsor="UPDATE connector set user_stock= '$store'  WHERE username_='kagina'";
    mysqli_query($con,$updatesponsor) or die("error".mysqli_error($con));
  }
    
    $updateadmin="UPDATE connector set user_stock= user_stock +'$inyungu'  WHERE username_='kagina'";
    mysqli_query($con,$updateadmin) or die("error".mysqli_error($con));

    $statement = "INSERT INTO connector(user_fname,user_lname,user_dob,user_gender,user_address,user_email,user_package,
    user_stock,user_joined,username_,user_password,user_sponsor,user_phone,initial_invest,user_incentive)
     VALUES ('$fname','$lname','$dob','$gender','$address','$email','$package','$stock','$joined','$username','$password_','$sponsor','$phone','$bitc','$incentive')";
    mysqli_query($con,$statement) or die("error".mysqli_error($con));



    $binary = "SELECT SUM(connector.initial_invest) AS value_sum FROM connector WHERE user_sponsor = '$sponsor'";
    $querybina = mysql_fetch_assoc($binary);
    $summ = $row['value_sum'];

    if ($summ >=1000 && $summ <=1200){
      $updatebina="UPDATE connector set user_stock= user_stock + 100  WHERE username_='$sponsor'";
      mysqli_query($con,$updatebina) or die("error".mysqli_error($con));
    }else if ($summ >=5000 && $summ <=5200) {
      $updatebina="UPDATE connector set user_stock= user_stock + 500  WHERE username_='$sponsor'";
      mysqli_query($con,$updatebina) or die("error".mysqli_error($con));
    }else if ($summ >=10000 && $summ <=10200) {
      $updatebina="UPDATE connector set user_stock= user_stock + 1000  WHERE username_='$sponsor'";
      mysqli_query($con,$updatebina) or die("error".mysqli_error($con));
    }else if ($summ >=20000 && $summ <=21000) {
      $updatebina="UPDATE connector set user_stock= user_stock + 2000  WHERE username_='$sponsor'";
      mysqli_query($con,$updatebina) or die("error".mysqli_error($con));
    }else if ($summ >=30000 && $summ <=31000) {
      $updatebina="UPDATE connector set user_stock= user_stock + 3000  WHERE username_='$sponsor'";
      mysqli_query($con,$updatebina) or die("error".mysqli_error($con));
    }else if ($summ >=40000 && $summ <=41000) {
      $updatebina="UPDATE connector set user_stock= user_stock + 4000  WHERE username_='$sponsor'";
      mysqli_query($con,$updatebina) or die("error".mysqli_error($con));
    }else {
      $updatebina="UPDATE connector set user_stock= user_stock + 5000  WHERE username_='$sponsor'";
      mysqli_query($con,$updatebina) or die("error".mysqli_error($con));
    }



    $to      = $email; // Send email to our user
    $subject = 'Signup | Verification';
    $message = '
 
    Thanks for signing up!
    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
    
    ------------------------
    Username: '.$username.'
    Password: '.$password.'
    ------------------------
    
    You can change / update your credentials after signing in.
 
'; // Our message above including the link
  $headers = 'From:info@newlusail.com' . "\r\n"; // Set from headers
  mail($to, $subject, $message, $headers); // Send our email

    echo "<script>alert('Successfully registered !!! <br>
    check your email for the confirmation'); </script>";
  
}
  header("location:../team_vi.php");
  
?>