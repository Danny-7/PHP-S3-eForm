<?php
    
    $GLOBALS['INSERT'] = 'INSERT INTO utilisateur (nom, prenom, num, email) VALUES(?, ?, ?, ?)';
    $GLOBALS['FETCH'] = 'SELECT * FROM utilisateur WHERE email=? AND num=?';

    try {
        $bdd = new PDO ('mysql:host=localhost;dbname=econtact;charset=utf8', 'root', 'root');
    }
    catch (PDOException $e) {
        echo ("Echec de connexion : " . utf8_encode($e->getMessage()) . "\n");
    }

    function insertData($lastName, $firstName, $num, $email, $bdd) {
        $num = password_hash($num, PASSWORD_BCRYPT);
        try{
            $stmt = $bdd->prepare($GLOBALS['INSERT']);
            $stmt = $stmt->execute([
                $lastName,
                $firstName,
                $num,
                $email
            ]);
        }catch(PDOException $e){
            die("Echec d'insertion: ".utf8_encode($e->getMessage()));
        }
        
    };

    function fetchUser($email, $num, $bdd) {
        $stmt = $bdd->prepare($GLOBALS['FETCH']);
        $stmt = $stmt->execute(array(
            $email,
            $num
        ));
        if($stmt->rowCount() > 0){
            return $stmt->fetch();
        }
        return null;
    }

    function checkUser($email, $num, $bdd) {
        return fetchUser($email, $num, $bdd) ? true: false;
    };

