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
?>