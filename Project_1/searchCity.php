<?php
    require_once("config.php");
    ?><link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"><?php
    $conn = connect();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (!isset($_POST["city"]) || empty($_POST["city"])){
            echo("<script>alert('Please Enter Valid City Name');</script>");
            ?><div class="container" align="center">
                <h3>Please Enter Valid City Name</h3>
                <button type="button" onclick="location.href='/';" class="btn btn-primary">Go Home</button>
            </div><?php
            exit;
        }
        else{
            $sql = "SELECT * FROM city WHERE city='".$_POST["city"]."'";
            $id = checkByCity($_POST["city"]);
            if (!$id){
                ?><div class="container" align="center">
                    <h3>Sorry!! Data for <?php echo $_POST["city"]; ?> has not yet scraped</h3>
                    <button type="button" onclick="location.href='/';" class="btn btn-primary">Go Home</button>
                </div><?php
                exit;
            }
            render("showData.php", ["title" => $_POST["city"], "id" => $id]);
        }
    }
    else header("Location: /");
?>