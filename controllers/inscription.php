<?php

    require("./config.php");

    function checkEmail($email){
        return preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$", $email);
    }

    function getData($data) {
        return isset($_POST[$data]) ? htmlspecialchars($_POST[$data]) : '';
    };

    function verifData($data, $type=text){
        if(empty($data))
            return false;
        switch(type){
            case email:
                checkEmail($data);
            default:
                true;
        }
    }

    function verifAllData() {
        return verifData($lastName) && 
        verifData($firstName) && 
        verifData($num) && 
        verifData($email, email);
    }

    $lastName = getData('lastName');
    $firstName = getData('firstName');
    $num = getData('number');
    $email = getData('email');

    if(count($_POST) == 0)
        require("../views/inscription.tpl");
    else{
        if(verifAllData()){
            insert($lastName, $firstName, $num, $email);
        }
    }
    // redirect to home page 

?>