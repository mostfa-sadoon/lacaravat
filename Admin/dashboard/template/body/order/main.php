<div class="row">

<div class="col-lg-3">
        <div class="card bg-info">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="m-r-20 align-self-center"><img src="dashboard/assets/images/icon/income-w.png" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-white m-t-10 m-b-0"><a href="<?php echo "order.php?page_title=all_order"; ?>" class="text-white">Total order</a></h6>
                        <h2 class="m-t-0 text-white"><a href="<?php echo "order.php?page_title=all_order"; ?>" class="text-white"><?php echo $allorder; ?></a></h2></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card bg-success">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="m-r-20 align-self-center"><img src="dashboard/assets/images/icon/expense-w.png" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-white m-t-10 m-b-0"><a href="#" class="text-white" >waiting order</a></h6>
                        <h2 class="m-t-0 text-white"><a href="#" class="text-white"><?php echo  $waitingorder; ?></a></h2></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card bg-primary">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="m-r-20 align-self-center"><img src="dashboard/assets/images/icon/assets-w.png" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-white m-t-10 m-b-0">Total Assets</h6>
                        <h2 class="m-t-0 text-white">987,563</h2></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card bg-danger">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="m-r-20 align-self-center"><img src="dashboard/assets/images/icon/staff-w.png" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-white m-t-10 m-b-0">Total Staff</h6>
                        <h2 class="m-t-0 text-white">987,563</h2></div>
                </div>
            </div>
        </div>
    </div>
</div>