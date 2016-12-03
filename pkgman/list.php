<?php

// GLOBALS
// slackware package information location - I doubt this will ever change.
$pkgdir="/var/log/packages/";
$pkg_array=array();
$pkg_number=0;

// we can use the name of the file
// as slackware uses the name of the file and its the same as
// the PACKAGE-DESCRIPTION in the file anyway.
function get_pkg_information($in) 
{
$linecount=0;
$where = $GLOBALS["pkgdir"];
$where .= $in;

// fill out the table.
$pkg_name=$in;
$pkg_location=$where;
$pkg_description="<br>";
$pkg_files="";
$compressed_size=0;
$uncompressed_size=0;

// now we actually DO need to fopen() the file
$fp=fopen($where,"r");

// loop through the pkg info file line by line
// getting the required information out
while (!feof($fp)) {
  $linecount+=1;
  $line=fgets($fp,4096);
  
  // get the compressed size
  if($linecount==2) {
    $compressed_size .=$line;
  } 
  
  //get the uncompressed size
  if($linecount==3) {
    $uncompressed_size .=$line;
  }  

  // the textual description
  // this exists in ALL official slackpkgs that come with the distro
  // but not ALL home made ones come with this description
  if(!strstr($line,"PACKAGE")) {
   $pkg_description .= "$line<br>";
  }
 
  // now the pkg files
  if(strstr($line,"FILE LIST")) {
  $pkg_files .= "<br>";
  while (!feof($fp)) {
    $temp = fgets($fp,4096);
    $pkg_files .="$temp<br>";
  }
 }


  // now a tiny bit of trimming
  $compressed_size=strstr($compressed_size,"SIZE:");
  $uncompressed_size=strstr($uncompressed_size,"SIZE:");
 
  //done!

}

// close the pkgfile
fclose($fp);

$pkg_description = str_replace ("FILE LIST:","",$pkg_description);
// I need to check if this is empty somehow
// so that I can replace it with a message saying it has no description
$len = strlen($pkg_description);
if($len == 9) {
  $pkg_description = "<center>This package has no description.</center>";
}
// seems to be 9 when 'empty' - I have no idea why though.


// and now this will fill out a new package table template? maybe
include "package.php";

// end of function
}

// finally produce a sorted list of packages
function get_pkgs_array()
{
$fd=opendir($GLOBALS["pkgdir"]);
$pkg_array = array();
$pkg_count=0;
  
  while ($file = readdir($fd)) {
    if($file != "." && $file !="..") {
    // store in array element
    $pkg_array[$pkg_count] = $file;
    // increment array position
    next($pkg_array);
    // increment pkg counter
    $pkg_count+=1;
    }
  }

  // close the file
  fclose($fd);

  // sort the array
  sort($pkg_array);
    
  for ($i = 0; $i<=$pkg_count -1; $i+=1) {
     //echo "pkg_array[$i] is $pkg_array[$i]<br>";
     get_pkg_information($pkg_array[$i]);
  }  
 
  $GLOBALS["pkg_number"] = $pkg_count;

// the function is finished and works!
}


// this is where the function is called.
get_pkgs_array();

// get how many pkgs installed
echo "<table border=1 cellspacing=0 width=350 align=center>";
echo "<tr>";
echo "<th align=center bgcolor=lightgray>Number of packages installed</th>";
echo "<td align=center>";
echo $GLOBALS["pkg_number"];
echo "</td>";
echo "</tr>";
echo "</table>";
echo "<br>";

// end
?>