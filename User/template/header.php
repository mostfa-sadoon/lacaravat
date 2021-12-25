 <!-- <?php
 $stmt=$category->read();
 ?>
 <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->

                        <a href="<?php echo"index.php" ?>" class="logo">
                            <img src="assets/images/logo.png" width="50px" height="50px" class="imglogo" /> La <span class="mainColor"> Cravate</span>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="<?php echo"index.php" ?>" class="active">Home</a></li>
                            <!-- ***** Menu Start ***** -->
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Products</a>
                                 
                                <div class="dropdown-menu">
                                    <?php
                                        while ($row_category = $stmt->fetch(PDO::FETCH_ASSOC)){
                                                extract($row_category);
                                                echo ' <a class="dropdown-item" href="product_category.php?cat_id='.$id.'">'.$name.'</a>';
                                                // echo $row_category['name']; 
                                            }           
                                    ?>
                                </div>
                            </li>
                            <!-- <li><a href="products.html">Products</a></li> -->
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo"about.php" ?>">About Us</a>
                                    <a class="dropdown-item" href="<?php echo"blog.php" ?>">Blog</a>
                                    <a class="dropdown-item" href="<?php echo"Testimonials.php" ?>">Testimonials</a>
                                    <a class="dropdown-item" href="<?php echo"Terms.php" ?>">Terms</a>
                                </div>
                            </li>
                            <li><a href="<?php echo"contact.php" ?>">Contact</a></li>
                            <li>
                                <?php
                                  if(array_key_exists('email', $_SESSION)){?> 
                                     <img class="profile img-fluid" src="assets/images/userImg.jpg">
                                         <!-- Profile -->
                                <!-- ============================================================== -->
                                <li class="nav-item dropdown" >
                                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="dashboard/assets/images/users/1.jpg" alt="user" class="profile-pic" /></a>
                                    <div class="dropdown-menu dropdown-menu-right animated flipInY" >
                                        <ul class="dropdown-user">
                                            <li>
                                                <div class="dw-user-box">
                                                    <div class="u-img"><img src="assets/images/userImg.jpg" alt="user"></div>
                                                    <div class="u-text">
                                                        <h4>Steave Jobs</h4>
                                                        <p class="text-muted"><?php echo $_SESSION['email']; ?></p></div>
                                                </div>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                            <li>
                                            <a href="<?php echo "logout.php" ?>"><i class="fa fa-power-off"></i> Logout </a></li>
                                        </ul>
                                    </div>
                                </li>

                                  <?php
                                  }
                                ?>
                            </li>
                            <li>
                                <a href="<?php echo"checkout.php?pagetitle=checkout" ?>">
                                    <i class="fa fa-shopping-cart" style=" font-size: 20px;"><span class="text-danger " style="font-size:22px; font-weight:bold;"><?php  if( array_key_exists("product_num", $_SESSION)) {echo  $_SESSION["product_num"]; }?></span></i>
                                </a>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** --> 