<?php
include("server/connection.php");
    if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $stmt = $conn->prepare("SELECT * FROM products where product_id=? ");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();


    $product = $stmt->get_result();
} else {
    header('location:index.php');
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
    <<!---nabvar-->
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

        <section class="container single-product  my-5 pt-5">
            <div class="row mt-5">
                <?php while ($row = $product->fetch_assoc()) { ?>
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <img class="img-fluid w-100 pb-1" src="img/<?= $row['product_image']; ?>" id="mainImg">
                        <div class="small-img-group">
                            <div class="small-img-col">
                                <img src="img/<?= $row['product_image']; ?>" width="100%" class="small-img">
                            </div>
                            <div class="small-img-col">
                                <img src="img/<?= $row['product_image2']; ?>" width="100%" class="small-img">
                            </div>
                            <div class="small-img-col">
                                <img src="img/<?= $row['product_image3']; ?>" width="100%" class="small-img">
                            </div>
                            <div class="small-img-col">
                                <img src="img/<?= $row['product_image4']; ?>" width="100%" class="small-img">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <h6><?= $row['product_name'] ?></h6>
                        <h3 class="py-4"><?= $row['product_name']; ?></h3>
                        <h2>$<?= $row['product_price'] ?></h2>
                        <form method="POST" action="cart.php">
                        <input type="hidden" name="product_id" value="<?= $row['product_id']; ?>">
                            <input type="hidden" name="product_image" value="<?= $row['product_image']; ?>">
                            <input type="hidden" name="product_name" value="<?= $row['product_name']; ?>">
                            <input type="hidden" name="product_price" value="<?= $row['product_price']; ?>">
                            <input type="number" name="product_quantity" value="1">
                            <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
                        </form>
                        <h4 class="mt-5 mb-5">product details</h4>
                        <span><?= $row['product_description']; ?></span>
                        </h4>
                    </div>
                <?php } ?>
            </div>
        </section>

        <!----related products-->
        <section id="related-products" class="my-5 pb-5">
            <div class="container text-center mt-5 py-5">
                <h3>Related products</h3>
                <hr>
            </div>
            <?php include("server/get_featured_product.php"); ?>
            <div class="row mx-auto container-fluid">
                <?php while ($row = $featuredProducts->fetch_assoc()) { ?>
                    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                        <img class="img-fluid mb-3" src="img/<?= $row['product_image']; ?>">
                        <h5 class="p-name" style="color: black;"><?= $row['product_name']; ?></h5>
                        <h4 class="p-price">$<?= $row['product_price']; ?></h4>
                        <a href="single_product.php?product_id=<?= $row['product_id']; ?>">
                            <button class="but-btn"><span>Buy Now</span></button>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </section>

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

        <script>
            var mainImg = document.getElementById("mainImg");
            var smallImg = document.getElementsByClassName("small-img");

            for (var i = 0; i < smallImg.length; i++) {
                smallImg[i].addEventListener("click", function() {
                    mainImg.src = this.src;
                });
            }
        </script>
</body>


</html>