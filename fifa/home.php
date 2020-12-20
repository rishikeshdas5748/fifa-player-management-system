<?php
session_start();
if (!isset($_SESSION['username'])) {
  echo $_SESSION['msg'] = "!YOU MUST LOG IN TO VIEW THIS PAGE!";
  header('location: adminlogin.php');
  exit();
}
if(isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['username']);
  header('location: adminlogin.php');
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style2.css">
  <title>HOME</title>
</head>

<body class="bodycls">
  <?php include('nav.php'); ?>
</body>

</html>
