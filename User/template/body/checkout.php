 <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Easy <em>Checkout</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <br>   
            <br>
             
            <div class="row">
                <div class="col-md-8">

                   <!-- product info -->
                        <div class="row">   
                            
                             <?php
                                 foreach($_SESSION['product_name'] as $key =>$product)
                                 {
                                     ?>
                                         <div class="image-thumb col-md-2">
                                            <img class="img-fluid" src="../uploads/product/<?php echo $imgs[$key]['img'];?>"  alt="">
                                          </div>
                                        <div class="card-body col-md-10">
                                            <div class="card-title">
                                            <h5><?php echo $product; ?></h5>
                                            </div>
                                            <div class="card-text">
                                                <h5><?php echo $_SESSION['product_price'][$key] ;?>$</h5>
                                                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">    
                                                    <input type="number" name="qty" id="qty" value="<?php echo $_SESSION['product_quantity'][$key] ;?>">
                                                    <input type="hidden" name="index" value="<?php echo $key; ?>">
                                                    <input type="submit"  name="change" class="btn btn-secondary ml-4 btn-sm " value="change">
                                                </form>
                                                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                                <input type="hidden" name="index" value="<?php echo $key; ?>">
                                                    <input type="submit"  name="remove" class="btn btn-danger ml-4 btn-sm float-right" value="remove">
                                                </form>
                                            </div>
                                        </div> 
                                 <?php
                                 }
                             ?>
                         </div>
                 <!--  end product info -->
                    <div class="contact-form">
                        <form id="contact" action="" method="post">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <label>Payment method</label>

                                    <select>
                                          <option value="">-- Choose --</option>
                                          <option value="cash">Cash</option>
                                          <option value="paypal">PayPal</option>
                                     </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="main-button">
                                        <div class="float-left">
                                            <a href="#">Back</a>
                                        </div>
                                        <div class="float-right">
                                            <?php if(!empty($_SESSION['product_price']))
                                                   {?>
                                                         <a href="<?php  if(!array_key_exists('email', $_SESSION)) {echo "login/login.php?page_title=Payment_method";}else{echo "Payment_method.php?page_title=Payment_method"; } ?>">Finish</a>
                                                   <?PHP
                                                   }
                                            ?> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <br>
                </div>

                <div class="col-md-4">
                    <ul class="list-group list-group-no-border">
                        <li class="list-group-item" style="margin:0 0 -1px">
                            <div class="row">
                                <div class="col-6">
                                    <strong>Sub-total</strong>
                                </div>

                                <div class="col-6">
                                    <h5 class="text-right">$ 128.00</h5>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item" style="margin:0 0 -1px">
                            <div class="row">
                                <div class="col-6">
                                    <strong>Extra</strong>
                                </div>

                                <div class="col-6">
                                    <h5 class="text-right">$ 0.00</h5>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item" style="margin:0 0 -1px">
                            <div class="row">
                                <div class="col-6">
                                    <strong>Tax</strong>
                                </div>

                                <div class="col-6">
                                    <h5 class="text-right">$ 10.00</h5>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item" style="margin:0 0 -1px">
                            <div class="row">
                                <div class="col-6">
                                    <h4><strong>Total</strong></h4>
                                </div>

                                <div class="col-6">
                                    <h4 class="text-right"><?php echo $totlaprice;?></h4>
                                </div>
                            </div>
                        </li>

                        
                    </ul>

                    <br>
                </div>
            </div>
        </div>
    </section>
