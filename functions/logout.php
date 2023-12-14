<?php

include "helper.php";
session_start();

session_destroy();

setcookie("session_id" , "" , time() - (30 * 24 * 60 * 60 ) , "/");

redirect("/");

exit();
