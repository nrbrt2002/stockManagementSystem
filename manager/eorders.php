<?php include "manager-includes/manager-header.php"; ?>
<div class="container-fluid">
    <div class="page-head">
        <h4 class="my-2">h</h4>
    </div>

    <div class="data-table">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body table-responsive">
                        <h5 class="header-title">History of External Orders</h5>
                        <div class="table-odd">
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>E-mail</th>
                                        <th>Phone</th>
                                        <th>Details</th>
                                        <th>Derive On </th>
                                        <th>Status</th>
                                        <th>Recived on</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if (isset($_POST['declaine_order'])) {
                                        $declaine_id = $_POST['declaine_id'];
                                        $email = $_POST['email'];
                                        $email = $_POST['email'];

                                        
                                    }

                                    $select_orders_query = mysqli_query($connection, "SELECT * FROM externalorders WHERE status = 0");
                                    while ($row = mysqli_fetch_array($select_orders_query)) {
                                        $id = $row['id'];
                                        $email = $row['email'];
                                        $phone = $row['phone'];
                                        $description = $row['description'];
                                        $derively_date = $row['derively_date'];
                                        $status = $row['status'];
                                        $created_at = $row['created_at'];

                                        $created_at = new DateTime($created_at);
                                        $derively_date = new DateTime($derively_date);
                                        $now = new DateTime();
                                        // $invoiceDatetime = $date->format('Y-m-d');

                                    ?>
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          ...
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-primary">Understood</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $email ?></td>
                                            <td><?php echo $phone ?></td>
                                            <td>
                                            <a href="#" onclick="showDescription('<?php echo $description; ?>')" data-toggle="modal" data-target="#myModal">
                                                <img src="./icons/icons.png">
                                            </a>
                                        
                                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Description</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body modal-dialog modal-dialog-centered modal-dialog-scrollable" id="modalDescription" >
                                                            <!-- Description content will be dynamically set here -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                function showDescription(description) {
                                                    document.getElementById("modalDescription").innerHTML = description;
                                                }
                                            </script>

                                            </td>
                                            <!-- <td> data-bs-toggle="modal" data-bs-target="#staticBackdrop"></td> -->
                                            <td><?php echo $derively_date->diff($now)->format("%d D, %h H, %i M ago"); ?></td>
                                            <td class="text-center"><span class="badge bg-warning  m-1">Unprocessed</span></td>
                                            <td><?php echo $created_at->diff($now)->format("%d D, %h H, %i M ago"); ?></td>
                                            <td><h3><a href=""><i class= "mdi mdi-check-circle text-primary pr-3"></i></a> <a class="confirm_delete_btn" href="" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="mdi mdi-close-box text-danger"></i></a></h3></td>

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



<?php include "manager-includes/manager-footer.php"; ?>

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Declaine Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure to delete this branch</p>
                <form action="" method="post">
                    <input type="hidden" name="declaine_id" id="declaine_id">
                    <input type="hidden" name="email" id="email">
                    <input type="hidden" name="phone" id="phone">
            </div>
            <div class="modal-footer">
                <button type="submit" name="declaine_order" class="btn btn-danger">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
        // Selecting for DElete
        $(document).ready(function() {
        $('.confirm_delete_btn').on('click', function(e) {
            e.preventDefault();
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            // console.log(data);
            $('#declaine_id').val(data[0]);
            $('#email').val(data[2]);
            $('#phone').val(data[3]);
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