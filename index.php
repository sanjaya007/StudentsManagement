<?php
    session_start();

    if(isset($_SESSION['sid']))
    {
        header('location:admin/admindash.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Students Management System </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h3 align="right" style="margin-right:20px;"> <a href="login.php"> Admin Login </a> </h3>

    <div class="banner">
    <h1 align="center"> Welcome to Students Management System</h1>
    </div>

    <form action="index.php" method="POST">
    <table align="center" style="width:20%;" border="1">
        <tr>
            <td colspan = "2" align="center"> Students Information</td>
        </tr>
        <tr>
            <td align="left"> Choose Standards</td> 
            <td>
                <select name="std">
                    <option value="1"> 1st </option>
                    <option value="2"> 2nd </option>
                    <option value="3"> 3rd </option>
                    <option value="4"> 4th </option>
                    <option value="5"> 5th </option>
                    <option value="6"> 6th </option>
                    <option value="7"> 7th </option>
                    <option value="8"> 8th </option>
                    <option value="9"> 9th </option>
                    <option value="10"> 10th </option>
                    <option value="11"> 11th </option>
                    <option value="12"> 12th </option>
                    <option value="13"> 13th </option>
                    <option value="14"> 14th </option>
                    <option value="15"> 15th </option>
                    <option value="16"> 16th </option>
                    <option value="17"> 17th </option>
                </select>
            </td>
        </tr>

        <tr>
            <td align="left"> Enter Rollno </td> 
            <td>
                <input type="number" name="rollno">
            </td>
        </tr>

        <tr>
            <td colspan = "2" align="center"> <input type="submit" name="details" value="Show Details"></td>
        </tr>

    </table>
    </form>
     
</body>
</html>

<?php

    include ('dbconn.php');
    include ('functions/showDetails.php');

    if(isset($_POST['details']))
    {
        $grade = $_POST['std'];
        $rollno = $_POST['rollno'];

        showDetails($grade, $rollno);
    }
?>