<?php 

function delete($connection, $table, $id){
    $delete = mysqli_query($connection, "UPDATE $table SET status = 0 WHERE id = $id");
    if($delete == true){
        $_SESSION['message'] = "Object Moved To trash!";
        // header("Location: $table.php");
    }else{
        die('no');
    }
  }

  function changePrevirage($connection, $role, $id){
    $change = mysqli_query($connection, "UPDATE users SET role = '$role' WHERE id = $id");

    if($change == true){
        $_SESSION['message'] = "Privirages changed!";
        // header("Location: $table.php");
    }else{
        die('no');
    }
  }

?>