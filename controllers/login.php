<?php

    require_once("../models/db.php");
    require_once("../utils/validation.php");

    function getData($data) {
        return isset($_POST[$data]) ? htmlspecialchars($_POST[$data]) : '';
    };

    $email = getData('email');
    $number = getData('number');

    $errors = array();
    $user['email'] = $email;
    $user['number'] = $number;
    $userData = null;
    $isError = false;

    function checkData($user, &$errors){
        if(empty($user['email']))
            $errors['email'] = "You may enter an email";
        elseif(!checkEmail($user['email']))
            $errors['email'] = "Please enter a valid email address";
        if(empty($user['number']))
            $errors['number'] = "You may enter your number ";
        elseif (!checkNumber($user['number']))
            $errors['number'] = "Please enter a valid license number. 
            The license number must be between 8 and 10 characters, numbers";
    }

    if(count($_POST) == 0)
        require('../views/login.tpl');
    else{
        checkData($user, $errors);
        if(array_key_exists('email', $errors) || array_key_exists('number', $errors)) {
            $isError = true;
            require("../views/login.tpl");
        }
        else{
            $userData = checkUser($email, $number);
            if($userData == null){
                $errors['user'] = "Your email and license number doesn't match";
                require("../views/login.tpl");
            }
            else {
                require("./home.php");
            }

        }
    }
