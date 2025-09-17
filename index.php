<?php

// routeur
// qui gère? le controller
require "controller/frontendController.php";

$tabAction = ["posts","post"];

if(isset($_GET['action'])){
    if(in_array($_GET['action'],$tabAction)){
        if($_GET['action'] == "posts"){
            listPosts();
        }elseif($_GET['action'] == "post"){
            if(!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])){
                header("LOCATION: 404.php");
            }else{
                post($_GET['id']);
            }
        }
    }else{
        header("LOCATION: 404.php");
    }
}else{
    listPosts();
}


?>