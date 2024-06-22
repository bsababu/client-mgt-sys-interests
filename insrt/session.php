<?php
session_start();
if ($_SESSION['username_'] !=TRUE){
  header("Location:/");
  return;
 }
?>