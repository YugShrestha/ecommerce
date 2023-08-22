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
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ContactUs</a>
                    </li>
                    <li class="nav-item">
                        <i class="fas fa-shopping-bag"></i>
                        <i class="fas fa-user"></i>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


 <!---cart---->
 <section class ="cart container my-5 py-5">
    <div class="container mt-5">
        <h2 class="font-weight-bolde">Your Cart</h2>
        <hr>
    </div>
     <table class="mt-5 pt-5">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        <tr>
            <td>
                <div class="product-info">
                    <img src="img/featured1.jpg">
                    <div>
                    <p>guitar</p>
                    <small><span>$</span>100</small>
                     <br>
                     <a class="remove-btn" style="font-size: 1rem;
                        font-weight: 600;" href="#" >Remove</a>
                     </div>
                </div>
            </td>
            <td>
                <input type="number" value="">
                <a class="edit-btn">Edit</a>

            </td>
            <td>
                <span>$</span>
                <span clas="Price">155</span>
            </td>
        </tr>
     </table>
     <div class="cart-total">
        <table>
            <tr>
                <td>Subtotal</td>
                <td>$155</td>
            </tr>
            <tr>
                <td>TOtal</td>
                <td>$155</td>
            </tr>

        </table>
     </div>
     <div class="checkout-container">
        <button class="btn checkout-btn">Checkout</button>
     </div>
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
                <p>9810281307</p>
            </div>
            <div>
                <h6 class="text-uppercase">Email</h6>
                <p>yug.shrestha1@gmail.com</p><hr>
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