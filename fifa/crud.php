<?php
session_start();
include('database.php'); ?>
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

    <nav>
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

<?php
    if(isset($_GET['choice']))
    {
      $num = $_GET['choice'];
      switch ($num) {
        case 1:
          // code...
          break;
        case 2:
          // code...
          break;
        case 3:
          // code...
          break;
        case 4:
          // code...
          break;
        case 5:
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
          ?>
          <div class= "row justify-content-center">
              <table class="table">
                <thead>
                  <tr>
                    <th>Player_ID</th>
                    <th>Acceleration</th>
                    <th>Balance</th>
                    <th>Ball_Control</th>
                    <th>Crossing</th>
                    <th>Dribbling</th>
                    <th>Finishing</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <?php
                  while ($row = mysqli_fetch_assoc($results)): ?>
                  <tr>
                    <td><?php echo $row['Player_ID']; ?></td>
                    <td><?php echo $row['Acceleration']; ?></td>
                    <td><?php echo $row['Balance']; ?></td>
                    <td><?php echo $row['Ball_Control']; ?></td>                <!--  player_stats = 1,club = 2, salary = 3 -->
                    <td><?php echo $row['Crossing']; ?></td>
                    <td><?php echo $row['Dribbling']; ?></td>
                    <td><?php echo $row['Finishing']; ?></td>
                    <td>
                        <a href="process.php?delete=<?php echo $row['Player_ID'] ?>&table=1;"
                          class="btn btn-danger">DELETE</a>
                    </td>
                  </tr>
                <?php endwhile; ?>
              </table>
          </div>
          <?php
          // pre_r(mysqli_fetch_assoc($results));
          function pre_r( $array ){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
          }
       ?>

       <?php
       $sql= ("SELECT Player_ID from $dbName.player");
       $results = mysqli_query($db, $sql);

       ?>
      <div class="row justify-content-center">
          <form action="" method="POST">
            <div class="form-group">
              <label>PlayerID</label>

              <select name="player_id" id="player_id"  class="form-control">
                <?php
                 while ($row = mysqli_fetch_assoc($results)):
                  echo "<script>console.log('Debug Out:$row')</script>";
                  ?>

                  <option value=<?php echo $row["Player_ID"] ?>><?php echo $row["Player_ID"] ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Acceleration</label>
              <input type="number" name="Acceleration" class="form-control" value="Enter the Acceleration">
            </div>
            <div class="form-group">
              <label>Balance</label>
              <input type="number" name="Balance" class="form-control" value="Enter the Balance">
            </div>
            <div class="form-group">
              <label>Ball Control</label>
              <input type="number" name="Ball_Control" class="form-control" value="Enter the Ball Control">
            </div>
            <div class="form-group">
              <label>Crossing</label>
              <input type="number" name="Crossing" class="form-control" value="Enter the Crossing">
            </div>
            <div class="form-group">
              <label>Dribbling</label>
              <input type="number" name="Dribbling" class="form-control" value="Enter the Dribbling">
            </div>
            <div class="form-group">
              <label>Finishing</label>
              <input type="number" name="Finishing" class="form-control" value="Enter the Finishing">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" name="insert">INSERT</button>
            </div>
          </form>
        </div>
      </div>

        <?php
          if (isset($_POST['insert'])) {
            $player_id= $_POST['player_id'];
            $Acceleration= $_POST['Acceleration'];
            $Balance= $_POST['Balance'];
            $Ball_Control= $_POST['Ball_Control'];
            $Crossing= $_POST['Crossing'];
            $Dribbling= $_POST['Dribbling'];
            $Finishing= $_POST['Finishing'];


            $query = ("INSERT INTO $dbName.player_stats (Player_ID, Acceleration, Balance, Ball_Control, Crossing, Dribbling, Finishing)
            VALUES('$player_id', '$Acceleration', '$Balance', '$Ball_Control', '$Crossing', '$Dribbling', '$Finishing');");

            mysqli_query($db, $query);

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
        ?>
        <div class= "row justify-content-center">
            <table class="table">
              <thead>
                <tr>
                  <th>Player_ID</th>
                  <th>Club name</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <?php
                while ($row = mysqli_fetch_assoc($results)): ?>
                <tr>
                  <td><?php echo $row['Player_ID']; ?></td>
                  <td><?php echo $row['Club']; ?></td>
                  <td>
                    <a href="process.php?delete=<?php echo $row['Player_ID'] ?>&table=2;"
                      class="btn btn-danger">DELETE</a>
                  </td>
                </tr>
              <?php endwhile; ?>
            </table>
        </div>
        <?php
        // pre_r(mysqli_fetch_assoc($results));
        function pre_r( $array ){
          echo '<pre>';
          print_r($array);
          echo '</pre>';
        }
     ?>
     <?php
       $sql= ("SELECT Player_ID from $dbName.player");
       $results = mysqli_query($db, $sql);

       ?>

        <div class="row justify-content-center">
          <form action="" method="POST">

            <div class="form-group">
              <label>PlayerID</label>

              <select name="player_id" id="player_id"  class="form-control">
                <?php
                 while ($row = mysqli_fetch_assoc($results)):
                  echo "<script>console.log('Debug Out:$row')</script>";
                  ?>
                  <option value=<?php echo $row["Player_ID"] ?>><?php echo $row["Player_ID"] ?></option>
                <?php endwhile; ?>
              </select>
            </div>

            <div class="form-group">
                  <label>Club</label>
                  <input type="text" name="club" class="form-control" value="Enter the club name">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="insert">INSERT</button>
                </div>
              </form>
            </div>
          </div>
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
           ?>

           <div class= "row justify-content-center">
               <table class="table">
                 <thead>
                   <tr>
                     <th>Player_ID</th>
                     <th>Wage</th>
                     <th>Value</th>
                     <th colspan="2">Action</th>
                   </tr>
                 </thead>
                 <?php
                   while ($row = mysqli_fetch_assoc($results)): ?>
                   <tr>
                     <td><?php echo $row['Player_ID']; ?></td>
                     <td><?php echo $row['Wage']; ?></td>
                     <td><?php echo $row['Value']; ?></td>
                     <td>
                       <a href="process.php?delete=<?php echo $row['Player_ID'] ?>&table=3;"
                         class="btn btn-danger">DELETE</a>
                     </td>
                   </tr>
                 <?php endwhile; ?>
               </table>
           </div>
           <?php
           // pre_r(mysqli_fetch_assoc($results));
           function pre_r( $array ){
             echo '<pre>';
             print_r($array);
             echo '</pre>';
           }
        ?>
        <?php
          $sql= ("SELECT Player_ID from $dbName.player");
          $results = mysqli_query($db, $sql);

          ?>

        <div class="row justify-content-center">
          <form action="" method="POST">

            <div class="form-group">
              <label>PlayerID</label>

              <select name="player_id" id="player_id"  class="form-control">
                <?php
                 while ($row = mysqli_fetch_assoc($results)):
                  echo "<script>console.log('Debug Out:$row')</script>";
                  ?>

                  <option value=<?php echo $row["Player_ID"] ?>><?php echo $row["Player_ID"] ?></option>
                <?php endwhile; ?>
              </select>
            </div>

            <div class="form-group">
                  <label>Wage</label>
                  <input type="number" name="wage" class="form-control" value="Enter the wage">
                </div>
                <div class="form-group">
                  <label>Value</label>
                  <input type="number" name="value" class="form-control" value="Enter the salary">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="insert">INSERT</button>
                </div>
              </form>
            </div>
            </div>
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
        ?>
        <div class= "row justify-content-center">
            <table class="table">
              <thead>
                <tr>
                  <th>Player_ID</th>
                  <th>Player Name</th>
                  <th>Age</th>
                  <th>Position</th>
                  <th>Overall_Rating</th>
                  <th>Nationality</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <?php
                while ($row = mysqli_fetch_assoc($results)): ?>
                <tr>
                  <td><?php echo $row['Player_ID']; ?></td>
                  <td><?php echo $row['Name']; ?></td>
                  <td><?php echo $row['Age']; ?></td>
                  <td><?php echo $row['Position']; ?></td>                <!--  player_stats = 1, club = 2, salary = 3 , player = 4-->
                  <td><?php echo $row['Overall_rating']; ?></td>
                  <td><?php echo $row['Nationality']; ?></td>
                  <td>
                      <a href="process.php?delete=<?php echo $row['Player_ID'] ?>&table=4;"
                        class="btn btn-danger">DELETE</a>
                  </td>
                </tr>
              <?php endwhile; ?>
            </table>
        </div>
        <?php
        // pre_r(mysqli_fetch_assoc($results));
        function pre_r( $array ){
          echo '<pre>';
          print_r($array);
          echo '</pre>';
        }
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
          ?>
          <div class= "row justify-content-center">
              <table class="table">
                <thead>
                  <tr>
                    <th>Player_ID</th>
                    <th>Acceleration</th>
                    <th>Balance</th>
                    <th>Ball_Control</th>
                    <th>Crossing</th>
                    <th>Dribbling</th>
                    <th>Finishing</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <?php
                  while ($row = mysqli_fetch_assoc($results)): ?>
                  <tr>
                    <td><?php echo $row['Player_ID']; ?></td>
                    <td><?php echo $row['Acceleration']; ?></td>
                    <td><?php echo $row['Balance']; ?></td>
                    <td><?php echo $row['Ball_Control']; ?></td>                <!--  player_stats = 1,club = 2, salary = 3, player = 4 -->
                    <td><?php echo $row['Crossing']; ?></td>
                    <td><?php echo $row['Dribbling']; ?></td>
                    <td><?php echo $row['Finishing']; ?></td>
                    <td>
                        <a href="process.php?delete=<?php echo $row['Player_ID'] ?>&table=1;"
                          class="btn btn-danger">DELETE</a>
                    </td>
                  </tr>
                <?php endwhile; ?>
              </table>
          </div>
          <?php
          // pre_r(mysqli_fetch_assoc($results));
          function pre_r( $array ){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
          }
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
          ?>
          <div class= "row justify-content-center">
              <table class="table">
                <thead>
                  <tr>
                    <th>Player_ID</th>
                    <th>Club name</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <?php
                  while ($row = mysqli_fetch_assoc($results)): ?>
                  <tr>
                    <td><?php echo $row['Player_ID']; ?></td>
                    <td><?php echo $row['Club']; ?></td>
                    <td>
                      <a href="process.php?delete=<?php echo $row['Player_ID'] ?>&table=2;"
                        class="btn btn-danger">DELETE</a>
                    </td>
                  </tr>
                <?php endwhile; ?>
              </table>
          </div>
          <?php
          // pre_r(mysqli_fetch_assoc($results));
          function pre_r( $array ){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
          }
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
             ?>

             <div class= "row justify-content-center">
                 <table class="table">
                   <thead>
                     <tr>
                       <th>Player_ID</th>
                       <th>Wage</th>
                       <th>Value</th>
                       <th colspan="2">Action</th>
                     </tr>
                   </thead>
                   <?php
                     while ($row = mysqli_fetch_assoc($results)): ?>
                     <tr>
                       <td><?php echo $row['Player_ID']; ?></td>
                       <td><?php echo $row['Wage']; ?></td>
                       <td><?php echo $row['Value']; ?></td>
                       <td>
                         <a href="process.php?delete=<?php echo $row['Player_ID'] ?>&table=3;"
                           class="btn btn-danger">DELETE</a>
                       </td>
                     </tr>
                   <?php endwhile; ?>
                 </table>
             </div>
             <?php
             // pre_r(mysqli_fetch_assoc($results));
             function pre_r( $array ){
               echo '<pre>';
               print_r($array);
               echo '</pre>';
             }
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
