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

    ?> 

<body class="sticky-header">
        <section>
            <!-- sidebar left start-->
            <div class="sidebar-left">
                <div class="sidebar-left-info">
                                        
                    <!--sidebar nav start-->
                    <ul class="side-navigation">
                        <li>
                            <a href="index.php"><i class="mdi mdi-gauge"></i> <span>Dashboard</span></a>
                        </li>
                    </ul>
                    <ul class="side-navigation">
                        <li>
                            <a href="branches.php"><i class="mdi mdi-google-circles-extended"></i> <span>Branches</span></a>
                        </li>
                        <li>
                            <a href="categories.php"><i class="mdi mdi-buffer"></i> <span>Categories</span></a>
                        </li>
                        <li>
                            <a href="products.php"><i class="mdi mdi-diamond"></i> <span>Products</span></a>
                        </li>
                        <li>
                            <a href="orders.php"><i class="mdi mdi-diamond"></i> <span>Orders</span></a>
                        </li>
                        <li>
                            <a href="eorders.php"><i class="mdi mdi-unfold-less"></i> <span>External Orders</span></a>
                        </li>
                        <li>
                            <a href="report.php"><i class="mdi mdi-file-multiple"></i> <span>Report</span></a>
                        </li>
                        
                    </ul>
                </div>
            </div>

            <!-- body content start-->
            <div class="body-content">
                <!-- header section start-->
                <div class="header-section">
                    <!--logo and logo icon start-->
                    <div class="logo" style="background-color: #506192;">
                        <a href="index.html">
                            <span class="logo-img">
                                <img src="../assets/images/logo_sm.png" alt="" height="26">
                            </span>
                            <!--<i class="fa fa-maxcdn"></i>-->
                            <span class="brand-name">ST Joseph</span>
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

                    <div class="notification-wrap ">
                        <!--right notification start-->
                        <div class="right-notification">
                            <ul class="notification-menu" style="margin-right: 20px;">
                            <?php if(password_verify('123', $thepassword)){  ?>
                                <li class="pr-1">
                                    <a href="javascript:;" class="notification pr-3" data-toggle="dropdown">
                                        <i class="mdi mdi-bell-outline"></i>
                                        <span class="badge badge-warning">1</span>
                                    </a>
                                    <ul class="dropdown-menu mailbox dropdown-menu-right">
                                        <li>
                                          <div class="drop-title">Notifications</div>
                                        </li>
                                        <li class="notification-scroll">
                                            <div class="message-center">
                                                <a href="profile.php">
                                                    <div class="user-img text-danger"> 
                                                        <i class=" mdi mdi-exclamation"></i>
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h6>System(Weak password)</h6>
                                                        <span class="mail-desc">change Your password</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <?php } ?>
                                <li>
                                    <a href="javascript:;" data-toggle="dropdown" style="padding: 0;">
                                        
                                        <span class="text-muted m-0 " style="margin-top: 5px;"><?php echo  $names; ?></span>
                                        <img src="../assets/images/users/profile.png" alt="" class="rounded-circle" width="30">
                                    </a>
                                    
                                    <div class="dropdown-menu dropdown-menu-right profile-menu">
                                        <a class="dropdown-item" href="profile.php"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                        <a class="dropdown-item" href="../logout.php"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                    </div>
                                </li>

                               
                            </ul>
                        </div><!--right notification end-->
                    </div>
                </div>
                <!-- header section end-->
