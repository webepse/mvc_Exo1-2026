<?php

require "model/frontend.php";

function listPosts(){
    // modèle => va chercher tous les posts, ça va retourner un fetchAll des posts
    $posts = getPosts();

    // vue est appellée avec $posts
    require "view/listPostsView.php";
}