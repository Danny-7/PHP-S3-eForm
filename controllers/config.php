<?php

    $hostname = "localhost";
	$base= "econtact";
	$loginBD= "root";
    $passBD="root";
    
    $INSERT = "INSERT INTO(nom, prenom, num, email) VALUES(?, ?, ?, ?)";
    $FETCH = "SELECT * FROM utilisateur WHERE email=? AND num=?";

    try {
        $pdo = new PDO ("mysql:server=$hostname; dbname=$base", "$loginBD", "$passBD");
    }
    catch (PDOException $e) {
        die  ("Echec de connexion : " . utf8_encode($e->getMessage()) . "\n");
    }

    function insert($lastName, $firstName, $num, $email) {
        $stmt = $pdo->prepare($INSERT);
        $stmt = $stmt->execute(array(
            $lastName,
            $firstName,
            $num,
            $email
        ));
    };

    function fetchUser($email, $num) {
        $stmt = $pdo->prepare($FETCH);
        $stmt = $stmt->execute(array(
            $email,
            $num
        ));
        if($stmt->rowCount() > 0){
            return $stmt->fetch();
        }
        return null;
    }

    function checkUser($email, $num) {
        return fetchUser($email, $num) ? true: false;
    };

