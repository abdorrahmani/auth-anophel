<?php
include "helper.php";
session_start();


function registerUser($username,$email,$password,$c_password){

    if(emailExisted($email)){
        echo "Email already exists";
    }
    elseif($password != $c_password){
        echo "رمز عبور خالی است یا مطابقت ندارد!";
    }else{

        $hashPassword = password_hash($password,PASSWORD_DEFAULT);

        $file = fopen("../Users.txt" , "a");
        fwrite($file,"username:$username:email:$email:password:$hashPassword\n");
        fclose($file);

        setUserSession($username);

       return true;
    }

}

function loginUser($email , $password ): bool
{
    $users = file("../Users.txt",FILE_IGNORE_NEW_LINES);

    foreach($users as $user){
        $fileds = explode(":",$user);

        $storedEmail = $fileds[3];
        $storedPassword = $fileds[5];

        if ($storedEmail == $email && password_verify($password,$storedPassword) ){
            $username = $fileds[1];
            setUserSession($username);
            return true;
        }

    }
    return false;

}

function emailExisted(String $email): bool
{
    $users = file("../Users.txt",FILE_IGNORE_NEW_LINES);

    foreach ($users as $user){
        $fileds = explode(":" , $user);
        $storedEmail = $fileds[3];

        if ($storedEmail == $email){
            return true;
        }

    }
    return false;

}
