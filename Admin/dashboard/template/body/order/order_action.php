<!--- start phsee one when recive the order from the costomer --->
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
                <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="hidden" name="order_id" value="<?php echo $_GET['order_id']; ?>"> 
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
                                <input type="submit" name="accepted" value="accepted" class="btn btn-success" <?php  if($order->phase == "phase2" ||$order->phase == "phase3" || $order->phase == "cancel"){echo "disabled";} ?>>
                                <input type="submit" name="cancel" value="cancel" class="btn btn-danger"<?php if($order->phase == "cancel"){echo "disabled";}?>>
                             </div>
                </form>
            </div>    
     </div>   
</div>
<!--- end phsee one when recive the order from the costomer --->


<!--- start phsee two  when accepted the order from the costomer --->
   <?php
   if($order->phase == "phase2"  || $order->phase == "phase3")
   {?>
      <div class="row mt-3">
          <!--- start delivery man info --->
                    <div class="col-md-3 border" style="  border-width:5px !important;">
                        <h3>delivery man</h3>
                        <form class="row">
                            <div class="form-group col-md-4">
                                name
                            </div>
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control" value="mostafa saadoun" disabled> 
                            </div>
                            <div class="form-group col-md-4">
                                number
                            </div>
                            <div class="form-group col-md-8">
                                <input type="number" class="form-control" value="0123456789" disabled> 
                            </div>
                        </form>
                    </div>   
            <!--- end delivery man info --->

            <!--- start phase two --->
            <div class="col-md-9 border" style="  border-width:5px !important;">
                        <h3 class="text-center text-success">phase two</h3>
                                 <p class="text-center">the delivery man take order and go to client</p>
                    <div class="row">
                             <div class="col-6">
                             <p>accepted ordar date <span  class="text-success"><?php echo $order->accepted_date ?></span></p>
                             </div>   
                    </div>   
                 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <input type="hidden" name="order_id" value="<?php echo $_GET['order_id']; ?>"> 
                    <div class="text-center">
                                <input type="submit" name="finish" value="finish" class="btn btn-success" <?php  if($order->phase == "phase3"){echo "disabled";} ?> >
                                <input type="submit" name="finish" value="finish" class="btn btn-danger">
                             </div>
                    </div>
                 </form>
             <!--- start end two --->
      </div>
   <?php
   }
   ?>

<!--- end phsee two  when accepted the order from the costomer --->

<!--- start phsee two  when accepted the order from the costomer --->
<?php
   if($order->phase == "phase3")
   {?>
      <div class="row mt-3">
          <!--- start delivery man info --->
                    <div class="col-md-3 border" style="  border-width:5px !important;">
                        <h3>delivery man</h3>
                        <form class="row">
                            <div class="form-group col-md-4">
                                name
                            </div>
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control" value="mostafa saadoun" disabled> 
                            </div>
                            <div class="form-group col-md-4">
                                number
                            </div>
                            <div class="form-group col-md-8">
                                <input type="number" class="form-control" value="0123456789" disabled> 
                            </div>
                        </form>
                    </div>   
            <!--- end delivery man info --->

            <!--- start phase two --->
            <div class="col-md-9 border" style="  border-width:5px !important;">
                        <h3 class="text-center text-success">phase three</h3>
                        <div class="row">
                                <div class="col-6">
                                <p>received ordar date <span  class="text-success"><?php echo $order->accepted_date ?></span></p>
                                </div>   
                        </div>                    
            </div>
             <!--- start end two --->
      </div>
   <?php
   }
   ?>
  <?php
      if($order->phase =="phase3")
      {?>
          
          <div class="text-center">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled>المنتج ميه الميه والناس دس صح الصح</textarea>
                    </div>
            </div>
         
      <?php
      }
  ?>

<!--- end phsee two  when accepted the order from the costomer --->