<?php

// mySQL connection functions
// apparently only supports one connection at a time, but thats enough for me.
// kernow 8/11/2005
// updated 23/4/2006
// cleaned up 15/8/2006


// Eonnect to a database
// parameters are <server,user,password,database>
function db_connect($dbHost,$dbUser,$dbPassword,$dbDatabase) {
    
    // no real validation needed on parameters because it'll pass or fail anyway logging in to mysql
    
    // connect to the DB server
    $db = mysql_connect ($dbHost,$dbUser,$dbPassword);
    
    if ($db == NULL) {
	// failed connect to server/database
	db_error("Cannot connect to server.");
	return;
    }

    // connected, select the database
    $result = mysql_select_db($dbDatabase,$db);
    
    if (!$result) {
	// failed selecting database
	db_error("Cannot select db");
	return;
    }
}


// Execute a database query
// apparently this needs to work better for select statements but i can't remember why
function db_query($sql) {

    $result = mysql_query($sql);
    if (!$result) {
	db_error("Error executing SQL.");
	return;
    } else return $result;
}


// just an error wrapper
function db_error($err) {

    echo "<b>$err</b>";
}


// closes a database thats open
// or does it ? whats the return code?
// does this close the nonglobal created in db_connect?
function db_close() {

    $result = mysql_close($db);
    if ($result) {
	db_error("Error closing db");
	return;
    }
}


?>
	
