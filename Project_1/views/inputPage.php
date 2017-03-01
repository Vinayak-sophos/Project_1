<html>
    <head>
        <title>
            <?php echo($title); ?>
        </title>
    </head>
    <form method="POST" action=<?php echo $_SERVER["PHP_SELF"]; ?>>
        <input type="text" name="loc" id="loc" placeholder="Website">
    </form>
</html>