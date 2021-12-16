<?php 
include_once "session.php";
if(isset($_GET['page_title']))
{
$page_title=$_GET['page_title'];
}else{
$page_title="category";
}
$database = new Database();
$db = $database->getConnection();
$Category = new Category($db);
include_once "app/controller/categoryController.php";
include_once "dashboard/template/admin_template.php";
?>