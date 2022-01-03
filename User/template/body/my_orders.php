<?php 
if($total_rows > 0)
{?>
<div class="container">
   <div class="row mt-5"> 
         <?php 
                foreach($rows as  $key=>$row) {?>
               <div class="card-body col-8 ">
               <table class="table mt-5 table-striped table-dark">
                        <thead>               
                            <tr>
                                <td></td>
                                <td>title</td>
                                <td>quantity</td>
                                <td>status</td>
                                <td>price</td> 
                                <td>total_price</td> 
                            </tr>   
                        </thead>
                        <tbody>
                            <?php 
                                $Order->id=$row['id'];
                                $products= $Order->orderproduct();
                                $count=1;
                                foreach($products as $product)
                                {?>
                                        <tr>
                                            <th scope="row"><?php echo $count; ?></th>
                                                <td><?php echo $product['product_name'] ?></td>   
                                                <td><?php echo $product['quantity'] ?></td>
                                                <td><?php if($row['status']=="false"){echo "unpaied";} else{echo "paid";} ?></td>
                                                <td><?php echo $product['price'] ?></td>
                                                <td><?php echo $product['total_price'] ?></td>
                                        </tr>      
                                <?php
                                $count++;
                                }
                            ?>
                               
                                <tr>
                                    <td>date</td>
                                    <td><?php echo $row['created_at']; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?php echo $row['total_price']; ?></td> 
                                </tr>
                        </tbody>
              </table>
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
                           if($row['phase']=="phase2" || $row['phase']=="phase3")
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
               <!-- the review of user -->
                <div class="container">
                    <div class="row">
                            <?php
                                if($row['phase']=="phase3")
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
                                }elseif($row['phase']=="cancel")
                                {?>
                                    <div class="alert alert-danger mt-5" role="alert">
                                            the order is canceled
                                    </div>
                                <?php
                                }
                            ?> 
                    <div>
                </div>
                <!-- the end review of user -->
            <?php
                } 
                ?>
</div>   
<?php
}else{?>
<!-- no orders yet -->
        <div class="container mt-5">
             <div class="row mt-5">
                 <div class="col-md-8 mt-5">
                      
                  </div>


                  <div class="col-md-8 mt-5">
                      <div class="card">
                            <div class="card-body d-flex justify-content-center">
                                you have no order yet
                            </div>
                        </div> 
                  </div>
             </div>
        </div> 
<?php
}
?>
 
              