<?php
  // read all category
  if($page_title== "category")
  {
    $stmt=$Category->read();
  }
  //store category
  if(isset($_POST['add_category']))
  {
      $Category->name=$_POST['cat_name'];
      $Category->create();
      header("location:category.php");
  }
  //delete category
  if($page_title=="delete_category")
  {
      $Category->id=$_GET['id'];
      $Category->destroy();
      header("location:category.php");
  }
  //edite category
  if( $page_title=="edite_category")
  {
    if(isset($_GET['id']))
    {
      $Category->id=$_GET['id'];
      $Category->readName();
    } 
  }
  //update
  if(isset($_POST['edite_category']))
  {
      $Category->id=$_POST['id'];
      $Category->name=$_POST['cat_name'];
      $Category->Update();
      header("location:category.php");
  }
  //show
  if( $page_title=="show_category")
  {
    $cat_id=$_GET['id'];
    $product = new Product($db);
    $products = $product->readAllbycategoy($from_record_num, $records_per_page,$cat_id);
    $page_url = "category.php?cat_id=".$cat_id."&page_title=show_category";
    $total_rows=$product->countAll("cat_id",$cat_id);
  }
    if(isset($_POST['add_product']) && $page_title="add_product")
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
    $product = new Product($db);
    $product->name=$_POST['name'];
    $product->description=$_POST['desc'];
    $product->img =$img;
    $product->quantity=$_POST['quantity'];
    $product->price=$_POST['price'];
    $product->title=$_POST['title'];
    $product->cat_id=$_POST['cat_id'];
    $product->status="true";
    $product->shows="sub";
    $product->create();
    header("location:category.php");
    }
?>
