<?php  
include 'insrt/conn.php';

    if (isset($_POST["submit"])){

        
        $modal_id = $_POST["modal_id"];
        $sponsor = $_POST["username"];
        // $username = $_POST["username"];
        $wallet = $_POST["wallet"];
        $investment = $_POST["investment"];
        

        $update="UPDATE connector SET user_stock=0, user_incentive=0 WHERE id = '$modal_id'";

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
