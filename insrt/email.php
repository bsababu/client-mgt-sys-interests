<?php   
  require "conn.php";
  if ($_POST['submit']) {
    
    $msg_username = $_POST['msg_username'];
    $msg_email = $_POST['msg_email'];
    $msg_to = $_POST['msg_to'];
    $msg_subject = $_POST['msg_subject'];
    $msg_msg = $_POST['msg_msg'];
    
    $msg_status = "unread";
    $date=date('Y-m-d');

    $statement = "INSERT INTO messages(msg_sender,msg_email,msg_to,msg_subject,msg_msg,msg_date,msg_status)
     VALUES('$msg_username','$msg_email','$msg_to','$msg_subject','$msg_msg','$date','$msg_status')";
    mysqli_query($con,$statement) or die("error".mysqli_error($con));
    
    echo "<script>alert('registered !!!'); </script>";
      header("location: ../email_comp.php"); 
      
    
  }
  else {
    die("error".mysqli_error($con));
  }
  
    


  
?>