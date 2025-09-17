<?php
/**
 * Permet de se connecter à la base de données
 * @return PDO
 */
function dbConnect(): PDO
{
    try{
        return $db = new PDO('mysql:host=localhost;dbname=blog2;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

/**
 * Permet de faire une requête à la bdd sur tous les posts
 * @return array|null|false
 */
function getPosts(): array|false|null
{
    $bdd = dbConnect();
    $posts = $bdd->query("SELECT id, title, content, DATE_FORMAT(creation_date,'%d/%m/%Y') FROM posts");
    $data =  $posts->fetchAll(PDO::FETCH_ASSOC);
    $posts->closeCursor();
    return $data;
}

/***
 * Permet de récup un post en particulier
 * @param int $id
 * @return array|null|false
 */
function getPost(int $id): array|false|null
{
    $bdd = dbConnect();
    $post = $bdd->prepare("SELECT id, title, content, DATE_FORMAT(creation_date,'%d/%m/%Y') as mydate FROM posts WHERE id = :id");
    //$post->execute(['id' => $id]);
    $post->bindParam(':id', $id, PDO::PARAM_INT);
    $post->execute();
    $data = $post->fetch(PDO::FETCH_ASSOC);
    $post->closeCursor();
    return $data;
}

/**
 * Permet de récup les commentaires d'un post
 * @param int $idPost
 * @return array|false|null
 */
function getComments(int $idPost): array|false|null
{
    $bdd = dbConnect();
    $comments = $bdd->prepare("SELECT id, comment, author, DATE_FORMAT(comment_date,'%d/%m/%Y à %Hh%i') as mydate FROM comments WHERE post_id = :id ORDER BY comment_date DESC");
    $comments->bindParam(':id', $idPost, PDO::PARAM_INT);
    $comments->execute();
    $data = $comments->fetchAll(PDO::FETCH_ASSOC);
    $comments->closeCursor();
    return $data;
}





?>