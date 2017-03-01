<?php
	$text = file_get_contents($_GET["loc"]);
	preg_match_all('/<h2 class="tuple-clg-heading"><a href="([^?]+).+\n.+/', $text, $match);
	for($i = 0; $i < count($match[1]); $i++){
		$address = $match[1][$i];
?>
		<script>
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var json = this.responseText;
						//obj = JSONparse(json);
						console.log(this.responseText);
			    }
			};
			xhttp.open("GET", "fetch_info.php?q=<?php echo $address; ?>", true);
			xhttp.send();
		</script>
<?php
	}
?>