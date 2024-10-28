<?php
session_start();
include_once '../shared/config.php';
?>

<?php


// read
$read = "SELECT * FROM customer";
$data = mysqli_query($connect, $read)


?>




<?php
// delete

$message = "";
$search = "";

if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($connect, $_GET['search']);


    $read = "SELECT * FROM `customer` WHERE name like '%$search%' Or phone like '%$search%' ";
} else {
    $read = "SELECT * FROM customer";
}

$data = mysqli_query($connect, $read);





if (isset($_GET['Delete'])) {
    $id = $_GET['Delete'];

    // read
    $read = "SELECT * FROM customer";
    $data = mysqli_query($connect, $read);
    $row = mysqli_fetch_assoc($data);

    $old_image = $row['image'];
    unlink("./uploade/$old_image");

    $delete = "DELETE FROM customer WHERE id=$id";
    mysqli_query($connect, $delete);

    $_SESSION['message'] = "Customer Deleted Successfuly!";

    header("location: /Task/customer/index.php");
    exit();
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
                <div class="col-lg-9 mx-auto">
                    <h1 class="text-center">List All Customers <a href="./create.php" class="brn btn-info mt-3 px-3" style="float: right; font-size: 25px; border-radius: 10px;margin-right:45px;">Create Customer</a></h1>



                    <form class="d-flex" role="search">
                        <input class="form-control  mt-2 w-50 " style="margin-left: 60%;" name="search" value="<?= ($search) ?>" id="inputsearch" type="search" placeholder="Search By Name Or Phone" aria-label="Search">
                        <button class="btn btn-outline-success m-2" type="submit">Search</button>
                    </form>







                    <?php if ($message) : ?>
                        <div id="alert-success" class="alert alert-success text-center">
                            <?= $message ?>
                        </div>
                    <?php endif; ?>
                    <div class="card mt-1">
                        <div class="card-body">

                            <table class="table table-bordered table-dark">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                </thead>


                                <tbody>

                                    <?php foreach ($data as $item): ?>
                                        <tr>
                                            <th><?= $item['id'] ?></th>
                                            <th><?= $item['name'] ?></th>
                                            <th><a href="./view.php?View=<?= $item['id'] ?>" class="btn btn-info">View</a></th>
                                            <th><a href="./update.php?Update=<?= $item['id'] ?>" class="btn btn-warning">Update</a></th>
                                            <th><a href="?Delete=<?= $item['id'] ?>" class="btn btn-danger">Delete</a></th>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

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
                        alert.style.display = "none";
                    }, 2000);

                }
            });

            document.getElementById("inputsearch").addEventListener('input', function() {
                const searchvalue = this.value;
                if (searchvalue === "") {
                    window.location.href = window.location.pathname;
                }

            })
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