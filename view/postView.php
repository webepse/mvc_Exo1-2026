<?php $title = $post['title']; ?>

<?php ob_start(); ?>
<a href="index.php" class="btn btn-secondary my-3">Retour</a>
<h1><?= $post['title'] ?></h1>
<h4><?= $post['mydate'] ?></h4>
<p><?= nl2br($post['content']) ?></p>

<div class="row">
    <h2>Les commentaires</h2>
    <?php foreach ($comments as $comment) : ?>
        <div class="col-md-8 my-3 bg-light p-3">
            <h4><?= $comment['author'] ?> - <?= $comment['mydate'] ?></h4>
            <p><?= nl2br($comment['comment']) ?></p>
        </div>
    <?php endforeach; ?>
</div>

<?php
$content = ob_get_clean();
require "template.php";
?>

