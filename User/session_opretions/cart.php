<?php
//start cart
if(!isset($_SESSION['product_id']))
{
    $_SESSION['product_id']=[];
    $_SESSION['product_name']=[];
    $_SESSION['product_price']=[];
    $_SESSION['product_quantity']=[];
   
    $_SESSION['total_price']="";
}
if(!isset($totlaprice))
{
    $totlaprice=0;
}
if($_POST)
{
     // desplay the count of product
        if(isset($_POST['add_to_cart']))
        {
            if(isset($_SESSION['product_num']))
            {
                $_SESSION["product_num"] += $_POST['quantity'];
            }else{
                $_SESSION["product_num"] = $_POST['quantity'];
            }
            array_push($_SESSION['product_name'],$_POST['name']);
            array_push($_SESSION['product_price'],$_POST['price']);
            array_push($_SESSION['product_quantity'],$_POST['quantity']);
            array_push($_SESSION['product_id'],$_POST['product_id']);
            // to display alert message
            $_SESSION['success']="product add to cart successfuly";
        }
        if(isset($_POST['change']))
        {
            // start number of item
            $index=$_POST['index'];
            $old_product_quantity= $_SESSION['product_quantity'][$index];
            $_SESSION['product_quantity'][$index]=$_POST['qty'];
            $all_product_num= $_SESSION['product_quantity'][$index]-$old_product_quantity;
            $_SESSION['product_num']+=  $all_product_num;
            // end number of item
            // all price of item
            foreach($_SESSION['product_quantity'] as $key=>$product)
            {
                $totlaprice+=$product*$_SESSION['product_price'][$key];
                $_SESSION['total_price']=$totlaprice;
            }
        }
        if(isset($_POST['remove']))
        {
            $index=$_POST['index'];
            $old_product_quantity= $_SESSION['product_quantity'][$index];
            unset( $_SESSION['product_quantity'][$index]);
            unset( $_SESSION['product_name'][$index]);
            unset( $_SESSION['product_id'][$index]);
            unset( $_SESSION['product_price'][$index]);
            $_SESSION['product_num']-=  $old_product_quantity;
        }
        // return redirect to last bage
        if(isset($_POST['redirect_rout']))
        {
            $redirect_rout=$_POST['redirect_rout'].".php";
            if($redirect_rout=="home.php")
            {
                $redirect_rout ="index.php";
            }elseif($redirect_rout == "product_category.php")
            {
                // we get the cat_id here because the product_category.php need cat_id to get all product under this filed
                $cat_id=$_POST['cat_id'];
                $redirect_rout ="product_category.php?cat_id=".$cat_id;
            } 
        }
 }
    if(isset($_SESSION['product_quantity'])!="")
    {
        foreach($_SESSION['product_quantity'] as $key=>$product)
        {
            if(!isset($_POST['change']))
            {
                $totlaprice+=$product*$_SESSION['product_price'][$key];
                $_SESSION['total_price']=$totlaprice;
            }
        }
    }
          
    if(isset($_POST['redirect_rout']))
    {
        header('Location:'.$redirect_rout);
    }
//end cart
?>