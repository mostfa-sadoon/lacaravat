<?php
if($page_title=="dashboard")
{
    include_once 'body/dashboard.php';
}elseif($page_title=="category")
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
elseif($page_title=="main_product")
{
    include_once 'body/product/main_product.php';
}elseif($page_title== "product")
{
    include_once 'body/product/product.php';
}
elseif($page_title== "product_detailes")
{
    include_once 'body/product_detailes.php';
}elseif($page_title== "product_category")
{
    include_once 'body/product_category.php';
}
?>