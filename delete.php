<?php  
	require_once 'insrt/conn.php';
	$sql = "DELETE FROM connector WHERE id = '".$_POST["id"]."'";  
	if(mysqli_query($con, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>