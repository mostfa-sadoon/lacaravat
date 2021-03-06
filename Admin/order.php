<?php 
include_once "session.php";
if (!array_key_exists('admin_email', $_SESSION)) {
	header('location:login/login.php');
}
if(isset($_GET['page_title']))
{
$page_title=$_GET['page_title'];
}else{
$page_title="order";
}
$database = new Database();
$db = $database->getConnection();
$Product = new Product($db);
$Category = new Category($db);
$order= new Order($db);
// to count orders in the main order page
$allorder=$order->countall();
$waitingorder=$order->countwaiting();
$recentreceved=$order->recentcount();
$takeactioncount=$order->takeactioncount();
// to show all orders in allorderpage
$records_per_page = 40;
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;
$orders=$order->orders($from_record_num,$records_per_page);
$page_url = "order.php?page_title=all_order&";
$total_rows=$order->countall();
include_once "app/controller/orderController.php";
include_once "dashboard/template/admin_template.php";
?>