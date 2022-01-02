<?php
   if($_SESSION['id']==$order['user_id'])
   {?>
            <div class="container">
      <h1 class="text-center">your order</h1>
   <div class="row mt-5"> 
               <div class="card-body col-6">
                  <table class="table table-stripe  mt-2 mb-2">
                     <thead>
                        <tr>
                           <th scope="col">title</th>
                           <th scope="col">quantity</th>
                           <th scope="col">status</th>
                           <th scope="col">price</th>
                           <th scope="col">total_price</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           foreach($products as $key=>$product)
                           {?>
                                 <tr>
                                 <td><?php echo $product['product_name'] ?></td>
                                 <td><?php echo $product['quantity'] ?></td>
                                 <td>paid</td>
                                 <td><?php echo $product['price'] ?></td> 
                                 <td><?php echo $product['total_price'] ?></td> 
                              </tr>   
                           <?php
                           }
                        ?>
                        <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td><?php echo $order['total_price']; ?></td> 
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class="col-md-3">
               </div>
               <div class="col-md-3 mt-5">
                     <div class="row mt-3">
                              <div class="col-md-8 ">
                                 your request prepared
                                 <p>we will cinact with you</p>
                              </div>
                              <div class="col-md-4">
                              <i class="far fa-dolly-flatbed-alt" style="font-size:40px"></i>
                              </div>
                     </div>
                     <?php
                           if($order['phase']=="phase2" || $order['phase']=="phase3")
                           {?>
                                    <div class="row mt-3">
                                       <div class="col-md-8 ">
                                             <p class="text-success"> congratulation  </p>
                                             <p class="text-success">the order is in the way to you</p>
                                       </div>
                                       <div class="col-md-4 ">
                                       <i class="far fa-dolly-flatbed-alt" style="font-size:40px; color:green"></i>
                                       </div>
                                 </div>
                           <?php
                           }
                     ?>
               </div>
   </div>
</div>
<!-- the review of user -->
<div class="container">
<div class="row">
      <?php
         if($order['phase']=="phase3")
         {?>
         <div class="col-md-8">
            <h2> your review </h2>
               <form>
                  <div class="form-group mt-5">
                        <textarea type="text" class="form-control"></textarea>
                  </div>
                     <input type="submit" name="review" value="your review" class="btn btn-success">
               </form>
         </div>
         <div class="col-md-4  mt-5">
               <img src="assets/images/ecommerce.jpg" class="img-fluid">
         </div>    
         <?php
         }elseif($order['phase']=="cancel")
         {?>
               <div class="alert alert-danger mt-5" role="alert">
                     the order is canceled
               </div>
         <?php
         }
      ?> 
<div>
</div>
   <?php
   }else{?>
          <div class="alert alert-danger mt-5" role="alert">
             this order not belongs  to you
          </div>
   <?php
   }
?>
