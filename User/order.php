<?php
include_once 'session.php';  
// instantiate database 
$database = new Database();
$db = $database->getConnection();
// instantiate object table 
$category = new Category($db);
$product = new Product($db);
if(isset($_GET['page_title']))
{
$page_title=$_GET['page_title'];
}else{
$page_title="order";
}
$Order = new Order($db);
$Order->user_id=$_SESSION['id'];
$Order->id=$_GET['id'];
$order=$Order->read();
$products= $Order->orderproduct();
include_once "template/user_templet.php";
$_SESSION['success']="";
?>