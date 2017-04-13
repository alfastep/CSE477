<?php
require 'format.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Stalking the Wumpus</title>
    <link href="stylesheet.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="center">
    <header>
        <?php echo present_header("Stalking the Wumpus"); ?>
    </header>

    <div class="centerdiv">
        <figure>
            <img src="wumpus/cave-wumpus.jpg" width="600" height="325" alt="cave-wumpus" />
        </figure>
        <p class="welcomefont">Welcome to <em class="emphasis">Stalking the Wumpus</em></p>
        <p class="welcomefont"><a href="instructions.php" class="linkcolor">Instructions</a></p>
        <p class="welcomefont"><a href="game-post.php?n" class="linkcolor">Start Game</a></p>

    </div>
</div>
</body>
</html>