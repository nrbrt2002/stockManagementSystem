<?php
include "../../includes/connection.php";
$product_data =   $_POST['product_data'];

$product = "SELECT * FROM products WHERE id = $product_data";

$product_qry = mysqli_query($connection, $product);
// $output="";
$output = '<label for="">U/P</label>';
while ($product_row = mysqli_fetch_assoc($product_qry)) {
    $output .= '<input type="number" name="unity_price" class="form-control" value="'.$product_row['unity_price'].'" id="unityPriceInput" readonly>';
}
echo $output;