<?php

include "db-utils.php";

$login = $_POST['username'];
$pass = $_POST['password'];

// check the password or something, then go back to login if not
db_connect ("localhost","web","skunky","wiki");

//grrr ARGFHHH fucking SQL
$sql="select username,password from user";
$result = db_query($sql);
$row = mysql_fetch_row($result);
db_close();

//echo "<br>$row[1]<br>";
//$pass = md5($pass);
//echo $pass;

#echo "<br>$row[0] = $login<br>";
#$pass = md5($pass);
#echo "<br>$row[1] = $pass<br>";

# just join it up for now, sigh this needs a rewrite
include "wiki.php";

?>
