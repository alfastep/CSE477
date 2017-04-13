<?php
require 'format.inc.php';
require 'lib/game.inc.php';
$view = new Wumpus\WumpusView($wumpus);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stalking the Wumpus</title>
    <link href="stylesheet.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <div class="center">
        <header>
            <?php echo present_header("Stalking the Wumpus"); ?>
        </header>

        <div class="centerdiv">
            <figure>
                <img src="wumpus/cave.jpg" width="600" height="325" alt="cave" />
            </figure>

            <?php
            echo $view->presentStatus();
            ?>

            <?php
            echo $view->presentRoom(0);
            echo $view->presentRoom(1);
            echo $view->presentRoom(2);
            ?>


            <?php echo $view->presentArrows(); ?>
        </div>
    </div>
</body>
</html>