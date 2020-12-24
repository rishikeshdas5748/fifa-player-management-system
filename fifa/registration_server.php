<?php
session_start();
include('database.php');
  //Register user...

  $player_id = mysqli_real_escape_string($db, $_POST['playerid']);
  $player_name = mysqli_real_escape_string($db, $_POST['Namee']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $Position = mysqli_real_escape_string($db, $_POST['Position']);
  $overall_rating = mysqli_real_escape_string($db, $_POST['overall_rating']);
  $nationality = mysqli_real_escape_string($db, $_POST['nationality']);

    // //form validation...


    if(empty($player_id)) { array_push($reg_errors, "PLAYER_ID IS REQUIRED");}
    if(empty($player_name)) { array_push($reg_errors, "PLAYER_NAME IS REQUIRED");}
    if(empty($age)) { array_push($reg_errors, "AGE IS REQUIRED");}
    if(empty($Position)){ array_push($reg_errors, "POSITION IS REQUIRED");}
    if(empty($overall_rating)) { array_push($reg_errors, "OVERALL_RATING IS REQUIRED");}
    if(empty($nationality)) { array_push($reg_errors, "NATIONALITY IS REQUIRED");}
        //Checking Database for Existing users with same cridentials...
        $check_same_playerid = ("SELECT * FROM player WHERE Player_ID ='$player_id' LIMIT 1;");
        $results = mysqli_query($db, $check_same_playerid);
        $user = mysqli_fetch_assoc($results);

        if($user) {
          if($user['Player_ID'] == $player_id) {
            array_push($reg_errors, "!Player_ID ALLREADY EXISTS!");
          }
        }
        include('reg_errors.php');

    //Registering the user if no errors found...

    if (count($reg_errors) == 0) {
      $query = ("INSERT INTO $dbName.player (Player_ID, Namee, Age, Position, Overall_rating, Nationality) VALUES('$player_id', '$player_name', '$age', '$Position', '$overall_rating', '$nationality');");
      mysqli_query($db, $query);
      $_SESSION['playerid'] = $player_id;
      $_SESSION["Success"] = "You are now logged in";
      header('location: home.php');
    }
    //Registering the users is finished...

// session_destroy();



 ?>
