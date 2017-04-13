<?php
require 'lib/site.inc.php';
$view = new Felis\LostPasswordView($site);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head() ?>
</head>

<body>
<div class="password">
    <?php
    echo $view->header();
    echo $view->present();
    echo $view->footer();
    ?>
</div>

</body>
</html>
