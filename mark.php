<?php
require_once 'app/init.php';

if(isset($_GET['status'], $_GET['item'])){

  $status= $_GET['status'];
  $item=$_GET['item'];

   switch($status){
     case 'done':
      $doneQuery="UPDATE items set done=1 where ID ='$item' ";
      if (!mysqli_query($conn,$doneQuery))
        {
        die('Error: ' . mysqli_error($conn));
        }
        else{
      echo "1 record added";
        }

      mysqli_close($conn);


      break;
   }

}
header('Location: index.php');

 ?>
