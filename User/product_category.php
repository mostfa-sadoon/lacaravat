<?php
include_once 'session.php';  
// instantiate database 
$database = new Database();
$db = $database->getConnection();
// instantiate object table 
$category = new Category($db);
$product = new Product($db);
$page_title="product_category";
$cat_id= $_GET['cat_id'];
//functinality of home bage execute in body
$products = $product->readAllbycategoy($from_record_num, $records_per_page,$cat_id);
$page_url = "product_category.php?cat_id=".$cat_id."&";
$total_rows=$product->countAll("cat_id",$cat_id);
include_once "template/user_templet.php";
//to use sweet alert one time
$_SESSION['success']="";
?> 