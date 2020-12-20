<?php
session_start();

$Acceleration = '';
$Balance = '';
$Ball_Control = '';
$Crossing = '';
$Dribbling = '';
$Finishing = '';

$Name = '';
$Age = '';
$Position = '';
$Overall_rating = '';
$Nationality = '';

$club = '';

$Wage = '';
$Value = '';

$id = '';

include('database.php'); 
include('tabletemplate.php');
include('table2template.php');
include('formtemplate.php');
include('form_edit_template.php');
 if(isset($_GET['edit'])){

      $id= $_GET['edit'];
      $table= $_GET['table'];
      $update = true;

      switch ($table) {
        case 1:

            $sql= ("SELECT * FROM player_stats WHERE Player_ID= $id;");
            $res = mysqli_query($db, $sql);
            $user= mysqli_fetch_assoc($res);
            if(count($user)==1){
              $row = mysqli_fetch_array($user);
              $Acceleration = $row['Acceleration'];
              $Balance = $row['Balance'];
              $Ball_Control = $row['Ball_Control'];
              $Crossing = $row['Crossing'];
              $Dribbling = $row['Dribbling'];
              $Finishing = $row['Finishing'];
              header('crud.php?choice=1');
            }
          break;

         case 2:

              $sql= ("SELECT * FROM club WHERE Player_ID= $id;");
              $results = mysqli_query($db, $sql);
              if(count($results)==1){
                $row = mysqli_fetch_array($results);
                $club = $row['Club'];
                header('crud.php?choice=2');
             }

             break;

         case 3:

                $sqll= ("SELECT * FROM salary WHERE Player_ID= $id;");
                $results = mysqli_query($db, $sqll);
                if(count($results)==1){
                  $row = mysqli_fetch_array($results);
                  $Wage = $row['Wage'];
                  $Value = $row['Value'];
                  header('crud.php?choice=4');
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
                    header('crud.php?choice=3');
                  }

               break;

        default:
          // code...
          break;
      }


    }
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
</head>
  <body>

   <?php include('nav.php'); ?>

