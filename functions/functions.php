<?php
session_start();


function registerUser($username,$email,$password,$c_password){

    if ($password != $c_password){
        echo "رمز عبور خالی است یا مطابقت ندارد!";
    }else{
        $file = fopen("../Users.txt" , "a");
        fwrite($file,"username:$username:email:$email:password:$password\n");
        fclose($file);

        $_SESSION["username"] = $username;

        $expire = time() + (30 * 24 * 60 * 60 );

        setcookie("session_id" , session_id() , $expire , "/");

       return true;
    }

}

function loginUser($email , $password )
{
    $users = file("../Users.txt",FILE_IGNORE_NEW_LINES);

    foreach($users as $user){
        $fileds = explode(":",$user);

        $storedEmail = $fileds[3];
        $storedPassword = $fileds[5];

        if ($storedEmail == $email && $storedPassword == $password){
            $username = $fileds[1];
            $_SESSION["username"] = $username;
            $expire = time() + (30 * 24 * 60 * 60 );

            setcookie("session_id" , session_id() , $expire , "/");
            return true;
        }

    }
    return false;

}
