<?php include('database.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>PHP CRUD</title>
  <link href = "./bootstrap/css/bootstrap.min.css" rel = "stylesheet">
  <script src= "./bootstrap/js/bootstrap.min.js"></script>
  <script src= "./bootstrap/js/jquery.min.js"></script>
  <script src= "./bootstrap/js/popper.js"></script>
  <script src= "./bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
  <body>
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

    <div class="row justify-content-center">
        <form action="" method="POST">
          <div class="form-group">
            <label>Accelaration</label>
            <input type="number" name="Accelaration" class="form-control" value="Enter the Accelaration">
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
      
      <?php
      if (isset($_POST['insert'])) {
        $Accelaration= $_POST['Accelaration'];
        $Balance= $_POST['Balance'];
        $Ball_Control= $_POST['Ball_Control'];
        $Crossing= $_POST['Crossing'];
        $Dribbling= $_POST['Dribbling'];
        $Finishing= $_POST['Finishing'];

        $query = ("INSERT INTO $dbName.player_stats (Player_ID, Accelaration, Balance, Ball_Control, Crossing, Dribbling, Finishing)
         VALUES('', '$Accelaration', '$Balance', '$Ball_Control', '$Crossing', '$Dribbling', '$Finishing');");

      }

      break;
    case 6:
      ?>
      <div class="row justify-content-center">
        <form action="" method="POST">
          <div class="form-group">
                <label>Club</label>
                <input type="number" name="club" class="form-control" value="Enter the club name">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="insert">INSERT</button>
              </div>
            </form>
          </div>
      <?php
      break;
    case 7:
      ?>
      <div class="row justify-content-center">
        <form action="" method="POST">
          <div class="form-group">
                <label>Wage</label>
                <input type="number" name="wage" class="form-control" value="Enter the wage">
              </div>
              <div class="form-group">
                <label>Salary</label>
                <input type="number" name="salary" class="form-control" value="Enter the salary">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="insert">INSERT</button>
              </div>
            </form>
          </div>
      <?
      break;
    case 8:
      ?>

      <?
      break;
    case 9:
      ?>

      <?
      break;
    case 10:
      // code...
      break;
    case 11:
      // code...
      break;

    default:
      // code...
      break;
  }
}
else {
  $num = '';
}

 ?>
 </body>
 </html>
