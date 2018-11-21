<?php
session_start();
$_SESSION['LOG'] = false;
$_SESSION['USERNAME'] = "";
$_SESSION['PASSWORD'] = "";
header("Location: /home/?notify=out");
