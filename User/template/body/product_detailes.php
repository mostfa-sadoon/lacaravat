  <!-- ***** Call to Action Start ***** -->
  <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2><del><sup>$</sup>18.00</del> <em><sup>$</sup>17.00</em></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section">
        <div class="container">
            <br>
            <br>

            <div class="row">
                <div class="col-md-8">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="../uploads/product/<?php echo $product->img; ?>" alt="First slide" height='350px'>
                        </div>
                        <!-- <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                             <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> 
                        </ol> -->
                        <!-- <div class="carousel-inner">

                             <div class="carousel-item">
                                <img class="d-block w-100" src="assets/images/product-image-1-1200x600.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/images/product-3-720x480.jpg" alt="Third slide">
                            </div> 
                    </div> -->
                        <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a> -->
                    </div>

                    <br>
                  
                </div>
                <div class="col-md-4">
                    <div class="contact-form">
                        <h2><?php echo $product->name ?></h2>
                           <p><?php echo $product->price ?><span>$</span></p>
                        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                           <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                           <input type="hidden" name="redirect_rout" value="<?php echo $_GET['page_title']; ?>">
                           <input type="hidden" name="cat_id" value="<?php echo $product->cat_id; ?>">
                            <input type="hidden" name="title" value="<?php echo $product->name; ?>"> </input>
                            <input type="hidden" name="price" value="<?php echo $product->price; ?>"> </input>
                            <div class="form-group">
                                <p><?php echo $product->desc ?></p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Quantity</label>

                                    <input type="number" name="quantity" placeholder="1" value="1">
                                </div>
                            </div>
                            <div class="main-button">
                                <!-- <a href="checkout.html">Add to cart</a> -->
                                <input type="submit" name="add_to_cart" value="add to cart" >
                            </div>
                        </form>
                    </div>

                    <br>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <hr>
                    <p>
                        Copyright © 2021 SD Solutions - Template by: <a href="https://sdsolutionseg.com/">sdsolutionseg.com</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enquiry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
                </div>
                <div class="modal-body">
                    <div class="contact-us">
                        <div class="contact-form">
                            <form action="#" id="contact">
                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset>
                                            <input type="text" class="form-control" placeholder="Enter full name" required="">
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                        <fieldset>
                                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset>
                                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <fieldset>
                                                    <input type="text" class="form-control" placeholder="From date" required="">
                                                </fieldset>
                                            </div>

                                            <div class="col-md-6">
                                                <fieldset>
                                                    <input type="text" class="form-control" placeholder="To date" required="">
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>