<?php
    
    $GLOBALS['INSERT'] = 'INSERT INTO utilisateur (nom, prenom, num, email) VALUES(?, ?, ?, ?)';
    $GLOBALS['FETCH'] = 'SELECT * FROM utilisateur WHERE email=?';

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
        
    };

    function fetchUser($email, $num) {
        $bdd = connect();
        $stmt = $bdd->prepare($GLOBALS['FETCH']);
        $stmt->execute(array(
            $email
        ));
        if($stmt->rowCount() > 0){
            $row = $stmt->fetch();
            if(password_verify($num, $row['num']))
                return $row;
            else
                return null;
        }
        return null;
    }

    function checkUser($email, $num) {
        return fetchUser($email, $num);
    };

