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
    <link rel="stylesheet" href="css/login.css">
    <title>Admin Login</title>
</head>
<body>
    <h3 align="left" style="margin-left:20px;"> <a href="index.php"> Back </a> </h3>
    <h1> Admin Login </h1>

    <form action="login.php" method="POST">
        <table align="center" border="1">
            <tr>
                <td> Username </td> <td align="right"> <input type="text" name="username" required></td>
            </tr>

            <tr>
                <td> Password </td> <td align="right"> <input type="password" name="password" required></td>
            </tr>

            <tr>
                <td colspan="2" align="center"> <input type="submit" name="login" value="Login"> </td>
            </tr>

        </table>
    </form>
    
</body>
</html>

<?php

include ('dbconn.php');

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql); 

    $rows = mysqli_num_rows($result);

    if ($rows > 0)
    {
        $data = mysqli_fetch_assoc($result);

        $id = $data['id'];

        $_SESSION['sid'] = $id;

        header ('location: admin/admindash.php');
        
    }
    else
    {
        header ('location: login.php');
      
    }
}
?>