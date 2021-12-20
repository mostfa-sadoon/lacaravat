
<!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Our <em>Products</em></h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>
            <div class="row">
            <?php
                if($total_rows>0){
                    while ($row = $products->fetch(PDO::FETCH_ASSOC)){   
                        extract($row);?>
                            <div class="col-lg-4">
                                <div class="trainer-item">
                                    <div class="image-thumb">
                                        <img src="assets/images/product-1-720x480.jpg" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span>
                                            <del><sup>$</sup>15.00</del> <sup>$</sup>17.00
                                        </span>
                                        <h4><?php echo $name; ?></h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>
                                        <ul class="social-icons">
                                            <li><a href="<?php echo "productdetailes.php?page_title=".$page_title."&id=".$id."" ?>">+ Order</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    else{
                    
                }
                    ?>
               </div>
            <br>
                  <?php include_once 'paging.php'; ?>
            <nav>
                <!-- <ul class="pagination pagination-lg justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul> -->
            </nav>
        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->
