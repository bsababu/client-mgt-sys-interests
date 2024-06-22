<?php   
  require_once 'insrt/conn.php';
  
  $username = "";
  $st="Down";
  if (isset($_POST['sign'])) {
    
    
    $fname = $_POST['user_fname'];
    $lname = $_POST['user_lname'];
    $dob = $_POST['user_dob'];
    $gender = $_POST['user_gender'];
    $address = $_POST['user_address'];
    $email = $_POST['user_email'];
    $invest = 0;
   
   
    $incentive=0;
    $joined = date('Y-m-d H:i:s');
    // $joined = $_POST['user_joined'];
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
    $sql_u = "SELECT * FROM connector WHERE username_='$username'";
    $res_u = mysqli_query($con, $sql_u);
    
    $sql_ = "SELECT * FROM connector WHERE username_='$sponsor'";
    $res_ = mysqli_query($con, $sql_);

  //   if (mysqli_num_rows($res_) != 1 ) {
  //     $name_erro = "Sorry... use a valid username"; 	
      
  // }
    
    if (mysqli_num_rows($res_u) > 0 ) {
      $name_error = "Sorry... username already taken"; 	
      
      
    }else if (mysqli_num_rows($res_) != 1 ) {
           $name_erro = "Sorry... use a valid username"; 	
          
    }else{

    $statement = "INSERT INTO connector(user_ID,user_fname,user_lname,user_dob,user_gender,user_address,user_email,user_package,
    user_stock,user_joined,username_,user_password,user_sponsor,user_phone,initial_invest,user_incentive)
     VALUES ('$st','$fname','$lname','$dob','$gender','$address','$email','$package','$stock','$joined','$username','$password_','$sponsor','$phone','$bitc','$incentive')";
    
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

  if(mysqli_query($con,$statement)){
      // $valid['success'] = true;
      // $valid['messages'] = "Successfully Added";

      header("Location: success.html");
      die();
      
      
  }else{
    die("error".mysqli_error($con));
  }
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
    <a href="index.html"><b>Sign up</b></a>
  </div>
  <form action="#" method="post">
  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    
    <div class="col-md-6" <?php if (isset($name_erro)): ?>  <?php endif ?>>
      <div class="form-group has-feedback">
      <label>Sponsor username</label>
      <input class="form-control" required value="<?php echo $username; ?>" type="text" placeholder="Enter Sponsor name" name="user_sponsor">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?php if (isset($name_erro)): ?>
          <span style="color: red;"><?php echo $name_erro; ?></span>
        <?php endif ?>
      </div>
      <!-- <div class="form-group has-feedback">
        <input required class="form-control" name ="user_ID" id="exampleInputEmail1" type="text" placeholder="National ID / passport number">
        <span class="glyphicon glyphicon-plus-sign form-control-feedback"></span>
      </div> -->
      <div class="form-group has-feedback">
         <input class="form-control" name="user_fname" id="exampleInputPassword1" type="text" placeholder="First Name" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" name="user_lname" id="exampleInputPassword1" type="text" placeholder="Last name" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      
      <div class="form-group has-feedback">
      <label for="exampleInputPassword1">Date of birth</label>
      <input class="form-control" name="user_dob" id="exampleInputEmail1"  type="date" placeholder="Date of birth" required>
        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      <select  id="" name="user_gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                          </select>
       
      </div>
      <div class="form-group has-feedback">
      
      <input class="form-control" name="user_phone" id="exampleInputPassword1" type="tel" placeholder="07xxxxxxxx" required>
        <span class="glyphicon glyphicon-th form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      
      <input class="form-control" name="user_email" id="exampleInputPassword1" type="email" placeholder="Enter you email..." required 
      >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
    </div>
    <div class="col-md-6">
    <label>Address</label>
      <div class="form-group has-feedback">
      <textarea name="user_address" id="" cols="100" rows="2" required  class="form-control"></textarea>
        <span class="glyphicon glyphicon-road form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback" <?php if (isset($name_error)): ?>  <?php endif ?>>
      <label for="exampleInputPassword1">Enter your username</label>
      <input required class="form-control" name="username_" value="<?php echo $username; ?>" type="text" placeholder="Username will be used to log in">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?php if (isset($name_error)): ?>
          <span style="color: red;"><?php echo $name_error; ?></span>
        <?php endif ?>
        
      </div>
      <div class="form-group has-feedback">
      <label for="exampleInputPassword1">Enter your password</label>
        <input type="password" class="form-control" placeholder="Password" name="user_password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      <label for="exampleInputPassword1">Retype your password</label>
        <input type="password" class="form-control" placeholder="Retype password" name="user_password_" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      
     
      
      <div class="form-group has-feedback">
        <label for="exampleInputPassword1">Date joined</label>
        <input class="form-control" id="date1" type="date" name="user_joined" value="<?php echo date('Y-m-d'); ?>" readonly>
        <span class="glyphicon glyphicon-time form-control-feedback"></span>
      </div>
  </div>
      <div class="row">
        <div class="col-xs-8">
        <button type="submit" name="sign" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          
          <button type="submit" class="btn btn-danger btn-block btn-flat" onclick="window.location.href = 'newlusail.com';">cancel</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="box-footer">
        <center>
            <a href="/" class="text-center">I already have a membership</a>
        </center>
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
</body>
</html>
