<?php

 require_once ('app/init.php');

$sql_stmt = "SELECT * FROM items"; // this is used to select data from db
  //SQL select query

$result = mysqli_query($conn,$sql_stmt);
   //execute SQL statement

if (!$result){
  die("Database access failed: " . mysqli_error());
    //output error message if query execution failed
}
  else{
    $rows = mysqli_num_rows($result);
    // get number of rows returned

if ($rows) {

while ($row = mysqli_fetch_array($result)) {

  $items[] = $row;
  // echo 'ID: ' . $row['ID'] . '<br>';
  // echo 'Full Names: ' . $row['name'] . '<br>';
  // echo 'User: ' . $row['user'] . '<br>';

}
}else{
  echo "Die!!! row is empty";
}
mysqli_close($conn); //close the database connection
}
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>To do List</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">

  <meta name="viewport" content="width=device-width",initial-scale=1.0>

  </head>
  <body>
      <div class="list">

        <h1 class= "header">To Do.</h1>
        <?php if(!empty($items)): //checks if the row is not empty?>
        <ul class="items">
          <?php foreach ($items as $item):  //iterates within the table?>
            <li>
           <span class="item <?php echo $item['done'] ? ' done' : ' '?>"><?php echo $item['name']; ?>
           <?php if (!$item['done']): ?>
            <a href="mark.php?status=done&item=<?php echo $item['ID'] ?>" class="done-button"> Mark as done </a>
             <?php endif; //end if?>
             </li>
           <?php endforeach; //end for each?>
          </ul>
        <?php  else: echo "<p>You haven't added items </p>"; ?>

          <?php  endif; ?>
          <!-- <li span class="item" >Buy shopping</li>
          <li span class="item" >Arrange on the shelves</li> -->
        <form action="add.php" method="post">
          <input type="text" name="name" placeholder="Type a new item here" class="input" autocomplete="off" required>
          <input type="submit" value="add" class="submit">
        </form>
      </div>
  </body>
</html>
