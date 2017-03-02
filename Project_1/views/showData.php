<html>
    <head>
        <?php $conn = connect(); ?>
        <title>
            <?php echo $title; ?>
        </title>
    </head>
    <body>
        <?php
            sleep(3);
            $sql = "SELECT * FROM info WHERE city_id=".$id;
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
        ?>
                <table>
                    <tr><td>College ID</td><td><?php echo $row["college_id"]; ?></td></tr>
                    <tr><td>College Name</td><td><?php echo $row["title"]; ?></td></tr>
                    <tr><td>College Address</td><td><?php echo $row["loc"]; ?></td></tr>
                    <tr><td>Year of Establishment</td><td><?php echo $row["est"]; ?></td></tr>
                    <tr><td>URL</td><td><?php echo $row["url"]; ?></td></tr>
            <?php
                $sql = "SELECT infra FROM infra WHERE college_id=".$row["college_id"];
                $result2 = mysqli_query($conn, $sql);
                $i = 0;
                while($row2 = mysqli_fetch_assoc($result2)){
            ?>
                    <tr><td><?php if ($i == 0){ $i = 1; echo "Infrastrucure and other Facilities"; } ?></td><td><?php echo $row2["infra"]; ?></td></tr>
            <?php
                }
                $sql = "SELECT course FROM courses WHERE college_id=".$row["college_id"];
                $result2 = mysqli_query($conn, $sql);
                $i = 0;
                while($row2 = mysqli_fetch_assoc($result2)){
            ?>
                    <tr><td><?php if ($i == 0){ $i = 1; echo "Courses Offered"; } ?></td><td><?php echo $row2["course"]; ?></td></tr>
            <?php
                }
            ?>
                </table>
                <br>
        <?php
            }
        ?>
    </body>
</html>