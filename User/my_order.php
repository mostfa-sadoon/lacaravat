<?php
include_once 'session.php';  
// instantiate database 
$database = new Database();
$db = $database->getConnection();
// instantiate object table 
$category = new Category($db);
$product = new Product($db);
$page_title="my_orders";
$Order = new Order($db);
$Order->user_id=$_SESSION['id'];
$total_rows=$Order->myorderscount();
$rows=$Order->myorders($from_record_num, $records_per_page);
// $page_url = "my_order.php?page_title=my_orders&";
include_once "template/user_templet.php";
//to use sweet alert one time
$_SESSION['success']="";
?> 