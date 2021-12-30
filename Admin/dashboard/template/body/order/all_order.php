
<div class="row">
 <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editable with Datatable</h4>
                <h6 class="card-subtitle">Just click on word which you want to change and enter</h6>
            
                <table class="table table-striped table-bordered" id="editable-datatable">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>address</th>
                            <th>total price</th>
                            <th>unite</th>
                            <th>status</th>
                            <th>phone1</th>
                            <th>phone2</th>
                            <th>kind</th>
                            <th>phase</th>
                            <th>city</th>
                            <th>date</th>
                            <th>measure</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $count=1;
                            if($total_rows>0){
                            while ($row = $orders->fetch(PDO::FETCH_ASSOC)){
                                extract($row);?>
                                <tr id="<?php echo $count; ?>" class="gradeX">
                                    
                                    <td><?php echo $customer_name; ?></td>
                                    <td><?php echo $orderaddress; ?></td>
                                    <td><?php echo $total_price; ?></td>
                                    <td><?php echo $total_unit; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td><?php echo $phone1; ?></td>
                                    <td><?php echo $phone2; ?></td>
                                    <td><?php echo $kind; ?></td>
                                    <td><?php echo $phase; ?></td>
                                    <td><?php echo $city; ?></td>   
                                    <td><?php echo $created_at; ?></td>   
                                    <td>
                                       <?php if($phase =="phase1" || $phase == "phase2")
                                       {?>
                                              <a href="<?php echo "order.php?page_title=order_action&order_id=".$id."" ?>" class="btn btn-success text-light"> <?php if($status=="false"){echo '<i class="fas fa-edit"></i> ';}else{echo'<i class="fas fa-check-circle"></i>';} ?></a></td>
                                       <?php
                                       }elseif($phase =="phase3"){?>
                                            <a href="<?php echo "order.php?page_title=order_action&order_id=".$id."" ?>" class="btn btn-primary text-light"> <?php if($status=="false"){echo '<i class="fas fa-edit"></i> ';}else{echo'<i class="fas fa-check-circle"></i>';} ?></a></td>        
                                       <?php
                                       }elseif($phase =="cancel"){?>
                                         <a href="<?php echo "order.php?page_title=order_action&order_id=".$id."" ?>" class="btn btn-danger text-light"> <?php if($status=="false"){echo '<i class="fas fa-edit"></i> ';}else{echo'<i class="fas fa-check-circle"></i>';} ?></a></td>           
                                       <?php
                                       }
                                       
                                       ?>    
                                 
                                </tr>
                            <?php
                                $count++;
                                }
                            }       
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>