<?php   
  include "conn.php";
  $valid['success'] = array('success' => false, 'messages' => array());
  
  if (isset($_POST['sign'])) {
    
    
    $fname = $_POST['user_fname'];
    $lname = $_POST['user_lname'];
    $dob = $_POST['user_dob'];
    $gender = $_POST['user_gender'];
    $address = $_POST['user_address'];
    $email = $_POST['user_email'];
    $invest = 0;
   
   
    $incentive=0;
    $joined = $_POST['user_joined'];
    $username = $_POST['username_'];
    $password =  $_POST['user_password'];
    $password_ = hash('sha512',$password);
    $package='Bronze';
    $sponsor = $_POST['user_sponsor'];
    $phone = $_POST['user_phone'];
    
    
    $bitc=$invest;
    $stock = $bitc;

    if ($_POST['user_password'] != $_POST['user_password_']) {
      echo "<script>alert('password do not match'); </script>";
  }

    // $deduct = "SELECT * FROM connector where username_='$sponsor'";
    // $result = mysqli_query($con, $deduct);
    // $row = mysqli_fetch_array($result);

    

    $statement = "INSERT INTO connector(user_fname,user_lname,user_dob,user_gender,user_address,user_email,user_package,
    user_stock,user_joined,username_,user_password,user_sponsor,user_phone,initial_invest,user_incentive)
     VALUES ('$fname','$lname','$dob','$gender','$address','$email','$package','$stock','$joined','$username','$password_','$sponsor','$phone','$bitc','$incentive')";
     


    

    
    


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

  if(mysqli_query($con,$statement))
      $valid['success'] = true;
      $valid['messages'] = "Successfully Added";
    
  }else{
    $valid['success'] = false;
		$valid['messages'] = "Error while adding the members";
  }
  $con->close();
  echo json_encode($valid);
  
  
?>