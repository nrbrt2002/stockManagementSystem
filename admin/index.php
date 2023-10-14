<?php include "admin-includes/admin-header.php"; ?>
<body style="overflow: hidden;">

<div class="container-fluid">


    <div class="page-head">
        <h4 class="mt-2 mb-2">Dashboard</h4>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="row">
                <div class="col-lg-3 col-sm-3">
                    <div class="widget-box bg-white m-b-30">
                        <div class="row d-flex align-items-center">
                            <div class="col-5">
                                <div class="text-center"><i class="ti ti-eye"></i></div>
                            </div>
                            <div class="col-2">
                            </div>
                            <?php $count_orders_query = mysqli_query($connection, "SELECT * FROM orders WHERE status = 0");
                            $orders_count = mysqli_num_rows($count_orders_query);
                            ?>
                            <div class="col-4">
                                <h2 class="m-0 counter"><?php echo $orders_count; ?></h2>
                                <p>Unprocessed Orders</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3">
                    <div class="widget-box bg-white m-b-30">
                        <div class="row d-flex align-items-center">
                            <div class="col-4">
                                <div class="text-center"><i class="ti ti-wallet"></i></div>
                            </div>
                            <div class="col-4"></div>
                            <?php $count_products_query = mysqli_query($connection, "SELECT * FROM feedback");
                            $products_count = mysqli_num_rows($count_products_query);
                            ?>
                            <div class="col-4">
                                <h2 class="m-0 counter"><?php echo $products_count; ?></h2>
                                <p>Feedback</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <div class="widget-box bg-white m-b-30">
                        <div class="row d-flex align-items-center">
                            <div class="col-3">
                                <div class="text-center"><i class="ti ti-wallet"></i></div>
                            </div>
                            <?php $count_products_query = mysqli_query($connection, "SELECT * FROM products WHERE status = 1");
                            $products_count = mysqli_num_rows($count_products_query);
                            ?>
                            <div class="col-4">
                                <h2 class="m-0 counter"><?php echo $products_count; ?></h2>
                                <p>Products</p>
                            </div>
                            <?php $count_categories_query = mysqli_query($connection, "SELECT * FROM categories WHERE status = 1");
                            $categories_count = mysqli_num_rows($count_categories_query);
                            ?>
                            <div class="col-4">
                                <h2 class="m-0 counter"><?php echo $categories_count; ?></h2>
                                <p>Categories</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <div class="widget-box bg-white m-b-30">
                        <div class="row d-flex align-items-center text-center">
                            <div class="col-5">
                                <div class="text-center"><i class="ti ti-user"></i></div>
                            </div>
                            <div class="col-2"></div>
                            <?php $count_branches_query = mysqli_query($connection, "SELECT * FROM branches WHERE status = 1");
                            $branches_count = mysqli_num_rows($count_branches_query);
                            ?>
                            <div class="col-4">
                                <h2 class="m-0 counter"><?php echo $branches_count; ?></h2>
                                <p>Branches</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="curve_chart" style="width: 100%; height: 500px"></div>

</div>

<?php include "admin-includes/admin-footer.php"; ?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Year', 'Orders', 'Products'],
            <?php
            $the_query = mysqli_query($connection, "SELECT * FROM orders");
            $count = mysqli_num_rows($the_query);
            while ($row = mysqli_fetch_array($the_query)) {
                $created_at = $row['created_at'];
                $date = new DateTime($created_at);
                $invoiceDatetime = $date->format('Y-m');
             echo("['". $invoiceDatetime." ', ".$count.", 20],");

            }
            ?>
            // ['2007', 1030, 540]
        ]);

        var options = {
            title: 'Company Performance',
            curveType: 'function',
            legend: {
                position: 'bottom'
            }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
</script>
    
</body>