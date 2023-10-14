<?php include"salesman-includes/salesman-header.php";?>
                <div class="container-fluid">
                    

                <br>
                <div class="page-head pt-4">
                        <h4 class="mt-2 mb-2">Profile</h4>
                    </div>
                    


                <div class="card-title tab-2">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active" href="#about" data-toggle="tab" aria-expanded="false"><i class="ti-user mr-2"></i>About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#photo" data-toggle="tab" aria-expanded="false"><i class="mdi mdi-google-circles-extended mr-2"></i>Branch</a>
                        </li>                                                
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#settings" data-toggle="tab" aria-expanded="false"><i class="ti-settings mr-2"></i>Password<span class="badge badge-warning">1</span></a>
                        </li>                                                
                    </ul>

                                        <div class="tab-content p-4 bg-white">
                                            <div class="tab-pane active p-4" id="about">
                                                <h3>Personal Info</h3>

                                                <form action="" method="post">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Names: </label>
                    <div class="col-sm-10">
                        <input type="text" name="names" class="form-control" value="<?php echo $names; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">E-mail: </label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" value="<?php echo $isOnline; ?>" >
                    </div>
                </div>
                <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Phone:  </label>
                        <span class="input-group-text" id="basic-addon1">+250</span>
                        <div class="col-sm-8">
                        <input type="number" class="form-control" name="phone" value="<?php echo $phone; ?>">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Branch: </label>
                    <div class="col-sm-10">
                        <select name="branch" id="" class="form-control" disabled>
                            <?php
                            $select_current_branch_query = mysqli_query($connection, "SELECT * FROM branches where id = $branch");

                            $row2 = mysqli_fetch_array($select_current_branch_query);
                                $id1 =$row2['id'];
                                $name1 =$row2['name'];
                                ?>
                            <option value="<?php echo $id1?>" selected> <?php echo $name1?></option>

                               
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Role: </label>
                    <div class="col-sm-10">
                        <select name="role" class="form-control" disabled>
                            <option value="none" selected><?php echo $role?></option>
                            
                        </select>
                    </div>
                </div>


                <div class="col-12">
                    <input type="submit" name="edit_profile" value="Edit profile" class="btn btn-primary">
                </div>
                </form>
        </div>




        <div class="tab-pane" id="photo">
            <h3>Branches Info</h3>

            <?php
                    
                    $select_users_query = mysqli_query($connection, "SELECT * FROM branches where id = $branch");
                    $row1 = mysqli_fetch_array($select_users_query);
                    $branch_id =$row1['id'];
                    $branch_name =$row1['name'];
                    $branch_location =$row1['location'];
                    $branch_phone =$row1['phone'];
                    
                    $created_at =$row1['created_at'];
                    $date = new DateTime($created_at);
                    $now = new DateTime();
                    
                    ?>
        <?php
            if(isset($_POST['edit_branch'])){
                $branch_name = $_POST['name'];
                $branch_location = $_POST['location'];
                $branch_phone = $_POST['phone'];

                $update_branch_query = mysqli_query($connection, "UPDATE branches SET name = '$branch_name', location = '$branch_location', phone = '$branch_phone' WHERE id = $branch_id ");

                if($update_branch_query){
                    $_SESSION['message'] = "Branch Updated!";
                }
            }
        ?>
        <form action="" method="post">

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Name: </label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="<?php echo $branch_name; ?>" disabled>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Location: </label>
                <div class="col-sm-10">
                    <input type="text" name="location" class="form-control" value="<?php echo $branch_location; ?>" disabled>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Phone:  </label>
                        <span class="input-group-text" id="basic-addon1">+250</span>
                        <div class="col-sm-8">
                        <input type="number" class="form-control" name="phone" value="<?php echo $branch_phone; ?>" disabled>
                    </div>
                </div>

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Create At: </label>
                <div class="col-sm-10">
                    <input type="text" name="location" class="form-control" value="<?php echo $date->diff($now)->format("%d days %h hours %m min  Ago"); ?>" disabled>
                </div>
            </div>

            <div class="col-12">
                    <input type="submit" name="edit_branch" value="Edit Branch Info" class="btn btn-theme" disabled>
                </div>
        </form>

        </div>


        <div class="tab-pane" id="settings">
            <h3>Change Password</h3>

            <?php

            if(isset($_POST['change_password'])){
                $old_password = $_POST['old_password'];
                $new_password = $_POST['new_password'];
                $new_password1 = $_POST['new_password1'];

                if(password_verify($old_password, $thepassword)){
                    if($new_password === $new_password1){
                        $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                        $update_password_password_query = mysqli_query($connection, "UPDATE users SET password = '$new_hashed_password' WHERE id = $dataId");
                        if($update_password_password_query){
                            $_SESSION['message'] = "Password Updated Successfuly!";
                        }
                    }else{
                        $_SESSION['error'] = "Both New Passwords doesn't match!";
                    }
                }else{
                    $_SESSION['error'] = "Incorrect Old password!";
                }
            }


        
        ?>

                <form action="" method="post" class="needs-validation" novalidate>

                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Old Password: </label>
                        <div class="col-sm-10">
                            <input type="password" name="old_password" class="form-control" required>
                            <div class="invalid-feedback">
                                Required
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">New Password: </label>
                        <div class="col-sm-10">
                            <input type="password" name="new_password" class="form-control" required>
                            <div class="invalid-feedback">
                                Required
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Repeate new Password: </label>
                        <div class="col-sm-10">
                            <input type="password" name="new_password1" id="new-password" class="form-control" required>
                            <div class="invalid-feedback">
                                Required
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <input type="submit" name="change_password" value="Change Password" class="btn btn-primary">
                    </div>
                </form>
        </div>
    </div>                                    
</div>

                            
    </div>            
                    
                    
                
<?php include "salesman-includes/salesman-footer.php"; ?>


<script>
            <?php
                if(isset($_SESSION['message'])){

                 ?>
                alertify.set('notifier','position', 'top-right');
                alertify.success("<?php echo $_SESSION['message']?>");
                
           <?php 
        
                unset($_SESSION['message']);
        
        }else if(isset($_SESSION['error'])){
            
            ?>
            alertify.set('notifier','position', 'top-right');
            alertify.error("<?php echo $_SESSION['error']?>");
        <?php 
            unset($_SESSION['error']);
        } ?>
        </script>

<script>
    var forms = document.querySelectorAll(".needs-validation");
    Array.prototype.slice.call(forms).forEach(function(form){
        form.addEventListener("submit", function(event){
            if(!form.checkValidity){
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add("was-validated")
        })
    });
</script>