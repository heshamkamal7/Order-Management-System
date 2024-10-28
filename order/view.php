<?php
include_once '../shared/config.php';
?>

<?php


// read
if (isset($_GET['View'])) {
    $id = $_GET['View'];
    $read = "SELECT * FROM join_all_data WHERE order_id=$id";
    $data = mysqli_query($connect, $read);
    $row = mysqli_fetch_assoc($data);
}
?>







<?php
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
                <div class="col-lg-6 mx-auto">
                    <h3>List order <?= $row['order_id'] ?> <a href="./index.php" class="brn btn-info mt-3 px-3" style="float: right; font-size: 25px; border-radius: 10px;">Back</a></h3>
                    <div class="card mt-3">
                        <div class="card-body mt-2">
                            <h6 class="card-title"><strong class="text-info">Order_ID : </strong><?= $row['order_id'] ?></h6>
                            <h6 class="card-title"><strong class="text-info">Amount : </strong><?= $row['amount'] ?></h6>
                            <h6 class="card-title"><strong class="text-info">Date : </strong><?= $row['date'] ?></h6>

                            <hr class="bg-white">

                            <h3 class="text-center">Customer</h3>
                            <h6 class="card-title"><strong class="text-info">Customer_ID : </strong><?= $row['customer_id'] ?></h6>
                            <h6 class="card-title"><strong class="text-info">Customer_Name : </strong><?= $row['customer_name'] ?></h6>
                            <h6 class="card-title"><strong class="text-info">Email : </strong><?= $row['email'] ?></h6>
                            <h6 class="card-title"><strong class="text-info">Phone : </strong><?= $row['phone'] ?></h6>
                            <h6 class="card-title"><strong class="text-info">Country : </strong><?= $row['country'] ?></h6>

                            <hr class="bg-white">

                            <h3 class="text-center">Product</h3>
                            <h6 class="card-title"><strong class="text-info">Product_ID : </strong><?= $row['product_id'] ?></h6>
                            <h6 class="card-title"><strong class="text-info">Nroduct_Name : </strong><?= $row['product_name'] ?></h6>
                            <h6 class="card-title"><strong class="text-info">Price : </strong><?= $row['price'] ?></h6>


                        </div>
                    </div>
                </div>
            </div>
        </div>



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