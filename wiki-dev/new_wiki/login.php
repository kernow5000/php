<?php

// oh my god this needs a rewrite already
// do two querys, one to lookup the user, the another for the password
// this way we can check if the user exists then match up his password after

include "include/db-utils.php";

// get parameters from login form
$userID = $_POST['username'];
$password = $_POST['password'];

// check the password or something, then go back to login if not
db_connect ("localhost","web","skunky","wiki");
// what about multiple instances of the same username? hmm
$sql="select username,password from user where username = '$userID' ";
$result = db_query($sql);
$row = mysql_fetch_row($result);
db_close();

$MD5pass = md5($password);

// debug the information
//echo "<b>Your login information</b><br>";
//echo "username : $userID<br>";
//echo "password : $password<br>";
//echo "MD5 pass : $MD5pass<br>";

$dbUsername = $row[0];
$dbMD5pass = $row[1];

//echo "<br><b>Database query result</b><br>";
//echo "username : $dbUsername<br>";
//echo "MD5 pass : $dbMD5pass<br>";

if (strcmp ($userID, $dbUsername) == 0) {
    if (strcmp ($MD5pass, $dbMD5pass) == 0) {
	echo "<br><b>Login successful.</b><br>";
	// call index here I guess
	// fucks up on bad or no password, sigh
    }
} else {
    echo "<br><b>Access denied, please supply a valid username and password.</b><br>";
}


?>
