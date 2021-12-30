<?php
// to display the orders in order_action page
if(isset($_GET['page_title']) == "order_action" && isset($_GET['order_id']))
{
    $order= new Order($db);
    $order->id=$_GET['order_id'];
    $Orderdetailes= new Orderdetailes($db);
    $Orderdetailes->order_id=$_GET['order_id'];
   $rows=$Orderdetailes->readorderdetailes();
    $order->read();
}
if(isset($_POST['accepted']))
{
    $order= new Order($db);
    $order->id=$_POST['order_id'];
    $order->phase="phase2";
    $order->update();
    header("location:order.php?page_title=order_action&order_id=".$_POST['order_id']);
}
if(isset($_POST['finish']))
{
    $order= new Order($db);
    $order->id=$_POST['order_id'];
    $order->phase="phase3";
    $order->update();
    header("location:order.php?page_title=order_action&order_id=".$_POST['order_id']);
}
if(isset($_POST['cancel']))
{
    $order= new Order($db);
    $order->id=$_POST['order_id'];
    $order->phase="cancel";
    $order->update();
    // in this function we use join
    $Orderdetailes= $order->orderproduct();
    $product=new product($db);
    foreach($orderdetailes as $key=>$row)
    {
        $product->id=$row['product_id']; 
        $product->update_quantity($row['quantity']);
    }
}

?>