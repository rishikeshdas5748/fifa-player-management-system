<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>ERRORS</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php if(count($reg_errors) > 0) :  ?>
  <div>
    <?php foreach ($reg_errors as $errors) : ?>
      <p><?php echo $errors ?> </p>
    <?php endforeach ?>
  </div>
<?php endif ?>
  <button type="submit"><a href="player_registration.php">Tryagain</a></button>
</body>
</html>
