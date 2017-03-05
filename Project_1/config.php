<?php
    
    function connect(){
        $username = "vishusachdeva";
        $password = "v1kCjsvLYytrBTGV";
        return mysqli_connect("localhost", $username, $password, "project_1");
    }
    
    function check($url){
        $conn = connect();
        @$text = file_get_contents($url);
        preg_match('/<a href=\"javascript:void\(0\);\" data-section=\"city\"[^>]+>([^<]+)/', $text, $match);
	    $city = $match[1];
	    $sql = "SELECT id FROM city WHERE city='".$city."'";
    	$result = mysqli_query($conn, $sql);
    	$id = 0;
    	if (mysqli_num_rows($result) > 0){
    		while($row = mysqli_fetch_assoc($result)) $id = $row["id"];
    		return $id;
    	}
    	return 0;
    }
    
    function checkByCity($city){
        $conn = connect();
	    $sql = "SELECT id FROM city WHERE city='".$city."'";
    	$result = mysqli_query($conn, $sql);
    	$id = 0;
    	if (mysqli_num_rows($result) > 0){
    		while($row = mysqli_fetch_assoc($result)) $id = $row["id"];
    		return $id;
    	}
    	return 0;
    }
    
    function render($loc, $arr){
        extract($arr);
        require("views/".$loc);
    }
?>