<?php
include "../../includes/connection.php";

if (!empty($_POST)) {
    $output = '';
    $name = $_POST['name'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];

    if (isset($_POST['update_id'])) {

        $update_id = $_POST['update_id'];
        $update_branch_query = mysqli_query($connection, "UPDATE branches SET name = '$name', location = '$location' phone = '$phone' WHERE id = $update_id");

        if ($update_branch_query) {
            $_SESSION['message'] = "Branche Updated Successfuly!";
        }
    } else {

        $insert_branch_query = mysqli_query($connection, "INSERT INTO branches VALUES('', '$name', '$location', '$phone', 1, now())");

        if ($insert_branch_query) {
            $_SESSION['message'] = "Branche " . $name . " Created Successfuly!";
        }
    }
}
?>