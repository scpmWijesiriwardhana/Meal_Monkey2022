<?php

include 'connection/connect.php';
session_start();



// $fetch_user_info = mysqli_query($db, "select * from users where u_id = '$user_id' ");
// var_dump($fetch_user_info);
// die();
// while ($row = mysqli_fetch_array($fetch_user_info)) {

//     echo '<h1>' . $fetch_user_info['f_name'] . '</h1>';
// }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>



    <link rel="stylesheet" href="css/profile.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


</head>

<body>
    <div class="wrapper">
        <div class="left">
            <div class="profile_img">
                <img src="../images/profile_img/Profile.png" alt="user" width="200" id="photo">
                <input type="file" id="file">
                <label for="file" id="uploadBtn">Choose Photo</label>
            </div>
            <br><br><br><br><br><br>

            <div class="d-flex justify-content-center mb-3">
                <h1><?= $_SESSION['fName'] . " " . $_SESSION['lName'] ?></h1>
            </div>

        </div>
        <div class="right">
            <div class="info">
                <h3>Information</h3>
                <div class="info_data">
                    <div class="data pb-3">
                        <h4>Name</h4>
                        <?= $_SESSION['fName'] . " " . $_SESSION['lName'] ?>
                    </div>
                    <div class="data">
                        <h4>Address</h4>
                        <?= $_SESSION['address'] ?>
                    </div>
                </div>

                <div class="info_data">
                    <div class="data pb-3">
                        <h4>Email</h4>
                        <?= $_SESSION['email'] ?>
                    </div>
                    <div class="data pb-3">
                        <h4>Contact</h4>
                        <?= $_SESSION['contact'] ?>
                    </div>
                </div>
            </div>
            <div class="info">
                <h3>QR Code</h3>
                <img src="../images//profile_img/QR.png" alt="user" width="145">
            </div>

        </div>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Update Informations
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="update_wrapper">
                            <div class="title">
                                Update Form
                            </div>
                            <div class="form">
                                <div class="input_field">
                                    <label>First Name</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="input_field">
                                    <label>Last Name</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="input_field">
                                    <label>Email</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="input_field">
                                    <label>Contact</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="input_field">
                                    <label>Address</label>
                                    <textarea class="textarea"></textarea>
                                </div>
                                <div class="input_field">
                                    <label>Password</label>
                                    <input type="text" class="input">
                                </div>
                                <div class="input_field">
                                    <input type="submit" class="btn" value="Update">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- ----------------------------------->

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <script src="js/profile.js"></script>


</body>

</html>