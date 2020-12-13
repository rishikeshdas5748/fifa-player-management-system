<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>ERRORS</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php if(count($log_errors) > 0) :  ?>
  <div>
    <?php foreach ($log_errors as $error) : ?>
      <p><?php echo $error ?> </p>
    <?php endforeach ?>
  </div>
<?php endif ?>
  <button type="submit"><a href="adminlogin.php">Tryagain</a></button>
</body>
</html>
