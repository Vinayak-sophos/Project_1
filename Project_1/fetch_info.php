<?php
    $text = file_get_contents($_GET["q"]);
    preg_match_all("/<h1 class=\"head-3 right-head\">([^<]+)/", $text, $match);
    for($i = 0; $i < count($match[1]); $i++){
        $array[$i]["title"] = $match[1][$i];
    }
    preg_match_all("/<span class=\"location-of-clg\">, ([^<]+)<\/span><\/h1>/", $text, $match);
    for($i = 0; $i < count($match[1]); $i++){
        $array[$i]["loc"] = $match[1][$i];
    }
    preg_match_all("/Established ([0-9]+)/", $text, $match);
    for($i = 0; $i < count($match[1]); $i++){
        $array[$i]["est"] = $match[1][$i];
    }
    preg_match_all("//", $text, $match);
    for($i = 0; $i < count($match[1]); $i++){
        $array[$i]["courses"] = $match[1][$i];
    }
    echo json_encode($array,JSON_PRETTY_PRINT);
?>