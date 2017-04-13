<?php
require 'lib/game.inc.php';
$controller = new Wumpus\WumpusController($wumpus, $_REQUEST);

if($controller->isReset()) {
    unset($_SESSION[WUMPUS_SESSION]);
}

if($controller->cheatMode()) {
    unset($_SESSION[WUMPUS_SESSION]);
    $_SESSION[WUMPUS_SESSION] = new Wumpus\Wumpus(1422668587);
}


header('Location: ' . $controller->getPage());

