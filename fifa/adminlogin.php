<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>ADMIN LOGIN</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- <div class="container"> -->
      <!-- <div class="header"> -->
        <!-- <h2 style="text-align:center">LOGIN</h2> -->
      <!-- </div> -->
      <form class="box" action="adminlogin_server.php" method="post">
        <h1>ADMIN LOGIN</h1>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password_1" placeholder="Password" required>
        <button type="submit" name="login_user" a href = "player_registration.php">Login</button>
        <!-- <p style="color:white">Not a user?<a href="registration.php"><b>Register Here<b></a></p> -->
      </form>
</body>
