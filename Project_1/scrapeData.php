<?php
    require_once("config.php");
    $conn = connect();

	$text = file_get_contents($_GET["loc"]);
	
	$zero = 0;
	
	preg_match_all("/(<div class=\"clg-tpl-parent\">(?:(?:\n.*?)+(?=<div class=\"clg-tpl-parent\">))*)/", $text, $matches);
	
	foreach($matches[1] as $text2){
		
		$flag = 0;
		
		if (preg_match('/<h2 class=\"tuple-clg-heading\">[^>]+>([^<]+)<\/a>\n<p>\| ([^<]+)/', $text2, $match)) ;
		else break;
		$array["name"] = $match[1];
		$array["loc"] = $match[2];
		
		if (preg_match("/<div class=\"tuple-revw-sec\">\n<span><b>([^<]+)/", $text2, $match)) $array["review"] = $match[1];
		else $flag = 1;
		
		if (!$flag) $sql = "INSERT INTO info (city_id, title, loc, review) VALUES (".$_GET["id"].", '".$array["name"]."', '".$array["loc"]."', ".$array["review"].")";
		else $sql = "INSERT INTO info (city_id, title, loc) VALUES (".$_GET["id"].", '".$array["name"]."', '".$array["loc"]."')";
		mysqli_query($conn, $sql);
		$last_id = mysqli_insert_id($conn);
		
		preg_match_all("/<li class=\"emptyDesc\">\n.+\n.+\n<h3>([^<]+)/", $text2, $match);
		$array["fac"] = $match[1];
		foreach($array["fac"] as $fac){
			$sql = "INSERT INTO fac (college_id, fac) VALUES (".$last_id.", '".$fac."')";
			mysqli_query($conn, $sql);
		}
		
		$text = str_replace($text2, "", $text);
	}
	
	$flag = 0;
	preg_match('/<h2 class=\"tuple-clg-heading\">[^>]+>([^<]+)<\/a>\n<p>\| ([^<]+)/', $text, $match);
	$array["name"] = $match[1];
	$array["loc"] = $match[2];
	
	if (preg_match("/<div class=\"tuple-revw-sec\">\n<span><b>([^<]+)/", $text, $match)) $array["review"] = $match[1];
	else $flag = 1;
	
	if (!$flag) $sql = "INSERT INTO info (city_id, title, loc, review) VALUES (".$_GET["id"].", '".$array["name"]."', '".$array["loc"]."', ".$array["review"].")";
	else $sql = "INSERT INTO info (city_id, title, loc) VALUES (".$_GET["id"].", '".$array["name"]."', '".$array["loc"]."')";
	mysqli_query($conn, $sql);
	$last_id = mysqli_insert_id($conn);
	
	preg_match_all("/<li class=\"emptyDesc\">\n.+\n.+\n<h3>([^<]+)/", $text, $match);
	$array["fac"] = $match[1];
	foreach($array["fac"] as $fac){
		$sql = "INSERT INTO fac (college_id, fac) VALUES (".$last_id.", '".$fac."')";
		mysqli_query($conn, $sql);
	}
	
?>