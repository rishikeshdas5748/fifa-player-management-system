<?php
session_start();
include('database.php');

$update = false;

$Acceleration = '';
$Balance = '';
$Ball_Control = '';
$Crossing = '';
$Dribbling = '';
$Finishing = '';

$Namee = '';
$Age = '';
$Position = '';
$Overall_rating = '';
$Nationality = '';

$club = '';

$Wage = '';
$Valuee = '';

  if(isset($_GET['delete'])){

      $id= $_GET['delete'];
      $table_number= $_GET['table'];
      switch ($table_number) {
        case 1:
          $sql= ("DELETE FROM player_stats WHERE Player_ID= $id;");
          mysqli_query($db, $sql);
          $_SESSION['message']= "Player stats has been Deleted!";
          $_SESSION['msg_type']= "danger";
          header('location: crud.php?choice=5');
          break;
        case 2:
          $sql= ("DELETE FROM club WHERE Player_ID= $id;");
          mysqli_query($db, $sql);
          $_SESSION['message']= "Club name has been Deleted!";
          $_SESSION['msg_type']= "danger";
          header('location: crud.php?choice=6');
          break;
        case 3:
          $sql= ("DELETE FROM salary WHERE Player_ID= $id;");
          mysqli_query($db, $sql);
          $_SESSION['message']= "Salary Detail has been Deleted!";
          $_SESSION['msg_type']= "danger";
          header('location: crud.php?choice=7');
          break;
        case 4:
          $sql= ("DELETE FROM player WHERE Player_ID= $id;");
          mysqli_query($db, $sql);
          $_SESSION['message']= "Player Detail has been Deleted!";
          $_SESSION['msg_type']= "danger";
          header('location: crud.php?choice=8');
          break;

        default:
          echo "nothing has been deleted!";
          break;
      }

  }


    // if(isset($_GET['edit'])){

    //   $id= $_GET['edit'];
    //   $table= $_GET['table'];
    //   $update = true;

    //   switch ($table) {
    //     case 1:

    //         $sql= ("SELECT * FROM player_stats WHERE Player_ID= $id;");
    //         $results = mysqli_query($db, $sql);
    //         if(count($results)==1){
    //           $row = mysqli_fetch_array($results);
    //           $Acceleration = $row['Acceleration'];
    //           $Balance = $row['Balance'];
    //           $Ball_Control = $row['Ball_Control'];
    //           $Crossing = $row['Crossing'];
    //           $Dribbling = $row['Dribbling'];
    //           $Finishing = $row['Finishing'];
    //           header('crud.php?choice=1');
    //         }
    //       break;

    //       case 2:

    //       $sql= ("SELECT * FROM club WHERE Player_ID= $id;");
    //       $results = mysqli_query($db, $sql);
    //       if(count($results)==1){
    //         $row = mysqli_fetch_array($results);
    //         $club = $row['Club'];
    //         header('crud.php?choice=2');
    //       }

    //         break;

    //         case 3:

    //         $sql= ("SELECT * FROM salary WHERE Player_ID= $id;");
    //         $results = mysqli_query($db, $sql);
    //         if(count($results)==1){
    //           $row = mysqli_fetch_array($results);
    //           $Wage = $row['Wage'];
    //           $Valuee = $row['Valuee'];
    //           header('crud.php?choice=4');
    //         }

    //           break;

    //           case 4:


    //           $sql= ("SELECT * FROM player WHERE Player_ID= $id;");
    //           $results = mysqli_query($db, $sql);
    //           if(count($results)==1){
    //             $row = mysqli_fetch_array($results);
    //             $Name = $row['Name'];
    //             $Age = $row['Age'];
    //             $Position = $row['Position'];
    //             $Overall_rating = $row['Overall_rating'];
    //             $Nationality = $row['Nationality'];
    //             header('crud.php?choice=3');
    //           }

    //             break;

    //     default:
    //       // code...
    //       break;
    //   }


    // }

    // if(isset($_POST['edit'])){
    //   $id = $_POST['Player_ID'];
      
    // }


 ?>
