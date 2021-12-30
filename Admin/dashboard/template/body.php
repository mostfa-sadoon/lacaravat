<?php
if($page_title=="dashboard")
{
    include_once 'body/dashboard.php';
}
// category 
elseif($page_title=="category")
{
    include_once 'body/category/category.php';
}elseif($page_title=="add_category")
{
    include_once 'body/category/add_category.php';
}elseif($page_title=="edite_category")
{
    include_once 'body/category/edite_category.php';
}elseif($page_title=="show_category")
{
    include_once 'body/category/show_category.php';
}
elseif($page_title=="add_product_category")
{
    include_once 'body/category/add_product.php';
}
//product
elseif($page_title=="main_product")
{
    include_once 'body/product/main_product.php';
}
elseif($page_title=="add_product")
{
    include_once 'body/product/add_product.php';
}
elseif($page_title=="edit")
{
    include_once 'body/product/add_product.php';
}
elseif($page_title=="edit_product")
{
    include_once 'body/product/edit_product.php';
}
elseif($page_title=="all_product")
{
    include_once 'body/product/all_product.php';
}
elseif($page_title=="add_main_product")
{
    include_once 'body/product/add_main_product.php';
}
elseif($page_title== "product_detailes")
{
    include_once 'body/product_detailes.php';
}elseif($page_title== "product_category")
{
    include_once 'body/product_category.php';
}
//order
elseif($page_title=="order")
{
    include_once 'body/order/main.php';
}
elseif($page_title=="all_order")
{
    include_once 'body/order/all_order.php';
}
elseif($page_title=="order_action")
{
    include_once 'body/order/order_action.php';
}
?>