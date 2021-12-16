   
   
   <form class="mt-5"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
     <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">    
     <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">category name</label>
            <div class="col-8">
                <input class="form-control" name="cat_name" type="text"  value="<?php  echo $Category->name; ?>"  id="example-text-input" placeholder="category name">
            </div>
        </div>

        <div class="form-group row">
            <label for="example-color-input" class="col-2 col-form-label"></label>
            <div class="col-2">
                <input  type="submit" name="edite_category" value="edite category" class="form-control btn btn-primary text-light">
            </div>
        </div>
   </form>
             
  