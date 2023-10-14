<?php include "includes/connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paint St Joseph</title>
  <!-- -------- anime css ------ -->
  <link rel="stylesheet" href="assets/css/animate.css">
  <!-- --------- tiny slider css ------ -->
  <link rel="stylesheet" href="front-assets/css/tiny-slider.css">
  <!-- --------- font awsome css ------ -->
  <link rel="stylesheet" href="front-assets/css/all.css">
  <!-- -------- venobox css ------- -->
  <link rel="stylesheet" href="front-assets/css/venobox.css" type="text/css" media="screen" />
  <!-- ---- Bootstrap css--- -->
  <link rel="stylesheet" href="front-assets/css/bootstrap.min.css">
  <!-- ---------- default css --------- -->
  <link rel="stylesheet" href="front-assets/css/default.css">
  <!-- --- style css -->
  <link rel="stylesheet" href="front-assets/css/style.css">

  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

</head>

<body>
  <!-- --------- preloader ------------ -->
  <div class="preloader">
    <div class="loader">
      <div class="spinner">
        <div class="spinner-container">
          <div class="spinner-rotator">
            <div class="spinner-left">
              <div class="spinner-circle"></div>
            </div>
            <div class="spinner-right">
              <div class="spinner-circle"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-------   Header star ------>
  <header class="header-area">
    <div class="navbar-area">
      <!---- navbar star--->
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <!-- <img class="image" src="assets/img/header/logo/landapp-logo.png" alt=""> -->
              <b style="color: #fe5f59;">PAINT ST JOSEPH</b>

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link active" data-scroll-nav="0" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-scroll-nav="1" href="#">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-scroll-nav="2" href="#">Product</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-scroll-nav="3" href="#">Testimonial</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-scroll-nav="4" href="#">Order</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-scroll-nav="5" href="#">FAQ</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-scroll-nav="6" href="#">Contact</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
              </ul>

            </div>
          </div>
        </nav>
      </div>
    </div>
    <!---- navbar end--->
    <div class="header-hero">

      <div class="container">
        <div class="row align-items-center justify-content-center justify-content-lg-between">
          <div class="col-lg-6 col-md-10">
            <div class="header-hero-content">
              <h1 class="header-title wow fadeInLeftBig" data-wow-duration="3s" data-wow-delay="0.2s"><span>WELCOME TO THE BAKERY</span> Paint St Joseph</h1>
              <p class="text wow fadeInLeftBig" data-wow-duration="3s" data-wow-delay="0.4s">Welcome to Bakery Paint St Joseph, located right here in Kigali! Our bakery is your go-to spot for delicious treats and artistic flair. With multiple branches across the city, we're here to satisfy your cravings for mouthwatering pastries, cakes, and more. Join us in savoring the delightful flavors we have to offer, right in the heart of Kigali.</p>
              <ul class="d-flex">
                <li style="margin-right: 10px;"><a href="" class="main-btn wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-scroll-index="1">Get started</a></li>
                <li style="margin-right: 10px;"><a href="" class="main-btn2 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-scroll-index="4">Place Order</a></li>
              </ul>

            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="header-image">
              <img src="front-assets/img/header/cup-cake-food-muffins.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="header-shape-1"></div>
        <div class="header-shape-2">
          <img src="front-assets/img/header/header-shape-2.svg" alt="">
        </div>
      </div>
    </div>
    <!---- home star ------>
  </header>
  <!--------   Header End ----  -->
  <!-- ----------- About Section Start --------- -->
  <section class="about-area pt-70 pb-120" data-scroll-index="1">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="about-image wow fadeInLeftBig" data-wow-duration="3s" data-wow-delay="0.5s">
            <div class="about-shape"></div>
            <img src="front-assets/img/product/about.jpg" alt="" class="app">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="about-content mt-50 wow fadeInRightBig" data-wow-duration="3s" data-wow-delay="0.5s">
            <div class="section-title">
              <h1 class="mb-25  wow fadeInUp" data-wow-delay=".2s">About <span> us</span></h1>

              <p class="text">We are Kigali’s best Bakery, and we accept the interesting task of identifying unique ingredients, as well as fantastic comfort food cultures, traditions, and history. Above all, while dining at our restaurant, we want to interact with nature that tells stories. </p>
            </div>
            <a href="" class="main-btn" data-scroll-index="4">Place order</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ----------- About Section End --------- -->
  <!-- ------- Feature Section Start ---------- -->
  <section class="feature-section pt-80" data-scroll-index="2">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-7">
          <div class="section-title text-center mb-30">
            <h1 class="mb-25  wow fadeInUp" data-wow-delay=".2s">Our <span> Products</span></h1>
            <p class="wow fadeInUp" data-wow-delay=".4s">Delicious products</p>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <section style="background-color: #eee;">
          <div class="container py-5">
            <h4 class="text-center mb-5"><strong>Product listing</strong></h4>

            <div class="row">
              <div class="col-lg-4 col-md-12 mb-4">
                <div class="bg-image hover-zoom ripple shadow-1-strong rounded">
                  <img src="front-assets/img/product/images (1).jpg" class="w-100" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
                      <div class="d-flex justify-content-start align-items-start h-100">

                      </div>
                    </div>
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                    </div>
                  </a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 mb-4">
                <div class="bg-image hover-zoom ripple shadow-1-strong rounded">
                  <img src="front-assets/img/product/images (2).jpg" class="w-100" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
                      <div class="d-flex justify-content-start align-items-start h-100">

                      </div>
                    </div>
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                    </div>
                  </a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 mb-4">
                <div class="bg-image hover-zoom ripple shadow-1-strong rounded">
                  <img src="front-assets/img/product/images (3).jpg" class="w-100" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
                      <div class="d-flex justify-content-start align-items-start h-100">

                      </div>
                    </div>
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4 col-md-12 mb-4">
                <div class="bg-image hover-zoom ripple shadow-1-strong rounded ripple-surface">
                  <img src="front-assets/img/product/images (4).jpg" class="w-100" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
                      <div class="d-flex justify-content-start align-items-start h-100">

                      </div>
                    </div>
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                    </div>
                  </a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 mb-4">
                <div class="bg-image hover-zoom ripple shadow-1-strong rounded">
                  <img src="front-assets/img/product/images (5).jpg" class="w-100" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
                      <div class="d-flex justify-content-start align-items-start h-100">

                      </div>
                    </div>
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                    </div>
                  </a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 mb-4">
                <div class="bg-image hover-zoom ripple shadow-1-strong rounded">
                  <img src="front-assets/img/product/Fotolia_139664445_S.jpg" class="w-100" />
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
                      <div class="d-flex justify-content-start align-items-start h-100">

                      </div>
                    </div>
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
  <!-- ------- Feature Section End ---------- -->

  <!-- ----------- Testimonial Section Start ------- -->
  <section class="testimonial-section" data-scroll-index="3">
    <div class="container">
      <div class="row justify-content-center testimonial-active-wrapper">
        <div class="col-xl-6 col-lg-7">
          <div class="section-title text-center mb-60">
            <h1 class="mb-25  wow fadeInUp" data-wow-delay=".2s">What Our <span> Client Says</span></h1>
            <p class="text-white wow fadeInUp" data-wow-delay=".4s">Check Reviews of our client .</p>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-xl-7 col-lg-8">
            <div class="testimonial-active">
              <div class="testimonial-wrapper">
                <div class="single-testimonial">
                  <div class="info">
                    <div class="image-2">
                      <img src="front-assets/img/testemonial/parfait.jpg" alt="">
                    </div>
                    <h4>Parfait</h4>
                    <p>Forex trader</p>
                    <div class="quote">
                      <i class="fas fa-quote-right"></i>
                    </div>
                    <div class="content">
                      <p>Absolutely delectable! Every bite was a burst of flavor and pure delight. I can't get enough of this mouth-watering goodness.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="testimonial-wrapper">
                <div class="single-testimonial">
                  <div class="info">
                    <div class="image-2">
                      <img src="front-assets/img/testemonial/WhatsApp Image 2023-08-04 at 11.33.37.jpg" alt="">
                    </div>
                    <h4>Roger</h4>
                    <p>Geologist</p>
                    <div class="quote">
                      <i class="fas fa-quote-right"></i>
                    </div>
                    <div class="content">
                      <p>I've never tasted anything quite like this before. It's a tantalizing experience for the senses, and I find myself savoring every bite. Pure deliciousness!</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  <!-- ----------- Testimonial Section End ------- -->

  <!-- ------------ booking section start --------- -->
  <section class="booking-section pt-110" data-scroll-index="4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="xol-xl-6 col-lg-7">
          <div class="section-title text-center pb-30">
            <h1 class="wow fadeInUp" data-wow-delay=".2s">Book <span> your order</span></h1>
            <p class="wow fadeInUp" data-wow-delay=".4s"> Certainly! Here's a concise and shorter version:

              "Hosting a big event? Reserve your order now for an unforgettable experience. Perfect for weddings, birthdays, and corporate gatherings. Don't miss out on making your event a delicious success!" </p>.</p>
          </div>
        </div>
        <?php
        if (isset($_POST['external_order'])) {
          $names = $_POST['names'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $derively_date = $_POST['derively_date'];
          $description = mysqli_real_escape_string($connection, $_POST['description']);

          $query = mysqli_query($connection, "INSERT INTO externalorders VALUES('', '$names', '$email', '$phone', '$address', '$derively_date', '$description', 0, now())");

          if ($query) {
            $_SESSION['success'] = "Order made for " . $names . " To be derivered on " . $derively_date . "successfuly";
          }
        }

        ?>
        <form action="" method="post">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Names</label>
            <input type="text" name="names" class="form-control" id="exampleFormControlInput1" placeholder="Names" required>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
            <input type="number" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="078 .......">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="exampleFormControlInput1" placeholder="kk 202 st">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Date</label>
            <input type="datetime-local" name="derively_date" class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="5" placeholder="Enter a description of the product you need..."></textarea>
          </div>
          <button type="submit" name="external_order" class="btn" style="background-color: #fe5f59; color: white;">Place Order</button>
        </form>
      </div>
      <div class="row justify-content-center">



      </div>
    </div>
  </section>
  <!-- --------------book section end ------------ -->
  <!-- ----------- FAQ Section Start --------- -->
  <section class="faq-section pt-120" data-scroll-index="5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-7">
          <div class="section-title text-center mb-60">
            <h1 class="mb-25 wow fadeInUp" data-wow-delay=".2s">Frequencty <span> Asked Queries</span></h1>
            <p class="mb-25 wow fadeInUp" data-wow-delay=".4s">Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Iste voluptates, rem est quas ullam consequatur.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="accordion wow fadeInLeftBig" id="accordionExample" data-wow-duration="3s" data-wow-delay="0.5s">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Can I make an online ordering?
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam, alias corrupti similique fugit
                    commodi deserunt praesentium nisi expedita voluptatum dolores.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    How can I know if my request has been approved or declined?
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    You will receive the message to your mobile telephone number that tells you that you have been approved or declined
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    How can I Reach your company?
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio nulla possimus excepturi quas natus
                    animi laudantium nihil ea ipsam reprehenderit?
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="faq-image wow fadeInRightBig" data-wow-duration="3s" data-wow-delay="0.5s">
              <img src="front-assets/img/faq/faq-img.svg" alt="">
            </div>
          </div>
        </div>
      </div>
  </section>
  <!-- ----------- FAQ Section End --------- -->
  <!-- ----------- Contact us Section Start --------- -->
  <section class="faq-section pt-120" data-scroll-index="6">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-7">
          <div class="section-title text-center mb-60">
            <h1 class="mb-25 wow fadeInUp" data-wow-delay=".2s">Contact <span> Us</span></h1>
            <p class="mb-25 wow fadeInUp" data-wow-delay=".4s">Send your feedback</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="accordion wow fadeInLeftBig" id="accordionExample" data-wow-duration="3s" data-wow-delay="0.5s">
              <?php

              if (isset($_POST['feedback'])) {
                $email = $_POST['email'];
                $message = mysqli_real_escape_string($connection, $_POST['message']);

                $query = mysqli_query($connection, "INSERT INTO feedback VALUES('', '$email', '$message', now())");

                if ($query) {
                  $_SESSION['success_feedback'] = "Thank you for your feedback";
                }
              }

              ?>
              <form action="" method="post">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlTextarea1" class="form-label">Feedback</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="message" placeholder="Let us know your thoughts..."></textarea>
                </div>
                <button type="submit" name="feedback" class="btn" style="background-color: #fe5f59; color: white;">Place Order</button>
              </form>

            </div>
          </div>
          <div class="col-lg-6">
            <div class="faq-image wow fadeInRightBig" data-wow-duration="3s" data-wow-delay="0.5s">
              <img src="front-assets/img/contact/775ab8f7dcb36967199e17b6a02b5a9b.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
  </section>
  <!-- ----------- Contact us Section End --------- -->


  <!-- --------------Footer Section Start ------- -->
  <footer class="footer-area">

    <div class="footer-widget pt-30 pb-80">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="footer-about mt-50">
              <a href="" class="logo">
                <h1>PAINT ST JOSEPH</h1>
              </a>
              <p class="text">Best bakery in KIGALI</p>
              <ul class="social">
                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                <li><a href=""><i class="fab fa-instagram"></i></a></li>
                <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-5 col-md-6">
            <div class="footer-link d-flex flex-wrap">
              <div class="footer-link-wrapper mt-45">
                <div class="footer-title">
                  <h4 class="title">Quick Links</h4>
                </div>
                <ul class="link">
                  <li><a href="">Home</a></li>
                  <li><a href="">About</a></li>
                  <li><a href="">Product</a></li>
                  <li><a href="">Testimonial</a></li>
                  <li><a href="">Order</a></li>
                  <li><a href="">FAQ</a></li>
                  <li><a href="">Contact</a></li>
                  <li><a href="">Login</a></li>



                </ul>
              </div>
              <div class="footer-link-wrapper mt-45">
                <div class="footer-title">
                  <h4 class="title">Support</h4>
                </div>
                <ul class="link">
                  <li><a href="">FAQ</a></li>
                  <li><a href="">Privacy Policy</a></li>
                  <li><a href="">Terms OF Use</a></li>
                  <li><a href="">Legal</a></li>
                  <li><a href="">Site Map</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="footer-contact mt-45">
              <div class="footer-title">
                <h4 class="title">Quick Links</h4>
              </div>
              <ul class="contact-list">
                <li>
                  <div class="contact-info">
                    <div class="info-content media-body">
                      <p class="text"><i class="fas fa-phone-alt"></i>
                        +250792447050</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="contact-info">
                    <div class="info-content media-body">
                      <p class="text"><a href=""><i class="far fa-envelope"></i>
                          honofx@gmail.com </a></p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="contact-info">
                    <div class="info-content media-body">
                      <p class="text"><a href=""><i class="fas fa-globe"></i>
                          www.paintstjoseph.com </a></p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="contact-info">
                    <div class="info-content media-body">
                      <p class="text"><i class="fas fa-map-marker-alt"></i>
                        KK 120 st </p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        <div class="row justify-content-center">
          <div class="lo-lg-12">
            <div class="copyright">
              <div class="copyright-text text-center">
                <p class="text">Copyright &#169; 2023 <a href="">BAKERY</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- --------------Footer Section End ------- -->


  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <!-- ---- jquery Js ---- -->
  <script src="front-assets/js/jquery-1.12.4.min.js"></script>
  <!-- -------- venobox js ------ -->
  <script type="text/javascript" src="front-assets/js/venobox.min.js"></script>
  <!-- ---------- wow js ---------- -->
  <script src="front-assets/js/wow.min.js"></script>
  <!-- ---------- tiny slider js --------- -->
  <script src="front-assets/js/tiny-slider.js"></script>
  <!-- ---------- scrollit js ---------- -->
  <script src="front-assets/js/scrollIt.min.js"></script>
  <!-- -------- font awsome js --------- -->
  <script src="front-assets/js/all.js"></script>
  <!-- ---- Bootstrap Js ---- -->
  <script src="front-assets/js/bootstrap.min.js"></script>
  <!-- ---- main js --- -->
  <script src="front-assets/js/main.js"></script>



  <?php

  if (isset($_SESSION['success'])) {
    $message = $_SESSION['success']; ?>

    <script>
      alertify.set('notifier', 'position', 'top-center');
      alertify.success('<?php echo $message; ?>');
    </script>

  <?php unset($_SESSION['success']);
  } elseif (isset($_SESSION['success_feedback'])) {
    $message = $_SESSION['success_feedback']; ?>

    <script>
      alertify.set('notifier', 'position', 'top-center');
      alertify.success('<?php echo $message; ?>');
    </script>

  <?php unset($_SESSION['success_feedback']); } ?>


</body>

</html>