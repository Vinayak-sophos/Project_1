<?php
	$text = file_get_contents("http://www.shiksha.com/b-tech/colleges/b-tech-colleges-chennai");
	preg_match_all('/<h2 class="tuple-clg-heading"><a href="([^?]+).+\n.+/', $text, $match);
	for($i = 0; $i < count($match[1]); $i++){
		$address = $match[1][$i];
?>
		<script>
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var json = this.responseText,
						obj = JSON.parse(json);
						console.log(obj.courses);
			    }
			};
			xhttp.open("GET", "fetch_info.php?q=<?php echo $address; ?>", true);
			xhttp.send();
		</script>
<?php
	}
?>