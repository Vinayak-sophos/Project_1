<html>
    <head>
        <title>
            <?php $conn = connect(); echo $title; ?>
        </title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <h1 align="center">Colleges in <?php echo $title; ?> <small class="text-muted">Data Scraped from shiksha.com</small></h1><br>
    </head>
    <body style="background-color:#f2e6ff">
        <div class="container">
        <?php
            $sql = "SELECT * FROM info WHERE city_id=".$id;
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
        ?>
                <div class="table-responsive" style="box-shadow: 0px 0px 10px #888888;">
                <table class="table table-condensed table-hover table-striped table-bordered">
                    <tbody>
                    <tr><th>College ID</th><td><?php echo $row["college_id"]; ?></td></tr>
                    <tr><th>College Name</th><td><?php echo $row["title"]; ?></td></tr>
                    <tr><th>College Address</th><td><?php echo $row["loc"]; ?></td></tr>
                    <tr><th>Year of Establishment</th><td><?php echo $row["est"]; ?></td></tr>
                    <tr><th>URL</th><td><?php echo $row["url"]; ?></td></tr>
            <?php
                $sql = "SELECT infra FROM infra WHERE college_id=".$row["college_id"];
                $result2 = mysqli_query($conn, $sql);
                $i = 0;
                while($row2 = mysqli_fetch_assoc($result2)){
            ?>
                    <tr><th><?php if ($i == 0){ $i = 1; echo "Infrastrucure and other Facilities"; } ?></th><td><?php echo $row2["infra"]; ?></td></tr>
            <?php
                }
                $sql = "SELECT course FROM courses WHERE college_id=".$row["college_id"];
                $result2 = mysqli_query($conn, $sql);
                $i = 0;
                while($row2 = mysqli_fetch_assoc($result2)){
            ?>
                    <tr><th><?php if ($i == 0){ $i = 1; echo "Major Courses Offered"; } ?></th><td><?php echo $row2["course"]; ?></td></tr>
            <?php
                }
            ?>
                    </tbody>
                </table>
                </div>
                <br>
        <?php
            }
        ?>
        </div>
    </body>
</html>