<?php
        include_once 'session.php';  
        // instantiate database 
        $database = new Database();
        $db = $database->getConnection();
        // instantiate object table 
        $category = new Category($db);
        $product = new Product($db);
        $page_title="cash";
        //the logic of the form is here
    if(isset($_POST['receving_data']))
    {
        $Order = new Order($db);
        $Order->user_id=$_SESSION['id'];
        $Order->phone1=$_POST['phone1'];
        $Order->phone2=$_POST['phone2'];
        $Order->orderaddress=$_POST['orderaddress'];
        $Order->city=$_POST['city'];
        $Order->customer_name=$_SESSION['name'];
        $Order->total_price=  $_SESSION['total_price'];
        $Order->total_unit=$_SESSION['product_num'];
        if(isset($_POST['payment_method'])=="cash")
        {
            $Order->kind="cash";
        }else{
            $Order->kind="visa";
        }
         // this column in database check if customer recive product or not
         $Order->status="false";         
         $accepted;
        // here we check if quantity is provides
        foreach($_SESSION['product_id'] as $key=>$product_id)
        {
            $product=new Product($db);
            $product->id=$product_id;
            $product->check_quantity();
            if($product->quantity >= $_SESSION['product_quantity'][$key])
            {
            $accepted=true;                      
            }else{
            $accepted=false;
             header("location:quantity_error.php");
            }
        }
        if($accepted==true)
        {
            if($Order->create())
            {       
                $Order_detailes = new Order_detailes($db);
                // Check if $myList is indeed an array or an object.           
                foreach($_SESSION['product_id'] as $key=>$product_id)
                {
                    $Order_detailes->order_id=$Order->last_id;
                    $Order_detailes->user_id=$_SESSION['id']; 
                    $Order_detailes->product_name=$_SESSION['product_name'][$key]; 
                    $Order_detailes->quantity=$_SESSION['product_quantity'][$key];
                    $Order_detailes->price=$_SESSION['product_price'][$key];
                    $Order_detailes->total_price=$_SESSION['product_quantity'][$key]*$_SESSION['product_price'][$key];
                    $Order_detailes->product_id=$product_id;
                    if($Order_detailes->create())
                    {
                        $product = new Product($db);
                        $product->id=$product_id; 
                        $product->product_quantity=$product_quantity;
                        $product->update_quantity($_SESSION['product_quantity'][$key]);
                    }
                } 
                      unset( $_SESSION['product_id']);
                      unset( $_SESSION['product_quantity']);
                      unset( $_SESSION['product_price']);
                      unset( $_SESSION['product_name']);
                      unset( $_SESSION['product_num']);
                      $_SESSION['success']="you puy product successfully";
                      $id=$Order->last_id;
                      header("location:order.php?id=".$id);
            }
           
        }   
    }
include_once "template/user_templet.php";
//to use sweet alert one time
?> 