<div class="mb-3">
    <a class="btn btn-primary text-light" href="<?php echo "category.php?page_title=add_product_category&cat_id=".$_GET['id'].""; ?>">add new product</a> 
</div>
<div class="row">
<?php
    if($total_rows>0){
        while ($row = $products->fetch(PDO::FETCH_ASSOC)){   
            extract($row);?>
              <div class="col-lg-4 col-xlg-3">
                <div class="card">
                    <img class="card-img-top img-responsive"  src="../uploads/product/<?php echo $img; ?>" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="font-normal"><?php echo $name ?></h3>
                         <span class="mr-2">quantity</span><span class="label label-info label-rounded"><?php echo $quantity; ?></span>
                        <p class="m-b-0 m-t-20">Titudin venenatis ipsum aciat. Vestibulum ullamcorper quam. nenatis ipsum ac feugiat. Ibulum ullamcorper</p>
                        <div class="d-flex m-t-20">
                            <button class="btn p-l-0 btn-link ">Read more</button>
                            <div class="ml-auto align-self-center">
                            <a href="<?php echo "product.php?page_title=edit_product&id=".$id."&redirect=show_category&cat_id=".$_GET['id'].""; ?>" class="btn btn-success text-light"> <i class="fas fa-edit"></i> </a>
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