<?php

// this just saves the edited entry using a simple INSERT query
$id = $_POST['id'];
$wikibody = $_POST['wikibody'];

echo "<html>";
echo "<body>";

//echo "<font color=blue>ID is $id</font><br>";
//echo "<font color=red><i>$wikibody</i></font>";

echo "applying changes for entry $id<br>";
include "db-utils.php";
db_connect ("localhost","web","skunky","wiki");
$sql = "UPDATE entry SET wikiText = '$wikibody' WHERE id = '$id'";
$result = db_query($sql);
db_close();

Header("Location: ./wiki.php");
exit;


?>
