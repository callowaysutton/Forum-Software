<?php
require "../c/header.php";
?>
<style>
span {
  float: right;
}
</style>
<div class='container'>
  <h1>
    <?php
$path    = "../../data/posts/" . $_GET["id"];
$userDir = "../../data/user/";
if ($_SESSION["LOG"] == true) {
 $username = $_SESSION['USERNAME'];
}
echo (file_get_contents("$path/0/title"));

$type = file_get_contents("$path/0/type");

if ($type == "challenge") {
 echo ("</h1> <span class='t-challenge'>CHALLENGE</span>");
}

if ($type == "per") {
 echo ("</h1> <span class='t-per'>PERSONAL</span> ");
}

if ($type == "cg") {
 echo ("</h1> <span class='t-cg'>CODE GOLF</span> ");
}

if ($type == "code") {
 echo ("</h1> <span class='t-code'>CODE</span> ");
}

if ($type == "etc") {
 echo ("</h1> <span class='t-etc'>OTHER</span> ");
}

$status = file_get_contents("$path/0/status");
if ($status == "open") {
 echo (" <span class='open'>OPEN</span>");
}

if ($status == "solved") {
 echo (" <span class='solved'>SOLVED</span>");
}

if ($status == "issue") {
 echo (" <span class='ISSUE'>ISSUE</span>");
}
?>
<br><br>
  <center>
    <div class='post'>
      <div class='op'>
        <?php echo (file_get_contents("$path/0/poster")); ?> posted at <?php echo (file_get_contents("$path/0/time")) ?>
      </div>
      <div class='pc'>
        <?php echo (preg_replace("~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~",
 "<a href=\"\\0\">\\0</a>", file_get_contents("$path/0/contents"))); ?>
      </div>
    </div>
<?php
$files = glob("$path/_*");
usort($files, function ($a, $b) {
 return filemtime($a) < filemtime($b);
});
$files = array_reverse($files);
foreach ($files as $post) {
 ?>
  <br><br>
  <div class='post'>
    <div class='pi'>
      <?php echo (file_get_contents("$post/poster")); ?> replied at <?php echo (file_get_contents("$post/time")) ?>
    </div>
    <div class='pc'>
      <?php echo (preg_replace("~[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]~",
  "<a href=\"\\0\">\\0</a>", file_get_contents("$post/contents"))); ?>
    </div>
  </div>
  <?php

}
if ($_SESSION["LOG"] == true) {
 ?>
    <?php
if (file_get_contents("../../data/users/$username/banned") == "1") {
  echo "<p><i>Sorry, you\'ve been banned.</i></p>";
 } else {
  ?>
    <h2>Reply</h2>
    <div class='postbox'>
             <form action="reply.php?post=<?php echo ($_GET["id"]); ?>" method="post">
      <textarea name='content' class='rep'></textarea>
      <input class='sub' type="submit">
    </form>
  </div>
        <?php }?>
        <?php
} else {
 ?>
    <p><i>You need to be logged in to reply</i></p>
<?php
}
?>
  </center>
