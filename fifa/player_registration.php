<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta charset="utf-8">
  <title>PLAYER-REGISTRATIONFORM</title>
  <link rel="stylesheet" href="style1.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style2.css">
</head>
<body>
  <nav class="nav">
    <div class="logo">
      <h4>THE NAV</h4>
    </div>
    <ul class="nav-links">
      <li>
        <a href="home.php">HOME</a>
      </li>
      <li>
        <a href="player_registration.php">REGISTER</a>
      </li>
      <li>
        <a href="#">UPDATE</a>
        <ul>
          <li><a style="color: black" href="crud.php?choice=1">Player Stats</a></li>
          <li><a style="color: black" href="crud.php?choice=2">Club</a></li>
          <li><a style="color: black" href="crud.php?choice=3">Player Details</a></li>
          <li><a style="color: black" href="crud.php?choice=4">Salary</a></li>
        </ul>
      </li>
      <li>
        <a href="#">INSERT</a>
        <ul>
          <li><a style="color: black" href="crud.php?choice=5">Player Stats</a></li>
          <li><a style="color: black" href="crud.php?choice=6">Club</a></li>
          <li><a style="color: black" href="crud.php?choice=7">Salary</a></li>
        </ul>
      </li>
      <li>
        <a href="#">SEARCH</a>
        <ul>
          <li><a style="color: black" href="crud.php?choice=8">Player Details</a></li>
          <li><a style="color: black" href="crud.php?choice=9">Player Stats</a></li>
          <li><a style="color: black" href="crud.php?choice=10">Club</a></li>
          <li><a style="color: black" href="crud.php?choice=11">Salary</a></li>
        </ul>
      </li>
    </ul>
  </nav>
    <form class="reg-box" action="registration_server.php" method="post">

      <h1>Registration</h1>
      <div class="textbox">
        <i class="fas fa-id-badge"></i>
        <input type="number" name="playerid" placeholder="Player_ID" required>
      </div>

        <div class="textbox">
          <i class="fas fa-user"></i>
          <input type="text" name="name" placeholder="Player_Name" required>
        </div>

        <div class="textbox">
          <i class="fas fa-calendar-alt"></i>
          <input type="number" name="age" placeholder="Age" required>
        </div>

        <div class="textbox">
          <i class="fas fa-map-pin"></i>
          <input type="text" name="Position" placeholder="Position" required>
        </div>

        <div class="textbox">
          <i class="fas fa-star-half-alt"></i>
          <!-- <label for="password">Password : </label> -->
          <input type="number" name="overall_rating" placeholder="Overall_Rating" required>
        </div>

        <div class="textbox">
          <i class="fas fa-globe"></i>
          <!-- <label for="password">Password : </label> -->
          <input type="text" name="nationality" placeholder="Nationality" required>
        </div>
          <!-- <label for="password">Confirm Password : </label> -->

          <button class="btn" type="submit" name="reg_player">Register</button>
          <!-- <br>Already a user?<a href="login.php"><b>Login</b></a> -->
        <!-- <fieldset style="width:200px;border: 1px solid rgb(256,132,57); margin : auto;"> -->
        <!-- <div>
            <label for="username">Username : </label> -->
        <!-- </div> -->
        <!-- <div>
          <label for="email">Email : </label> -->
        <!-- </div> -->
            <!-- </fieldset> -->
      </form>
</body>
</html>
