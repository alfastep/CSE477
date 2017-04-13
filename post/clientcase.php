<?php
require '../lib/site.inc.php';

$controller = new Felis\ClientCaseController($site, $_POST);
header("location: " . $controller->getRedirect());