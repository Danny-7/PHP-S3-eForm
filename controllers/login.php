<?php

require("./config.php");

function getData($data) {
    return isset($_POST[$data]) ? htmlspecialchars($_POST[$data]) : '';
};

$email = getData('email');
$number = getData('number');

$errors = array();

if(count($_POST) == 0)
    $errors['all'] = "You may enter your login informations (email and number";
else{
    if(empty($email))
        $errors['email'] = "You may enter an email";
    if(empty($number))
        $errors['number'] = "You may enter your number ";
    if(!checkUser($email, $number, $bdd)){
        $errors['user'] = "Your are not registered, your email or number are wrong";
    }
    else {
        header("Location: ../views/home.php");
    }
}
