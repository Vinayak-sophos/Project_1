<?php
    
    require_once("config.php");

    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        render("inputPage.php", ["title" => "Input Page"]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST"){
        header("Location: scrapeData.php?loc=".$_POST["loc"]);
        render("showData.php", ["title" => "Scraped Data"]);
    }
?>