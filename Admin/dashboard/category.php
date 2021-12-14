<?php 
if(isset($_GET['page_title']))
{
$page_title=$_GET['page_title'];
}else{
$page_title="category";
}
include_once "template/admin_template.php";
?>