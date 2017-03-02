<?php
    require("config.php");
    $conn = connect();
    $sql = "TRUNCATE city";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE info";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE infra";
    mysqli_query($conn, $sql);
    $sql = "TRUNCATE courses";
    mysqli_query($conn, $sql);
?>