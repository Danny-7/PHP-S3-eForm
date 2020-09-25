<?php

    require("./config.php");

    function checkEmail($email){
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        return preg_match($regex, $email);
    }

    function getData($data) {
        return isset($_POST[$data]) ? htmlspecialchars($_POST[$data]) : '';
    };

    $user = array();
    $errors = array();

    $user['lastName'] = getData('lastName');
    $user['firstName'] = getData('firstName');
    $user['number'] =  getData('number');
    $user['email'] = getData('email');



    function verifAllData($user, &$errors){
        foreach($user as $label => $info ){
            if(empty($info)){
                array_push($errors, "Il manque des informations ". $label);
                return false;
            }
            if($label == 'email'){
                if(!checkEmail($info)) {
                    array_push($errors, "Enter a valid email");
                }
            }
        }
        return true;
    }


    if(count($_POST) == 0)
        require("../views/inscription.tpl");
    else{
        if(verifAllData($user, $errors)){
            insertData($user['lastName'], $user['firstName'], $user['number'], $user['email'], $bdd);
        }
        else{
            var_dump($errors);
            // header("Location: ./inscription.php");
        }
    }

?>