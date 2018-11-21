<?php
ini_set('display_errors', 1);
error_reporting(~0);
$password = $_POST['pass0'];
$passwor2 = $_POST['pass1'];
$pass = 0;
if ($password != $passwor2) {
    $pass = 1;
    $res = "Passwords dont match";
}

if (file_exists("../../data/users/" . $_POST['username'])) {
    $pass = 1;
    $res = "Username in use";
}

if (preg_match("/^[a-zA-Z0-9-_]+$/", $_POST['username']) != 1) {
    $pass = 1;
    $res = "Username can only contain a-z 0-9";
}

if ($pass == 0) {
    $path = "../../data/users/" . $_POST['username'];
    mkdir($path);
    $pass = password_hash($password, PASSWORD_DEFAULT);
    file_put_contents("$path/password", $pass); // password storage
    file_put_contents("$path/points", "0"); // will change each time they win
    file_put_contents("$path/verified", "1"); // will change to 1 when they are verified
    file_put_contents("$path/banned", "0");
    file_put_contents("$path/admin", "0");
    header("Location: /home/?notify=acc_m");
} else {
    require "header.php";
    header("Location: /c/signup.php?err=$res");
    echo "<title>An error occurred</title>";
    echo "<center><h1>$res</h1>";
    echo "<p> Please <a href=\"/signup\">try again</a>.</p></center>";
}
