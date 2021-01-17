<?php

    function showDetails($grade, $rollno){
        include ('dbconn.php');

        $sql = "SELECT * FROM students WHERE rollno = '$rollno' AND standard = '$grade'";
        $result = mysqli_query($conn, $sql);

        $rows = mysqli_num_rows($result);

        if ($rows > 0)
        {
            $data = mysqli_fetch_assoc($result);
            ?>
                <div class="identity">
                <table border="1" align="center">
                    <tr>    
                        <th colspan="3"> Student Details </th>
                    </tr>

                    <tr>
                        <td rowspan="5"> <img src="dataImages/<?php echo $data['image']?>"> </td>
                        <th> Name : </th>
                        <td> <?php echo $data['name'] ?> </td>
                    </tr>

                    <tr>
                        <th> Grade : </th>
                        <td> <?php echo $data['standard'] ?> </td>
                    </tr>

                    <tr>
                        <th> Roll Number : </th>
                        <td> <?php echo $data['rollno'] ?> </td>
                    </tr>

                    <tr>
                        <th> Address : </th>
                        <td> <?php echo $data['city'] ?> </td>
                    </tr>

                    <tr>
                        <th> Contact : </th>
                        <td> <?php echo $data['contact'] ?> </td>
                    </tr>

                </table>
                </div>

            <?php
        }
        else
        {
            ?>
                <script>
                    alert('No Student found !');
                </script>
            <?php
        }

    }
?>