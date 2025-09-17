<?php $title = "nom du post"; ?>

<?php ob_start(); ?>
<h1>nom du post</h1>


<?php
$content = ob_get_clean();
require "template.php";
?>

