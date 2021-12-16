
<div class="row">
 <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editable with Datatable</h4>
                <h6 class="card-subtitle">Just click on word which you want to change and enter</h6>
                <a href="<?php echo"category.php?page_title=add_category";?>" class="btn btn-primary text-light ">add new category</a>
                <table class="table table-striped table-bordered" id="editable-datatable">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>measure</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $count=1;
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    extract($row);?>
                                           <tr id="<?php echo $count; ?>" class="gradeX">
                                                <td><?php echo $name; ?></td>
                                                <td>
                                                    <a href="<?php echo "category.php?page_title=show_category&id=".$id."" ?>" class="btn btn-primary text-light ">show</a>
                                                    <a href="<?php echo "category.php?page_title=edite_category&id=".$id."" ?>" class="btn btn-info text-light ">edite</a>
                                                    <a href="<?php echo "category.php?page_title=delete_category&id=".$id."" ?>" class="btn btn-danger text-light ">delete</a>
                                                </td>
                                            </tr>
                                    <?php
                                        $count++;
                                       }
                                   
                                   ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>