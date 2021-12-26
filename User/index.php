<?php
include_once 'session.php';  
// instantiate database 
// instantiate object table 
$category = new Category($db);
$product = new Product($db);
$page_title="home";
//functinality of home bage execute in body

$product=$product->readmainproduct();
include_once "template/user_templet.php";
//to use sweet alert one time
$_SESSION['success']="";
?>