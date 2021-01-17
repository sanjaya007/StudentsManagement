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
    <link rel="stylesheet" href="../css/all.css">
    <title>Students Management System</title>
</head>
<body>
    <h3 align="right"> <a href="logout.php"> Log Out </a> </h3>
    <h3 align="left"> <a href="admindash.php"> Back </a> </h3>

    <div class="admintitle">
        <h1> All Students Details </h1>
    </div>

    <div class="all">
        <table border="1" align="center">
            <tr>
                <th> S.N </th>
                <th> Image </th>
                <th> Full Name </th>
                <th> Grade </th>
                <th> Roll No </th>
                <th> Address </th>
                <th> Contact </th>
            </tr>

            
                <?php

                    include ('../dbconn.php');

                    $sql = "SELECT * FROM students";
                    $result = mysqli_query($conn, $sql);
                    
                    $counter = 0;
                    while($data = mysqli_fetch_assoc($result)){

                        $counter++;

                        ?>
                            
                            <tr>
                                <td> <?php echo $counter; ?></td>
                                <td> <img src="../dataImages/<?php echo $data['image'];?>" style="max-width:100px;" ></td>
                                <td> <?php echo $data['name']; ?></td>
                                <td> <?php echo $data['standard']?></td>
                                <td> <?php echo $data['rollno'] ?></td>
                                <td> <?php echo $data['city'] ?></td>
                                <td> <?php echo $data['contact'] ?></td>
                            </tr>

                        <?php
                    }

                ?>
            

        </table>
    </div>

</body>
</html>
