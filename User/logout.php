<?php
include_once 'session.php';
 unset($_SESSION['username']);
// // destroy the session
 session_destroy();
 header('location: login/login.php');
?>