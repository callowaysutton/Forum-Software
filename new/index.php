<?php
require "../c/header.php";
$username = $_SESSION['USERNAME'];

?>
<?php 
        if (file_get_contents("../../data/users/$username/banned") == "1") {
          echo "<p><i>Sorry, you\'ve been banned.</i></p>";
      } else {

?>
<div class='container'>
  <h1>New Post</h1>
  <center>
  <div class='postbox'>

       <form action="spost.php" method="post">
<input class='name' name='pname'>
<textarea name='content'>
</textarea>

Post Type: <select name="type">
  <option value="challenge">Challenge</option>
  <option value="per">Personal</option>
  <option value="code">Coding</option>
  <option value='cg'>Code Golf</option>
  <option value="etc">Other</option>
</select><br>
  <input class='sub' type="submit">
  </form>

  </div>
</center>
      <?php } ?>