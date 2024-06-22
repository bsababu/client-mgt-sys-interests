<?php   
  require_once 'insrt/conn.php';
  
  
  
  if (isset($_POST['request'])) {

    $email = $_POST['email'];
    

    // $deduct = "SELECT * FROM connector where username_='$sponsor'";
    // $result = mysqli_query($con, $deduct);
    // $row = mysqli_fetch_array($result);
    $sql_u = "SELECT * FROM connector WHERE user_email='$email'";
    $res_u = mysqli_query($con, $sql_u);
    
    

  //   if (mysqli_num_rows($res_) != 1 ) {
  //     $name_erro = "Sorry... use a valid username"; 	
      
  // }
    
    if (mysqli_num_rows($res_u) >0 ) {

//     $to      = $email; // Send email to our user
//     $subject = 'Password recovery';
//     $message = '
 
//     Here is a link to go to: 
//     https://www.newlusail.com/up123456date0987.php
    
//     We love to have you back
 
// '; // Our message above including the link
//   $headers = 'From:info@newlusail.com' . "\r\n"; // Set from headers
//   mail($to, $subject, $message, $headers); // Send our email
  header("Location: https://newlusail.com/up123456date0987.php");
  

      
    }
    else{

      echo "<script>alert('invalid Emal!'); </script>";
    // $statement = "INSERT INTO connector(user_ID, user_fname,user_lname,user_dob,user_gender,user_address,user_email,user_package,
    // user_stock,user_joined,username_,user_password,user_sponsor,user_phone,initial_invest,user_incentive)
    //  VALUES ('Down','$fname','$lname','$dob','$gender','$address','$email','$package','$stock','$joined','$username','$password_','$sponsor','$phone','$bitc','$incentive')";
    
    
  // if(mysqli_query($con,$statement)){
  //     // $valid['success'] = true;
  //     // $valid['messages'] = "Successfully Added";

  //     header("Location: success.html");
  //     die();
      
      
  // }else{
  //   die("error".mysqli_error($con));
  // }
}
  
}
?>






<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>New Lusail | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">

<div class="register-box">
  <div class="register-logo">
    <a href="index.html"><b>New Lusail</b></a>
  </div>
  <form action="#" method="post" onsubmit="return checkForm(this);">
  <div class="register-box-body">
    <p class="login-box-msg">Request to update your password</p>

    
    <div class="col-md-12" >
      <div class="form-group has-feedback">
      <label>Your email</label>
      <input class="form-control" required  type="text" placeholder="Enter Your email you use..." name="email">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      
      
      
    </div>
     <div class="row">
        <div class="col-xs-8">
        <button type="submit" name="request" class="btn btn-primary btn-block btn-flat">Request</button>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          
          <button type="submit" class="btn btn-danger btn-block btn-flat" onclick="window.location.href = 'index.php';">cancel</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    
    <div class="box-footer">
    <center><a href="index.php" class="text-center">Go back to Home</a></center>
              </div>

    
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script type="text/javascript">

function checkForm(form) // Submit button clicked
{
  //
  // check form input values
  //

  form.sign.disabled = true;
  form.sign.value = "Please wait...";
  return true;
}



</script>
</body>
</html>
