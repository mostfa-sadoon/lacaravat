<div class="row">
    <?php
    while ($row = $products->fetch(PDO::FETCH_ASSOC)){   
        extract($row);?>
        <div class="col-lg-4 col-xlg-3">
        <div class="card">
            <img class="card-img-top img-responsive" src="dashboard/assets/images/big/img1.jpg" alt="Card image cap">
            <div class="card-body">
                <h3 class="font-normal"><?php echo $name; ?></h3>
                <span class="label label-info label-rounded">Technology</span>
                <p class="m-b-0 m-t-20">Titudin venenatis ipsum aciat. Vestibulum ullamcorper quam. nenatis ipsum ac feugiat. Ibulum ullamcorper</p>
                <div class="d-flex m-t-20">
                    <button class="btn p-l-0 btn-link ">Read more</button>
                    <div class="ml-auto align-self-center">
                        <a class="btn btn-info text-light">edite</a>
                        <a class="btn btn-danger text-light">delete</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <?php
        } 
    ?>
</div>