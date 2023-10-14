<?php include "salesman-includes/salesman-header.php"; ?>
<div class="container-fluid">
    <div class="page-head">
        <h4 class="my-2">h</h4>
    </div>

    <div class="data-table">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body table-responsive">
                        <h5 class="header-title">History of Orders</h5>
                        <div class="table-odd">
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Product</th>
                                        <th>U/P</th>
                                        <th>Quantity</th>
                                        <th>Invoice</th>
                                        <th>Total Rfw</th>
                                        <th>At</th>
                                        <th>Updated</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if (isset($_GET['table']) && isset($_GET['id'])) {
                                        $table = $_GET['table'];
                                        $id = $_GET['id'];
                                        delete($connection, $table, $id);
                                    }

                                    $select_orders_query = mysqli_query($connection, "SELECT orders.id as order_id, branches.name as branch_name, categories.name as category_name, products.product_name, products.unity_price, orders.requested_quantity, orders.invoice_id, orders.total_price, orders.status as order_status, orders.created_at, orders.update_at  FROM branches, categories, products, orders WHERE orders.branch_id = branches.id AND categories.id = orders.category_id AND products.id = orders.product_id AND orders.branch_id = $branch;");
                                    while ($row = mysqli_fetch_array($select_orders_query)) {
                                        $order_id = $row['order_id'];
                                        $branch_name = $row['branch_name'];
                                        $category_name = $row['category_name'];
                                        $product_name = $row['product_name'];
                                        $unity_price = $row['unity_price'];
                                        $requested_quantity = $row['requested_quantity'];
                                        $invoice_id = $row['invoice_id'];
                                        $total_price = $row['total_price'];
                                        $order_status = $row['order_status'];

                                        $created_at = $row['created_at'];

                                        $date = new DateTime($created_at);
                                        $now = new DateTime();
                                        $invoiceDatetime = $date->format('Y-m-d');

                                        $update_at = $row['update_at'];
                                        $date1 = new DateTime($update_at)
                                    ?>
                                        <tr>
                                            <td><?php echo $order_id ?></td>
                                            <td><?php echo $category_name ?></td>
                                            <td><?php echo $product_name ?></td>
                                            <td><?php echo $unity_price ?></td>
                                            <td><?php echo $requested_quantity ?></td>
                                            <?php if ($order_status != 1) { ?>
                                                <td></td>
                                            <?php } else { ?>
                                                <td class="text-center"><h4><a href="invoice.php?from_date=<?php echo $invoiceDatetime; ?>&generate_invoice="><i class="mdi mdi-printer text-primary"></i></a></h4></td>
                                            <?php } ?>
                                            <td><?php echo $total_price ?>Rwf</td>
                                            <td><?php echo $date->diff($now)->format("%d D, %h H, %i M ago"); ?></td>
                                            <td><?php echo $date1->diff($now)->format("%d D, %h H, %i M ago"); ?></td>
                                            <?php if ($order_status == 0) { ?>
                                                <td class="text-center"><span class="badge bg-warning m-1">Unprocessed</span></td>
                                            <?php } else if ($order_status == 1) { ?>
                                                <td class="text-center"><span class="badge bg-success m-1">Processed</span></td>
                                            <?php } else { ?>
                                                <td class="text-center"><span class="badge bg-danger m-1">Rejected</span></td>
                                            <?php } ?>

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



<?php include "salesman-includes/salesman-footer.php"; ?>




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
        // location.reload();

    <?php

        unset($_SESSION['message']);
    } ?>
</script>


<!-- Button to trigger the modal -->
<div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update an Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php

            if (isset($_POST['edit_order'])) {

                $order_id = $_POST['order_id'];
                $unity_price = $_POST['unity_price'];
                $quantity = $_POST['quantity'];
                $total_price = $unity_price * $quantity;

                $make_order_query = mysqli_query($connection, "UPDATE orders SET requested_quantity = $quantity, total_price = $total_price WHERE id = $order_id ");

                if ($make_order_query) {
                    $_SESSION['message'] = "Orders Updated Successfuly!";
                }
            }

            ?>



            <div class="modal-body">
                <form action="" method="post" id="add_form">
                    <div id="show_item">
                        <input type="hidden" name="order_id" id="order_id">
                        <div class="row pt-2">
                            <div class="col-md-3 md-3">
                                <label for="">Category</label>
                                <input type="text" id="category_id" class="form-control" readonly>
                            </div>
                            <div class="col-md-3 md-3">
                                <label for="">Products</label>
                                <input type="text" id="product_id" class="form-control" readonly>
                            </div>

                            <div class="col-md-2 md-3" id="unityPrice">
                                <label for="">U/P</label>
                                <input type="number" name="unity_price" class="form-control" id="unity_price" readonly>
                            </div>
                            <div class="col-md-2 md-3">
                                <label for="">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Quantity">
                            </div>

                        </div>
                    </div>
                    <div class="pt-2">
                        <input type="submit" value="Update" name="edit_order" class="btn btn-primary w-10" id='add_btn'>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.editbtn').on('click', function() {
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#order_id').val(data[0]);
            $('#category_id').val(data[1]);
            $('#product_id').val(data[2]);
            $('#unity_price').val(data[3]);
            $('#quantity').val(data[4]);
        });
    });
</script>