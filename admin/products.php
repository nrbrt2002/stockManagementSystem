<?php include"admin-includes/admin-header.php";?>
                <div class="container-fluid">
                    <div class="page-head">
                        <h4 class="my-2">Products</h4>
                    </div>  
                    
                    <?php
                                if(isset($_POST['update_quantity'])){
                                    $new_quantity = $_POST['new_quantity'];
                                    $old_quantity = $_POST['old_quantity'];
                                    $the_quantity = $old_quantity + $new_quantity;
                                    $theid = $_POST['id'];

                                    $update_quantity_query = mysqli_query($connection, "UPDATE products SET quantity = '$the_quantity', last_updated_at = now() WHERE id = $theid ");
                                    
                                    if($update_quantity_query){
                                        $_SESSION['message'] = "New Quantity Set";
                                    }
                                }

                            
                            ?>
                            <?php
                            
                            if(isset($_POST['add_product'])){
                                $product_name = $_POST['product_name'];
                                $category_id = $_POST['category_id'];
                                $quantity = $_POST['quantity'];
                                $unity_price = $_POST['unity_price'];

                                $insert_product_query = mysqli_query($connection, "INSERT INTO products VALUES('', '$product_name', '$category_id', '$quantity', '$unity_price', 1, now(), now())");
                                if($insert_product_query){
                                    $_SESSION['message'] = "Product Created!";
                                }
                            }
                            
                            ?>

                    <div class="data-table">
                    <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card m-b-30">
                                    <div class="card-body table-responsive">
                                        <h5 class="header-title"> All Products</h5>
                                        <div class="table-odd">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal"><i class="fa fa-plus"></i> Product</button>
                                            <br><br>
                                            <table id="datatable" class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Quantity</th>
                                                    <th>U/P</th>
                                                    <th>Created</th>
                                                    <th>Updated</th>
                                                    <th>Update</th>
                                                    <th>Delete</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <?php
                                        if(isset($_GET['table']) && isset($_GET['id'])){
                                            $table = $_GET['table'];
                                            $id = $_GET['id'];
                                            delete($connection, $table, $id);
                                        }

                                    $select_products_query = mysqli_query($connection, "SELECT * FROM products WHERE status = 1");
                                    while($row = mysqli_fetch_array($select_products_query)){
                                        $id = $row['id'];
                                        $product_name =$row['product_name'];
                                        $category_id =$row['category_id'];
                                        $quantity =$row['quantity'];
                                        $unity_price =$row['unity_price'];
                                        $last_updated_at =$row['last_updated_at'];

                                        $created_at =$row['created_at'];
                                        $date = new DateTime($created_at);
                                        $now = new DateTime();

                                        $last_updated_at = $row['last_updated_at'];
                                        $date1 = new DateTime($last_updated_at);
                                        ?>
                                        <tr>
                                            <td><?php echo $id?></td>
                                            <td><?php echo $product_name?></td>
                                            <td><?php echo $category_id?></td>
                                            <td><?php echo $quantity?></td>
                                            <td><?php echo $unity_price?></td>
                                            <td><?php echo $date->diff($now)->format("%d D, %h H, %i M ago"); ?></td>
                                            <td><?php echo $date1->diff($now)->format("%h H, %i M ago"); ?></td>


                                            <td>
                                                <form class="form-inline" method="post" >
                                                    <div class="form-group mb-2">
                                                        <form method="post">
                                                            <label for="inputPassword2" class="sr-only">Password</label>
                                                            <input type="hidden" name= "id" value="<?php echo $id; ?>" required>
                                                            <input type="hidden" name= "old_quantity" value="<?php echo $quantity; ?>" required>
                                                            <input type="number" name="new_quantity" class="form-control" id="inputPassword2" style="width: 130px;" placeholder="New Quantity" required>
                                                            <button type="submit" name="update_quantity" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                                                        </form>
                                                    </div> 
                                                </form>
                                            </td>
                                            
                                            
                                            <td class="text-center"><a href="products.php?table=products&id=<?php echo $id; ?>&"><i class="fa fa-trash text-danger"></i></a></td>
                                            
                                        </tr>
                                        <?php } ?>
                                        
                                                </tbody>
                                            </table>
                                        </div>           
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end container-->

                <!--footer section start-->
                
<?php include "admin-includes/admin-footer.php"; ?>

<div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title text-secondary"><strong> New Product Details</strong></h5>
                <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-justify">
                <form action="" method="post">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Product Name: </label>
                    <div class="col-sm-10">
                        <input type="text" name="product_name" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Category: </label>
                    <div class="col-sm-10">
                        <select name="category_id" id="" class="form-control">
                            <option value="">--- SELECT CATEGORY ---</option>
                            <?php
                            $select_category_query = mysqli_query($connection, "SELECT * FROM categories");
                            while($row = mysqli_fetch_array($select_category_query)){
                                $id =$row['id'];
                                $name =$row['name'];
                            ?>
                            <option value="<?php echo $id?>"> <?php echo $name?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Quantity: </label>
                    <div class="col-sm-10">
                        <input type="number" name="quantity" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Unity Price:&nbsp  </label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="unity_price">
                    </div>
                </div>


                <div class="col-12">
                    <input type="submit" name="add_product" value="Add Product" class="btn btn-primary">
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
            <?php
                if(isset($_SESSION['message'])){

                 ?>
                alertify.set('notifier','position', 'top-right');
                alertify.success("<?php echo $_SESSION['message']; ?>");
                
           <?php 
        
                unset($_SESSION['message']);
        
        } ?>
        </script>