<?php
if(isset($_GET['page_title']) == "order_action" && isset($_GET['order_id']))
{
    $order= new Order($db);
    $order->id=$_GET['order_id'];
    $Orderdetailes= new Orderdetailes($db);
    $Orderdetailes->order_id=$_GET['order_id'];
    $Orderdetailes=$Orderdetailes->readorderdetailes();
    $order->read();
}
?>