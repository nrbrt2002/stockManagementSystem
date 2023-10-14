<body>
    <?php
    $select_user_query = mysqli_query($connection, "SELECT * FROM users WHERE email ='$isOnline'");

    $data = mysqli_fetch_array($select_user_query);
    $dataId = $data['id'];
    $names = $data['names'];
    $branch = $data['branch'];
    $phone = $data['phone'];
    $role = $data['role'];
    $thepassword = $data['password'];

    if (isset($_GET['change'])) {
        $anId = $_GET['change'];
        $change_notification = mysqli_query($connection, "UPDATE notifications SET active = 0 WHERE id = $anId");
    }
    ?>

    <body class="sticky-header">
        <section>
            <!-- sidebar left start-->
            <div class="sidebar-left">
                <div class="sidebar-left-info">

                    <!--sidebar nav start-->
                    <ul class="side-navigation">
                        <li>
                            <a href="orders.php"><i class="mdi mdi-gauge"></i> <span>Dashboard</span></a>
                        </li>

                        <li>
                            <a href="orders.php"><i class="mdi mdi-stackexchange"></i> <span>Orders</span></a>
                        </li>
                        <li>
                            <a href="history.php"><i class="mdi mdi-clock-out"></i> <span>History</span></a>
                        </li>
                        <li>
                            <a href="invoice.php"><i class="mdi mdi-file-multiple"></i> <span>Invoice</span></a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- body content start-->
            <div class="body-content">
                <!-- header section start-->
                <div class="header-section">
                    <!--logo and logo icon start-->
                    <div class="logo" style="  background-color: #8bedf6;">
                        <a href="index.html">
                            <span class="logo-img">
                                <img src="../assets/images/logo_sm.png" alt="" height="26">
                            </span>
                            <!--<i class="fa fa-maxcdn"></i>-->
                            <span class="brand-name">St joseph</span>
                        </a>
                    </div>

                    <!--toggle button start-->
                    <a class="toggle-btn"><i class="ti ti-menu"></i></a>
                    <!--toggle button end-->

                    <!--mega menu start-->
                    <div id="navbar-collapse-1" class="navbar-collapse collapse mega-menu">
                        <ul class="nav navbar-nav">
                            <!-- Classic dropdown -->

                            <!-- Classic list -->

                        </ul>
                    </div>
                    <!--mega menu end-->




                    <!--right notification Start-->

                    <?php

                    $select_notification_query = mysqli_query($connection, "SELECT * FROM notifications WHERE active = 1 AND branch_id = $branch ORDER BY created_at DESC");
                    $select_notification_unactive_query = mysqli_query($connection, "SELECT * FROM notifications WHERE active = 0 AND branch_id = $branch ORDER BY created_at DESC LIMIT 0,2");
                    $active_notification_count = mysqli_num_rows($select_notification_query);

                    if (password_verify('123', $thepassword)) { $active_notification_count++; }
                    ?>

                    <div class="right-notification pr-4">
                        <ul class="notification-menu">
                            <li>
                                <a href="javascript:;" class="notification" data-toggle="dropdown">
                                    <i class="mdi mdi-bell-outline"></i>
                                    <span class="badge badge-danger"><?php echo $active_notification_count; ?></span>
                                </a>
                                <ul class="dropdown-menu mailbox dropdown-menu-right">
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li class="notification-scroll">

                                        <div class="message-center">
                                            <?php

                                            while ($row = mysqli_fetch_array($select_notification_query)) {
                                                $id = $row['id'];
                                                $name = $row['name'];
                                                $content = $row['content'];
                                                $icon = $row['icon'];

                                                $created_at = $row['created_at'];
                                                $date = new DateTime($created_at);
                                                $now = new DateTime();



                                            ?>
                                                <a href="?change=<?php echo $id; ?>" class="bg-secondary">
                                                    <div class="user-img">
                                                        <i class="<?php echo $icon?>"></i>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6><?php echo $name; ?></h6>
                                                        <span class="mail-desc"><?php echo $content; ?></span>
                                                        <span class="mail-desc text-muted"><?php echo $date->diff($now)->format("%d D, %h H, %i M ago");; ?></span>
                                                    </div>
                                                </a>
                                            <?php } ?>
                                            <?php if (password_verify('123', $thepassword)) { $active_notification_count++; ?>
                                                <a href="profile.php" class="bg-secondary">
                                                    <div class="user-img">
                                                        <i class="ti ti-alert text-danger"></i>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>System(Weak Password)</h6>
                                                        <span class="mail-desc">change your password</span>
                                                    </div>
                                                </a>
                                            <?php  } ?>

                                            <?php

                                            while ($row = mysqli_fetch_array($select_notification_unactive_query)) {
                                                $id = $row['id'];
                                                $name = $row['name'];
                                                $content = $row['content'];
                                                $icon = $row['icon'];

                                                $created_at = $row['created_at'];
                                                $date = new DateTime($created_at);
                                                $now = new DateTime();


                                            ?>
                                                <a>
                                                    <div class="user-img">
                                                        <i class="<?php echo $icon?>"></i>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6><?php echo $name; ?></h6>
                                                        <span class="mail-desc"><?php echo $content; ?></span>
                                                        <span class="mail-desc text-muted"><?php echo $date->diff($now)->format("%d D, %h H, %i M ago");; ?></span>
                                                    </div>
                                                </a>
                                            <?php } ?>

                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <div class="sb-toggle-right">
                                    <small><?php echo $names; ?><br><?php echo $role; ?></small>
                                    <!-- <p></p> -->
                                </div>
                            </li>

                            <li class="pt-3 ">
                                <a href="javascript:;" data-toggle="dropdown">
                                    <img src="../assets/images/users/profile.png" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-menu">
                                    <a class="dropdown-item" href="profile.php"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                    <a class="dropdown-item" href="../logout.php"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                </div>

                            </li>


                        </ul>
                    </div><!--right notification end-->







                </div>
                <!-- header section end-->