<?php

    function checkEmail($email){
        // check if the given email is a valid email
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        return preg_match($regex, $email);
    };

    function checkInfo($data){
        // check if $data contain only characters, hyphen, apostroph
        // and is length between 1 and 19
        return preg_match("/^[a-zA-Z'-]{1,19}$/", $data);

    }

    function checkNumber($data){
        // verify matricule number
        $regex = '/^[a-z0-9_-]{8,10}$/';
        return preg_match($regex, $data);
    }
