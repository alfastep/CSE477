<?php
require '../lib/site.inc.php';
$controller = new Felis\DeleteUserController($site, $user, $_POST);
header("location: " . $controller->getRedirect());