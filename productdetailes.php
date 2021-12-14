<?php
include_once 'session.php';  
$id=isset($_GET['id'])? $_GET['id']:die('ERROR: missing ID');
// instantiate database 
$database = new Database();
$db = $database->getConnection();
// instantiate object table 
$category = new Category($db);
$product = new Product($db);
$page_title="product_detailes";
$product->id = $id;
if(isset($_GET['cat_id']))
{
     $cat_id=$_GET['cat_id'];
     $product->readOne('cat_id',$cat_id);
}else{
    $product->readOne();
}
include_once "template/user_templet.php";
?>