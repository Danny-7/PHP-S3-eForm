<?php

    require("./config.php");

    function getData($data) {
        return isset($_POST[$data]) ? htmlspecialchars($_POST[$data]) : '';
    };

    $email = getData('email');
    $number = getData('number');

    $errors = array();
    $user['email'] = $email;
    $user['number'] = $number;

    if(count($_POST) == 0) {
        $errors['all'] = "You may enter your login informations (email and number)";
        require('../views/login.tpl');
    }
    else{
        if(empty($email))
            $errors['email'] = "You may enter an email";
        if(empty($number))
            $errors['number'] = "You may enter your number ";
        if(!checkUser($email, $number)){
            $errors['user'] = "Your email and number doesn't match";
            require("../views/login.tpl");
        }
        else {
            header("Location: ./home.php");
        }
    }
