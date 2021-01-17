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
    <link rel="stylesheet" href="../css/addstudents.css">
    <title>Students Management System</title>
</head>
<body>
    <h3 align="right"> <a href="logout.php"> Log Out </a> </h3>
    <h3 align="left"> <a href="admindash.php"> Back </a> </h3>

    <div class="admintitle">
        <h1> Welcome to Admin Dashboard </h1>
    </div>

    
    <form action="addstudents.php" method="post" enctype="multipart/form-data">
        <table border="1" align="center">
            <tr>
                <th> Roll No </th>
                <td> <input type="number" name="rollno" placeholder="Enter Roll Number ........" required></td>
            </tr>

            <tr>
                <th> FullName </th>
                <td> <input type="text" name="name" placeholder="Enter Full Name ........" required></td>
            </tr>

            <tr>
                <th> City </th>
                <td> <input type="text" name="city" placeholder="Enter City Name ........" required> </td>
            </tr>

            <tr>
                <th> Contact </th>
                <td> <input type="number" name="contact" placeholder="Enter Contact Number ........" required> </td>
            </tr>

            <tr>
                <th> Standard </th>
                <td> <input type="number" name="standard" placeholder="Enter Grade Standards ........" required> </td>
            </tr>

            <tr>
                <th> Image </th>
                <td> <input type="file" name="image" required> </td>
            </tr>

            <tr>
                <td colspan="2"> <input type="submit" name="add" value="Add"></td>    
            </tr>

        </table>
    </form>

<?php
    
    include '../dbconn.php';

    if(isset($_POST['add']))
    {
        $rollno = $_POST['rollno'];
        $name = $_POST['name'];
        $city = $_POST['city'];
        $contact = $_POST['contact'];
        $standard = $_POST['standard'];
        $imagename = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        
        move_uploaded_file($tempname, "../dataImages/$imagename");

        

        $sql = "INSERT INTO students (rollno, name, city, contact, standard, image) VALUES ('$rollno', '$name', '$city', '$contact', '$standard', '$imagename')";

        $result = mysqli_query($conn, $sql);

        if ($result == true)
        {
            ?>
            <script>
            alert('Data inserted successfully !');
            </script>
            <?php
        }
    }


?>
    
</body>
</html>