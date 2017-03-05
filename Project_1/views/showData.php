<?php if (!isset($title)) { require_once("../config.php"); $title = $_GET["title"]; $id = $_GET["id"]; } ?>
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
            if (mysqli_num_rows($result)){
                ?><blockquote class="blockquote-reverse text-muted">Showing <?php echo mysqli_num_rows($result); ?> Results</blockquote><?php
            }
            else{
                echo("<h3>Please Refresh the Page</h3>");
                exit;
            }
            while($row = mysqli_fetch_assoc($result)){
        ?>
                <div class="table-responsive" style="box-shadow: 0px 0px 10px #888888;">
                <table class="table table-condensed table-hover table-striped table-bordered">
                    <tbody>
                    <tr><th class="col-xs-4 col-sm-4 col-md-4 col-lg-4">College ID</th><td><?php echo $row["college_id"]; ?></td></tr>
                    <tr><th class="col-xs-4 col-sm-4 col-md-4 col-lg-4">College Name</th><td><?php echo $row["title"]; ?></td></tr>
                    <tr><th class="col-xs-4 col-sm-4 col-md-4 col-lg-4">College Address</th><td><?php echo $row["loc"]; ?></td></tr>
                    <tr><th class="col-xs-4 col-sm-4 col-md-4 col-lg-4">Reviews</th><td><?php if ($row["review"]) echo $row["review"]; else echo "-"; ?></td></tr>
            <?php
                $sql = "SELECT fac FROM fac WHERE college_id=".$row["college_id"];
                $result2 = mysqli_query($conn, $sql);
                $i = 0;
                while($row2 = mysqli_fetch_assoc($result2)){
            ?>
                    <tr><th class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><?php if ($i == 0){ $i = 1; echo "Facilities"; } ?></th><td><?php echo $row2["fac"]; ?></td></tr>
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