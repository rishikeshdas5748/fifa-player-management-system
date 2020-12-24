<?php
session_start();
include('database.php');
// include('edit_template.php');

$tablenum = $_POST['tablenum'];
// $Acceleration = mysqli_real_escape_string($db, $_POST['Acceleration']);
// $Balance = mysqli_real_escape_string($db, $_POST['Balance']);
// $Ball_Control = mysqli_real_escape_string($db, $_POST['Ball_Control']);
// $Crossing = mysqli_real_escape_string($db, $_POST['Crossing']);
// $Dribbling = mysqli_real_escape_string($db, $_POST['Dribbling']);
// $Finishing = mysqli_real_escape_string($db, $_POST['Finishing']);

// $Namee = mysqli_real_escape_string($db, $_POST['Namee']);
// $Age = mysqli_real_escape_string($db, $_POST['Age']);
// $Position = mysqli_real_escape_string($db, $_POST['Position']);
// $Overall_rating = mysqli_real_escape_string($db, $_POST['Overall_rating']);
// $Nationality = mysqli_real_escape_string($db, $_POST['Nationality']);

// $club = mysqli_real_escape_string($db, $_POST['Club']);

// $Wage = mysqli_real_escape_string($db, $_POST['Wage']);
// $Valuee = mysqli_real_escape_string($db, $_POST['Valuee']);

// $Player_ID = mysqli_real_escape_string($db, $_POST['Player_ID']);
// if(isset($_POST['edit']))
// {

    if($tablenum == 1)
    {
        $Player_ID = $_POST['Player_iD'];

        $sql = ("UPDATE player_stats SET Acceleration = {$_POST['Acceleration']},
        Balance = {$_POST['Balance']}, Ball_control = {$_POST['Ball_control']},
        Crossing = {$_POST['Crossing']}, Dribbling = {$_POST['Dribbling']}, Finishing = {$_POST['Finishing']}
        WHERE Player_ID = $Player_ID");

        mysqli_query($db, $sql);

        header("Location:crud.php?choice= $tablenum");
    }

    elseif($tablenum == 2)
    {
        $Player_ID = $_POST['Player_iD'];
        
        $sql = ("UPDATE club SET Club = '{$_POST['Club']}'
        WHERE Player_ID = $Player_ID");

        mysqli_query($db, $sql);

        header("Location:crud.php?choice= $tablenum");

    }

    elseif($tablenum == 3)
    {
        $Player_ID = $_POST['Player_iD'];

        $sql = ("UPDATE salary SET Wage = {$_POST['Wage']}, Valuee = {$_POST['Valuee']}
        WHERE Player_ID = $Player_ID");

        mysqli_query($db, $sql);

        header("Location:crud.php?choice= $tablenum");
    }

    elseif($tablenum == 4)
    {
        $Player_ID = $_POST['Player_iD'];

        $sql = ("UPDATE player SET Namee = '{$_POST['Namee']}',  Age = {$_POST['Age']}, Position = '{$_POST['Position']}',
        Overall_rating = {$_POST['Overall_rating']}, Nationality = '{$_POST['Nationality']}'
        WHERE Player_ID = $Player_ID");

        mysqli_query($db, $sql);

        header("Location:crud.php?choice= $tablenum");
    }

    else
    {
        echo "!!NOTHING IS UPDATED!!";
    }

// }

?>
