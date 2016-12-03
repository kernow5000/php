<?php

function login() {
    echo "<html>";
    echo  "<h1>kernWiki Login</h1>";
    
    echo "<table border=0 cellspacing=0>";
    echo "<form method=POST action=login.php>";
    echo "<tr>";
    echo "<td><b>Username</b></td>";
    echo "<td><input type=text name=username></td>";
    echo "<tr>";
    echo "<tr>";
    echo "<td><b>Password</b></td>";
    echo "<td><input type=password name=password></td>";
    echo "</table>";
    echo "<br>";
    echo "<input type=submit value=Login name=Login>";
    echo "</form>";
    echo "</html>";
}

?>
	
