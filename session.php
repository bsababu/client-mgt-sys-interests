
<?php

// if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 180)) {
//   // last request was more than 30 minutes ago
//   session_unset();     // unset $_SESSION variable for the run-time 
//   session_destroy(); 
//   header("Location: index.php");  // destroy session data in storage
//   }
  

    if(isset($_SESSION["username_"]))
        {
        if((time() - $_SESSION['last_time']) > 120) // Time in Seconds
        {
        header("location:logout.php");
        }
    }

?>