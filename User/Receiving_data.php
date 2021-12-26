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
        $Order->customer_name=$_SESSION['user_name'];
        $Order->total_price=50;
        $Order->total_unit=50;
        if(isset($_POST['payment_method'])=="cash")
        {
            $Order->kind="cash";
        }else{
            $Order->kind="visa";
        }
         //  echo $Order->kind;
         // this column in database check if customer recive product or not
         $Order->status="false";         
         $accepted;
        // here we check if quantity is provides
        foreach($_SESSION['product_id'] as $key=>$product_id)
        {
            $product = new Product($db);
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
                foreach($_SESSION['product_id'] as $key=>$product_id)
                {
                    $Order_detailes->order_id=$Order->last_id;
                    $Order_detailes->user_id=$_SESSION['id']; 
                    $Order_detailes->quantity=$_SESSION['product_quantity'][$key];
                    $Order_detailes->price=$_SESSION['product_price'][$key];
                    $Order_detailes->product_id=$product_id;
                    if($Order_detailes->create())
                    {
                    }
                    $product = new Product($db);
                    $product->id=$product_id; 
                    $product->product_quantity=$product_quantity;
                    $product->update_quantity($_SESSION['product_quantity'][$key]);
                }
                    unset($_SESSION['product_id']);
                    unset($_SESSION['product_quantity']);
                    unset($_SESSION['product_price']); 
                    unset($_SESSION["product_num"]);
                    //   $_SESSION['product_id']="";
                    //   $_SESSION['product_quantity']="";
                    //   $_SESSION['product_price']="";
            }
            header("location:paying_process.php");
        }
      
    }
include_once "template/user_templet.php";
//to use sweet alert one time
$_SESSION['success']="";
?> 