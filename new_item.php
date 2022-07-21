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
                include_once 'html_part/header.php';
                include_once 'html_part/form_to_add_item.php';
                include_once 'html_part/form_to_add_borrower.php';
                include_once 'html_part/footer.php';
            ?>
        </div>
    </body>
</html>