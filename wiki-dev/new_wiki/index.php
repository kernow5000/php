<?php

  echo "<title>kernWeb Enterprises</title>";

// we need to check the cookie here, and show the login screen if no cookie exists
// and we need to use this index as the 'hub' and call the rest of the functions from here

include "entry.php";
include "userLogin.php";



// what about signalling invalid login hmm
// if no cookie, login
login();

?>
