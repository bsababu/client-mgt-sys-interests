<?php  
include 'insrt/conn.php';

    if (isset($_POST["submit"])){

        
        $modal_id = $_POST["modal_id"];
        // $sponsor = $_POST["sponsor"];
        $username = $_POST["username"];
        // $address = $_POST["address"];
        // $msg = $_POST["msg"];
        $status = $_POST["status"];
        $wallet = $_POST["wallet"];
        $investment = $_POST["investment"];
        $profit = $_POST["profit"];

        $update="UPDATE connector SET user_ID='$status', username_='$username', initial_invest = '$investment', user_stock = '$wallet', user_incentive = '$profit'  WHERE id = '$modal_id'";

        $query=mysqli_query($con,$update);
        if($query) 
        {  
            header("Location: view.php");
        } 
        else {
            die("error".mysqli_error($con));
        } 
    }
?>