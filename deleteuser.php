<?php
$open = true;
require 'lib/site.inc.php';
$view = new Felis\DeleteUserView($site, $_GET);
$view->setTitle('Felis Investigations');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Felis Delete?</title>
    <?php echo $view->head(); ?>
</head>

<body>
<div class="case">
    <?php echo $view->header(); ?>
    <?php echo $view->deleteUserView(); ?>
    <?php echo $view->footer(); ?>

</div>

</body>
</html>