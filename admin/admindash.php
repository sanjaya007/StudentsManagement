<?php
session_start();

if($_SESSION['sid'])
{
echo "";
}
else
{
    header ('location: ../login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Students Management System</title>
</head>
<body>
    <h3 align="right"> <a href="logout.php"> Log Out </a> </h3>

    <div class="admintitle">
        <h1> Welcome to Admin Dashboard </h1>
    </div>

    <div class="dashboard">
    <table border="1" align="center">

        <tr>
            <td>1. </td> <td> <a href="allStudents.php"> View All Students </a></td>
        </tr>

        <tr>
            <td>2. </td> <td> <a href="addstudents.php"> Insert Students Details </a></td>
        </tr>

        <tr>
            <td>3. </td> <td> <a href="updatestudents.php"> Search Student Details </a></td>
        </tr>

        
    </table>
    </div>

</body>
</html>