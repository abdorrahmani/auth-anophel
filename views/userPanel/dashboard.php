<?php

include "../../functions/helper.php";

if (isset($_COOKIE["session_id"])){
    session_id($_COOKIE["session_id"]);
    session_start();


    echo  "<h2> Welcome " .  $_SESSION["username"] . "</h2>";


}else{
    redirect("../auth/loginView.php");
}
