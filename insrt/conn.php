<?php

$mysql_hostname = "localhost";
$mysql_user = "kgldis5_timo";
$mysql_password = "*nZ#[sNC(ggn";
$mysql_database = "kgldis5_mrkt_new";

$con = new mysqli($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Could not connect database");
if($con->connect_error) {
    die("Connection Failed : " . $con->connect_error);
  } 
?>