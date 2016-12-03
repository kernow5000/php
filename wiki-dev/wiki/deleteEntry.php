<?php

// delete a single entry
// the ID is fed in via the url at the moment, its not the best
// but it will do at present, gg mentioned a hidden field like
include "db-utils.php";

// get the ID from the URL
$entryID = $_GET['id'];
echo "deleting $entryID<br>";
db_connect ("localhost","web","skunky","wiki");
$sql="delete from entry where id=$entryID";
$result = db_query($sql);
db_close();

if($result) {
    echo "wiki entry $entryID deleted succesfully<br><br>";
}else {
    echo db_error(mysql_error());
}

Header("Location: ./wiki.php");
exit;

?>
