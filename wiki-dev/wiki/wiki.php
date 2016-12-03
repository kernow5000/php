<?php

echo "<title>kernWeb Enterprises</title>";

echo "<h1>Welcome to kernWiki</h1>";		
echo "<a href=\"newEntry.php\">Add new Wiki Entry</a><br>";
echo "<a href=\"logout.php\">Logout</a><br>";
echo "<br>";
    


// list the wiki entries below with a simple query
// maybe this should be in its own file to keep this cleaner? I dunno
include "db-utils.php";
include "entry.php";
db_connect ("localhost","web","skunky","wiki");

$sql="select id,timestamp,wikiText from entry order by timestamp DESC";
$result = db_query($sql);
// another query for user somehow, argh! - so the proper user comes up
// not sure how we get this out, but hmm.. maybe we need to edit all our tables

while($row = mysql_fetch_row($result))
{
    // create a nice looking entry box with date etc, from entry.php
    entry($row[0],$_GLOBALS['username'],$row[1],$row[2]);
}

db_close();


