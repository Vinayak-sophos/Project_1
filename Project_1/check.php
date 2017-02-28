<?php
	$text = file_get_contents("http://engineering.shiksha.com/be-btech-courses-in-chennai-2-ctpg");
	preg_match_all('/<a class="institute-title-clr" href="([^"]+)"[^>]+>[^<]+<\/a>/', $text, $match);
	for($i = 0; $i < count($match[1]); $i++){
		$address = $match[1][$i];
		print($address);
?>
		<script>
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					console.log(this.responseText);
			    }
			};
			xhttp.open("GET", "fetch_info.php?q=<?php echo $address; ?>", true);
			xhttp.send();
		</script>
<?php
		//print($text);
		// Fetching title and Location
		//preg_match_all("/<h1>\n?\s*\"([^\"]+)\"\n?\s*<span[^>]+>\n?\s*\"([^\"]+)\"\n?\s*<\/span>\n?\s*<\/h1>/", $text, $matches);
		//print_r($matches);
	}
?>