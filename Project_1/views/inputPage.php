<html>
    <head>
        <title>
            <?php echo($title); ?>
        </title>
    </head>
    <body style="background-color:#f2e6ff;">
        <div class="container" style=";width:60%;position:fixed;top:10%;left:20%;">
        <div class="jumbotron" align="center" style="font-family:helvetica; color:#FFFFFF;background-color:#CC66FF;opacity:0.7;box-shadow: 0px 0px 15px green;border-radius:15px">
            <h1 style="text-shadow:4px 4px grey;"><b>Data Scraping</b></h1> 
            <p style="color:#66FF66;font-family:georgia;letter-spacing:2px;text-shadow:2px 2px grey;font-size:30px;"><b>shiksha.com</b></p>
        </div>
        <form method="POST" action=<?php echo $_SERVER["PHP_SELF"]; ?> id="url">
            <div class="form-group">
                <div style="border:1px solid #990099;border-radius:3px" class="input-group">
                    <div class="input-group-addon">URL</div>
                    <input type="text" name="loc" class="form-control" placeholder="Enter URL -- eg. http://www.shiksha.com/b-tech/colleges/b-tech-colleges-chennai">
                </div>
            </div>
            <div align="center">
                <button title="Show all the college's information of the entered city" type="submit" class="btn btn-primary" onclick="gif_loader();">Submit</button>
                <button title="Empty all the Data retrieved yet" type="button" onclick="var ret=confirm('It will remove all the data stored yet, do you really want to continue'); if (ret) location.href='truncate.php';" class="btn btn-success">Truncate Data</button>
            </div>
        </form>
        </div>
    </body>
</html>