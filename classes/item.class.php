<?php
include_once 'borrower.class.php';
include_once 'lender.class.php';

    class Item{
        
        //Nombre static qui me permet de savoir quel sera le prochain numéro d'objet
        protected int $id=0; //numéro de l'objet
        protected bool $isStillBorrowed=true; //true si toujours en prêt, false si rendu

        protected string $name; //nom de l'Item

        protected int $lenderId;
        protected int $borrowerId;
        
        protected Lender $lender;
        protected Borrower $borrower;

        protected $dateOfLoan;
        protected $dateOfReturn;
        protected string $comment; //commentaire noté le jour du pret
        

        //constructeur
        public function __construct(int $id, string $name, bool $isStillBorrowed, $dateOfLoan, $dateOfReturn, string $comment, int $lenderId, int $borrowerId){
            $this->id = $id;
            $this->name = $name;
            $this->isStillBorrowed = $isStillBorrowed;
            $this->dateOfLoan = $dateOfLoan;
            $this->dateOfReturn = $dateOfReturn;
            $this->comment = $comment;
            $this->lenderId = $lenderId;
            $this->borrowerId = $borrowerId;

            $this->borrower = getBorrowerFromDBById($borrowerId);
            $this->lender = getLenderFromDBById($lenderId);
        }

        public function add_item_in_database (){
            $servname = "localhost"; $dbname = "pret_objets_maison"; $user = "root"; $pass = "";
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sth = $dbco->prepare("
                    INSERT INTO item(name,dateOfLoan,comment,lenderId,borrowerId)
                    VALUES (?, ?, ?, ?, ?)
                ");
                //La constante de type par défaut est STR
                $sth->bindValue(1, $this->name);
                $sth->bindValue(2, $this->dateOfLoan);
                $sth->bindValue(3, $this->comment);
                $sth->bindValue(4, $this->lenderId);
                $sth->bindValue(5, $this->borrowerId);
                
                $sth->execute();
                echo "Entrée ajoutée dans la table";
            }
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
        }
        
    
        /*Crée une ligne à ajouter dans un tableau
         * Prend en paramettre un tableau avec la liste des intitulés de colonne*/


        public function print_in_a_row($columnNames){
            //Création de la ligne
            $row ="";
            //Choix du still à appliquer : est oui ou non toujours emprunté
            if($this->isStillBorrowed){
                $row .= "<tr class='row_item_is_still_borrowed'>";
            }
            else{
                $row .= "<tr class='row_item_is_back'>";
            }
            //Ajout des colonnes
            foreach ($columnNames as $cn){
                switch($cn){
                    case "rendu":
                        if ($this->isStillBorrowed){
                            $row .= "<td>
                                <form method='POST' action='code_part/item_is_back.php' id='item_is_back'>
                                    <input style='visibility: hidden' name='id' value='".$this->id."'/>
                                    <input type='submit' value='Rendu' id='btn_submit_form'/>
                                </form></td>";
                        }
                        else {
                            $row .= "<td></td>";
                        }
                        break;
                    case "modifier":
                        $row .= "<td>supprimer</td>";
                        break;
                    case "supprimer":
                        $row .= "<td>supprimer</td>";
                        break;
                    case "name":
                        $row .= "<td><strong>".$this->$cn.'</strong></td>';
                        break;
                    case "borrowerName":
                        $row .= "<td>".$this->borrower->getFullName().'</td>';
                        break;
                    case "lenderName":
                        $row .= "<td>".$this->lender->getFullName().'</td>';
                        break;
                    default:
                    $row .= "<td>".$this->$cn.'</td>';
                }  
            }
            $row.="</tr>";
            return $row;
        }
    
    }
?>
