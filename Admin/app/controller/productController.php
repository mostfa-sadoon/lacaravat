<?php
 // show main product 
 if( $page_title=="main_product")
  {
   $products=$Product->readmainproduct();
  }
  if($page_title=="all_product")
  {
    $products = $Product->readAll($from_record_num, $records_per_page);
    $page_url = "product.php?page_title=all_product&";
    $total_rows=$Product->countAll();
  }
  // add page
  if($page_title=="add_main_product" || $page_title=="add_product")
  {
    $stmt=$Category->read();
  }
  // store product
  if(isset($_POST['add_main_product']) || isset($_POST['add_product']))
  {
    $image_err="";
    $img=$_FILES['img'];
    $imgname=$img['name'];
    $imgtype=$img['type'];
    $imgtmp=$img['tmp_name'];
    $imgsize=$img['size'];
    // list of allowed file type to upload
    $imageallowextension=array("jpeg","jpg","png","gif");
    $imageextension=explode(".",$imgname);
    $imageextension=end($imageextension);
    $imageextension=strtolower($imageextension);
    // echo $imageextension;
    if(in_array($imageextension,$imageallowextension))
    {
      //  echo "good this type is allowed";
    } 
    else {
       $image_err="this extension not allowed";
    }
    if(empty($imageextension))
    {
      $image_err="you should chose image";
    }
    if($imgsize>4193040)
    {   
       $image_err ="the image must be less than 4 mb";
    }
    if(empty($image_err))
    {
       $img=rand(0,10000000000)."_".$imgname;
       move_uploaded_file($imgtmp,"../uploads/product//".$img);
       $product = new Product($db);
       $product->name=$_POST['name'];
       $product->description=$_POST['desc'];
       $product->img =$img;
       $product->quantity=$_POST['quantity'];
       $product->price=$_POST['price'];
       $product->title=$_POST['title'];
       $product->cat_id=$_POST['cat_id'];
       $product->status="true";
       if(isset($_POST['add_main_product']))
       {
        $product->shows="main";
        $product->create();
        header("location:product.php?page_title=main_product");
       }else{
        $product->shows="sub";
        $product->create();
        header("location:product.php?page_title=all_product");
       }
    }
  }

  //edit product
  if($page_title=="edit_product")
  {
    $stmt=$Category->read();
    $Product->id=$_GET['id'];
    $Product->readone();
    $Category->id=$Product->cat_id;
    $Category->readName();
  }
  //update product
  if(isset($_POST['update_product']))
  {
    $Product = new Product($db);
      if(!empty($_FILES['img']))
      {
        $image_err="";
        $img=$_FILES['img'];
        $imgname=$img['name'];
        $imgtype=$img['type'];
        $imgtmp=$img['tmp_name'];
        $imgsize=$img['size'];
        // list of allowed file type to upload
        $imageallowextension=array("jpeg","jpg","png","gif");
        $imageextension=explode(".",$imgname);
        $imageextension=end($imageextension);
        $imageextension=strtolower($imageextension);
        // echo $imageextension;
        if(in_array($imageextension,$imageallowextension))
        {
          //  echo "good this type is allowed";
        } 
        else {
          $image_err="this extension not allowed";
        }
        if(empty($imageextension))
        {
          $image_err="you should chose image";
        }
        if($imgsize>4193040)
        {   
          $image_err ="the image must be less than 4 mb";
        }
        if(empty($image_err))
        {
            $img=rand(0,10000000000)."_".$imgname;
            move_uploaded_file($imgtmp,"../uploads/product//".$img);
        }
      }
      if(empty($imgname))
      {
        // because if update product with out change img
        $img=$_POST['old_img'];
      }
      $Product->name=$_POST['name'];
      $Product->description=$_POST['desc'];
      $Product->img =$img;
      $Product->quantity=$_POST['quantity'];  
      $Product->price=$_POST['price'];
      $Product->title=$_POST['title'];
      $Product->cat_id=$_POST['cat_id'];
      if(isset($_POST['status']))
      {
        $Product->status="true"; 
      }else{
        $Product->status="false"; 
      }
      if(isset($_POST['shows']))
      {
        $Product->shows="main"; 
      }else{
        $Product->shows="sub"; 
      }
       $Product->id=$_POST['id'];
       $Product->update();
        
        $_POST['redirect'];
       if(isset($_POST['redirect'])=="show_category")
       {
        header("location:category.php?page_title=show_category&id=".$_POST['cat_id']."");
       }  
 //      header("location:product.php?page_title=".$_POST['redirect']);
  }
  if($page_title=="delete_product")
  {
    $Product = new Product($db);
    $Product->id=$_GET['id'];
    $Product->delete();
    $redirect=$_GET['redirect'];
    header("location:product.php?page_title=".$redirect);
  }

?>