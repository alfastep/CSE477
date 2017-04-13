<?php
$open = true;
require 'lib/site.inc.php';
$view = new Felis\NewCaseView($site);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php echo $view->head() ?>
</head>

<body>
<div class="case">
    <?php
    echo $view->header();
    echo $view->present();
    echo $view->footer();
    ?>
</div>

</body>
</html>
