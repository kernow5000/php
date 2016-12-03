<?php

function entry($id,$wikiUser,$timeStamp,$wikiText) {

    // we have to get the proper user out somehow, gulp
echo "<table border=0 cellspacing=0 width=800 align=center>";
echo "<tr>";
echo "<th bgcolor=lightgray width=800 align=left valign=top><font size=3>Posted by $wikiUser at $timeStamp</th></font>";
echo "</tr>";


echo "<tr>";
echo "<td align=left valign=top width=800><p>$wikiText</p></td>";
echo "</tr>";
    
echo "<tr>";
echo "<td align=right width=800 valign=top><a href=editEntry.php?id=$id>Edit</a>/<a href=deleteEntry.php?id=$id>Delete</a></td>";
echo "</tr>";

echo "</table>";
echo "<br>";
}
    
?>
	
