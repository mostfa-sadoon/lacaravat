<div class="mb-3">
    <a class="btn btn-primary text-light" href="<?php echo "product.php?page_title=add_main_product"; ?>">add main product</a> 
</div>
<div class="row">
    <?php
    while ($row = $products->fetch(PDO::FETCH_ASSOC)){   
        extract($row);?>
        <div class="col-lg-4 col-xlg-3">
        <div class="card">
            <img class="card-img-top img-responsive" src="../uploads/product/<?php echo $img; ?>" alt="Card image cap">
            <div class="card-body">
                <h3 class="font-normal"><?php echo $name; ?></h3>
                <span class="label label-info label-rounded">Technology</span>
                <p class="m-b-0 m-t-20">Titudin venenatis ipsum aciat. Vestibulum ullamcorper quam. nenatis ipsum ac feugiat. Ibulum ullamcorper</p>
                <div class="d-flex m-t-20">
                    <button class="btn p-l-0 btn-link ">Read more</button>
                    <div class="ml-auto align-self-center">
                    <a href="<?php echo "product.php?page_title=edit_product&id=".$id.""; ?>" class="btn btn-success text-light"> <i class="fas fa-edit"></i> </a>
                    <a href="<?php echo "product.php?page_title=delete_product&id=".$id."&redirect=main_product"; ?>" class="btn btn-danger text-light"> <i class="fas fa-trash-alt"></i> </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <?php
        } 
    ?>
</div>