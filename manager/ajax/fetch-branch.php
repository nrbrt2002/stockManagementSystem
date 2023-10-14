<?php
include "../../includes/connection.php";

if(isset($_POST["branch_id"]))  
{  
     $query = mysqli_query($connection, "SELECT * FROM branches WHERE id = '".$_POST["branch_id"]."'");  
     $row = mysqli_fetch_array($query);  
     echo json_encode($row);  
}

?>