<?php
    if(isset($_GET['choice']))
    {
      $num = $_GET['choice'];
      switch ($num) {
        case 1:
          ?>

          <?php

            if(isset($_SESSION['message'])): ?>

            <div style="float:left" class="alert alert-<?=$_SESSION['msg_type']?>">
              <?php echo $_SESSION['message'];
                    unset($_SESSION['message']);
               ?>
             </div>
           <?php endif; ?>

        <div class="container">
      <?php

        $display = ("SELECT * FROM $dbName.player_stats");
        $results = mysqli_query($db, $display);
        // pre_r($results);
        tableTemplate($results, ["Player_ID", "Acceleration" ,"Balance", "Ball_Control", "Crossing" , "Dribbling", "Finishing"])
        ?>


     <?php
        $sql= ("SELECT Player_ID from $dbName.player");
        $results = mysqli_query($db, $sql);
        // $sql = ("SELECT * FROM $dbName.player_stats WHERE Player_ID = $id");
        // $selectedValues = mysqli_query($db, $sql);

        form_edit_Template($results, ["Acceleration" ,"Balance", "Ball_Control", "Crossing" , "Dribbling", "Finishing"], ["number", "number", "number", "number", "number", "number"])

     ?>


      <?php
          break;
        case 2:
          ?>

          <?php

            if(isset($_SESSION['message'])): ?>

            <div style="float:left" class="alert alert-<?=$_SESSION['msg_type']?>">
              <?php echo $_SESSION['message'];
                    unset($_SESSION['message']);
               ?>
             </div>
           <?php endif; ?>

        <div class="container">
      <?php

        $display = ("SELECT * FROM $dbName.club");
        $results = mysqli_query($db, $display);
        // pre_r($results);
        tableTemplate($results, ["Player_ID", "Club"])
        ?>
     
     <?php
       $sql= ("SELECT Player_ID from $dbName.player");
       $results = mysqli_query($db, $sql);

       form_edit_Template($results, ["Club"], ["text"])

       ?>

          <?php
          break;
        case 3:
          ?>

          <?php

            if(isset($_SESSION['message'])): ?>

            <div style="float:left" class="alert alert-<?=$_SESSION['msg_type']?>">
              <?php echo $_SESSION['message'];
                    unset($_SESSION['message']);
               ?>
             </div>
           <?php endif; ?>

        <div class="container">
      <?php

        $display = ("SELECT * FROM $dbName.player");
        $results = mysqli_query($db, $display);
        // pre_r($results);

        tableTemplate($results, ["Player_ID", "Name" ,"Age", "Position", "Overall_rating" , "Nationality"])
        ?>


     <?php
     $sql= ("SELECT Player_ID from $dbName.player");
     $results = mysqli_query($db, $sql);

     form_edit_Template($results, ["Name" ,"Age", "Position", "Overall_rating" , "Nationality"], ["text", "number", "text", "number", "text"])

     ?>

          <?php
          break;
        case 4:
          ?>

          <?php

            if(isset($_SESSION['message'])): ?>

            <div style="float:left" class="alert alert-<?=$_SESSION['msg_type']?>">
              <?php echo $_SESSION['message'];
                    unset($_SESSION['message']);
               ?>
             </div>
           <?php endif; ?>

        <div class="container">
          <?php
            $display = ("SELECT * FROM $dbName.salary");
            $results = mysqli_query($db, $display);

            tableTemplate($results, ["Player_ID", "Wage" ,"Value"])
           ?>

    
        <?php
          $sql= ("SELECT Player_ID from $dbName.player");
          $results = mysqli_query($db, $sql);

          form_edit_Template($results, ["Wage" ,"Value"], ["number", "number"])

          ?>

          <?php
          break;
        case 5:
        ?>

          <?php

            if(isset($_SESSION['message'])): ?>

            <div style="float:left" class="alert alert-<?=$_SESSION['msg_type']?>">
              <?php
                   echo $_SESSION['message'];
                    unset($_SESSION['message']);
               ?>
             </div>
           <?php endif; ?>

          <div class="container">
        <?php

            $display = ("SELECT * FROM $dbName.player_stats");
            $results = mysqli_query($db, $display);
            // pre_r($results);
             table2Template($results, ["Player_ID", "Acceleration" ,"Balance", "Ball_Control", "Crossing" , "Dribbling", "Finishing"])
          ?>


       <?php
          $sql= ("SELECT Player_ID from $dbName.player");
          $results = mysqli_query($db, $sql);

          formTemplate($results, ["Acceleration" ,"Balance", "Ball_Control", "Crossing" , "Dribbling", "Finishing"], ["number", "number", "number", "number", "number", "number"])
      ?>

     
      </div>

        <?php
          if (isset($_POST['insert'])) {
            $player_id= $_POST['Player_ID'];
            $Acceleration= $_POST['Acceleration'];
            $Balance= $_POST['Balance'];
            $Ball_Control= $_POST['Ball_Control'];
            $Crossing= $_POST['Crossing'];
            $Dribbling= $_POST['Dribbling'];
            $Finishing= $_POST['Finishing'];


            $query = ("INSERT INTO $dbName.player_stats (Player_ID, Acceleration, Balance, Ball_Control, Crossing, Dribbling, Finishing)
            VALUES('$player_id', '$Acceleration', '$Balance', '$Ball_Control', '$Crossing', '$Dribbling', '$Finishing');");

            mysqli_query($db, $query) or die("CONNECTION PROBLEM");

            $_SESSION['message']= "Player stats has been Inserted!";
            $_SESSION['msg_type']= "success";

            header('Refresh: 0');

          }

        break;
      case 6:
        ?>

        <?php

          if(isset($_SESSION['message'])): ?>

          <div style="float:left" class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php echo $_SESSION['message'];
                  unset($_SESSION['message']);
             ?>
           </div>
         <?php endif; ?>

        <div class="container">
      <?php

        $display = ("SELECT * FROM $dbName.club");
        $results = mysqli_query($db, $display);
        // pre_r($results);
        table2Template($results, ["Player_ID", "Club"])
        ?>
  

     <?php
       $sql= ("SELECT Player_ID from $dbName.player");
       $results = mysqli_query($db, $sql);

       formTemplate($results, ["Club"], ["text"])

       ?>

        <?php


        if (isset($_POST['insert'])) {
          $player_id= $_POST['player_id'];
          $club= $_POST['club'];

          $query = ("INSERT INTO $dbName.club (Player_ID, Club)
          VALUES('$player_id', '$club');");

          mysqli_query($db, $query);

          $_SESSION['message']= "Club name has been Inserted!";
          $_SESSION['msg_type']= "success";


          header('Refresh: 0');

        }

        break;
      case 7:
        ?>

        <?php

          if(isset($_SESSION['message'])): ?>

          <div style="float:left" class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php echo $_SESSION['message'];
                  unset($_SESSION['message']);
             ?>
           </div>
         <?php endif; ?>

        <div class="container">
          <?php
          $display = ("SELECT * FROM $dbName.salary");
          $results = mysqli_query($db, $display);

            table2Template($results, ["Player_ID", "Wage" ,"Value"])
           ?>
                     
        <?php
          $sql= ("SELECT Player_ID from $dbName.player");
          $results = mysqli_query($db, $sql);

          formTemplate($results, ["Wage" ,"Value"], ["number", "number"])

          ?>

        <?php
        if (isset($_POST['insert'])) {
          $player_id= $_POST['player_id'];
          $Wage= $_POST['wage'];
          $Value= $_POST['value'];

          $query = ("INSERT INTO $dbName.salary (Player_ID, Wage, Value)
          VALUES('$player_id', '$Wage', '$Value');");

          mysqli_query($db, $query);

          $_SESSION['message']= "Salary has been Inserted!";
          $_SESSION['msg_type']= "success";


          header('Refresh: 0');

        }

        break;
      case 8:
        ?>

        <div class="container">
      <?php

        $display = ("SELECT * FROM $dbName.player");
        $results = mysqli_query($db, $display);
        // pre_r($results);

          table2Template($results, ["Player_ID", "Name" ,"Age", "Position", "Overall_rating" , "Nationality"])
        ?>
        
   </div>
        <?php

        break;
      case 9:
        ?>

      <div class="container">
        <?php

          $display = ("SELECT * FROM $dbName.player_stats");
          $results = mysqli_query($db, $display);
          // pre_r($results);

          table2Template($results, ["Player_ID", "Acceleration" ,"Balance", "Ball_Control", "Crossing" , "Dribbling", "Finishing"])
          ?>
          
     </div>

        <?php
        break;
      case 10:
          ?>

          <div class="container">
        <?php

          $display = ("SELECT * FROM $dbName.club");
          $results = mysqli_query($db, $display);
          // pre_r($results);

          table2Template($results, ["Player_ID", "Club"])
          ?>
          
   </div>

        <?php
        break;
      case 11:

          ?>

          <div class="container">
            <?php
            $display = ("SELECT * FROM $dbName.salary");
            $results = mysqli_query($db, $display);

            table2Template($results, ["Player_ID", "Wage" ,"Value"])
             ?>

          </div>

      <?php

        break;

      default:
        echo "nothing to display";
        break;
    }
  }
  else {
    $num = '';
  }
 ?>
</body>
</html>
