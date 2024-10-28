<?php
session_start();

include_once '../shared/config.php';
?>

<?php


// update

// read customer
$message = "";
$read = "SELECT * FROM customer";
$customer_read = mysqli_query($connect, $read);


// read product
$read = "SELECT * FROM product";
$product_read = mysqli_query($connect, $read);


if (isset($_GET['Update'])) {
    $id = $_GET['Update'];
    $read = "SELECT * FROM orders WHERE id=$id";
    $data = mysqli_query($connect, $read);
    $row = mysqli_fetch_assoc($data);

    $amount = $row['amount'];
    $customer_id = $row['customer_id'];
    $product_id = $row['product_id'];


    if (isset($_POST['btn'])) {

        $amount = $_POST['amount'];
        $customer_id = $_POST['customer_id'];
        $product_id = $_POST['product_id'];



        $update = "UPDATE orders SET amount='$amount', customer_id='$customer_id',product_id='$product_id' WHERE id=$id";
        mysqli_query($connect, $update);

        $_SESSION['message'] = "Order information updated successfully!";

        header("location:/Task/order/index.php");
        exit();
    }
}


if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
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
                <div class="col-lg-8 mx-auto">
                    <h1 class="text-center text-warning">Update Order</h1>
                    <?php if ($message): ?>
                        <div id="alert-success" class="alert alert-success text-center">
                            <?= $message ?>
                        </div>
                    <?php endif; ?>
                    <div class="card mt-3">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="">Order_Amount</label>
                                    <input type="text" name="amount" value="<?= $amount ?>" class="form-control mb-3" id="" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Customer_ID</label>
                                    <select name="customer_id" id="" class="form-control mb-3">
                                        <option value="" disabled selected>--Select Customer--</option>
                                        <?php foreach ($customer_read as $customer): ?>
                                            <option value="<?= $customer['id'] ?>" <?= $customer['id'] == $customer_id ? 'selected' : '' ?>><?= $customer['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <div class="form-group">
                                        <label for="">Product_Id</label>
                                        <select name="product_id" id="" class="form-control mb-3">
                                            <option value="" disabled selected>--Select Product--</option>
                                            <?php foreach ($product_read as $product): ?>
                                                <option value="<?= $product['id'] ?>" <?= $product['id'] == $product_id ? 'selected' : '' ?>><?= $product['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>


                                        <div class="d-grid mx-auto w-50">
                                            <button type="submit" class="btn btn-warning w-100" name="btn">Update</button>
                                        </div>

                                        <div class="d-grid mx-auto w-50 mt-2">
                                            <button type="button" class="btn btn-secondary w-100" onclick="window.location.href='/Task/order/index.php'">View Orders</button>
                                        </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const alert = document.getElementById("alert-success");
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