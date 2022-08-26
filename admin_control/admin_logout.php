
<?php
session_start(); // start session
session_destroy();  // Delete whole session
// OR
unset($_SESSION['username']); 

?>