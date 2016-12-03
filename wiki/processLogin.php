<?php

$username = $_POST['username'];
$password = $_POST['password'];

echo "<h2>Processing entry</h2>";

//echo "username is : $username";
//echo "<br>";
//echo "MD5 password hash : ", md5($password);
//echo "<br>";
//echo "<a href=\"login.php\">Back to login page for testing.</a>";

// here we need to use db-utils.php to check the sum of the $password 
// if its the same as the one in the database for $username, then 
// $successful_login=true,else false. and present them with index.php
// no plans for a user admin frontend as yet. all done via phpmyadmin
// too complex for this simple shite project really.

// when its actually working enable this and set cookie to say we are logged in
Header("Location: ./index.php");
exit;


?>

