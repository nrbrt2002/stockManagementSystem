<?php
include "../../includes/connection.php";
    $ids = array();
    // $ids = implode(",",$_POST["id"]);
    $ids = $_POST["id"];
    
    
    // $deactive = "UPDATE inf SET active=0 where n_id IN(".$ids.")";
    $deactive = "UPDATE notifications SET active=0 where id= $ids ";
    
    $result = mysqli_query($connection,$deactive);
    echo mysqli_error($connection);

?>