<?php

// mysql connection library
// this only supports one db connection at a time really but it will do
// kernow 8/11/2005


// connect to a db
// server,user,password,database
function db_connect($dbHost,$dbUser,$dbPassword,$dbDatabase) {
    
    // do we need to check the params to see if they exist? not really..
    //echo "<br>connecting to server<br>";
    $db = mysql_connect ($dbHost,$dbUser,$dbPassword);
    
    if ($db == NULL) {
	// failed connect to server/database
	db_error(mysql_error());
	return;
    }
    	
    //echo "selecting database<br>";	
    $result = mysql_select_db($dbDatabase,$db);
    
    if (!$result) {
	// failed select db
	db_error(mysql_error());
	return;
    }
    
    //echo "connection to database successful<br>";
    // end of function	
}


// execute a database query
function db_query($sql) {
    //echo "<br>executing the SQL query<br>";
    $result = mysql_query($sql);
    if (!$result) {
	db_error(mysql_error());
	return;
    } else return $result;
}
// this needs to work better for select statements

// just an error wrapper
function db_error($err) {
    echo "<b>$err</b>";
}


// closes a database thats open
function db_close() {
    //echo "<br>closing the database handle<br>";
    mysql_close($db);
    db_error(mysql_error());
    return;
}
// does this close the nonglobal created in db_connect?


// end of useful db utils 
// kernow 2005

?>
	
