<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Home</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!--bootstrap css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

    <link href="css/review.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="images/logo.png" style="width: 150px; height:40px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="restaurants.php">Restaurants</a>
                    </li>

                    <li class="nav-item">

                        <?php
                        if (empty($_SESSION["user_id"])) // if user is not login
                        {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Register</a> </li>';
                        } else {


                            echo  '<li class="nav-item"><a href="orders.php" class="nav-link active">My Orders</a> </li>';
                            echo  '<li class="nav-item"><a href="profile.php" class="nav-link active">Profile</a> </li>';
                            echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
                        }

                        ?>
                    </li>
                </ul>

            </div>
        </div>
    </nav>



    <section class="hero bg-image" data-image-src="images/img/restrrr.png">
        <div class="hero-inner">
            <div class="container text-center hero-text font-white">
                <h1>Welcome to Meal Monkey!</h1>

                <a href="restaurants.php"><button type="button" class="order-button">
                        ORDER NOW
                    </button></a>




            </div>
        </div>

    </section>



    <!--about-->
    <section id=" about" class=" text-light ">
        <div class="container" style="border:1px solid black;">
            <div class="row align-items-center justify-content-between">
                <div class="col-md about-image">
                    <img src="images/about.jpg" class="img-fluid" alt="" style="width: 500px; height:600px" />
                </div>
                <div class="col-md p-5">
                    <h1 style=" font-weight:300; padding-bottom: 20px;">- About Us -
                    </h1>
                    <p class="lead" style="text-align: justify;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Meal Monkey is an online food ordering system
                        which is dedicated
                        to bring number of menus from the best restaurants in the area to your
                        fingertips to be chosen
                        among.(next line) we expect to satisfy our customers with the best service of
                        providing various
                        options of food for any occasion. Join us with a few steps of signing up and
                        enjoy the best
                        service every time you need us.
                    </p>

                    <a href="about.php" class="btn btn-dark mt-3">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>Read more
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--about end-->





    <section class="popular">
        <div class=" container" style="border:1px solid black;">
            <div class="title text-xs-center m-b-30">
                <h2>Popular Dishes</h2>
                <p class="lead">Easiest way to order your favourite food among these top 6 dishes</p>
            </div>
            <div class="row">
                <?php
                $query_res = mysqli_query($db, "select * from dishes LIMIT 6");
                while ($r = mysqli_fetch_array($query_res)) {

                    echo '  <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                                            <div class="food-item-wrap">
                                                <div class="figure-wrap bg-image" data-image-src="admin/Res_img/dishes/' . $r['img'] . '"></div>
                                                <div class="content">
                                                    <h5><a href="dishes.php?res_id=' . $r['rs_id'] . '">' . $r['title'] . '</a></h5>
                                                    <div class="product-name">' . $r['slogan'] . '</div>
                                                    <div class="price-btn-block d-flex justify-content-between"> <span class="price">Rs.' . $r['price'] . '</span> <a href="dishes.php?res_id=' . $r['rs_id'] . '" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                                                </div>
                                                
                                            </div>
                                    </div>';
                }
                ?>
            </div>
        </div>
    </section>

    <section id="restaurants " style="  background: rgb(222, 222, 222); padding-top: 30px;">
        <div class=" container" style="border:1px solid black;">
            <div class="restuarant-section-heading">
                <h2 style=" text-align: center">- Best Restaurants in Area -</h2>

                <br>
                <br>

            </div>
            <div class=" row p-3" align="center">
                <div class="col-lg-4 col-sm-12 d-flex justify-content-center align-items-center mb-5  ">
                    <a href="http://localhost/MealMonkey/dishes.php?res_id=7"><img class="img-fluid"
                            src="admin/Res_img/63517ed53470d.png"
                            style="height: 200px ; align-items: center; margin-bottom: 25px;"></a>
                </div>
                <div class="col-lg-4 col-sm-12 d-flex justify-content-center align-items-center mb-5  ">
                    <a href="http://localhost/MealMonkey/dishes.php?res_id=6"><img class="img-fluid"
                            src="admin/Res_img/63517e99aed61.png"
                            style="height: 200px ;align-items:center; margin-bottom: 25px;"></a>
                </div>
                <div class="col-lg-4 col-sm-12 d-flex justify-content-center align-items-center mb-5 ">
                    <a href="http://localhost/MealMonkey/dishes.php?res_id=5"><img class="img-fluid"
                            src="admin/Res_img/63517e287ad7a.png"
                            style="height: 200px ;align-items:center; margin-bottom: 25px;"></a>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!--gallery section-->
    <section id="gallery" style="margin-top:30px">

        <div class=" container " style="border:1px solid black; margin-top: 100px">
            <div class=" gallery-heading">
                <h1 style="padding-top: 30px;">- Our Gallery -</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 pb-3">
                    <div class="thumbnails">
                        <div class="img-container">
                            <img src="images/Gallary_images/g4.jpg" class="image" />
                            <div class="overlay">
                                <!-- <p class="caption">Caption here</p> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 pb-3">
                    <div class="thumbnails">
                        <div class="img-container">
                            <img src="images/Gallary_images/g3.jpg" class="image" />
                            <div class="overlay">
                                <!-- <p class="caption">Caption here</p> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 pb-3">
                    <div class="thumbnails">
                        <div class="img-container">
                            <img src="images/Gallary_images/g2.jpg" class="image" />
                            <div class="overlay">
                                <!-- <p class="caption">Caption here</p> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 pb-3">
                    <div class="thumbnails">
                        <div class="img-container">
                            <img src="images/Gallary_images/g6.jpg" class="image" />
                            <div class="overlay">
                                <!-- <p class="caption">Caption here</p> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 pb-3">
                    <div class="thumbnails">
                        <div class="img-container">
                            <img src="images/Gallary_images/g11.jpg" class="image" />
                            <div class="overlay">
                                <!-- <p class="caption">Caption here</p> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 pb-3">
                    <div class="thumbnails">
                        <div class="img-container">
                            <img src="images/Gallary_images/g7.jpg" class="image" />
                            <div class="overlay">
                                <!-- <p class="caption">Caption here</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--gallery section end-->








    <!--customer review-->
    <section class="customer-review" id="review">
        <div class="container" style="border:1px solid black;margin-top: 100px; margin-bottom:100px">
            <div class="review-header" style="padding-top: 30px ;">
                <h1>- Customer Review -</h1>
                <h5>What Our Customers Are Saying</h5>
            </div>




            <div class="row">
                <?php


                $query_result = mysqli_query($db, "select  * from vw_review LIMIT 3");
                while ($row = mysqli_fetch_array($query_result)) {




                    echo

                    '   
                        <div class="col-md-4">
                           <div class="card" style="margin-bottom:20px; height:200px;  background-color: rgb(212, 212, 212);">
                              <img src="' . $row['img'] . '" class="card-img-top" alt="...">
                                <div class="card-body">
                                   <h5 class="card-title">' . $row['f_name'] . " " . $row['l_name'] . '</h5>
                                   <p class="card-text"><i class="fa fa-quote-left" aria-hidden="true" style="padding-right: 10px;"></i>' . $row['comment'] . '</p>
                                   <p>Rating:' . " " . $row['rating'] . ' out of 5.0</p>
               
               
                                </div>

                            </div>

                        </div>

                      ' ?>
                <?php } ?>






            </div>

            <div class="d-flex align-items-center justify-content-center p-2">
                <button type="button" class="btn btn-primary " id="btn-feedback">feedback</button>
            </div>


        </div>

    </section>

    <?php


    if (isset($_POST['btn-send'])) {

        $user_id = $_SESSION["user_id"];

        $review_sql = "INSERT INTO review (u_id,comment,rating) VALUES($user_id,'" . $_POST['feedback'] . "' ,'" . $_POST['rating'] . "')";
        mysqli_query($db, $review_sql);
    }  ?>


    <div class="popup"
        style="background:rgba(0, 0, 0, 0.6); width:100%; height:600%; position:absolute; top:0%; display:none; flex-direction:column; justify-content:center; align-items:center;">

        <div class="popup-content"
            style="height:400px; width:500px; background:#fff; padding:20px; margin-top:230%;position:relative;">
            <i class="fa fa-times close" aria-hidden="true"
                style="position: absolute; right:-15px; top:-15px; color:#fff"></i>
            <div class="container" style="border:1px solid black; ">


                <div class="feedback-form ">


                    <form method="POST">
                        <div class="form-group" style="padding-top: 20px ;">

                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="feedback"
                                placeholder="Your Feedback..."></textarea>
                        </div>
                        <div class="form-group" style="width: 150px;">

                            <input type="text" class="form-control" id="formGroupExampleInput"
                                placeholder="rating out of 5.0" name="rating">
                        </div>

                        <div class="col-sm-4 ">
                            <p> <input type="submit" value="POST" name="btn-send"
                                    class="btn btn-primary d-flex align-items-center">
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <!--customer review end-->



    <!--footer-->
    <footer class="footer-section p-2 text-white  position-relative">
        <div class="container pb-0">

            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <img class="img-fluid w-50 pb-1" src="images/logo.png" style="height:60px; width:150px;">
                    </h6>
                    <p>
                        Meal Monkey is a online food ordering platform where you can order foods from different
                        restaurants.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4" style="color: #fff;">Quick Links</h6>
                    <p>
                        <a href="#" class="text-reset">Home</a>
                    </p>
                    <p>
                        <a href="#review" class="text-reset">About</a>
                    </p>
                    <p>
                        <a href="#gallery" class="text-reset">Gallery</a>
                    </p>
                    <p>
                        <a href="#about" class="text-reset">Review</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4" style="color: #fff;">Support</h6>
                    <p>
                        <a href="faq.php" class="text-reset">FAQs</a>
                    </p>


                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4" style="color: #fff;">Contact</h6>
                    <p>
                        <i class="fas fa-home me-3 text-secondary"></i> Nugegalayaya,
                        sooriyawewa.

                    </p>
                    <p>
                        <i class="fas fa-envelope me-3 text-secondary"></i>
                        mealmonkey@gmail.com
                    </p>
                    <p>
                        <i class="fas fa-phone me-3 text-secondary"></i> + 9414120477

                    </p>

                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
        </section>
        <!-- Section: Links  -->




        <p class="copyright" style="text-align: center;">Copyright &copy; 2022 Meal Monkey</p>
        <div class="arrow">

            <a href="#" class="position-absolute" style="background-color: #666; padding: 10px">
                <h1><i class="fas fa-angle-up" aria-hidden="true"></i></h1>
            </a>
        </div>




    </footer>
    <!--footer end-->






    <!--script link-->

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <!-- <script src="js/headroom.js"></script> -->
    <script src="js/foodpicky.min.js"></script>
    <script src="js/script.js"></script>




</body>

</html>