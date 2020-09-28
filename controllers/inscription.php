<?php

    require("./config.php");

    function checkEmail($email){
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        return preg_match($regex, $email);
    };

    function checkInfo($data){
        return strlen($data) < 20;
    }

    function checkNumber($data){
        $regex = '/^(?=.*[a-zA-Z])(?=.*[0-9])/';
        return preg_match($regex, $data);
    }

    function checkIsEmpty($data, $label){
        if(empty($data)){
            switch($label){
                case 'lastName':
                    $errors['lastName'] = "Veuillez entrer un nom";
                    break;
                case 'firstName':
                    $errors['firstName'] = "Veuillez entrer un prénom";
                    break;
                case 'number':
                    $errors['number'] = "Veuillez entrer un numéro de matricule";
                    break;
                case 'email': 
                    $errors['email'] = "Veuillez entrer une adresse email";
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
            if(checkIsEmpty($info, $label)){
                $errors[$label] = "Veuillez entrer cette information";
                $isErrors = true;
            }
            if($label == 'lastName'){
                if(!checkInfo($info)){
                    $errors['lastName'] = "Veuillez entrer un nom valide";
                    $isErrors = true;
                }
            }
            if($label == 'firstName'){
                if(!checkInfo($info)){
                    $errors['firstName'] = "Veuillez entrer un prénom valide";
                    $isErrors = true;
                }
            }
            if($label == 'number'){
                if(!checkNumber($info)){
                    $errors['number'] = "Veuillez entrer un numéro de matricule valide";
                    $isErrors = true;
                }
            }
            if($label == 'email'){
                if(!checkEmail($info)) {
                    $errors['email'] = "Entrez une adresse email valide";
                    $isErrors = true;
                }
            }
        }
        // check if errors
       return !$isErrors;
    }


    if(count($_POST) == 0)
        require("../views/inscription.tpl");
    else{
        if(verifAllData($user, $errors)){
            insertData($user['lastName'], $user['firstName'], $user['number'], $user['email']);
        }
        else{
            require("../views/inscription.tpl");
        }
    }

?>