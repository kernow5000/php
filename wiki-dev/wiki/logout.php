<?php

echo "Goodbye ! - clearing your clientvars or something I dunno.";
// clear the .. whatever is left over, here...
// we need to unset everything we have for this user, on the way out

Header("Location: ./index.php");
exit;

?>
