<?php $title = $post['title']; ?>

<?php ob_start(); ?>
<h1><?= $post['title'] ?></h1>
<h4><?= $post['mydate'] ?></h4>
<p><?= nl2br($post['content']) ?></p>

<a href="index.php" class="btn btn-secondary my-3">Retour</a>
<?php
$content = ob_get_clean();
require "template.php";
?>

