<?php
require "..\c\header.php";
?>
<style>
body {
  margin: 0px;
}

.container {
	display: flex;
	align-items: center;
	justify-content: center;
}
    .wrapper {
        display: grid;
    grid-gap: 10px;
        grid-template-columns: repeat(4, [col] 200px ) ;
        grid-template-rows: repeat(2, [row] auto  );
        background-color: #fff;
        color: #444;
    }

    .box {
        background-color: #444;
        color: #fff;
        border-radius: 5px;
        padding: 40px;
        font-size: 150%;

    }

    .box .box {
        background-color: #ccc;
        color: #444;
    }

    .a {
        grid-column: col / span 2;
        grid-row: row;
    }

    .b {
        grid-column: col 3 / span 2;
        grid-row: row;
    }

    .c {
        grid-column: col / span 2;
        grid-row: row 2;
    }

    .d{
        grid-column: col 3 / span 2;
        grid-row: row 2;
        display: grid;
    grid-gap: 10px;
        grid-template-columns: 1fr 1fr;
    }

    .e {
        grid-column: 1 / 3;
        grid-row: 1;
    }

    .f {
        grid-column: 1;
        grid-row: 2;
    }

    .g {
        grid-column: 2;
        grid-row: 2;
    }

</style>
    <?php

$user     = "../../data/users/" . $_GET["id"];
$points   = (file_get_contents("$user/points"));
$verified = (file_get_contents("$user/verified"));
$bio      = (file_get_contents("$user/bio"));




if (file_exists ($user)) {
?>

<nav>
<?php
$loggedUser = $_SESSION['USERNAME'];
$userID = $_GET["id"];


if($loggedUser == $userID) {
?>
<a href="/edit">Edit Profile</a>
<?php } ?>
</nav>

<div class="container" style="background-color:white;">
<br />
<div class="wrapper">
  <div class="box a"><?php echo($username); ?></div>
  <div class="box b">Points: <?php echo($points); ?></div>
  <div class="box c"><?php echo($bio); ?></div>
  <div class="box d">
  <div class="box e">E</div>
  <div class="box f">F</div>
  <div class="box g">G</div>
</div>
</div>
<?php	
} else { ?>
<body style="background-color:white">
<center>
<img src="404.png" />
</center>
</body>
<?php
}

?>