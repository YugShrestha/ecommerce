<?php
session_start();
include("server/connection.php");

if(isset($_SESSION['logged_in'])){
    header("location: account.php");
    exit;
}

if(isset($_POST['login_btn'])){
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $stmt=$conn->prepare("SELECT  user_id, user_name,user_email,user_password FROM users WHERE user_email=? AND user_password=? LIMIT 1");
    $stmt->bind_param("ss",$email,$password);
    
    
    if($stmt->execute()){
          $stmt->bind_result($user_id,$user_name,$user_email,$user_password);
          $stmt->store_result();

          if($stmt->num_rows() ==1){
              $row=$stmt->fetch();
              $_SESSION['user_id']=$user_id;
              $_SESSION['user_name']=$user_name;
              $_SESSION['user_email']=$user_email;
              $_SESSION['logged_in']=true;
              header('location:account.php?message=logged in sucessfully');

          }else{
            header("location: login.php?error=could not verify you account ");
          } 
    
    
    
    
    }else{
        header("location: login.php?error=something went wrong");
        
    }

 
   


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

    <!----login--->
    <div class="login">
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 style="color:coral"class="form-weight-bold">Login</h2>
            <hr class ="mx-auto">
            </div>

        </div>
        <div class="mx-auto container">
            <form id="login-form" method="POST" action="login.php">
            <p style="color:red" class="text-center"><?php if(isset($_GET['error'])) {echo $_GET['error'];} ?></p>
            
                <div class="form-group">
                   
                    <label>Email</label>
                    <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
                </div>
                
                <div class="form-group">
                
                    <input type="submit" class="btn" id="login-btn" name ="login_btn" value="login" >
                </div>
                <div class="form-group">
                
                    <a id="registration-url" class="btn" href="register.php">Don't have account? Register </a>
                </div>
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
                <p></p>
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