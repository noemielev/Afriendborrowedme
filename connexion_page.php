<?php
    //require_once 'code_part/is_connected.php';
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
            <h1>Bienvenu sur le super logiciel de prêt</h1>
            <div>
                <?php include_once 'html_part/form_to_connect.php'; ?>
            </div>
            
            <h3>Comment ça... Vous n'existez pas encore dans la base ?</h3>
            <div>
                <?php include_once 'html_part/form_to_add_lender.php'; ?>
            </div>
            <footer>

            </footer>
        </div>
    </body>
</html>