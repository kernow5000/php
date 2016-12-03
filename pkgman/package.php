<style type="text/css">
//th {bgcolor: lightgray} 
</style>


<?php

// this will present a single package
// will be run in a look for each package there is
// in the pkg base
// a simple style applied to <tr> would be good
// and <td> but not yet :)

$pkg_img="./images/pkg.png";

# a package would be a single table, I guess for now
# each block here is an element
# what about a bit of intelligence to size the table 
if(strstr($GLOBALS["show_pkgfiles"],"true")){
  $table_width=1024;
} else if (strstr($GLOBALS["show_description"],"true")){
    $table_width=1024; 
  }
else $table_width=800;
//echo "table width is $table_width";  // debug

// now begin the table layout for this package
echo "<table border=1 cellspacing=0 width=$table_width align=center>";
echo "<tr>";
echo "<th width=200><img src=$pkg_img></img></th>";
echo "<td bgcolor=lightgray align=center><b>$pkg_name</b></td>";
echo "</tr>";

if(strstr($GLOBALS["show_compressed"],"true")){
echo "<tr>";
echo "<th align=center bgcolor=lightgray>Compressed</th>";
echo "<td align=center>$compressed_size</td>";
echo "</tr>";
}

if(strstr($GLOBALS["show_uncompressed"],"true")){
echo "<tr>";
echo "<th bgcolor=lightgray align=center>Uncompressed</th>";
echo "<td align=center>$uncompressed_size</td>";
echo "</tr>";
}

if(strstr($GLOBALS["show_location"],"true")){
echo "<tr>";
echo "<th bgcolor=lightgray align=center>Location</th>";
echo "<td align=center>$pkg_location</td>";
echo "</tr>";
}

if(strstr($GLOBALS["show_description"],"true")){
echo "<tr>";
echo "<th bgcolor=lightgray align=center valign=top>Description</th>";
echo "<td align=left>";
echo "<p>";
echo $pkg_description;
echo "</p></td>";
echo "</tr>";
}

if(strstr($GLOBALS["show_pkgfiles"],"true")) {
echo "<tr>";
echo "<th bgcolor=lightgray align=center valign=top>Files</th>";
echo "<td align=left>";
echo "<p>";
echo $pkg_files;
echo "</p></td>";
echo "</tr>";
}
       

echo "</table>";
echo "<br>";

?>
	
