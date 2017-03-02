<?php
    
    require("config.php");
    
    $conn = connect();
    
    $text = file_get_contents($_GET["q"]);
    
    preg_match_all("/<h1 class=\"head-3 right-head\">([^<]+)/", $text, $match);
    $array["title"] = $match[1];
    
    preg_match_all("/<span class=\"location-of-clg\">, [^,]+,([^<]+)<\/span><\/h1>/", $text, $match);
    $array["loc1"] = $match[1];
    
    preg_match_all("/<p class=\"query-head\">Main Address<\/p>\n<p class=\"c-num\">([^<]+)<\/p>/", $text, $match);
    $array["loc2"] = $match[1];
    
    preg_match_all("/<span class=\"location-of-clg\">, ([^,]+),[^<]+<\/span><\/h1>/", $text, $match);
    $array["loc2"][0] .= "<br>".$match[1][0];
    
    preg_match_all("/Established ([0-9]+)/", $text, $match);
    $array["est"] = $match[1];
    
    preg_match_all("/<li class=\"\">\n\s*<a[^>]+>([^<]+)/", $text, $match);
    $array["infra"] = $match[1];
    
    preg_match_all("/<span class=\"para-2\">([^<]+)<\/span>/", $text, $match);
    $array["fac"] = preg_split('/\s*\|\s*/', $match[1][0]);
    
    preg_match_all("/<p class=\"c-num\">[^>]+>([^<]+)<\/a><\/p>/", $text, $match);
    $array["web"] = $match[1];
    
    $text = file_get_contents($_GET["q"]."/courses");
    
    preg_match_all("/<h5 class=\"tpl-course-name\"><[^>]+>([^<]+)<\/a><\/h5>/", $text, $match);
    $array["courses"] = $match[1];
    
    $sql = "INSERT INTO info (city_id, title, loc, est, url) VALUES (".$_GET['city_id'].", '".$array['title'][0]."', '".$array['loc2'][0]."', '".$array['est'][0]."', '".$array['web'][0]."')";
    mysqli_query($conn, $sql);
    
	$last_id = mysqli_insert_id($conn);
    
    foreach($array["infra"] as $inf){
        $sql = "INSERT INTO infra (college_id, infra) VALUES(".$last_id.", '".$inf."')";
        mysqli_query($conn, $sql);
    }
    
    foreach($array["fac"] as $inf){
        $sql = "INSERT INTO infra (college_id, infra) VALUES(".$last_id.", '".$inf."')";
        mysqli_query($conn, $sql);
    }
    
    foreach($array["courses"] as $inf){
        $sql = "INSERT INTO courses (college_id, course) VALUES(".$last_id.", '".$inf."')";
        mysqli_query($conn, $sql);
    }
    
?>