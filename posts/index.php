<?php
require "../c/header.php";
?>

<style>
body {font-family: Arial, Helvetica, sans-serif;

}
* {box-sizing: border-box;}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
    background-color: white;
}

button[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

button[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: white;
    padding: 20px;
}
</style>

<?php
$path = "../../data/posts";
$files = glob("$path/*" );
usort($files, function ($a, $b) {
    return filemtime($a) < filemtime($b);
});
?>
<center>
<div class="container">
<?php
foreach ($files as $post) {
    ?>
  <br><br>
  <div class='post'>
    <a class='hide' href='<?php echo (substr($post, strrpos($post, '/') + 1)) ?>'>
    <div class='pi'>
      <?php
$path = $post;
    $files = glob("$path/_*");
    $rep = count($files);
    ?>
       <?php echo (file_get_contents("$post/0/poster")); ?> <span style='float: center;'><b><?php echo (file_get_contents("$post/0/title")); ?></b></span><span style='float: right;'><?php echo ($rep); ?> replies</span>

       <?php
$path = $post;
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

    $status = file_get_contents("$post/0/status");
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
    </div>
    <div class='pc'>
      <?php echo (file_get_contents("$post/0/contents")); ?>

    </div>
  </div>

<?php
}
?>
