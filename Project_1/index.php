<?php
    
    require_once("config.php");

    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        render("inputPage.php", ["title" => "Input Page"]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $loc = $_POST["loc"];
        require("scrapeData.php");
    }
?>