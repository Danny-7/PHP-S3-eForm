<?php
    
    $GLOBALS['INSERT'] = 'INSERT INTO utilisateur (nom, prenom, num, email) VALUES(?, ?, ?, ?)';
    $GLOBALS['FETCH'] = 'SELECT * FROM utilisateur WHERE email=?';

    // allows to get a connection to the database
    function connect(){
        $bdd = null;
        try {
            $bdd = new PDO ('mysql:host=localhost;dbname=econtact;charset=utf8', 'root', '');
        }
        catch (PDOException $e) {
            echo ("Echec de connexion : " . utf8_encode($e->getMessage()) . "\n");
        }
        return $bdd;
    }

    // function to insert an user
    function insertData($lastName, $firstName, $num, $email) {
        $bdd = connect();
        $num = password_hash($num, PASSWORD_BCRYPT);
        try{
            $stmt = $bdd->prepare($GLOBALS['INSERT']);
            $stmt->execute([
                $lastName,
                $firstName,
                $num,
                $email
            ]);
        }catch(PDOException $e){
            die("Echec d'insertion: ".utf8_encode($e->getMessage()));
        }
        
    }

    // get an user with an email
    function fetchUser($email) {
        $bdd = connect();
        $stmt = $bdd->prepare($GLOBALS['FETCH']);
        $stmt->execute(array(
            $email
        ));
        return $stmt->fetch();
    }

    // check if the password given correspond to the user license number
    function checkUser($email, $num) {
        $row = fetchUser($email);
        if($row != null){
            if(password_verify($num, $row['num']))
                return $row;
            else
                return null;
        }
        return null;
    }

