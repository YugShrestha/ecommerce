<?php

session_start();
include("server/connection.php");
if (!isset($_SESSION['logged_in'])) {
    header("location: login.php");
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);

        header("location: login.php");
        exit;
    }
}

if (isset($_POST['changePassword'])) {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $userEmail = $_SESSION['user_email'];

    if ($password !== $confirmPassword) {
        header("Location: account.php?error=passwords don't match");
        exit(); // Terminate script after redirect
    } else if (strlen($password) < 6) {
        header("Location: account.php?error=password must be at least 6 characters long");
        exit(); // Terminate script after redirect

    } else {
        $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
        $stmt->bind_param("ss", md5($password), $userEmail);
        if ($stmt->execute()) {
            header("location:account.php?message=password has been updated sucessfully");
        } else {
            header("location:account.php?message=could not change passowrd");
        }
    }
}

if(isset($_SESSION['logged_in'])){
    $user_id=$_SESSION['user_id'];
    $stmt=$conn->prepare("SELECT * FROM orders WHERE user_id=?");
    $stmt->bind_param("i",$user_id);
    $stmt->execute();
    $orders=$stmt->get_result();

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="asset/CSS/style.css">

</head>

<body>
    <!---nabvar-->
    <nav class="navbar navbar-expand-lg navbar-light py-3 bg-white fixed-top">
        <div class="container">
            <img src="asset/img.logo.jpg">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">ContactUs</a>
                    </li>
                    <li class="nav-item">
                        <i class="fas fa-shopping-bag"></i>
                        <a href="account.php"><i class="fas fa-user"></i></a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control mt-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <!----Account--->
    <section class="my-5 py-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <h3 class="font-weight-bold">Account Info</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Name: <span><?php if (isset($_SESSION['user_name'])) {
                                        echo $_SESSION['user_name'];
                                    } ?></span></p>
                    <p>Email: <span><?php if (isset($_SESSION['user_email'])) {
                                        echo $_SESSION['user_email'];
                                    } ?></span></p>
                    <p><a href="#" id="order-btn">Your Order</a></p>
                    <p><a href="account.php?logout" id="logout-btn">Logout</a></p>

                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <form id="account-form" method="POST" action="account.php">
                    <p class=text-center style="color:red"><?= isset($_GET['error']) ?   $_GET['error'] : "" ?></p>
                    <p class=text-center style="color:green"><?= isset($_GET['message']) ?  $_GET['message'] : "" ?></p>
                    <h3>Change Password</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="account-password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" id="Confirmpassword" name="confirmPassword" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="change password" name="changePassword" class="btn" id="change-pass-btn">
                    </div>

                </form>
            </div>
        </div>
    </section>


    <!---orders-->
    <section id="orders" class="orders container my-5 py-5">
        <div class="container mt-2">
            <h2 class="font-weight-bold text-center">Your Orders</h2>
            <hr class="mx-auto">
        </div>
        <table class="mt-5 py-5">
            <tr>
                <th>order ID</th>
                
                 <th >Order Cost </th>
                 <th >Order Status</th>
                 <th >Order Date</th>
                 <th style="text-align:right">Order Details</th>
            </tr>
            <?php while($row=$orders->fetch_assoc()){ ?>
            <tr>
                <td>

                    
        
        <span><?php echo $row['order_id']?></span>
                    
                </td>
                <td>
                    <span><?= $row['order_cost'];?>
                </span>

                </td>
                <td>
                    <span><?= $row['order_status'];?>
                </span>

                </td>
                <td>
                    <span><?= $row['order_date'];?>
                </span>

                </td>
                <td>
                    <form method="GET" action="product_details.php" >
                        <input type="hidden" value="<?php echo $row['order_id']?>" name="order_id">
                        <input class="btn order-details-btn" name= "order_details_btn" type="submit" value="details">
                    </form>
                </td>
            </tr>
            <?php } ?>
            
        </table>
    </section>

    <!---footer---->

    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">

            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <img class="logo" src="img/ ">
                <p class="pt-3">we provide the best product for the most Affordable price</p>
            </div>

            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Contact Us</h5>
                <div>
                    <h6 class="text-uppercase">Address</h6>
                    <p>Boudha, Kathmandu</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Phone</h6>
                    <p></p>
                </div>
                <div>
                    <h6 class="text-uppercase">Email</h6>
                    <p>yug.shrestha1@gmail.com</p>
                    <hr>
                </div>
            </div>

            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Instagram</h5>
                <div class="row">
                    <img src="img/featured1.jpg" class="img-fluid w-25 h-100 m-2">
                    <img src="img/featured2.jpg" class="img-fluid w-25 h-100 m-2">
                    <img src="img/featured3.jpg" class="img-fluid w-25 h-100 m-2">
                    <img src="img/featured4.jpg" class="img-fluid w-25 h-100 m-2">
                </div>
            </div>

        </div>
        <div class="copyright">
            <div class=" row container mx-auto">
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                    <img src="img/">
                </div>
                <div class=" col-lg-3 col-md-5 col-sm-12 text-nowrap mb-2">
                    <p>Ecommerce@ 2023 All Right Reserved</p>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>