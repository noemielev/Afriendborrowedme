<?php
    include_once 'person.class.php';

    class Lender extends Person{

        public function add_lender_in_database (){
            $servname = "localhost"; $dbname = "pret_objets_maison"; $user = "root"; $pass = "";
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sth = $dbco->prepare("
                    INSERT INTO lender(name,lastName)
                    VALUES (?, ?)
                ");
                //La constante de type par défaut est STR
                $sth->bindValue(1, $this->name);
                $sth->bindValue(2, $this->lastName);
                
                $sth->execute();
                echo "Entrée ajoutée dans la table";
            }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        }

    }
?>