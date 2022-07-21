<?php
    include_once '../classes/lender.class.php';

    $lenderToAdd = new Lender(0,$_POST['lender_name'],$_POST['lender_lastName']);
    $lenderToAdd->add_lender_in_database();

    header('location:../index.php');
?>