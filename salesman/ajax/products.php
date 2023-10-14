<?php
include "../../includes/connection.php";
$category_id =   $_POST['category_data'];

$product = "SELECT * FROM products WHERE category_id = $category_id";

$product_qry = mysqli_query($connection, $product);
// $output="";
$output = '<option value="">--PRODUCT--</option>';
while ($product_row = mysqli_fetch_assoc($product_qry)) {
    $unity_price = $product_row['unity_price'];
    $output .= '<option value="' . $product_row['id'] . '">' . $product_row['product_name'] . '</option>';
}
echo $output;