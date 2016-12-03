
<HTML>

<TITLE>The PHP Slackware Package Viewer</TITLE>
		
<BODY>	

<?php

// strange bugs:
// its blue instead of light gray in IE.. typical
// when files field is very very long, the colour spills out of the bottom of the table
// its not very easy to use at the moment, look into making it more dynamic :(

echo "<h2><center>The PHP Slackware Package Browser.</center></h2>";

include "config.php";

// set the amount we want to show per page, and where to start
$perPage=5;
$startAt=0;


// including this will run the 'getpkgs()' function
// which in turn will fill out the information in the pkgdir
include "list.php";

?>

</BODY>
       
</HTML>	
       
