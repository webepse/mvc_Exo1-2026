<?php

require "model/frontend.php";

/**
 * Permet d'afficher les posts
 * @return void
 */
function listPosts(){
    // modèle => va chercher tous les posts, ça va retourner un fetchAll des posts
    $posts = getPosts();

    // vue est appellée avec $posts
    require "view/listPostsView.php";
}

function post(int $id){
    $id = htmlspecialchars($id);
    $post = getPost($id);

    if($post == null){
        header("LOCATION: 404.php");
    }else{
        require "view/postView.php";
    }
}