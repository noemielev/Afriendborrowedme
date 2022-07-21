<?php
    if(isset($_COOKIE['user_id'])){
        //header('connexion_page.php');
    }
    else{
        header('location:index.php');
    }
?>