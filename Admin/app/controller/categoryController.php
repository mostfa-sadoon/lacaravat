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
?>
