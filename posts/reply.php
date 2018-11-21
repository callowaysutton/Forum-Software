<?php
$p_data = $_POST["content"];
$title  = $_POST['pname'];

session_start();

$username = $_SESSION['USERNAME'];
$password = $_SESSION['PASSWORD'];

$userPath = "../../data/users/$username";
$points = file_get_contents("$userPath/points");


if (file_exists("../../data/users/$username")) {
    if (password_verify($password, trim(preg_replace('/\s\s+/', '', file_get_contents("../../data/users/$username/password"))))) {
        $title = str_replace(">", "&#62;", $title);
        $title = str_replace("<", "&#60;", $title);

        $p_data = str_replace(">", "&#62;", $p_data);
        $p_data = str_replace("<", "&#60;", $p_data);
        $p_data = nl2br($p_data);

        $pid  = uniqid();
        $id   = $_GET['post'];
        $path = "../../data/posts/$id/";
        mkdir("$path/_$pid");
        file_put_contents("$path/_$pid/contents", $p_data);
        file_put_contents("$path/_$pid/poster", $username);
        file_put_contents("$path/_$pid/time", date('d-m-Y'));
        file_put_contents("$userPath/points", ($points + 1));
        header("Location: /posts/$id");
    } else {
        header("Location: /login/?err=3");
    }
} else {
    header("Location: /login/?err=3");
}
