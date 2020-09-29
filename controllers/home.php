<?php
    session_start();
    $_SESSION['user'] = $userData ?? "";
    if(empty($_SESSION['user']))
        require("../views/login.tpl");
    else
        require("../views/home.tpl");