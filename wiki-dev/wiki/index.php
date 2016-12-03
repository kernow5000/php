<?php

  echo "<title>kernWeb Enterprises</title>";

// we need to check the cookie here else the user wouldn't even get this far.
// and we need to use this index as the 'hub' and call the rest of the functions from here
// shouldn't be too hard to rework the code really.
// or do we call login from here?
// 
include "entry.php";
include "login.php";
// what about signalling invalid login hmm

// if no cookie, login
login();

?>
