<?php
$open = true;
require 'lib/site.inc.php';
$view = new Felis\PasswordValidateView($site, $_GET, $_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $view->head(); ?>
</head>

<body>
<div class="password">

    <!-- Create the body HTML here -->

    <?php
    echo $view->header();
    echo $view->displayErrorMessage();
    echo $view->present();
    ?>

    <?php
    echo $view->footer();
    ?>

</div>

</body>
</html>