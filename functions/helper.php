<?php

function setUserSession($username){
    $expire = time() + (30 * 24 * 60 * 60 );
    $_SESSION["username"] = $username;
    setcookie("session_id" , session_id() , $expire , "/");
}

function redirect($route)
{
    header("Location:" . $route);
}