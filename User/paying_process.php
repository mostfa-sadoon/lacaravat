<?php
include_once 'session.php';  
// instantiate database 
$database = new Database();
$db = $database->getConnection();
// instantiate object table 
$category = new Category($db);
$product = new Product($db);
$Order_detailes = new Order_detailes($db);
$Order = new Order($db);
$Order->user_id=$_SESSION['id'];
$page_title="paying_process";
$stmt=$Order->read();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
include_once "template/user_templet.php";
?>