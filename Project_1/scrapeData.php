<?php
    require_once("config.php");
    $conn = connect();

	$text = file_get_contents($loc);
	
	preg_match('/<a href=\"javascript:void\(0\);\" data-section=\"city\"[^>]+>([^<]+)/', $text, $match);
	$city = $match[1];
	$sql = "SELECT id FROM city WHERE city='".$city."'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)) $id = $row["id"];
        render("showData.php", ["title" => $match[1], "id" => $id]);
		exit;
	}
	
	$sql = "INSERT INTO city (city) VALUES('".$match[1]."')";
	mysqli_query($conn, $sql);
	
	$last_id = mysqli_insert_id($conn);
	
	preg_match_all('/<h2 class="tuple-clg-heading"><a href="([^?]+).+\n.+/', $text, $match);
?>
		<script>
<?php
	for($i = 0; $i < count($match[1]); $i++){
		$address = $match[1][$i];
?>
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
						console.log(this.responseText);
			    }
			};
			xhttp.open("GET", "fetch_info.php?q=<?php echo $address; ?>&city_id=<?php echo $last_id; ?>", true);
			xhttp.send();
<?php
	}
?>
		</script>
<?php
	render("showData.php", ["title" => $city, "id" => $last_id]);
?>