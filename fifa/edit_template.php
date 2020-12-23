<?php
include('database.php'); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>PHP CRUD</title>
  <link href = "./bootstrap/css/bootstrap.min.css" rel = "stylesheet">
  <script src= "./bootstrap/js/bootstrap.min.js"></script>
  <script src= "./bootstrap/js/jquery.min.js"></script>
  <script src= "./bootstrap/js/popper.js"></script>
  <script src= "./bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style2.css">

   <?php include('nav.php'); ?>
</head>
<body>
<?php
    include('editform.php');
    error_reporting(0);
    
    if(isset($_GET['edit']))
    {
        $id= $_GET['edit'];
        $table= $_GET['table'];
        switch ($table)
        {
          case 1:
            $sql= ("SELECT * FROM player_stats WHERE Player_ID= $id;");
            $res = mysqli_query($db, $sql);
            // $user= mysqli_fetch_assoc($res);
            if(count($res)==1){
              $row = mysqli_fetch_array($res);
              $Acceleration = $row['Acceleration'];
              $Balance = $row['Balance'];
              $Ball_Control = $row['Ball_Control'];
              $Crossing = $row['Crossing'];
              $Dribbling = $row['Dribbling'];
              $Finishing = $row['Finishing'];

            echo editForm("$id"
                    , ['Acceleration', 'Balance', 'Ball_control', 'Crossing', 'Dribbling', 'Finishing']
                    ,["$Acceleration", "$Balance", "$Ball_Control", "$Crossing", "$Dribbling", "$Finishing"]
                    , ['number', 'number', 'number', 'number', 'number', 'number']);
             }
            break;

          case 2:

            $sql= ("SELECT * FROM club WHERE Player_ID= $id;");
            $results = mysqli_query($db, $sql);
            if(count($results)==1){
              $row = mysqli_fetch_array($results);
              $Club = $row['Club'];
                echo editForm("$id", ['Club'],["$Club"], ['text']);
              // header('crud.php?choice=2');
            }
            break;

          case 3:
            $sqll= ("SELECT * FROM salary WHERE Player_ID= $id;");
            $results = mysqli_query($db, $sqll);
            if(count($results)==1){
              $row = mysqli_fetch_array($results);
              $Wage = $row['Wage'];
              $Value = $row['Value'];
                echo editForm("$id", ['Wage', 'Value'],["$Wage", "$Value"], ['number', 'number']);
            //   header('crud.php?choice=4');
            }
            break;

          case 4:
            $sql= ("SELECT * FROM player WHERE Player_ID= $id;");
            $results = mysqli_query($db, $sql);
            if(count($results)==1){
              $row = mysqli_fetch_array($results);
              $Name = $row['Name'];
              $Age = $row['Age'];
              $Position = $row['Position'];
              $Overall_rating = $row['Overall_rating'];
              $Nationality = $row['Nationality'];
                echo editForm("$id", ['Name', 'Age', 'Position', 'Overall_rating', 'Nationality'],["$Name", "$Age", "$Position", "$Overall_rating", "$Nationality"], ['text', 'number', 'text', 'number', 'text']);
              // header('crud.php?choice=3');
            }
          break;
            default:
              // code...
              break;
          }
        }
?>
</body>
</html>