<?php
include_once 'session.php';  
// instantiate database 
$database = new Database();
$db = $database->getConnection();
// instantiate object table 
$category = new Category($db);
$product = new Product($db);
$page_title="products";
//functinality of home bage execute in body
$products = $product->readAll($from_record_num, $records_per_page);
$page_url = "products.php?";
$total_rows=$product->countAll();
include_once "template/user_templet.php";
//to use sweet alert one time
$_SESSION['success']="";
?> 