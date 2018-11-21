<?php

ini_set('display_errors', 1);
error_reporting(~0);
session_start();
?>

<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/c/basic.css">
  <link rel="stylesheet" href="../style.min.css">
  <meta charset="UTF-8">
  <meta name="description" content="Code Exhange, a website showing off a simple, modifiable forum and also a place for people to talk about their code or share challenges and get help with debugging their code.">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="Calloway Sutton">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Calloway Sutton </title>
</head>
<body>
<div class="header">
<h1>Code Exchange</h1>
<p>Sign up for benefits</p>
</div>
  <div class='topnav'>
    <a href='/home/'>
      Home
    </a>
    <a href='/posts/'>
      Posts
    </a>
    <a href='/contact/'>
      Contact
    </a>
    <?php
if (!isset($_SESSION['LOG'])) {
 $_SESSION['LOG'] = false;
}
if ($_SESSION['LOG'] == true) {?>
      <a href='/new/'>
        New Post
      </a>
           <?php
           if ($_SESSION["LOG"] == true) {
            $username = $_SESSION['USERNAME'];
           }
     ?>
      <a href='/c/logout.php' style="float:right">
        Log Out
      </a>
<a href='/user/<?php echo($username); ?>' style="float:right"> <?php echo($username); ?> </a>
      
      <?php
      if (file_get_contents("../../data/users/$username/admin") == "1") { ?>
              <a href='/private'>
                      Administrator
                    </a>
    <?php
    }
} else {
 ?>

      <a href='/login/' style="float:right">
        Log In
      </a>
    <?php
}
?>
  </div>
