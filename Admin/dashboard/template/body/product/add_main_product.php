      <form class="mt-5"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">  
    <div class=" row ">
        <label for="example-text-input" class="col-2 col-form-label">product img</label>
        <div class=" col-8">
                <div class="card">
                <div class="card-body">
                    <label for="input-file-now-custom-2">You can set the height</label>
                    <input type="file" name="img" id="input-file-now-custom-2" class="dropify" data-height="500" required />
                    </div>
                </div>  
        </div>
    </div>           
    <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">select category</label>
        <div class="col-8">
            <select name="cat_id" class="form-control form-control">
              <?php
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    ?>
                    <option  value="<?php echo $id; ?>"><?php echo $name ?></option>
                    <?php
                    }
              ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">product name</label>
        <div class="col-8">
            <input class="form-control" name="name" type="text"  id="example-text-input" placeholder="product name">
        </div>
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">product title</label>
        <div class="col-8">
            <input class="form-control" name="title" type="text"  id="example-text-input" placeholder="title of product">
        </div>
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">product description</label>
        <div class="col-8">
        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">product price</label>
        <div class="col-8">
            <input class="form-control" name="price" type="number"  id="example-text-input" placeholder="price of product">
        </div>
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">product quantity</label>
        <div class="col-8">
            <input class="form-control" name="quantity" type="number"  id="example-text-input" placeholder="quantity of product">
        </div>
    </div>        
    <div class="form-group row">
        <label for="example-color-input" class="col-2 col-form-label"></label>
        <div class="col-2">
            <input  type="submit" name="add_main_product" value="add category" class="form-control btn btn-primary text-light">
        </div>
    </div>
   </form>
             
  