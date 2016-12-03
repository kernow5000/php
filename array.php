<?php

  // fucking around with arrays

  $dir="/var/log/packages/";

  $fd = opendir($dir);
   
  $pkg_array = array();
  
  while ($file = readdir($fd)) {
    if($file != "." && $file !="..") {
    // increment pkg_count
    //echo "$file<br>";
    $pkg_array[$pkg_count] = $file;
    next($pkg_array);
    $pkg_count+=1;
    }
  }


  fclose($fd);
  sort($pkg_array);
  
  for ($i = 0; $i<=$pkg_count -1; $i+=1) {
     echo "pkg_array[$i] is $pkg_array[$i]<br>";
  }  

  $len=sizeof($pkg_array);
  echo "size of array = $len<br>";
  echo "pkg_count = $pkg_count<br>";
?>