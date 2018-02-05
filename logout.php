<?php
// This page is used for user log out.
// If the log out button is clciked, the session will be destroyed.
session_start();
$_SESSION["isloggedin"] = false;
unset($_SESSION['isloggedin']); 
session_destroy();
header('Location: login.html');
?>