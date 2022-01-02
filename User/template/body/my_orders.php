
<div class="container">
   <div class="row mt-5"> 
         <?php 
                foreach($rows as  $key=>$row) {?>
               <div class="card-body col-8 ">
               <table class="table table-striped table-dark">
                        <thead>               
                            <tr>
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
                                                <td>paid</td>
                                                <td><?php echo $product['price'] ?></td>
                                                <td><?php echo $product['total_price'] ?></td>
                                        </tr>
                        </tr>
                                <?php
                                $count++;
                                }
                            ?>
                        </tbody>
              </table>
            </div>
            <?php
                } 
                ?>
</div>    
              