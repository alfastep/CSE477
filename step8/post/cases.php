<?php
require '../lib/site.inc.php';

$controller = new Felis\CasesController($site, $_SESSION, $_POST);
header("location: " . $controller->getRedirect());
