<?php 
session_start();

if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['cart'])) { // Use $_SESSION instead of $session
        $products_array_ids = array_column($_SESSION['cart'], 'product_id');
        if (!in_array($_POST['product_id'], $products_array_ids)) {
            $product_id=$_POST['product_id'];

            $product_id = $_POST['product_id']; // Assign the product ID
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quantity = $_POST['product_quantity'];

            $product_array = array(
                'product_id' => $product_id, // Use the correct variable name
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_image' => $product_image,
                'product_quantity' => $product_quantity,
            );

            $_SESSION['cart'][$product_id] = $product_array; // Use $product_id as the array key

        } else {
            echo '<script>alert("Product was already added")</script>';
        }
    } else {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        $product_array = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_image' => $product_image,
            'product_quantity' => $product_quantity,
        );

        $_SESSION['cart'][$product_id] = $product_array;
    }

     calculateTotalcart();





} else if(isset($_POST['remove_product'])){
    $product_id=$_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);

    calculateTotalcart();






}else if(isset($_POST['edit_quantity'])){
    $product_id=$_POST['product_id'];
    $product_quantity=$_POST['product_quantity'];
    $product_array=$_SESSION['cart'][$product_id];
    $product_array['product_quantity']=$product_quantity;
    $_SESSION['cart'][$product_id]=$product_array;


calculateTotalcart();

}else {
    header('location:index.php');
}




function calculateTotalcart(){
   $total=0;
    foreach($_SESSION['cart'] as $key=>$value){
        $product=$_SESSION['cart'][$key];
        $price=$product['product_price'];
        $quantity=$product['product_quantity'];
        $total=$total+($price*$quantity);
    }
     $_SESSION['total']=$total;
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

        <?php foreach($_SESSION['cart'] as $key=>$value){ ?>
        <tr>
            <td>
                <div class="product-info">
                    <img src="img/<?= $value['product_image'];?>">
                    <div>
                    <p><?=$value['product_name'] ?></p>
                    <small><span>$</span><?= $value['product_price'];?></small>
                     <br>
                     <form method="Post" action="cart.php">
                        <input type="hidden" name="product_id" value="<?= $value['product_id']?>">
                     <input type="submit" name="remove_product" class="remove-btn" style="font-size: 1rem;
                        font-weight: 600;" value="remove">

                     </form>
                    
                     </div>
                </div>
            </td>
            <td>
                <form method="POST" action="cart.php">
                    <input type="hidden" name="product_id" value="<?= $value['product_id'];?>">
                    <input type="number" name="product_quantity" value="<?= $value['product_quantity'];?>">
                    <input type="submit" name="edit_quantity" class="edit-btn" value="edit">
                </form>
                
                

            </td>
            <td>
                <span>$</span>
                <span class="price"><?= $value['product_price']* $value['product_quantity'];?></span>
            </td>
            <?php } ?>
        </tr>
     </table>
     <div class="cart-total">
        <table>
            <!---<tr>
                <td>Subtotal</td>
                <td><?= $value['product_price']* $value['product_quantity'];?></td>
            </tr>-->
            <tr>
                <td>Total</td>
                <td><span>$</span><?= $_SESSION['total'];?></td>
            </tr>

        </table>
     </div>
     <div class="checkout-container">
        <form method="POST" action="checkout.php">
        <input type= "submit" class="btn checkout-btn" value="Checkout" name="Checkout">



        </form>
        
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