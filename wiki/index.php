<HTML>	
	<style type="text/css">
	A {text-decoration:	 none}
	</style>
	
	<title>kernWeb Enterprises</title>
		
<BODY>	
	<?php
        
        // we need to check the cookie here else the user wouldn't even get this far.
        // and we need to use this index as the 'hub' and call the rest of the functions from here
	// shouldn't be too hard to rework the code really.

        include "entry.php";

        echo "<h1>Welcome to kernWiki</h1>";		
        echo "<a href=\"newEntry.php\">Add new Wiki Entry</a><br>";
        echo "<a href=\"logout.php\">Logout</a><br>";
        echo "<br>";

        // list the wiki entries below with a simple query
	// maybe this should be in its own file to keep this cleaner? I dunno
        include "db-utils.php";
        db_connect ("localhost","web","skunky","wiki");

        $sql="select id,timestamp,wikiText from entry order by timestamp DESC";
        $result = db_query($sql);
        // another query for user somehow, argh! - so the proper user comes up
        $username = "Shaun";
        // not sure how we get this out, but hmm.. maybe we need to edit all our tables

        while($row = mysql_fetch_row($result))
        {
	    // create a nice looking entry box with date etc, from entry.php
	    entry($row[0],$username,$row[1],$row[2]);
	}

        db_close();
?>
	
</BODY>
</HTML>
