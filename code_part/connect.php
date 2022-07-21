<?php
    include_once 'function.php';
    setMyCookie('user_id',$_POST['user_id']);
    
    header('location:../new_item.php');
?>
