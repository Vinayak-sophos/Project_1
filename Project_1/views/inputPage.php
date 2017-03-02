<html>
    <head>
        <title>
            <?php echo($title); ?>
        </title>
    </head>
    <form method="POST" action=<?php echo $_SERVER["PHP_SELF"]; ?>>
        <input type="text" name="loc" id="loc" placeholder="Website">
        <input type="submit" name="submit" id="submit">
    </form>
</html>