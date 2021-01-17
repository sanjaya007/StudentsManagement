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
    <link rel="stylesheet" href="../css/update.css">
    <title>Students Management System</title>
</head>
<body>
    <h3 align="right"> <a href="logout.php"> Log Out </a> </h3>
    <h3 align="left"> <a href="admindash.php"> Back </a> </h3>

    <div class="admintitle">
        <h1> Search and Update Students </h1>
    </div>

    <hr>

    <div class="search">
    <form action="updatestudents.php" method="post">
        <table align="center" border="1">
            <tr>
                <td> Enter Students Name : </td> <td> <input type="text" name="name"></td>
            </tr>

            <tr>
                <td> Standard : </td> <td> <input type="number" name="standard"></td>
            </tr>

            <tr>
                <td colspan="2"> <input type="submit" name="search" value="Search"></td>
            </tr>

        </table>
    </form>
    </div>

    <div class="result">
        <table align="center" border="1">
            <tr>
                <th> S.N </th>
                <th> Image </th>
                <th> Full Name </th>
                <th> Grade </th>
                <th> Roll No </th>
                <th> Address </th>
                <th> Contact </th>
                <th> Edit </th>
            </tr>
         
<?php

if(isset($_POST['search']))
{
    include ('../dbconn.php');

    $name = $_POST['name'];
    $standard = $_POST['standard'];

    $sql = "SELECT * FROM students WHERE standard = '$standard' AND name LIKE '%$name%'";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($result);

    if ($rows < 1)
    {
        echo "<tr> <td colspan='5'> No result found ! </td> </tr>";
    }
    else
    {
        $count = 0;
        while ($data=mysqli_fetch_assoc($result))
        {   
            $count++;
            ?>
            <tr>
                <td> <?php echo $count ?> </td>
                <td> <img src="../dataImages/<?php echo $data ['image']; ?>" style="max-width:150px;" > </td>
                <td> <?php echo $data ['name']?> </td>
                <td> <?php echo $data ['standard']?> </td>
                <td> <?php echo $data ['rollno']?> </td>
                <td> <?php echo $data ['city']?> </td>
                <td> <?php echo $data ['contact']?> </td>
                <td> <a href="updateform.php?uid=<?php echo $data['id']?>"> Edit </a>  <br> <br> <a href="delete.php?did=<?php echo $data['id']?>"> Delete </a> </td>
            </tr>

            <?php
        }
    }
}

?>
        </table>
    </div>

</body>
</html>

