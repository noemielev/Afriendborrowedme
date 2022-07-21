<?php
    include_once 'person.class.php';
    class Borrower extends Person{

        public string $phone;

        public function __construct(int $id, string $name, string $lastName,$phone){
            parent::__construct($id,$name,$lastName);
            if ($phone==null) {
                $this->phone = "";
            }
            else{
                $this->phone = $phone;
            }
        }
        
        public function getPhoneNumber (){
            return $this->phone;
        }
        public function add_borrower_in_database (){
            $servname = "localhost"; $dbname = "pret_objets_maison"; $user = "root"; $pass = "";
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sth = $dbco->prepare("
                    INSERT INTO borrower(name,lastName,phone)
                    VALUES (?, ?, ?)
                ");
                //La constante de type par défaut est STR
                $sth->bindValue(1, $this->name);
                $sth->bindValue(2, $this->lastName);
                $sth->bindValue(3, $this->phone);
                
                $sth->execute();
                echo "Entrée ajoutée dans la table";
            }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        }
    }
?>