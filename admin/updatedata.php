<?php
    include ('../dbconn.php');

        $rollno = $_POST['rollno'];
        $name = $_POST['name'];
        $city = $_POST['city'];
        $contact = $_POST['contact'];
        $standard = $_POST['standard'];
        $id = $_POST['hid'];

        $sql = "UPDATE students SET rollno = '$rollno', name = '$name', city = '$city', contact='$contact', standard='$standard' WHERE id = '$id' ";
        $result = mysqli_query($conn, $sql);

        if ($result)
        {
            ?>
            <script>
                alert('Data Updated Successfully !');
                window.open('updateform.php?uid=<?php echo $id ?>', '_self');
            </script>
            <?php
        }

        
    
?>