<?php
    include ('../dbconn.php');

    $id = $_GET['did'];

    $sql = "DELETE FROM students WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (result)
    {
        ?>
            <script>
                window.open('updatestudents.php', '_self');
            </script>
        <?php
    }

?>