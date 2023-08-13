<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="asset/CSS/style.css">

</head>

<body>
    <!---nabvar-->
    <nav class="navbar navbar-expand-lg navbar-light py-3 bg-light fixed-top">
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
    <section id="home">
        <div class="container">

            <h5>NEW ARRIVALS</h5>
            <h1><span>Best Prices</span> This Season</h1>
            <p style="color: azure;">Eshop Offers The Best Product For The Most Affordable Prices</p>
            <button><span>Shop Now</span></button>
        </div>
        
    </section>
<!----brand-->
    <section id="brand" class="container">
        <div class="row">
            <img class="image-fluid col-lg-3 col-md-6 colm-sm-12" src="img/brand1.jpg">
            <img class="image-fluid col-lg-3 col-md-6 colm-sm-12" src="img/brand2.png">
            <img class="image-fluid col-lg-3 col-md-6 colm-sm-12" src="img/brand3.png">
            <img class="image-fluid col-lg-3 col-md-6 colm-sm-12" src="img/brand4.png">
        </div>
    </section>
    <!---NEW-->
    <section id="new" class="w-100">
        <div class="row p-0 m-0">
            <!--one-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="img/1.jpg">
                <div class="details">
                    <h2>Awesome Amps</h2>
                    <button class="text-uppercase"><span>Shop Now</span></button>

                </div>
            </div>
            <!--two-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="img/2.jpg">
                <div class="details">
                    <h2>Awesome Amps</h2>
                    <button class="text-uppercase"><span>Shop Now</span></button>

                </div>
            </div>
            <!--three-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="img/3.jpg">
                <div class="details">
                    <h2>Awesome Amps</h2>
                    <button class="text-uppercase"><span>Shop Now</span></button>
                </div>
            </div>
        </div>

    </section>
    <!----featured-->
    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5 ">
            <h3> Our Featured</h3>
            <hr>
            <p>Here you can check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col=md-4 col-sm-12">
                <img class="img-fluid mb-3" src="img/featured1.jpg">

                <div class="star-row">
                    <?php
                    for ($i = 0; $i < 5; $i++) {
                        echo '<i class="fas fa-star"></i>';
                    }
                    ?>
                </div>
                <h5 class="p-name" style="color: black;">Fender</h5>
                <h4 class="p-price">$199.8</h4>
                <button class="but-btn"><span>Buy Now</span></button>
            </div>
            
            <div class="product text-center col-lg-3 col=md-4 col-sm-12">
                <img class="img-fluid mb-3" src="img/featured2.jpg">

                <div class="star-row">
                    <?php
                    for ($i = 0; $i < 5; $i++): ?>
                       <?=  '<i class="fas fa-star"></i>'; ?>
                    <?php endfor; ?>
                    
                </div>
                <h5 class="p-name" style="color: black;">Les Paul</h5>
                <h4 class="p-price">$199.8</h4>
                <button class="but-btn"><span>Buy Now</span></button>
            </div>


            <div class="product text-center col-lg-3 col=md-4 col-sm-12">
                <img class="img-fluid mb-3" src="img/featured3.jpg">

                <div class="star-row">
                    <?php
                    for ($i = 0; $i < 5; $i++) {
                        echo '<i class="fas fa-star"></i>';
                    }
                    ?>
                </div>
                <h5 class="p-name" style="color: black;">Ibanaz</h5>
                <h4 class="p-price">$199.8</h4>
                <button class="but-btn"><span>Buy Now</span></button>
            </div>



            <div class="product text-center col-lg-3 col=md-4 col-sm-12">
                <img class="img-fluid mb-3" src="img/featured4.jpg">

                <div class="star-row">
                    <?php
                    for ($i = 0; $i < 5; $i++) {
                        echo '<i class="fas fa-star"></i>';
                    }
                    ?>
                </div>
                <h5 class="p-name" style="color: black;">Yamaha Pacifica</h5>
                <h4 class="p-price">$199.8</h4>
                <button class="but-btn"><span>Buy Now</span></button>
            </div>
        </div>
    </section>

<!---banner-->
<section id="banner" class="my-5 py-5">
    <div class="container">
        <h4>MId SEASON'S SALE</h4>
        <h1>Fender Guitar With All Accesories <hr> UP to 30% OFF</h1>
        <button class="text-uppercase">Shop Now</button>
    </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>