<?php
include_once 'session.php';  
// instantiate database 
$database = new Database();
$db = $database->getConnection();
// instantiate object table 
$category = new Category($db);
$product = new Product($db);
$page_title="Payment_method";
include_once "template/user_templet.php";
//to use sweet alert one time
$_SESSION['success']="";
?> 