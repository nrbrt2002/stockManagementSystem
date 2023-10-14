<?php include "manager-includes/manager-header.php"; ?>
<div class="container-fluid">
    <div class="page-head">
        <h4 class="my-2">Branches</h4>
    </div>
    <div class="data-table">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body table-responsive">
                        <h5 class="header-title"> All branches</h5>
                        <div class="table-odd">
                            <button type="button" class="btn btn-primary" id="add_branch_btn" data-toggle="modal"  data-target=".bd-example-modal"><i class="fa fa-plus"></i> Branch</button>
                            <br><br>
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Phone</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if (isset($_POST['delete_branch'])) {
                                        $table = 'branches';
                                        $id = $_POST['delete_id'];
                                        delete($connection, $table, $id);
                                    }
                                    $select_users_query = mysqli_query($connection, "SELECT * FROM branches WHERE status = 1");
                                    while ($row = mysqli_fetch_array($select_users_query)) {
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        $location = $row['location'];
                                        $phone = $row['phone'];

                                        $created_at = $row['created_at'];
                                        $date = new DateTime($created_at);
                                        $now = new DateTime();

                                    ?>
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $name ?></td>
                                            <td><?php echo $location ?></td>
                                            <td>0<?php echo $phone ?></td>
                                            <td><?php echo $date->diff($now)->format("%d days, %h hours, %i minites Ago"); ?></td>
                                            <td class="text-center">
                                                <h6>
                                                    <a href="#" class="confirm_upadate_btn" data-toggle="modal" data-target="#exampleModal" id="<?php echo $id; ?>"><i class="ta ti-pencil-alt text-info pr-4"></i></a>
                                                    <a href="#" class="confirm_delete_btn" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="ta ti-trash text-danger"></i></a>
                                                </h6>
                                            </td>

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

<?php include "manager-includes/manager-footer.php"; ?>

<div class="modal fade bd-example-modal" tabindex="-1" role="dialog" id="add-modal" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title text-secondary"><strong>Create Branch</strong></h5>
                <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-justify">
                <form action="" method="post" id="form">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Names: </label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="the_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Location: </label>
                        <div class="col-sm-10">
                            <input type="text" name="location" id="the_location" class="form-control" required>
                        </div>
                    </div>
                    <div class="input-group mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Phone:&nbsp </label>
                        <span class="input-group-text" id="basic-addon1">+25</span>
                        <input type="number" class="form-control" name="phone" id="the_phone">
                    </div>
                    <input type="hidden" name="update_id" id="update_id" />
                    <div class="col-12">
                        <input type="submit" name="" id="insert" value="Create Branch" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Branch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure to delete this branch</p>
                <form action="" method="post">
                    <input type="hidden" name="delete_id" id="delete_id">
            </div>
            <div class="modal-footer">
                <button type="submit" name="delete_branch" class="btn btn-danger">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    // Selecting for DElete
    $(document).ready(function() {
        $('.confirm_delete_btn').on('click', function(e) {
            e.preventDefault();
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            // console.log(data);
            $('#delete_id').val(data[0]);
        });
    });

    $(document).on('click', '#add_branch_btn', function() {
        $('#insert').val("Insert");
        $('#insert').attr("name", "add_branch");
        $('#form')[0].reset();  
        // $('#add-modal').modal("show");
    });
    //Selecting for Update

    $(document).on('click', '.confirm_upadate_btn', function() {
        var branch_id = $(this).attr("id");

        $.ajax({
            url: "ajax/fetch-branch.php",
            method: "POST",
            data: {
                branch_id: branch_id
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                $('#the_name').val(data.name);
                $('#the_location').val(data.location);
                $('#the_phone').val(data.phone);
                $('#update_id').val(branch_id);

                $('#insert').val("Update");
                $('#insert').attr("name", "update_branch");
                $('#add-modal').modal("show");
            }
        });
    });


    $('#form').on("submit", function(event){  
           event.preventDefault();
           
           $.ajax({  
                     url:"ajax/insert.php",  
                     method:"POST",  
                     data:$('#form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#form')[0].reset();  
                          $('#add-modal').modal('hide');  
                        //   $('#employee_table').html(data);  
                     }  
                });  

    });
    // $(document).ready(function() {
    //     $('.confirm_upadate_btn').on('click', function() {
    //         // e.preventDefault();
    //         $tr = $(this).closest('tr');
    //         var data = $tr.children("td").map(function() {
    //             return $(this).text();
    //         }).get();
    //         console.log(data);
    //         $('#update_id').val(data[0]);
    //         $('#the_name').val(data[1]);
    //         $('#the_location').val(data[2]);
    //         $('#the_phone').val(data[3]);
    //     });
    // });
</script>
<script>
    <?php
    if (isset($_SESSION['message'])) {

    ?>
        alertify.set('notifier', 'position', 'top-right');
        alertify.success("<?php echo $_SESSION['message']; ?>");

    <?php

        unset($_SESSION['message']);
    } ?>
</script>