<?php
    include_once '../classes/borrower.class.php';

    $borrowerToAdd = new Borrower(0,$_POST['borrower_name'],$_POST['borrower_lastName'],$_POST['borrower_phone']);
    $borrowerToAdd->add_borrower_in_database();

    header('location:../new_item.php');
?>