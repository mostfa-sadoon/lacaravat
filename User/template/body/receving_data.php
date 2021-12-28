<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>payment <em>cash </em></h2>
                        <p>Paiement when recieving</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->
      
     <div class="container">
           <div class="text-center">
                <h2>Receiving data</h2>
           </div>                
           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="mb-5"> 
               <input type="hidden" name="payment_method" value="<?php if(isset($_GET['page_title'])=="cash"){echo "cash";}else{echo "credit";} ?>">
                    <div class="form-group col-12">
                        <label for="exampleInputEmail1">address</label>
                        <input type="text" name="orderaddress" class="form-control" value="<?php if(isset($_SESSION['address'])){echo $_SESSION['address'];}?>"id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your receving address">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your address with anyone else.</small>
                    </div>
                      <div class="form-group col-6">
                            <label for="exampleInputPassword1">city</label>
                            <input type="text"  name="city" class="form-control" id="exampleInputPassword1" placeholder="city">
                        </div>
                            <div class="row">
                                    <div class="form-group col-6">
                                        <label for="exampleInputPassword1">phone 1</label>
                                        <input type="text" name="phone1" class="form-control" id="exampleInputPassword1" placeholder="number" value="<?php if(isset($_SESSION['phone1'])){echo $_SESSION['phone1'];} ?>">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputPassword1">phone 2</label>
                                        <input type="text"  name="phone2" class="form-control" id="exampleInputPassword1" placeholder="number">
                                    </div>
                            </div>                      
                    <button type="submit" name="receving_data" class="btn btn-primary">Submit</button>
            </form>
     </div>