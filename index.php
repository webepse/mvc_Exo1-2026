<?php

// routeur
// qui gère? le controller
require "controller/frontendController.php";

if(isset($_GET['action'])){

}else{
    listPosts();
}


?>