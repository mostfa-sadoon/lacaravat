<div class="row ">
     <div class="col-md-3 border" style="  border-width:5px !important;">
          <h3>delivery man</h3>
           <form class="row">
              <div class="form-group col-md-4">
                   name
               </div>
               <div class="form-group col-md-8">
                   <input type="text" class="form-control"> 
               </div>
               <div class="form-group col-md-4">
                   number
               </div>
               <div class="form-group col-md-8">
                   <input type="number" class="form-control"> 
               </div>
           </form>
     </div>   
     <div class="col-md-9 border  border-primary" style="  border-width:2px !important;">
            <div class="text-center">
                <h2 class="text-primary">phase 1</h2>
                <form>
         
                    <div class="row">
                                <div class="form-group col-md-3 d-flex ">
                                customer name
                                </div>
                                <div class="form-group col-md-9 d-flex">
                                    <input type="text" value="<?php echo $order->customer_name;?>" class="form-control" disabled> 
                                </div>
                                            <?php
                                                 while ($row = $Orderdetailes->fetch(PDO::FETCH_ASSOC)){
                                                     extract($row);?>
                                                <div class="row mt-2">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                    <div class="col-md-4">product name</div>
                                                                    <div class="col-md-8"><input type="text" value="<?php echo $product_name; ?>" class="form-control" disabled> </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="row">
                                                                    <div class="col-md-4">qnty</div>
                                                                    <div class="col-md-8"><input type="number" value="<?php echo $quantity; ?>" class="form-control" disabled> </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                        <div class="row">
                                                                    <div class="col-md-4">price</div>
                                                                    <div class="col-md-8"><input type="number" value="<?php echo $price; ?>" class="form-control" disabled> </div>
                                                            </div>
                                                        </div>
                                                </div>     
                                            <?php
                                            }
                                            ?>
                              
                                   <div class="form-group mt-2  col-md-3 d-flex">
                                    address
                                    </div>
                                    <div class="form-group mt-2 col-md-9 d-flex">
                                        <input type="text" class="form-control" disabled> 
                                    </div>

                                    <div class="form-group mt-2 col-md-3 d-flex">
                                    phone1
                                    </div>
                                    <div class="form-group mt-2 col-md-9 d-flex">
                                        <input type="text" value="<?php echo $order->phone1;?>" class="form-control" disabled> 
                                    </div>


                                    <div class="form-group mt-2 col-md-3 d-flex">
                                    phone 2
                                    </div>
                                    <div class="form-group mt-2 col-md-9 d-flex">
                                        <input type="text" value="<?php echo $order->phone2;?>" class="form-control" disabled> 
                                    </div>
                                    
                                     <div class="row">
                                        
                                       <div class="form-group mt-2 col-md-3 ">
                                        application date
                                        </div>
                                        <div class="form-group mt-2 col-md-5 ">
                                            <input type="text" value="<?php echo $order->created_at;?>" class="form-control" disabled> 
                                        </div>
                                        <div class="col-md-4"></div>

                                        <div class="form-group mt-2 col-md-3 ">
                                        total unite
                                        </div>
                                        <div class="form-group mt-2 col-md-5 ">
                                            <input type="text" value="<?php echo $order->total_unit;?>" class="form-control" disabled> 
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="form-group mt-2 col-md-3 ">
                                        total price
                                        </div>
                                        <div class="form-group mt-2 col-md-5">
                                            <input type="text" value="<?php echo $order->total_price;?>" class="form-control" value="fdfd" disabled> 
                                        </div>
                                        <div class="col-md-4"></div>
                                     </div>

                                     
                                           
                      </div>
                      
                              
                            <div class="text-center">
                                 <button class="btn btn-success">accepted</button>

                                 <button class="btn btn-danger">accepted</button>
                             </div>
                                 


                </form>
            </div>    
     </div>   
</div>
