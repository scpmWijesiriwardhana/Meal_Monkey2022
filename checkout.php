<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();




function function_alert()
{


    echo "<script>alert('Thank you. Your Order has been placed!');</script>";
    echo "<script>window.location.replace('orders.php');</script>";
}

if (empty($_SESSION["user_id"])) {
    header('location:login.php');
} else {


    foreach ($_SESSION["cart_item"] as $item) {

        $item_total += ($item["price"] * $item["quantity"]);

        if ($_POST['submit']) {
            if (isset($_POST['payment-option'])) {
                $option = $_POST['payment-option'];

                if ($option == 'COD') {
                    $SQL = "insert into users_orders(u_id,title,quantity,price) values('" . $_SESSION["user_id"] . "','" . $item["title"] . "','" . $item["quantity"] . "','" . $item["price"] . "')";

                    mysqli_query($db, $SQL);


                    unset($_SESSION["cart_item"]);
                    unset($item["title"]);
                    unset($item["quantity"]);
                    unset($item["price"]);
                    $success = "Thank you. Your order has been placed!";

                    function_alert();
                } else {
                    $user_id = $_SESSION["user_id"];
                    $user_f_name = $_SESSION['fName'];
                    $user_l_name = $_SESSION['lName'];
                    $user_email = $_SESSION['email'];
                    $user_contact = $_SESSION['contact'];
                    $item_name = $item["title"];
                    $item_quantity = $item["quantity"];
                    $item_price =  $item["price"];

                    // echo $user_id . "" . $user_f_name;
                    //connect payhere payment gateway

                }
            }
        }
    }



?>




<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Checkout</title>



    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!--bootstrap css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div class="site-wrapper">
        <nav class="navbar navbar-expand-lg bg-dark ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="images/logo.png" style="width: 150px; height:40px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
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
        <div class="page-wrapper">


            <div class="container">

                <span style="color:green;">
                    <?php echo $success; ?>
                </span>

            </div>




            <div class="container m-t-30">
                <form action="" method="post">
                    <div class="widget clearfix">

                        <div class="widget-body">
                            <form method="post" action="#">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="cart-totals margin-b-20">
                                            <div class="cart-totals-title">
                                                <h4>Cart Summary</h4>
                                            </div>
                                            <div class="cart-totals-fields">

                                                <table class="table">
                                                    <tbody>



                                                        <tr>
                                                            <td>Cart Subtotal</td>
                                                            <td> <?php echo "$" . $item_total; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Delivery Charges</td>
                                                            <td>Free</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-color"><strong>Total</strong></td>
                                                            <td class="text-color"><strong>
                                                                    <?php echo "$" . $item_total; ?></strong></td>
                                                        </tr>
                                                    </tbody>




                                                </table>
                                            </div>
                                        </div>
                                        <div class="payment-option">
                                            <ul class=" list-unstyled">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment-option"
                                                        id="flexRadioDefault1" value="COD">
                                                    <label class="form-check-label" for="flexRadioDefault1" checked>
                                                        Cash on Delivery
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="payment-option"
                                                        id="flexRadioDefault2" value="payhere">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Payhere <img src="images/PayHere-Logo.png" alt="" width="90">
                                                    </label>
                                                </div>




                                                <!-- <li>
                                                    <label class="custom-control custom-radio  m-b-20">
                                                        <input name="mod" id="radioStacked1" checked value="COD"
                                                            type="radio" class="custom-control-input"> <span
                                                            class="custom-control-indicator"></span> <span
                                                            class="custom-control-description">Cash on Delivery</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="custom-control custom-radio  m-b-10">
                                                        <input name="mod" type="radio" value="paypal" disabled
                                                            class="custom-control-input"> <span
                                                            class="custom-control-indicator"></span> <span
                                                            class="custom-control-description">Payhere <img
                                                                src="images/PayHere-Logo.png" alt="" width="90"></span>
                                                    </label>
                                                </li>
                                            </ul> -->
                                                <p class="text-xs-center"> <input type="submit"
                                                        onclick="return confirm('Do you want to confirm the order?');"
                                                        name="submit" class="btn btn-success btn-block"
                                                        value="Order Now">
                                                </p>
                                        </div>
                            </form>
                        </div>
                    </div>

            </div>
        </div>
        </form>
    </div>
    <?php
}
    ?>
    <footer class="footer">
        <div class="row bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 payment-options color-gray">
                        <h5>Payment Options</h5>
                        <ul>
                            <li>
                                <a href="#"> <img src="images/PayHere-Logo.png" alt="Payhere"
                                        style="width: 80px;height:40px ;"> </a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4 address color-gray">
                        <h5>Address</h5>
                        <p>Nugegalayaya, sooriyawewa</p>
                        <h5>Phone: 0412298456</a></h5>
                    </div>
                    <div class="col-xs-12 col-sm-5 additional-info color-gray">
                        <h5>Addition informations</h5>
                        <p>mealmonkey@gmail.com</p>
                        <p>www.mealmonkey.com</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer>
    </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>







</body>

</html>