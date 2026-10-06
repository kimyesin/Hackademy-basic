<?php

session_save_path('./');
session_start();

// delete session
$_SESSION = array();
session_destroy();

// Redirect to the login page
header("Location: index.php");
exit();
?>
<!--logout.php-->

<h1>logout...</h1>
