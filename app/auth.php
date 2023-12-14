<?php
require_once "../functions/functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST["register"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $c_password = $_POST["c_password"];

        if (registerUser($username, $email, $password, $c_password)){
            redirect("../views/userPanel/dashboard.php");
        }

    }elseif (isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];


        if( loginUser($email, $password) ){
            redirect("../views/userPanel/dashboard.php");
        }else{
            echo "<p>user not login</p>";
        }
    }

}