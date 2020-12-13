<?php

// session_start();
//initilizing variables...

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "fifa";

$reg_errors = array();
$log_errors = array();

//connect to database..

$db = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die("!Could not Connect to Database!");



// session_destroy();
 ?>
