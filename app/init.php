<?php

// $servername='localhost';
// $database='todo';
// $username='root';
// $password='';

//create connection
session_start();

$conn=mysqli_connect("localhost" ,"root" ,"" ,"todo") or die("!!!!!!Connection error");

//check connection

if(!$conn){
//
  die("Connection failed:" . mysqli_connect_error());
 }
//echo "Connected succesfully";
 //mysqli_close($conn);


 ?>
