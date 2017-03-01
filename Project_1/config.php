<?php
    
    function connect(){
        $username = "vishusachdeva";
        $password = "v1kCjsvLYytrBTGV";
        return mysqli_connect("localhost", $username, $password, "project_1");
    }
    
    function render($loc, $arr){
        extract($arr);
        require("views/".$loc);
    }
?>