<?php
require 'format.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>You Killed the Wumpus</title>
    <link href="stylesheet.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="center">
    <header>
        <?php echo present_header("Stalking the Wumpus"); ?>
    </header>

    <div class="centerdiv">
        <figure>
            <img src="wumpus/dead-wumpus.jpg" width="600" height="325" alt="dead-wumpus" />
        </figure>
        <p class="welcomefont">You killed the Wumpus</p>

        <p class="welcomefont"><a href="welcome.php" class="linkcolor">New Game</a></p>

    </div>
</div>
</body>
</html>