<?php include "includes/connection.php"; ?>

<?php
    if(isset($_SESSION['online'])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mannat Themes">
        <meta name="keyword" content="">

        <title>Pain St Joseph - Login</title>

        <!-- Theme icon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Theme Css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/slidebars.min.css" rel="stylesheet">
        <link href="assets/css/icons.css" rel="stylesheet">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet">

        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    </head>

    <?php
                    
        if(isset($_POST['login'])){

            $email = $_POST['email'];
            $password = $_POST['password'];
            $hasedPassword = password_hash($password, PASSWORD_DEFAULT);

            $query = mysqli_query($connection, "SELECT * FROM users WHERE email = '$email' AND status = 1");

            
            if(mysqli_num_rows($query)> 0){
                $row = mysqli_fetch_array($query);
                    $names = $row['names'];
                    $role = $row['role'];
                    $thepassword = $row['password'];


                    if(password_verify($password, $thepassword)){

                        $_SESSION['online'] = $email;
                        $_SESSION['role'] = $role;
                        $_SESSION['welcome'] = $names;

                        if($role == 'admin'){
                            $_SESSION['email'] = $email;
                            $_SESSION['welcome'] = $names;
                            $_SESSION['role'] = $role;
                            header("Location: admin/index.php");
                        }else if($role == 'manager'){
                            $_SESSION['email'] = $email;
                            $_SESSION['welcome'] = $names;
                            $_SESSION['role'] = $role;
                            header("Location: manager/index.php");
                        }else if($role == 'salesman'){
                            $_SESSION['email'] = $email;
                            $_SESSION['welcome'] = $names;
                            $_SESSION['role'] = $role;
                            header("Location: salesman/orders.php");
                        }else 
                            $_SESSION['email'] = $email;
                            $_SESSION['message'] = "User <b>". $email."</b> Has no Privirages";
                    }else{
                        $_SESSION['email'] = $email;
                        $_SESSION['message'] = "Incorrect password for <b>". $email."</b>";
                    }    
            }else{
                    $_SESSION['message'] = "Incorect email and password";
            }

            
        }
                 
    ?>

    <body class="sticky-header">
        <section class="bg-login">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="wrapper-page">
                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="card-title text-center">
                                                <img src="assets/images/logo_sm_2.png" alt="" class="">
                                                <h5 class="mt-3"><b>Pain St Joseph</b></h5>
                                            </div>  
                                            <form class="form mt-5 contact-form" action="" method="post">
                                                <div class="form-group ">
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-line" type="email" name="email" placeholder="E-mail" required="required">
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="col-sm-12">
                                                        <input class="form-control form-control-line" type="password" name="password" placeholder="Password" required="required">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="col-sm-12 mt-4">
                                                        <button class="btn btn-primary btn-block" type="submit" name="login">Log In</button>
                                                    </div>
                                                </div>

                                                <!-- <div class="form-group">
                                                    <div class="col-sm-12 mt-4 text-center">
                                                        <a href="recoverpw.html"><i class="fa fa-lock m-r-5"></i> Forgot password?</a>
                                                    </div>
                                                </div> -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-migrate.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>
        <script src="assets/js/slidebars.min.js"></script>
        
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <!--app js-->
        <script src="assets/js/jquery.app.js"></script>

        <script>
            <?php
                if(isset($_SESSION['message'])){

                 ?>
                alertify.set('notifier','position', 'top-right');
                alertify.error("<?php echo $_SESSION['message']; ?>");
                
           <?php 
        
                unset($_SESSION['message']);
        
        } ?>
        </script>
    </body>
</html>
