<html>
<body>
	        
<?php

// just add a new entry

$wikibody = $_POST['wikibody'];

echo "<h2>Processing entry</h2>";

$postDate = date("Y-n-j h:i:s");
//echo "wiki post date is : $postDate";
//echo "<br>";

// strip html special chars, so that html is disabled basically
$wikibody = htmlspecialchars($wikibody,ENT_QUOTES);
// strip newlines from body and replace with linebreaks
$wikibody = nl2br($wikibody);
//echo "formatted wikibody is : <br><br>$wikibody<br>";

// we must do a regexp on $wikibody here to get [img] tags 
// and turn them into proper html <img> tags
// just a little rework on the string as it will be the only tag allowed
$wikibody = preg_replace ("/\[img\](http:\/\/.*?)\[\/img\]/i", "<img src=\"\\1\">", $wikibody);
$wikibody = $text = preg_replace ("/\[(.*?)\](.*?)\[\/\\1\]/i", "invalid image tag data", $wikibody); 
// does that allow us to use img tags?


// include my db helper utils
include "db-utils.php";
db_connect ("localhost","web","skunky","wiki");

// setup some query text
$query ="INSERT INTO entry (timestamp,wikiText) VALUES ('$postDate','$wikibody')";

// hmm what about select queries and the like we need to return the value somehow
$result = db_query($query);

//echo "added successfully.";

// close the database when finished
db_close();


//echo "<br>";
//echo "<br>";
//echo "<a href="index.php">Back to main index page.</a>";

Header ("Location: ./wiki.php");
exit;

echo "</body>";
echo "</html>";
?>
