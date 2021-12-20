<div class="mb-3">
    <a class="btn btn-primary text-light" href="<?php echo "product.php?page_title=add_product"; ?>">add product</a> 
</div>
<div class="row">
<?php
    if($total_rows>0){
        while ($row = $products->fetch(PDO::FETCH_ASSOC)){   
            extract($row);?>
           <div class="col-lg-4 col-xlg-3">
                <div class="card">
                    <img class="card-img-top img-responsive" src="../uploads/product/<?php echo $img; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="font-normal"><?php echo $name ?></h3>
                        <span>quantity: <span class="label label-info label-rounded"><?php echo $quantity; ?></span></span>
                        <p>price:<?php echo $price ?>$</p>
                        <p>title:<?php echo $title ?></p>
                        <p class="m-b-0 m-t-20"><?php echo  substr($description,0,60);?></p>
                        <div class="d-flex m-t-20">
                            <button class="btn p-l-0 btn-link ">Read more</button>
                            <div class="ml-auto align-self-center">
                                <a href="<?php echo "product.php?page_title=edit_product&id=".$id."&redirect=all_product"; ?>" class="btn btn-success text-light"> <i class="fas fa-edit"></i> </a>
                                <a href="<?php echo "product.php?page_title=delete_product&id=".$id."&redirect=all_product"; ?>" class="btn btn-danger text-light"> <i class="fas fa-trash-alt"></i> </a>
                                <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-share-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
   <?php
        }
        }
     ?>
</div>
   <?php
       if($total_rows>5)
       {
           include_once '../paging.php'; 
       }
   ?>