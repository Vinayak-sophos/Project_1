<?php
    
    require_once("config.php");
    
    ?><link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script>
        function gif_loader(i){
            document.body.style.opacity=0.4;
            document.getElementById('gif-loader').style.display='block';
            var inp = document.getElementsByTagName('button');
            Object.keys(inp).forEach(key => inp[key].disabled='disabled');
            if (i) document.getElementById("url").submit();
            else document.getElementById("city").submit();
        }
    </script><?php
    
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        ?><div id="gif-loader" style="display:none;position:fixed;z-index:4;top:35%;left:46%" align="center"><img src="img/gif-loader.gif"></div><?php
        render("inputPage.php", ["title" => "Input Page"]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $loc = $_POST["loc"];
        if (!filter_var($loc, FILTER_VALIDATE_URL) !== false){
            echo("<script>alert('Please Enter Valid URL');</script>");
	        ?><div class="container" align="center">
                <h3>Please Enter Valid URL</h3>
                <button type="button" onclick="location.href='/';" class="btn btn-primary">Go Home</button>
            </div><?php
	        exit;
        }
        $loc = preg_replace('/\?.+/', "", $loc);
        $loc = preg_replace('/-[0-9]+/', "", $loc);
        
        @$text = file_get_contents($loc);
        preg_match('/<a href=\"javascript:void\(0\);\" data-section=\"city\"[^>]+>([^<]+)/', $text, $match);
	    $city = $match[1];
	    if (!$city){
	        echo("<script>alert('Please Enter Valid URL');</script>");
	        ?><div class="container" align="center">
                <h3>Please Enter Valid URL</h3>
                <button type="button" onclick="location.href='/';" class="btn btn-primary">Go Home</button>
            </div><?php
	        exit;
	    }
	    $last_id = check($loc);
        if (!$last_id){
            $conn = connect();
            $sql = "INSERT INTO city (city) VALUES('".$city."')";
	        mysqli_query($conn, $sql);
	        $last_id = mysqli_insert_id($conn);
	        while(true){
?>
        <script>
            var xhttp = new XMLHttpRequest();
			xhttp.open("GET", "scrapeData.php?loc=<?php echo $loc; ?>&id=<?php echo $last_id; ?>", false);
			xhttp.send();
        </script>
<?php
	            $text = file_get_contents($loc);
	            $z = preg_match('/<li class="next linkpagination"><a.+?href\s*=\s*([^>]+)/', $text, $match);
	            if ($z) $loc = $match[1];
	            else{
?>
        <div id="script" style="background-color:#f2e6ff; margin-top:-20px;"></div>
        <script>
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("script").innerHTML = this.responseText;
                }
            }
			xhttp.open("GET", "views/showData.php?title=<?php echo $city; ?>&id=<?php echo $last_id; ?>", true);
			xhttp.send();
        </script>
<?php
	                break;
	            }
	        }
        }
        else{
            render("showData.php", ["title" => $city, "id" => $last_id]);
        }
    }
?>