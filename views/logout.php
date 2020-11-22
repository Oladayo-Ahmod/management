<?php
// starting session
session_start();
// destroy session
session_destroy();
// redirect to the login page
header('location: ../index.php');
?>
