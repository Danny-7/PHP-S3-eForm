<?php

    require_once("../models/db.php");
    require_once("../utils/validation.php");

    function checkIsEmpty($data, $label){
        if(empty($data)){
            switch($label){
                case 'lastName':
                    $errors['lastName'] = "Please enter a last name";
                    break;
                case 'firstName':
                    $errors['firstName'] = "Please enter a first name";
                    break;
                case 'number':
                    $errors['number'] = "PLease enter a license number";
                    break;
                case 'email': 
                    $errors['email'] = "Please enter an email address";
                    break;
            }
            return true;
        }
        return false;
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
        $isErrors = false;
        foreach($user as $label => $info ){
            if($label == 'lastName'){
                if(!checkInfo($info)){
                    $errors['lastName'] = "Please enter a valid last name";
                    $isErrors = true;
                }
            }
            if($label == 'firstName'){
                if(!checkInfo($info)){
                    $errors['firstName'] = "Please enter a valid first name";
                    $isErrors = true;
                }
            }
            if($label == 'number'){
                if(!checkNumber($info)){
                    $errors['number'] = "Please enter a valid license number. 
            The license number must be between 8 and 10 characters, numbers";
                    $isErrors = true;
                }
            }
            if($label == 'email'){
                if(!checkEmail($info)) {
                    $errors['email'] = "Please enter a valid email address";
                    $isErrors = true;
                }
                elseif (fetchUser($info) != null){
                    $errors['email'] = "This email address correspond to another account";
                    $isErrors = true;
                }
            }
        }
        // check if errors
       return !$isErrors;
    }


    if(count($_POST) == 0)
        require("../views/signup.tpl");
    else{
        if(verifAllData($user, $errors)){
            insertData($user['lastName'], $user['firstName'], $user['number'], $user['email']);
            header("Location: ./login.php");
        }
        else{
            require("../views/signup.tpl");
        }
    }

?>