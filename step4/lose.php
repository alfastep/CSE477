<?php
require 'format.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Wumpus Killed You</title>
    <link href="stylesheet.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="center">
    <header>
        <?php echo present_header("Stalking the Wumpus"); ?>
    </header>

    <div class="centerdiv">
        <figure>
            <img src="wumpus/wumpus-wins.jpg" width="600" height="325" alt="wumpus-wins" />
        </figure>
        <p class="welcomefont">You died and the Wumpus ate your brain!</p>

        <p class="welcomefont"><a href="welcome.php" class="linkcolor">New Game</a></p>

    </div>
</div>
</body>
</html>