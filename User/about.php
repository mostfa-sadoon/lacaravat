<?php
include_once 'session.php';  
// instantiate database 
$database = new Database();
$db = $database->getConnection();
// instantiate object table 
$category = new Category($db);
$product = new Product($db);
$page_title="about";
//functinality of home bage execute in body
$product=$product->readmainproduct();
include_once "template/user_templet.php";
?>