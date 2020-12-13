<?php
session_start();
include('database.php');
// //Login user...

if(isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password_1']);

  if(empty($username)){
    array_push($log_errors, "username is required");
  }
  if(empty($password)){
    array_push($log_errors, "password is required");
  }

  if(count($log_errors) == 0){
    $password = md5($password);

    $query = ("SELECT * FROM admintable WHERE user='$username' AND pass = '$password';");
    $results = mysqli_query($db, $query);

    if(mysqli_num_rows($results)){
      $_SESSION['username'] = $username;
      $_SESSION["Success"] = "Logged in Successfully";
      header('location: home.php');
    }else{
      array_push($log_errors, "Wrong user name and password. Please try again.");
    }
  }
  include('log_errors.php');
}


 ?>
