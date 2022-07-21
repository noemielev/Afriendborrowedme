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
        <section id="main_wrapper">
            <?php
                include_once ('html_part/header.php');
            ?>
            <div id='content_active_loan'> 
                <h1>Mes prêts en cours</h1>
                <?php
                //variables de connection
                $servname = "localhost"; $dbname = "pret_objets_maison"; $user = "root"; $pass = "";
                
                //tentative de connextion à la base
                try{
                        $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $requete = "SELECT * FROM item WHERE isStillBorrowed=1 AND lenderId=".getUserId() ;

                        $sth = $dbco->prepare($requete);
                        $sth->execute();

                        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

                        echo '<table>'
                                .'<thead>'
                                    .'<tr>'
                                        .'<td>N° de prêt</td>'
                                        .'<td>date du prêt</td>'
                                        .'<td>Rendu le</td>'
                                        .'<td>Emprunté à</td>'
                                        .'<td>Emprunté par</td>'
                                        .'<td>Objet</td>'
                                        .'<td>Commentaire</td>'
                                        .'<td>Rendu</td>'
                                    .'</tr>'
                                .'</thead>'
                                .'<tbody>';
                        
                        foreach($resultat as $entree){
                            $i = new Item($entree['id'],$entree['name'],$entree['isStillBorrowed'],$entree['dateOfLoan'],$entree['dateOfReturn'],$entree['comment'],$entree['lenderId'],$entree['borrowerId']);
                            echo $i->print_in_a_row(["id","dateOfLoan","dateOfReturn","lenderName","borrowerName","name","comment","rendu"]);
                        }
                        echo '</tbody>';
                        echo '</table>';
                    }
                    catch(PDOException $e){
                        echo "Erreur : " . $e->getMessage();
                    }
                ?>
            </section>

            <?php
                include ('html_part/footer.php');
            ?>
        </div>
    </body>
</html>