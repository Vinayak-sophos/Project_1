<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<?php
    require("config.php");
    $conn = connect();
    $sql = "TRUNCATE city";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE info";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE fac";
    mysqli_query($conn, $sql);
?>
<div class="container" align="center">
    <h3>Data Successfully Deleted</h3>
    <button type="button" onclick="location.href='/';" class="btn btn-primary">Go Home</button>
</div>