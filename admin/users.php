<body style="overflow: hidden;">
    

<?php include"admin-includes/admin-header.php";?>
                <div class="container-fluid">
                    <div class="page-head">
                        <h4 class="my-2">Users</h4>
                    </div>  
                    
                    <?php
                            
                            if(isset($_POST['add_user'])){
                                $names = $_POST['names'];
                                $email = $_POST['email'];
                                $branch = $_POST['branch'];
                                $phone = $_POST['phone'];
                                $role = $_POST['role'];
                                $password = password_hash('123', PASSWORD_DEFAULT);

                                $insert_user_query = mysqli_query($connection, "INSERT INTO users VALUES('', '$names', '$email', '$branch', '$phone', '$password', 1, '$role')");
                                if($insert_user_query){
                                    $_SESSION['message'] = "User Created!";
                                }
                            }
                            
                            ?>

                    <div class="data-table">
                    <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card m-b-30">
                                    <div class="card-body table-responsive">
                                        <h5 class="header-title"> All Users</h5>
                                        <div class="table-odd">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal"><i class="fa fa-plus"></i> User</button>
                                            <br><br>
                                            <table id="datatable" class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>E-mail</th>
                                                    <th>Phone</th>
                                                    <th>Branch</th>
                                                    <th>Branch Phone</th>
                                                    <th>Location</th>
                                                    <th>Role</th>
                                                    <th>Previrage</th>
                                                    <th>Delete</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <?php
                                        if(isset($_GET['table']) && isset($_GET['id'])){
                                            $table = $_GET['table'];
                                            $id = $_GET['id'];
                                            delete($connection, $table, $id);
                                        }

                                        if(isset($_GET['id']) && isset($_GET['role'])){
                                            $role = $_GET['role'];
                                            $id = $_GET['id'];
                                            changePrevirage($connection, $role, $id);
                                        }

                                    $select_users_query = mysqli_query($connection, "SELECT users.id, users.names, users.email, users.branch, users.phone, users.role, branches.name, branches.location, branches.phone AS branch_phone FROM users, branches WHERE branches.id = users.branch AND branches.status = 1 AND users.status = 1");
                                    while($row = mysqli_fetch_array($select_users_query)){
                                        $id =$row['id'];
                                        $names =$row['names'];
                                        $email =$row['email'];
                                        $branch =$row['name'];
                                        $phone =$row['phone'];
                                        $branch_phone =$row['branch_phone'];
                                        $role =$row['role'];
                                        $location =$row['location'];
                                        ?>
                                        <tr>
                                            <td><?php echo $id?></td>
                                            <td><?php echo $names?></td>
                                            <td><?php echo $email?></td>
                                            <td>0<?php echo $phone?></td>
                                            <td><?php echo $branch?></td>
                                            <td><?php echo $branch_phone?></td>
                                            <td><?php echo $location?></td>
                                            <td><?php echo $role?></td>
                                            <?php
                                                if($role == "manager" ){
                                                    echo "<td><a href='users.php?id=$id&role=admin'><span class='badge badge-info'>Change to Admin</span></a></td>";                                                    
                                                }else if($role == "salesman"){
                                                    echo "<td><a href='users.php?id=$id&role=manager'><span class='badge badge-primary'>change to Manager</span></a></td>";                                                    
                                                }else if($role == "none"){
                                                    echo "<td><a href='users.php?id=$id&role=salesman'><span class='badge badge-warning'>change to Salesman</span></a></td>";                                                    
                                                }else{
                                                    echo "<td><a href='users.php?id=$id&role=none'><span class='badge badge-danger'>Remove Previrage</span></a></td>";   
                                                }
                                            
                                            ?>
                                            <td class="text-center"><a href="users.php?table=users&id=<?php echo $id; ?>"><i class="fa fa-trash text-danger"></i></a></td>
                                            
                                        </tr>
                                        <?php } ?>
                                        
                                        
                                                </tbody>
                                            </table>
                                        </div>           
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end container-->

                <!--footer section start-->
                
<?php include "admin-includes/admin-footer.php"; ?>
<div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title text-secondary"><strong> Add user</strong></h5>
                <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-justify">
                <form action="" method="post">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Names: </label>
                    <div class="col-sm-10">
                        <input type="text" name="names" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">E-mail: </label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
                <div class="input-group mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Phone:&nbsp  </label>
                    <span class="input-group-text" id="basic-addon1">+25</span>
                    <input type="number" class="form-control" name="phone">
                </div>

                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Branch: </label>
                    <div class="col-sm-10">
                        <select name="branch" id="" class="form-control">
                            <?php
                            $select_users_query = mysqli_query($connection, "SELECT * FROM branches WHERE status = 1");
                            while($row = mysqli_fetch_array($select_users_query)){
                                $id =$row['id'];
                                $name =$row['name'];
                            ?>
                            <option value="<?php echo $id?>"> <?php echo $name?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Role: </label>
                    <div class="col-sm-10">
                        <select name="role" class="form-control">
                            <option value="none" selected>--Select Role ---</option>
                            <option value="none">None</option>
                            <option value="salesman" >Salesman</option>
                            <option value="manager" >Manager</option>
                            <option value="admin" >Admin</option>
                        </select>
                    </div>
                </div>

                <div class="col-12">
                    <input type="submit" name="add_user" value="Create User" class="btn btn-primary">
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
            <?php
                if(isset($_SESSION['message'])){

                 ?>
                alertify.set('notifier','position', 'top-right');
                alertify.success("<?php echo $_SESSION['message']; ?>");
                
           <?php 
        
                unset($_SESSION['message']);
        
        } ?>
        </script>
        </body>