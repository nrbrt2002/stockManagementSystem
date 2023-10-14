<?php include "manager-includes/manager-header.php"; ?>
<div class="container-fluid">
    <div class="page-head">
        <h4 class="my-2">Generate Report</h4>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3">Pick Report COnditions</h5>
                    <div class="general-label">
                        <form class="form-inline" method="get" id="report_form" role="form">
                            <div class="form-group pr-2">
                                <label class="sr-only" class="label">From Date</label>
                                <input class="form-control" name="from_date" type="datetime-local" id="example-datetime-local-input">
                            </div>

                            <div class="form-group m-l-10 pr-2">
                                <label class="sr-only" for="exampleInputPassword2">To Date</label>
                                <input class="form-control" name="to_date" type="datetime-local" id="example-datetime-local-input">
                            </div>
                            <div class="form-group pr-2">
                                <label class="sr-only" class="label">Branch</label>
                                <select name="branch" id="" class="form-control">
                                    <option value="" selected>-- Select Branch --</option>
                                    <?php
                                    $select_users_query = mysqli_query($connection, "SELECT * FROM branches WHERE status = 1");
                                    while ($row = mysqli_fetch_array($select_users_query)) {
                                        $id = $row['id'];
                                        $name = $row['name'];
                                    ?>
                                        <option value="<?php echo $id ?>"> <?php echo $name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group pr-2">
                                <label class="sr-only" class="label">Products</label>
                                <select name="products" id="" class="form-control">
                                    <option value="" selected>-- Select Product --</option>
                                    <?php
                                    $select_product_query = mysqli_query($connection, "SELECT * FROM products WHERE status = 1");
                                    while ($row = mysqli_fetch_array($select_product_query)) {
                                        $id = $row['id'];
                                        $product_name = $row['product_name'];
                                    ?>
                                        <option value="<?php echo $id ?>"> <?php echo $product_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="submit" name="generate" class="btn btn-success ml-2">Generate</button>
                        </form>

                    </div>
                    <div id="results">
                        <hr>
                        <h2>Report</h2>
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Branch</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>U/P</th>
                                <th>Quantity</th>
                                <th>Total Rfw</th>
                                <th>Invoice</th>
                            </tr>

                            <?php

                            if (isset($_GET['generate'])) {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                                $branch = $_GET['branch'];
                                $products = $_GET['products'];

                                $fromDate = new DateTime($from_date);
                                $toDate = new DateTime($to_date);

                                $fromDateSql = $fromDate->format("Y-m-d H:i:s");
                                $toDateSql = $toDate->format("Y-m-d H:i:s");

                                if (!empty($branch) && !empty($products) && !empty($from_date) && !empty($to_date)) {
                                    $report_query = mysqli_query($connection, "SELECT orders.id, orders.branch_id, orders.category_id, orders.product_id, orders.requested_quantity, orders.invoice_id, orders.total_price, branches.name as branch_name, categories.name as category_name, products.product_name, products.unity_price, orders.created_at FROM orders, branches, categories, products, invoices WHERE orders.status = 1 AND orders.branch_id = $branch AND orders.category_id = categories.id AND orders.product_id = $products AND orders.invoice_id = invoices.id AND  orders.created_at BETWEEN '$fromDateSql' AND '$toDateSql';");
                                    if (mysqli_num_rows($report_query) > 0) {
                                        $quantity = 0;
                                        $Mtotal = 0;
                                        while ($row = mysqli_fetch_array($report_query)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['created_at'] . "</td>";
                                            echo "<td>" . $row['branch_name'] . "</td>";
                                            echo "<td>" . $row['category_name'] . "</td>";
                                            echo "<td>" . $row['product_name'] . "</td>";
                                            echo "<td>" . $row['unity_price'] . "</td>";
                                            echo "<td>" . $row['requested_quantity'] . "</td>";
                                            echo "<td>" . $row['total_price'] . "</td>";
                                            echo "<td>" . $row['invoice_id'] . "</td>";
                                            echo "</tr>";
                                            echo "<tr> <td rowspan='7'>ff</td> <td>gg</td> </tr>";
                                            $quantity =+ $row['requested_quantity'];
                                            $Mtotal =+ $row['total_price'];
                                        }
                                        echo "<tr><td>Total</td><td></td><td></td><td></td><td></td><td></td> <td class='text-end'>".$quantity."</td> <td>$Mtotal</td> </tr>";
                                    } else {
                                        echo "<h3> Nothing to report</h3>";
                                    }
                                } else if (!empty($branch) && !empty($products) && !empty($from_date) && empty($to_date)) {
                                    $report_query = mysqli_query($connection, "SELECT orders.id, orders.branch_id, orders.category_id, orders.product_id, orders.requested_quantity, orders.invoice_id, orders.total_price, branches.name as branch_name, categories.name as category_name, products.product_name, products.unity_price, orders.created_at FROM orders, branches, categories, products, invoices WHERE orders.status = 1 AND orders.branch_id = $branch AND orders.category_id = categories.id AND orders.product_id = $products AND orders.invoice_id = invoices.id AND  orders.created_at < '$fromDateSql' ");
                                    if (mysqli_num_rows($report_query) > 0) {
                                        $quantity = 0;
                                        $Mtotal = 0;
                                        while ($row = mysqli_fetch_array($report_query)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['created_at'] . "</td>";
                                            echo "<td>" . $row['branch_name'] . "</td>";
                                            echo "<td>" . $row['category_name'] . "</td>";
                                            echo "<td>" . $row['product_name'] . "</td>";
                                            echo "<td>" . $row['unity_price'] . "</td>";
                                            echo "<td>" . $row['requested_quantity'] . "</td>";
                                            echo "<td>" . $row['total_price'] . "</td>";
                                            echo "<td>" . $row['invoice_id'] . "</td>";
                                            echo "<tr> <td rowspan='7'>ff</td> <td>gg</td> </tr>";
                                            echo "</tr>";
                                            $quantity += $row['requested_quantity'];
                                            $Mtotal += $row['total_price'];
                                        }
                                        echo "<tr><td>Total</td><td></td><td></td><td></td><td></td><td></td> <td class='text-end'>$quantity</td> <td>$Mtotal</td> </tr>";
                                    } else {
                                        echo "<h3> Nothing to report</h3>";
                                    }
                                } else if (!empty($branch) && !empty($products) && empty($from_date) && !empty($to_date)) {
                                    $report_query = mysqli_query($connection, "SELECT orders.id, orders.branch_id, orders.category_id, orders.product_id, orders.requested_quantity, orders.invoice_id, orders.total_price, branches.name as branch_name, categories.name as category_name, products.product_name, products.unity_price, orders.created_at FROM orders, branches, categories, products, invoices WHERE orders.status = 1 AND orders.branch_id = $branch AND orders.category_id = categories.id AND orders.product_id = $products AND orders.invoice_id = invoices.id AND  orders.created_at > '$toDateSql' ");
                                    if (mysqli_num_rows($report_query) > 0) {
                                        $quantity = 0;
                                        $Mtotal = 0;
                                        while ($row = mysqli_fetch_array($report_query)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['created_at'] . "</td>";
                                            echo "<td>" . $row['branch_name'] . "</td>";
                                            echo "<td>" . $row['category_name'] . "</td>";
                                            echo "<td>" . $row['product_name'] . "</td>";
                                            echo "<td>" . $row['unity_price'] . "</td>";
                                            echo "<td>" . $row['requested_quantity'] . "</td>";
                                            echo "<td>" . $row['total_price'] . "</td>";
                                            echo "<td>" . $row['invoice_id'] . "</td>";
                                            echo "</tr>";
                                            $quantity += $row['requested_quantity'];
                                            $Mtotal += $row['total_price'];
                                        }
                                        echo "<tr><td>Total</td><td></td><td></td><td></td><td></td><td></td> <td class='text-end'>$quantity</td> <td>$Mtotal</td> </tr>";
                                    } else {
                                        echo "<h3> Nothing to report</h3>";
                                    }
                                } else if (!empty($branch) && !empty($products) && empty($from_date) && empty($to_date)) {
                                    $report_query = mysqli_query($connection, "SELECT orders.id, orders.branch_id, orders.category_id, orders.product_id, orders.requested_quantity, orders.invoice_id, orders.total_price, branches.name as branch_name, categories.name as category_name, products.product_name, products.unity_price, orders.created_at FROM orders, branches, categories, products, invoices WHERE orders.status = 1 AND orders.branch_id = $branch AND orders.category_id = categories.id AND orders.product_id = $products AND orders.invoice_id = invoices.id");
                                    if (mysqli_num_rows($report_query) > 0) {
                                        $quantity = 0;
                                        $Mtotal = 0;
                                        while ($row = mysqli_fetch_array($report_query)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['created_at'] . "</td>";
                                            echo "<td>" . $row['branch_name'] . "</td>";
                                            echo "<td>" . $row['category_name'] . "</td>";
                                            echo "<td>" . $row['product_name'] . "</td>";
                                            echo "<td>" . $row['unity_price'] . "</td>";
                                            echo "<td>" . $row['requested_quantity'] . "</td>";
                                            echo "<td>" . $row['total_price'] . "</td>";
                                            echo "<td>" . $row['invoice_id'] . "</td>";
                                            echo "</tr>";
                                            $quantity += $row['requested_quantity'];
                                            $Mtotal += $row['total_price'];
                                        }
                                        echo "<tr><td>Total</td><td></td><td></td><td></td><td></td><td></td> <td class='text-end'>$quantity</td> <td>$Mtotal</td> </tr>";
                                    } else {
                                        echo "<h3> Nothing to report</h3>";
                                    }
                                } else if (empty($branch) && empty($products) && !empty($from_date) && !empty($to_date)) {
                                    $report_query = mysqli_query($connection, "SELECT orders.id, orders.branch_id, orders.category_id, orders.product_id, orders.requested_quantity, orders.invoice_id, orders.total_price, branches.name as branch_name, categories.name as category_name, products.product_name, products.unity_price, orders.created_at FROM orders, branches, categories, products, invoices WHERE orders.status = 1 AND orders.branch_id = branches.id AND orders.category_id = categories.id AND orders.product_id = products.id AND orders.invoice_id = invoices.id AND orders.created_at BETWEEN '$fromDateSql' AND '$toDateSql'");
                                    if (mysqli_num_rows($report_query) > 0) {
                                        $quantity = 0;
                                        $Mtotal = 0;
                                        while ($row = mysqli_fetch_array($report_query)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['created_at'] . "</td>";
                                            echo "<td>" . $row['branch_name'] . "</td>";
                                            echo "<td>" . $row['category_name'] . "</td>";
                                            echo "<td>" . $row['product_name'] . "</td>";
                                            echo "<td>" . $row['unity_price'] . "</td>";
                                            echo "<td>" . $row['requested_quantity'] . "</td>";
                                            echo "<td>" . $row['total_price'] . "</td>";
                                            echo "<td>" . $row['invoice_id'] . "</td>";
                                            echo "</tr>";
                                            $quantity += $row['requested_quantity'];
                                            $Mtotal += $row['total_price'];
                                        }
                                        echo "<tr><td>Total</td><td></td><td></td><td></td><td></td><td></td> <td class='text-end'>$quantity</td> <td>$Mtotal</td> </tr>";
                                    } else {
                                        echo "<h3> Nothing to report</h3>";
                                    }
                                } else if (empty($branch) && !empty($products) && !empty($from_date) && !empty($to_date)) {
                                    $report_query = mysqli_query($connection, "SELECT orders.id, orders.branch_id, orders.category_id, orders.product_id, orders.requested_quantity, orders.invoice_id, orders.total_price, branches.name as branch_name, categories.name as category_name, products.product_name, products.unity_price, orders.created_at FROM orders, branches, categories, products, invoices WHERE orders.status = 1 AND orders.branch_id = branches.id AND orders.category_id = categories.id AND orders.product_id = $products AND orders.invoice_id = invoices.id");
                                    if (mysqli_num_rows($report_query) > 0) {
                                        $quantity = 0;
                                        $Mtotal = 0;
                                        while ($row = mysqli_fetch_array($report_query)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['created_at'] . "</td>";
                                            echo "<td>" . $row['branch_name'] . "</td>";
                                            echo "<td>" . $row['category_name'] . "</td>";
                                            echo "<td>" . $row['product_name'] . "</td>";
                                            echo "<td>" . $row['unity_price'] . "</td>";
                                            echo "<td>" . $row['requested_quantity'] . "</td>";
                                            echo "<td>" . $row['total_price'] . "</td>";
                                            echo "<td>" . $row['invoice_id'] . "</td>";
                                            echo "</tr>";
                                            $quantity += $row['requested_quantity'];
                                            $Mtotal += $row['total_price'];
                                        }
                                        echo "<tr><td>Total</td><td></td><td></td><td></td><td></td><td></td> <td class='text-end'>$quantity</td> <td>$Mtotal</td> </tr>";
                                    } else {
                                        echo "<h3> Nothing to report</h3>";
                                    }
                                } else if (empty($branch) && empty($products) && !empty($from_date) && !empty($to_date)) {
                                    $report_query = mysqli_query($connection, "SELECT orders.id, orders.branch_id, orders.category_id, orders.product_id, orders.requested_quantity, orders.invoice_id, orders.total_price, branches.name as branch_name, categories.name as category_name, products.product_name, products.unity_price, orders.created_at FROM orders, branches, categories, products, invoices WHERE orders.status = 1 AND orders.branch_id = branches.id AND orders.category_id = categories.id AND orders.product_id = products.id AND orders.invoice_id = invoices.id");
                                    if (mysqli_num_rows($report_query) > 0) {
                                        $quantity = 0;
                                        $Mtotal = 0;
                                        while ($row = mysqli_fetch_array($report_query)) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['created_at'] . "</td>";
                                            echo "<td>" . $row['branch_name'] . "</td>";
                                            echo "<td>" . $row['category_name'] . "</td>";
                                            echo "<td>" . $row['product_name'] . "</td>";
                                            echo "<td>" . $row['unity_price'] . "</td>";
                                            echo "<td>" . $row['requested_quantity'] . "</td>";
                                            echo "<td>" . $row['total_price'] . "</td>";
                                            echo "<td>" . $row['invoice_id'] . "</td>";
                                            echo "</tr>";
                                            $quantity += $row['requested_quantity'];
                                            $Mtotal += $row['total_price'];
                                        }
                                        echo "<tr><td>Total</td><td></td><td></td><td></td><td></td><td></td> <td class='text-end'>$quantity</td> <td>$Mtotal</td> </tr>";
                                    } else {
                                        echo "<h3> Nothing to report</h3>";
                                    }
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--end container-->

<!--footer section start-->



<?php include "manager-includes/manager-footer.php"; ?>