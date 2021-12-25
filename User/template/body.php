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
elseif($page_title=="Payment_method")
{
    include_once 'body/Payment_method.php';
}
elseif($page_title=="cash")
{
    include_once 'body/receving_data.php';
}
elseif($page_title=="paying_process")
{
    include_once 'body/paying_process.php';
}
elseif($page_title=="quantity_error")
{
    include_once 'body/quantity_error.php';
}
?>