<?php include "admin-includes/admin-header.php"; ?>
<div class="container-fluid">
    <div class="page-head">
        <h4 class="my-2">Categories</h4>
    </div>

    <?php

    if (isset($_POST['add_category'])) {
        $name = $_POST['name'];


        $insert_category_query = mysqli_query($connection, "INSERT INTO categories VALUES('', '$name', 1, now())");
        if ($insert_category_query) {
            $_SESSION['message'] = "Category Created!";
        }
    }

    ?>
    <div class="data-table">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card m-b-30">
                    <div class="card-body table-responsive">
                        <h5 class="header-title"> All Categories</h5>
                        <div class="table-odd">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal"><i class="fa fa-plus"></i> Category</button>
                            <br><br>
                            <table id="datatable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Created</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if (isset($_POST['delete'])) {
                                        $table = 'categories';
                                        $id = $_POST['delete_id'];
                                        delete($connection, $table, $id);
                                    }
                                    $select_users_query = mysqli_query($connection, "SELECT * FROM categories WHERE status = 1");
                                    while ($row = mysqli_fetch_array($select_users_query)) {
                                        $id = $row['id'];
                                        $name = $row['name'];

                                        $created_at = $row['created_at'];
                                        $date = new DateTime($created_at);
                                        $now = new DateTime();
                                    ?>
                                        <tr>
                                            <td><?php echo $id ?></td>
                                            <td><?php echo $name ?></td>
                                            <td><?php echo $date->diff($now)->format("%d days, %h hours, %i minites Ago"); ?></td>

                                            <td class="text-center">
                                                <a href="#" class="confirm_upadate_btn" data-toggle="modal" data-target="#exampleModal"><i class="ta ti-pencil-alt text-info pr-4"></i></a>
                                                <a href="#" class="confirm_delete_btn" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="ta ti-trash text-danger"></i></a>
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

<?php include "admin-includes/admin-footer.php"; ?>


<div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title text-secondary"><strong> Add Category</strong></h5>
                <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-justify">
                <form action="" method="post">
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Name: </label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>



                    <div class="col-12">
                        <input type="submit" name="add_category" value="Create Category" class="btn btn-primary">
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
                <button type="submit" name="delete" class="btn btn-danger">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
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
<script>
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

</script>