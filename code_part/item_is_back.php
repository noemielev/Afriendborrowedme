<?php

    include_once '../code_part/is_connected.php';
    include_once '../code_part/function.php';

    include_once '../classes/item.class.php';

    //variables de connection
    $servname = "localhost"; $dbname = "pret_objets_maison"; $user = "root"; $pass = "";
    
    //tentative de connextion à la base
    try{
        $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $request = "UPDATE item SET isStillBorrowed=0, dateOfReturn='".date("Y-m-d")."'WHERE id=".$_POST['id'];
        
        $sth = $dbco->prepare($request);

        $sth->execute();
    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }

    header("location:".$_SERVER['HTTP_REFERER']."");
?>