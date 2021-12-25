<?php
include_once 'session.php';  
// instantiate database 
$database = new Database();
$db = $database->getConnection();
// instantiate object table 
$category = new Category($db);
$product = new Product($db);
$page_title="checkout";
// this process to get the img of product in the cart
if(isset($_SESSION['product_id']))
{
     $id=[];
    // print_r ($_SESSION['product_id']);
     foreach($_SESSION['product_id'] as $product)
     {
        array_push($id,$product);
     }
     $product = new Product($db,$id); 
     $imgs= $product->customproduct();
}
include_once "template/user_templet.php";
?>