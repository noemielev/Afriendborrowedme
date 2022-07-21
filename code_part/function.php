<?php

    function getAllLender (){
        $allLender = [];
        
        $servname = "localhost"; $dbname = "pret_objets_maison"; $user = "root"; $pass = "";
        try{
            $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sth = $dbco->prepare("
                SELECT * FROM lender
            ");
            $sth->execute();
            $allLender = $sth->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
        return $allLender;
    }

    function getLenderFromId (int $id){        
        $servname = "localhost"; $dbname = "pret_objets_maison"; $user = "root"; $pass = "";
        try{
            $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sth = $dbco->prepare("
                SELECT * FROM lender WHERE id=".$id."
            ");
            $sth->execute();
            $lenderArray = $sth->fetch(PDO::FETCH_ASSOC);
            $lender = new Lender($lenderArray['id'],$lenderArray['name'],$lenderArray['lastName']);
            return $lender;
        }
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
    }

    function getAllBorrower (){
        $all = [];
        
        $servname = "localhost"; $dbname = "pret_objets_maison"; $user = "root"; $pass = "";
        try{
            $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sth = $dbco->prepare("
                SELECT * FROM borrower
            ");
            $sth->execute();
            $allBorrower = $sth->fetchAll(PDO::FETCH_ASSOC);
            foreach($allBorrower as $borrower){
                $b = new Borrower($borrower["id"],$borrower["name"],$borrower["lastName"],$borrower["phone"]);
                array_push($all,$b);
            }
            //print_r($all);
        }
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
        return $all;
    }


    /* --------------- GESTION DE l'utilisateur en cours  ----------- */
    function getUserFullName (){ 
        if(isset($_COOKIE['user_id'])){
            $l = getLenderFromId($_COOKIE['user_id']);
            return $l->getFullName();
        }
        else{
            return "Identifiez vous !";
        }
    }

    function helloUser (){ 
        return "Bonjour ".getUserFullName();
    }

    function getUserId (){ 
        if(isset($_COOKIE['user_id'])){
            $l = getLenderFromId($_COOKIE['user_id']);
            return $l->getId();
        }
        else{
            return null;
        }
    }

    /* --------------- GESTION DES COOKIES ----------- */
    function getMyCookie($name, $default = null)
    {
        return isset($_COOKIE[$name]) ? $_COOKIE[$name] : $default;
    }
     
    function setMyCookie($name, $value, $expire = 0, $path = '/', $domain = '', $secure = false, $httponly = false)
    {
        if( setcookie($name, $value, $expire, $path, $domain, $secure, $httponly) ){
            $_COOKIE[$name] = $value;
            return true;
        } 
        return false;
    }
     
    function deleteMyCookie($name, $path = '/', $domain = '', $secure = false, $httponly = false)
    {
        if( setMyCookie($name, '', 1, $path, $domain, $secure, $httponly) ){
            if( isset($_COOKIE[$name]) ){
                unset($_COOKIE[$name]);
            }
             
            return true;
        }
         
        return false;
    }

    function getWhoFromDataBaseById (string $who, int $id){
        $servname = "localhost"; $dbname = "pret_objets_maison"; $user = "root"; $pass = "";
        $res =[];
        try{
            $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $requete = "SELECT * FROM ".$who." WHERE Id=".$id;
                                    
            $sth = $dbco->prepare($requete);
            $sth->execute();
            $res = $sth->fetch(PDO::FETCH_ASSOC);
            //print_r($res);
        }
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }

        if ($who=="borrower"){
            $instance = new Borrower($res['id'],$res['name'],$res['lastName'],$res['phone']);
        }
        elseif ($who=="lender"){
            $instance = new Lender($res['id'],$res['name'],$res['lastName']);
        }
        
        return $instance;
    }

    function getBorrowerFromDBById(int $id){
        return getWhoFromDataBaseById("borrower",$id);
    }
    function getLenderFromDBById(int $id){
        return getWhoFromDataBaseById("lender",$id);
    }
     
?>

