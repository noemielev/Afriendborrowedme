<?php
    include_once 'code_part/is_connected.php';
    include_once 'code_part/function.php';

    include_once 'classes/item.class.php';
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Noémie Levet</title>
    </head>
    <body>
        <div id="main_wrapper">
            <?php
                include_once ('html_part/header.php');
            ?>
            
            <h1>Félicitation l'item a été ajouté ?</h1>

            <?php
                $itemToAdd = new Item(0, $_POST['item_name'], true, $_POST['date_of_loan'], 0, $_POST['comment'],$_POST['lender_id'],$_POST['borrower_id']);
                //print_r($_POST); 
                //print_r($itemToAdd);
                $itemToAdd->add_item_in_database();
            ?>
            <?php
                include_once ('html_part/footer.php');
            ?>
        </div>
    </body>
</html>