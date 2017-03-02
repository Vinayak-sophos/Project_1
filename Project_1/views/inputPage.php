<html>
    <head>
        <title>
            <?php echo($title); ?>
        </title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    </head>
    <body style="background-color:#f2e6ff">
        <div class="container" style="margin-top:20%;width:60%">
        <form method="POST" action=<?php echo $_SERVER["PHP_SELF"]; ?>>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">URL</div>
                    <input type="text" name="loc" class="form-control" placeholder="Website">
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-left:45%">Submit</button>
        </form>
        </div>
    </body>
</html>