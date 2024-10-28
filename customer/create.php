<?php
session_start();
include_once '../shared/config.php';




// create 
$message = "";
if (isset($_POST['btn'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];


    // img code 
    $image_name = rand(0, 255) . rand(0, 255) . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./uploade/$image_name";
    move_uploaded_file($tmp_name, $location);

    $create = "INSERT INTO customer  VALUES (null,'$name','$email','$phone','$country','$image_name')";
    mysqli_query($connect, $create);

    $_SESSION['message'] = "Customer Created Successfuly!";

    header("location:/Task/customer/create.php");
    exit();
}
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}


include_once '../shared/head.php';
?>

<body class="sub_page">

    <div class="hero_area">


        <?php
        include_once '../shared/nav.php';
        ?>

        <link rel="stylesheet" href="../css/customer.css">

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1 class="text-center">Create New Customer</h1>

                    <?php if ($message): ?>
                        <div id="success-alert" class="alert alert-success text-center">
                            <?= $message ?>
                        </div>
                    <?php endif; ?>

                    <div class="card mt-3">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Customer Name</label>
                                    <input type="text" name="name" class="form-control mb-3" id="" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control mb-3" id="" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Phone Number</label>
                                    <input type="text" name="phone" class="form-control mb-3" id="" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="country" class="form-control mb-3" id="" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Profile Customer</label>
                                    <input type="file" accept="image/*" name="image" class="form-control mb-3" id="" required>
                                </div>

                                <div class="d-grid mx-auto w-50">
                                    <button type="submit" class="btn btn-info w-100" name="btn">Submit</button>
                                </div>

                                <div class="d-grid mx-auto w-50 mt-2">
                                    <button type="button" class="btn btn-secondary w-100" onclick="window.location.href='/Task/customer/index.php'">View Customers</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const alert = document.getElementById('success-alert');
                if (alert) {
                    setTimeout(function() {
                        alert.style.display = 'none';
                    }, 2000);
                }
            });
        </script>



        <!-- info section -->
        <section class="info_section layout_padding2 mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 info_col">
                        <div class="info_contact">
                            <h4>
                                Address
                            </h4>
                            <div class="contact_link_box">
                                <a href="">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <span>
                                        Location
                                    </span>
                                </a>
                                <a href="">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <span>
                                        Call +01 1234567890
                                    </span>
                                </a>
                                <a href="">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <span>
                                        demo@gmail.com
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="info_social">
                            <a href="">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 info_col">
                        <div class="info_detail">
                            <h4>
                                Info
                            </h4>
                            <p>
                                necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin
                                words, combined with a handful
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 mx-auto info_col">
                        <div class="info_link_box">
                            <h4>
                                Links
                            </h4>
                            <div class="info_links">
                                <a class="active" href="/Task/index.php">
                                    Home
                                </a>
                                <a class="" href="/Task/pages/about.php">
                                    About
                                </a>
                                <a class="" href="/Task/pages/service.php">
                                    Services
                                </a>
                                <a class="" href="/Task/pages/why.php">
                                    Why Us
                                </a>
                                <a class="" href="/Task/pages/team.php">
                                    Team
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 info_col ">
                        <h4>
                            Subscribe
                        </h4>
                        <form action="#">
                            <input type="text" placeholder="Enter email" />
                            <button type="submit">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- end info section -->
        <?php
        include_once '../shared/foot.php';
        ?>