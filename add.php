<?php
require_once 'app/init.php';



$name =  $_POST['name'];
$sql="INSERT INTO items (name,user,done,created) VALUES ('$name',1,0,NOW())";


if (!mysqli_query($conn,$sql))
  {
  die('Error: ' . mysqli_error($conn));
  }
  else{
echo "1 record added";
  }

mysqli_close($conn);

header('Location: index.php');
?>




 ?>
