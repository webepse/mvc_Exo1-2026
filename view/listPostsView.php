<?php $title = "Liste des posts"; ?>

<?php ob_start(); ?>
<h1>Liste des posts</h1>
<p>Derniers billets du blog:</p>
<div class="row">

    <?php foreach ($posts as $post) : ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= $post['title'] ?></h5>
                    <p class="card-text"><?= $post['content'] ?></p>
                    <a href="#" class="btn btn-primary my-2">Lire la suite</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>

<?php
    $content = ob_get_clean();
    require "template.php";
?>

