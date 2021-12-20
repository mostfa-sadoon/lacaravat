<form class="mt-5"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">   
 <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
 <input type="hidden" name="old_img" value="<?php echo $Product->img; ?>">
    <!-- this hidden input for redirect back -->
 <input type="hidden" name="redirect" value="<?php echo $_GET['redirect']; ?>">
    <div class=" row ">
        <label for="example-text-input" class="col-2 col-form-label">product img</label>
        <div class=" col-8">
                <div class="card">
                <div class="card-body">
                    <label for="input-file-now-custom-2">You can set the height</label>
                    <input  data-default-file="../uploads/product/<?php echo $Product->img; ?>" type="file" name="img" id="input-file-now-custom-2" class="dropify" data-height="500" />
                    </div>
                </div>  
        </div>
    </div>           
    <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">select category</label>
        <div class="col-8">
            <select name="cat_id" class="form-control form-control">
            <option selected  value="<?php echo $Product->cat_id; ?>"><?php echo $Category->name;?></option>
              <?php
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    ?>
                    <option  value="<?php echo $id; ?>"><?php echo $name; ?></option>
                    <?php
                    }
              ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">product name</label>
        <div class="col-8">
            <input class="form-control" name="name" value="<?php echo $Product->name; ?>" type="text"  id="example-text-input" placeholder="product name">
        </div>
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">product title</label>
        <div class="col-8">
            <input class="form-control" name="title" value="<?php echo $Product->title; ?>" type="text"  id="example-text-input" placeholder="title of product">
        </div>
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">product description</label>
        <div class="col-8">
        <textarea class="form-control" name="desc"  id="exampleFormControlTextarea1" rows="6"><?php echo $Product->description;?></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">product price</label>
        <div class="col-8">
            <input class="form-control" name="price" value="<?php echo $Product->price;?>"  type="number"  id="example-text-input" placeholder="price of product">
        </div>
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">product quantity</label>
        <div class="col-8">
            <input class="form-control" name="quantity" value="<?php echo $Product->quantity; ?>"  type="number"  id="example-text-input" placeholder="quantity of product">
        </div>
    </div>     
    
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">show in main</label>
        <div class="col-8">
        <input type="checkbox" name="shows" <?php if($Product->shows=="main"){ echo "checked";} ?>  class="js-switch"  data-color="#009efb" />
        </div>
    </div>     

    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">show</label>
        <div class="col-8">
        <input type="checkbox" name="status" <?php if($Product->status=="true"){ echo "checked";} ?> class="js-switch" data-color="#009efb" />
        </div>
    </div>     

    
    <div class="form-group row">
        <label for="example-color-input" class="col-2 col-form-label"></label>
        <div class="col-2">
            <input  type="submit" name="update_product" value="edit product" class="form-control btn btn-primary text-light">
        </div>
    </div>
   </form>
             
  