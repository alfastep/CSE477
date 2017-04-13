<?php
$open = true;		// Can be accessed when not logged in
require '../lib/site.inc.php';
$controller = new Felis\PasswordValidatorController($site, $_POST, $_SESSION);
header("location: " . $controller->getRedirect());