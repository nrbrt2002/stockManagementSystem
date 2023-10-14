<?php include "admin-includes/admin-header.php"; ?>
<div class="container-fluid">
    <div class="page-head">
        <h4 class="my-2">Orders</h4>
    </div>

    <?php
    if(isset($_POST['approve_order'])){
        $order_id = $_POST['order_id'];
        $aproduct_id = $_POST['aproduct_id'];
        $the_quantity = $_POST['quantity'];
        $abranch = $_POST['abranch'];
        $instocke = $_POST['instocke'];
        $aquantity = $instocke - $the_quantity;

        $invoice_query = mysqli_query($connection, "INSERT INTO invoices VALUES('', $order_id, now())");

        if($invoice_query == true){
            $select_invoice_query = mysqli_query($connection, "SELECT * FROM invoices WHERE SECOND(created_at) = SECOND(NOW())");
            $row = mysqli_fetch_array($select_invoice_query);
                $invoice_id = $row['id'];

            $create_history_query = mysqli_query($connection, "INSERT INTO history VALUES('', $order_id, $invoice_id, now())");
            $update_quantity_query = mysqli_query($connection, "UPDATE products SET quantity = '$aquantity', last_updated_at = now() WHERE id = $aproduct_id ");
            $update_orders_query = mysqli_query($connection, "UPDATE orders SET invoice_id = $invoice_id,  status = 1, update_at = now() WHERE id = $order_id ");
            $make_notification_query = mysqli_query($connection, "INSERT INTO notifications VALUES('', 'Order Approved- Admin', $abranch, 'a new order approved by admin.', 'ti ti-check-box text-success', 1, now())");

            if ($select_invoice_query && $create_history_query && $update_quantity_query && $update_orders_query && $make_notification_query) {
                $_SESSION['message'] = "Order Approved Successfuly";
            }else{
                die("Something wrong". $connection->error);
            }
        }
    }

    if (isset($_POST['reject_order'])) {
        $delete_id = $_POST['delete_id'];
        $product_id = $_POST['product_id'];
        $quantity_id = $_POST['quantity_id'];

        $dajhdhsj = mysqli_query($connection, "SELECT * FROM orders WHERE id = $delete_id");
        $data = mysqli_fetch_array($dajhdhsj);
        $Abranch_id = $data['branch_id'];


        $make_notification_query = mysqli_query($connection, "INSERT INTO notifications VALUES('', '$product_id($quantity_id) Rejected', $Abranch_id, 'An order of yours was rejectect by admin.', 'ti ti-alert text-danger', 1, now());");
        $reject_order_query = mysqli_query($connection, "UPDATE orders SET status = 2 WHERE id = $delete_id");

        if ($reject_order_query && $make_notification_query) {
            $_SESSION['message'] = "Order Rejected";
        }
    }

    if (isset($_POST['add_user'])) {
        $names = $_POST['names'];
        $email = $_POST['email'];
        $branch = $_POST['branch'];
        $phone = $_POST['phone'];
        $role = $_POST['role'];
        $password = password_hash('123', PASSWORD_DEFAULT);

        $insert_user_query = mysqli_query($connection, "INSERT INTO users VALUES('', '$names', '$email', '$branch', '$phone', '$password', 1, '$role')");
        if ($insert_user_query) {
            $_SESSION['message'] = "User Created!";
        }
    }

    ?>

    <div class="data-table">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body table-responsive">
                        <h5 class="header-title"> All Users</h5>
                        <div class="table-odd">
                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Order</button> -->
                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal"><i class="fa fa-plus"></i> Order</button> -->
                            <br><br>
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Branch</th>
                                        <th>Category</th>
                                        <th style="display: none;">product_id</th>
                                        <th style="display: none;">branch_id</th>
                                        <th>Product</th>
                                        <th>U/P</th>
                                        <th>Quantity</th>
                                        <th class="bg-info text-dark">INStock</th>
                                        <th>Total Rfw</th>
                                        <th>Status</th>
                                        <th>At</th>
                                        <th>Process</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php

                                    $select_orders_query = mysqli_query($connection, "SELECT orders.id as order_id, products.id as product_id, branches.id as branch_id, branches.name as branch_name, categories.name as category_name, products.product_name, products.unity_price, orders.requested_quantity, orders.invoice_id, orders.total_price, orders.status as order_status, orders.created_at, orders.update_at, products.quantity as product_stock_quantity FROM branches, categories, products, orders WHERE orders.branch_id = branches.id AND orders.status = 0 AND categories.id = orders.category_id AND products.id = orders.product_id;");
                                    while ($row = mysqli_fetch_array($select_orders_query)) {
                                        $order_id = $row['order_id'];
                                        $branch_name = $row['branch_name'];
                                        $category_name = $row['category_name'];
                                        $product_id = $row['product_id'];
                                        $branch_id = $row['branch_id'];
                                        $product_name = $row['product_name'];
                                        $unity_price = $row['unity_price'];
                                        $requested_quantity = $row['requested_quantity'];
                                        $product_stock_quantity = $row['product_stock_quantity'];
                                        $invoice_id = $row['invoice_id'];
                                        $total_price = $row['total_price'];
                                        $order_status = $row['order_status'];

                                        $created_at = $row['created_at'];
                                        $date = new DateTime($created_at);
                                        $now = new DateTime();

                                        $update_at = $row['update_at'];
                                        $date1 = new DateTime($update_at)
                                    ?>
                                        <tr>
                                            <td class="order_id"><?php echo $order_id ?></td>
                                            <td><?php echo $branch_name ?></td>
                                            <td><?php echo $category_name ?></td>
                                            <td style="display: none;"><?php echo $product_id; ?></td>
                                            <td style="display: none;"><?php echo $branch_id; ?></td>
                                            <td><?php echo $product_name ?></td>
                                            <td><?php echo $unity_price ?></td>
                                            <td><?php echo $requested_quantity ?></td>
                                            <?php if ($requested_quantity > $product_stock_quantity) { ?>
                                                <td class="bg-danger text-dark"><?php echo $product_stock_quantity ?></td>
                                            <?php } else if ($requested_quantity == $product_stock_quantity) { ?>
                                                <td class="bg-warning text-dark"><?php echo $product_stock_quantity ?></td>
                                            <?php } else { ?>
                                                <td class="bg-info text-dark"><?php echo $product_stock_quantity ?></td>
                                            <?php } ?>

                                            <td><?php echo $total_price ?>Rwf</td>
                                            <?php if ($order_status == 0) { ?>
                                                <td><span class="badge bg-primary m-1">Unprocessed</span></td>
                                            <?php } else { ?>
                                                <td><span class="badge bg-dark m-1">Rejected</span></td>
                                            <?php } ?>
                                            <td><?php echo $date->diff($now)->format("%d D, %h H, %i M ago"); ?></td>
                                            <td>
                                                <h2>
                                                    <?php if ($requested_quantity <= $product_stock_quantity) { ?>
                                                        <a href="#" class="confirm_aprrove_btn" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="mdi mdi-check-circle text-primary"></i></a>
                                                    <?php } else { ?>
                                                        <a href="" class="disabled" style="pointer-events: none;"><i class="mdi mdi-check-circle"></i></a>
                                                    <?php } ?>
                                                    <a href="#" class="confirm_delete_btn" data-toggle="modal" data-target=".bd-example-modal-lg"><i class=" mdi mdi-close-box text-danger"></i></a>
                                                </h2>
                                            </td>
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
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reject Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <p>Are you sure to reject this Order? </p>
                <form action="" method="post">
                    <input type="hidden" name="delete_id" id='delete_id'>
                    <input type="hidden" name="product_id" id='product_id'>
                    <input type="hidden" name="quantity_id" id='quantity_id'>
            </div>
            <div class="modal-footer">
                <a href="" class=""></a>
                <button type="submit" name="reject_order" class="btn btn-danger">Reject</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Process Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>You are about to process this order.</p>
                <form action="" method="post">
                    <input type="hidden" name="order_id" id='order_id'>
                    <input type="hidden" name="aproduct_id" id='aproduct_id'>
                    <input type="hidden" name="quantity" id='quantity'>
                    <input type="hidden" name="abranch" id='abranch'>
                    <input type="hidden" name="instocke" id='instocke'>
                   
            </div>
            <div class="modal-footer">
                <button type="submit" name="approve_order" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.confirm_delete_btn').on('click', function() {
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            // console.log(data);
            $('#delete_id').val(data[0]);
            $('#product_id').val(data[3]);
            $('#quantity_id').val(data[5]);
        });
    });

    $(document).ready(function() {
        $('.confirm_aprrove_btn').on('click', function() {
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            console.log(data);
            $('#order_id').val(data[0]);
            $('#aproduct_id').val(data[3]);
            $('#quantity').val(data[7]);
            $('#instocke').val(data[8]);
            $('#abranch').val(data[4]);
            // $('#abranch').val(data[7]);
            
        });
    });
</script>


<script>
    // console.log(quantity);
    // Select Category
    $('#category').on('change', function() {
        var category_id = this.value;
        // console.log(category_id);
        $.ajax({
            url: 'ajax/products.php',
            type: "POST",
            data: {
                category_data: category_id
            },
            success: function(result) {
                $('#product').html(result);
                // console.log(result);
            }
        })
    });

    //Select Product

    $('#product').on('change', function() {
        var product_id = this.value;
        // console.log(country_id);
        $.ajax({
            url: 'ajax/unity_price.php',
            type: "POST",
            data: {
                product_data: product_id
            },
            success: function(data) {
                $('#unityPrice').html(data);
                // console.log(data);
            }
        })
    });
</script>

<script>
    <?php
    if (isset($_SESSION['message'])) {

    ?>
        alertify.set('notifier', 'position', 'top-right');
        alertify.success("<?php echo $_SESSION['message']; ?>");

    <?php

        unset($_SESSION['message']);
    } ?>
</script>
<script>
    $('.confirm_delete_btn').click(function(e) {
        e.preventDefault();
        var order_id = $(this).closest('tr').find('.order_id').text();
        // console.log(order_id);

    });
</script>