<?php include "salesman-includes/salesman-header.php"; ?>
<div class="container-fluid">
    <div class="page-head">
        <h4 class="my-2">Starter Page</h4>
    </div>

    <div class="row">
        <div class="col-5">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3">Pick A Day</h5>
                    <div class="general-label">
                        <form class="form-inline" method="get" id="invoice_form" role="form">
                            <div class="form-group pr-2">
                                <label class="sr-only" class="label">From Date</label>
                                <input class="form-control" name="from_date" type="date" id="example-datetime-local-input">
                            </div>
                            <button type="submit" name="generate_invoice" class="btn btn-success ml-2">Generate</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_GET['generate_invoice'])) {
    $from_date = $_GET['from_date'];

    $select_invoice_query = mysqli_query($connection, " SELECT orders.id, orders.branch_id, orders.category_id, orders.product_id, orders.requested_quantity, orders.invoice_id, orders.total_price, branches.name as branch_name, categories.name as category_name, products.product_name, products.unity_price, orders.update_at FROM orders, branches, categories, products, invoices WHERE orders.status = 1 AND orders.branch_id = branches.id AND orders.category_id = categories.id AND orders.product_id = products.id AND orders.invoice_id = invoices.id AND  DATE(orders.created_at) = '$from_date'");

?>


    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">


                <div class="card-body invoice">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-right"><img src="../assets/images/logo_sm_2.png" alt="s"></h4>
                        </div>
                        <div class="pull-right">
                            <h6>Invoice : #
                                <strong>23654789</strong>
                            </h6>
                            <h6 class="pull-right">Date: <?php echo date('Y-m-d'); ?></h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="pull-left mt-4">
                                <address>
                                    <strong>Pain St Joseph.</strong><br>
                                    Kicukiro - St Joseph<br>
                                    KK-201<br>
                                    <abbr title="Phone">P:</abbr> +250 789 244 7050
                                </address>
                            </div>
                            <div class="pull-right mt-4">
                                <p><strong>Order Date: </strong> <?php echo $from_date; ?></p>
                                <p><strong>Order Status: </strong> <span class="badge badge-success">Success</span></p>
                            </div>
                        </div>
                    </div><!--end row-->

                    <div class="h-50"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <center>
                                    <h3 style="text-decoration: underline;">Invoice</h3>
                                </center>
                                <table class="table mt-4">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Product</th>
                                            <th>U/C</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (mysqli_num_rows($select_invoice_query) > 0) {
                                            $total = 0;
                                            while ($row = mysqli_fetch_array($select_invoice_query)) {
                                                $category_name = $row['category_name'];
                                                $product_name = $row['product_name'];
                                                $unity_price = $row['unity_price'];
                                                $requested_quantity = $row['requested_quantity'];
                                                $update_at = $row['update_at'];
                                                $total_price = $row['total_price'];
                                                $row = $row['id'];

                                                $total = +$total_price;
                                        ?>
                                                <tr>
                                                    <td><?php echo $category_name; ?></td>
                                                    <td><?php echo $product_name; ?></td>
                                                    <td><?php echo $unity_price; ?></td>
                                                    <td><?php echo $requested_quantity; ?></td>
                                                    <td><?php echo $total_price; ?></td>
                                                    <td><?php echo $update_at; ?></td>

                                                </tr>
                                            <?php }  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!--end row-->

                    <div class="row" style="border-radius: 0px;">
                        <div class="col-md-8">

                        </div>
                        <div class="col-md-4">
                            <p class="text-right"><strong>Sub-total:</strong> <?php echo $total; ?>Rwf</p>
                            <p class="text-right">Discout: 0%</p>
                            <p class="text-right">VAT: 0%</p>
                            <hr>
                            <h4 class="text-right"><?php echo $total; ?>Rwf</h4>
                        </div>
                    </div><!--end row-->
                <?php } else {
                                            echo "<center><h3>Nothing found fo this day</h3></center>";
                                        } ?>
                <hr>
                <div class="hidden-print">
                    <div class="text-center text-muted"><small>Thank you very much for doing business with us. Thanks !</small></div>
                    <div class="pull-right">
                        <a href="#" class="btn btn-dark" onclick="printPage()"><i class="fa fa-print"></i></a>

                    </div>
                </div>
                </div>
            </div>
        </div>
    </div><!--end container-->
<?php } ?>

<!--footer section start-->
<script>
    function printPage() {
        window.print();
    }
</script>
<?php include "salesman-includes/salesman-footer.php"; ?>