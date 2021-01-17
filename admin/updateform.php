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

<?php
    include ('../dbconn.php');

    $uid = $_GET['uid'];

    $sql = "SELECT * FROM students WHERE id = '$uid'";
    $result = mysqli_query($conn, $sql);

    $data = mysqli_fetch_assoc($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/updateform.css">
    <title>Students Management System</title>
</head>
<body>
    <h3 align="right"> <a href="logout.php"> Log Out </a> </h3>
    <h3 align="left"> <a href="updatestudents.php"> Back </a> </h3>

    <div class="admintitle">
        <h1> Update Students  </h1>
    </div>

    <hr>


    <div class="update">
    <form action="updatedata.php" method="post">
        <table border="1" align="center">

            <tr>
                
                <td colspan="2"> <img src="../dataImages/<?php echo $data['image']; ?>" style="max-width:100px;"> </td>
            </tr>

            <tr>
                <th> Roll No </th>
                <td> <input type="number" name="rollno" value="<?php echo $data['rollno']; ?>" placeholder="Enter Roll Number ........" required></td>
            </tr>

            <tr>
                <th> FullName </th>
                <td> <input type="text" name="name" value="<?php echo $data['name']; ?>" placeholder="Enter Full Name ........" required></td>
            </tr>

            <tr>
                <th> City </th>
                <td> <input type="text" name="city" value="<?php echo $data['city']; ?>" placeholder="Enter City Name ........" required> </td>
            </tr>

            <tr>
                <th> Contact </th>
                <td> <input type="number" name="contact" value="<?php echo $data['contact']; ?>" placeholder="Enter Contact Number ........" required> </td>
            </tr>

            <tr>
                <th> Standard </th>
                <td> <input type="number" name="standard" value="<?php echo $data['standard']; ?>" placeholder="Enter Grade Standards ........" required> </td>
            </tr>

            

            <tr>
                <td colspan="2"> <input type="hidden" name="hid" value="<?php echo $data['id'];?>"> <input type="submit" name="update" value="Update"></td>    
            </tr>

        </table>
    </form>

    </div>


</body>
</html>