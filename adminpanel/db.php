<?php
//creating connection 
$servername = "localhost";
$username = "";
$password = "";
$dbname = "cleandb";

//establish connection
$con = mysqli_connect("localhost","root","","cleandb");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>