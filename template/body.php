<?php
if($page_title=="home")
{
    include_once 'body/home.php';
}elseif($page_title=="about")
{
    include_once 'body/about.php';
}elseif($page_title=="blog")
{
    include_once 'body/blog.php';
}elseif($page_title=="contact")
{
    include_once 'body/contact.php';
}elseif($page_title=="terms")
{
    include_once 'body/terms.php';
}elseif($page_title=="checkout")
{
    include_once 'body/checkout.php';
}elseif($page_title== "products")
{
    include_once 'body/products.php';
}
elseif($page_title== "product_detailes")
{
    include_once 'body/product_detailes.php';
}elseif($page_title== "product_category")
{
    include_once 'body/product_category.php';
}
?>