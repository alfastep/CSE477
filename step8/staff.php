<?php
require 'lib/site.inc.php';
$view = new Felis\StaffView();
if(!$view->protect($site, $user)) {
    header("location: " . $view->getProtectRedirect());
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php echo $view->head() ?>
</head>

<body>
<div class="staff">
    <?php
    echo $view->header();
    echo $view->present();
    echo $view->footer();
    ?>

</div>

</body>
</html>
