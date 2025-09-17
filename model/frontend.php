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
 * @return array|null
 */
function getPosts(): array|null
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
 * @return array|null
 */
function getPost(int $id): array|null
{
    $bdd = dbConnect();
    $post = $bdd->prepare("SELECT id, title, content, DATE_FORMAT(creation_date,'%d/%m/%Y') FROM posts WHERE id = :id");
    //$post->execute(['id' => $id]);
    $post->bindParam(':id', $id, PDO::PARAM_INT);
    $post->execute();
    $data = $post->fetch(PDO::FETCH_ASSOC);
    $post->closeCursor();
    return $data;
}





?>