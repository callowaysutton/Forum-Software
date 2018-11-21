<html lang="en-us"><head><?php
require "../c/header.php";
?>
<?php
if (!isset($_GET['notify'])) {
 $_GET['notify'] = false;
}
if ($_GET["notify"] == "acc_m") {
 echo "<div class='notify'><b>Success! </b> Account created successfully! Hit the log in button to log in!</div>";
}

if ($_GET["notify"] == "log") {
 echo "<div class='notify'><b>Success! </b> you have been logged in</div>";
}

if ($_GET["notify"] == "out") {
 echo "<div class='notify'><b>Success! </b> you have been logged out</div>";
}
?>
 <!-- HTML Snippet  -->
<title>Calloway Sutton</title></head><body><div class="header">This is an example Main Page </div>