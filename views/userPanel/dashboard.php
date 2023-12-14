<?php


session_id($_COOKIE["session_id"]);
session_start();


echo  "<h2> Welcome " .  $_SESSION["username"] . "</h2>";