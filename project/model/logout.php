<?php
session_start(); // Start the session

// Unset all of the session variables.
$_SESSION = [];

// Destroy the session.
session_destroy();

// Redirect to the homepage or login page after logging out
header('Location: ../../../project/index.php');
exit();
?>
