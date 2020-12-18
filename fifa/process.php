<?php

include('database.php');

if(isset($_GET['delete'])){

  $id= $_GET['delete'];
  $table_number= $_GET['table'];
  switch ($table_number) {
    case 1:
      $sql= ("DELETE FROM player_stats WHERE Player_ID= $id;");
      mysqli_query($db, $sql);
      break;
    case 2:
      $sql= ("DELETE FROM club WHERE Player_ID= $id;");
      mysqli_query($db, $sql);
      break;
    case 3:
      $sql= ("DELETE FROM salary WHERE Player_ID= $id;");
      mysqli_query($db, $sql);
      break;
    case 4:
      $sql= ("DELETE FROM player WHERE Player_ID= $id;");
      mysqli_query($db, $sql);
      break;

    default:
      echo "nothing has been deleted!";
      break;
  }
  header('location: home.php');
}






 ?>
