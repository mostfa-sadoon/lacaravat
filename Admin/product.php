<?php 
include_once "session.php";

if (!array_key_exists('admin_email', $_SESSION)) {
	header('location:login/login.php');
}
if(isset($_GET['page_title']))
{
$page_title=$_GET['page_title'];
}else{
$page_title="product";
}
$database = new Database();
$db = $database->getConnection();
$Product = new Product($db);
$Category = new Category($db);
include_once "app/controller/productController.php";
include_once "dashboard/template/admin_template.php";
?>