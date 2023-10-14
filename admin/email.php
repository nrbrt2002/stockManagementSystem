<?php include "admin-includes/admin-header.php"; ?>
<body style="overflow: hidden;">
    

<div class="container-fluid">
    <div class="page-head">
        <h4 class="my-2">Generate Report</h4>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h5 class="header-title pb-3">All Messages</h5>
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>E-mail</th>
                            <th>Message</th>
                            <th>Sent</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        if (isset($_POST['delete_message'])) {
                            $id = $_POST['delete_id'];
                            $query = mysqli_query($connection, "DELETE FROM feedback WHERE id = $id");

                            if($query){
                                $_SESSION['success_delete'] = "MESSAGE DELETED SUCCESSFULY";
                            }
                        }

                        $select_qeury = mysqli_query($connection, "SELECT * FROM feedback ORDER BY created_at ASC");
                        while ($row = mysqli_fetch_array(($select_qeury))) {
                            $id = $row['id'];
                            $email = $row['email'];
                            $message = $row['message'];

                            $created_at = $row['created_at'];
                            $date = new DateTime($created_at);
                            $now = new DateTime();
                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $message; ?></td>
                                <td><?php echo $date->diff($now)->format("%d D, %h H, %i M Ago"); ?></td>
                                <td><a href="" class="confirm_delete_btn" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="ta ti-trash text-danger"></i></a></td>
                            </tr>
                        <?php } ?>
                    </table>

                </div>
            </div>
        </div>
    </div><!--end container-->

    <!--footer section start-->



    <?php include "admin-includes/admin-footer.php"; ?>

    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure to delete this Message</p>
                <form action="" method="post">
                    <input type="hidden" name="delete_id" id="delete_id">
            </div>
            <div class="modal-footer">
                <button type="submit" name="delete_message" class="btn btn-danger">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
        $(document).ready(function() {
        $('.confirm_delete_btn').on('click', function(e) {
            e.preventDefault();
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            console.log(data);
            $('#delete_id').val(data[0]);
        });
    });
</script>

<script>
    <?php
    if (isset($_SESSION['success_delete'])) {

    ?>
        alertify.set('notifier', 'position', 'top-right');
        alertify.success("<?php echo $_SESSION['success_delete']; ?>");

    <?php

        unset($_SESSION['success_delete']);
    } ?>
</script>
</body>