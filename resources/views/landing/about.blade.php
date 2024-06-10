<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamerad Store About page</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/templatemo-style.css">
    <link href="../../assets/css/styles.css" rel="stylesheet" />

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!--
    
TemplateMo 556 Catalog-Z

https://templatemo.com/tm-556-catalog-z

-->
</head>
<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <header>
        <!-- Jumbotron -->
<div class="p-3 text-center bg-muted border-bottom">
  <div class="container-fluid">
    <div class="row align-items-center gy-3">
      <!-- Left elements -->
      <div class="col-lg-4 col-sm-4 col-4 ">
        <a href="https://mdbootstrap.com/" target="_blank" class="text-primary fw-bold text-xl-start fs-4 float-start">
          <img src="../../assets/img/logo.png" style="width: 50px; height: 50px;"/>
          Kamerad Store ☭
        </a>
      </div>
      <!-- Left elements -->

    </div>
  </div>
</div>
<!-- Jumbotron -->

  </header>
  <nav class="navbar navbar-expand-lg bg-primary">
      <div class="container-fluid">

          <h6 class="mb-0 navbar-brand text-light">
              <a href="{{ route('landing.index') }}" class="text-white-50">Home</a>
              <span class="text-white-50 mx-2"> > </span>
              <a href="{{ route('landing.about') }}" class="text-white-50">about</a>
              {{-- <span class="text-white-50 mx-2"> > </span>
              <a href="" class="text-white"><u>Data</u></a> --}}
            </h6>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-1 text-light" aria-current="page" href="{{ route('landing.index') }}">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-2 text-light" href="{{ route('landing.video') }}">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-3 active text-light" href="{{ route('landing.about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-4 text-light" href="{{ route('landing.contact') }}">Contact</a>
                </li>
            </ul>
            </div>
        </div>
        <div class="mr-3">
            <div class="login-box">
                @if(Auth::guard('customer')->check())
                <div class="dropdown">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <button class="btn btn-light text-primary dropdown-toggle" type="button" id="dropdownMenuButton" style="border-radius: 10px;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::guard('customer')->user()->name }} ☭
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                        <a class="dropdown-item" href="#" onclick="confirmLogout()">Logout</a>
                    </div>
                </div>
            @else
                <a class=" btn btn-light text-primary" style="border-radius: 10px;" href="{{ route('login') }}">
                    Login 
                </a>
            @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="../../assets/img/bglan.jpg"></div>

    <div class="container-fluid tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                About Kamerad Store
            </h2>
        </div>
        <div class="row tm-mb-74 tm-row-1640">            
            <div class="col-lg-5 col-md-6 col-12 mb-3">
                <img src="../../assets/img/logo.png" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-7 col-md-6 col-12">
                <div class="tm-about-img-text">
                    <p class="mb-4">
                        Welcome to Kamerad Store, the ultimate online hub for high-quality military uniforms and gear. Our website is dedicated to providing both enthusiasts and professionals with an extensive selection of military apparel, ensuring you find the perfect fit for your needs.
                    </p>
                    <p>
                        At Kamerad Store, we offer a comprehensive range of military uniforms, including:
                        <ul>
                            <li>Combat Uniforms: Durable and designed for the rigors of the battlefield.</li>
                            <li>Dress Uniforms: Perfect for formal military events and ceremonies.</li>
                            <li>Tactical Gear: Essential equipment and accessories for tactical operations.</li>
                            <li>Footwear: Robust boots designed for maximum comfort and durability.</li>
                            <li>Headgear: From berets to helmets, we have it all.</li>
                        </ul>
                    </p> 
                    <p>
                        We pride ourselves on the quality of our products. Each item in our inventory is sourced from reputable manufacturers and rigorously tested to meet the highest standards of durability and functionality.
                    </p>
                    <p>
                        Our website is designed with the user in mind. With intuitive navigation, detailed product descriptions, and high-resolution images, shopping for military uniforms has never been easier.
                    </p>
                </div>
                         
            </div>
        </div>
        <div class="row tm-mb-50">
            <div class="col-md-6 col-12">
                <div class="tm-about-2-col">
                    <h2 class="tm-text-primary mb-4">
                        Our Commitment to Quality
                    </h2>
                    <p class="mb-4">
                        At Kamerad Store, we are dedicated to providing our customers with the highest quality military uniforms and gear. Our products are meticulously crafted to ensure durability, comfort, and performance in all conditions.
                    </p>
                    <p>
                        Whether you are in need of combat uniforms, dress uniforms, or tactical gear, you can trust that our products will meet your expectations and support you in any mission or event.
                    </p>
                </div>                
            </div> 
            <div class="col-md-6 col-12">
                <div class="tm-about-2-col">
                    <h2 class="tm-text-primary mb-4">
                        Why Choose Kamerad Store?
                    </h2>
                    <p class="mb-4">
                        Kamerad Store stands out for its exceptional customer service, competitive pricing, and extensive product range. We source our products from reputable manufacturers to ensure you receive only the best.
                    </p>
                    <p>
                        Join the countless satisfied customers who trust Kamerad Store for all their military apparel and gear needs. Experience the convenience of shopping with us and the confidence that comes with our reliable products.
                    </p>
                </div>                
            </div>     
        </div> <!-- row -->
        <div class="row tm-mb-50">
            <div class="col-md-4 col-12">
                <div class="tm-about-3-col">
                    <div class="tm-about-icon-container mb-5">
                        <i class="fas fa-tshirt fa-3x tm-text-primary"></i>
                    </div>                
                    <h2 class="tm-text-primary mb-4">Quality Military Uniforms</h2>
                    <p class="mb-4">At Kamerad Store, we provide high-quality combat and dress uniforms tailored to meet the needs of both enthusiasts and professionals. Our uniforms are designed for durability and comfort in any situation.</p>
                    <p>Explore our range of uniforms that offer both style and functionality, ensuring you are well-prepared for any occasion.</p>
                </div>                
            </div>
            <div class="col-md-4 col-12">
                <div class="tm-about-3-col">
                    <div class="tm-about-icon-container mb-5">
                        <i class="fas fa-cogs fa-3x tm-text-primary"></i>
                    </div>                
                    <h2 class="tm-text-primary mb-4">Advanced Tactical Gear</h2>
                    <p class="tm-mb-50">Our collection of tactical gear includes essential equipment and accessories designed for optimal performance in the field. From tactical vests to utility belts, we have everything you need for your mission.</p>                
                    <div class="text-center">
                        <a href="#" class="btn btn-primary">Explore Gear</a>
                    </div>
                </div>                
            </div>
            <div class="col-md-4 col-12">
                <div class="tm-about-3-col">
                    <div class="tm-about-icon-container mb-5">
                        <i class="fas fa-hard-hat fa-3x tm-text-primary"></i>
                    </div>                
                    <h2 class="tm-text-primary mb-4">Headgear and Footwear</h2>
                    <p class="mb-4">Protect yourself with our range of military headgear and footwear. From sturdy combat boots to protective helmets, Kamerad Store offers reliable products to keep you safe and comfortable.</p>
                    <p>Discover footwear designed for endurance and headgear that offers maximum protection in all environments.</p>
                </div>                
            </div>
        </div>             
    </div> <!-- container-fluid, tm-container-content -->

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">About Kamerad Store</h3>
                    <p>We pride ourselves on the quality of our products. Each item in our inventory is sourced from reputable manufacturers and rigorously tested to meet the highest standards of durability and functionality.</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Our Links</h3>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Our Company</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                        <li class="mb-2"><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                        <li class="mb-2"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                        <li class="mb-2"><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                        <li class="mb-2"><a href="https://pinterest.com"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <a href="#" class="tm-text-gray text-right d-block mb-2">Terms of Use</a>
                    <a href="#" class="tm-text-gray text-right d-block">Privacy Policy</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                    Copyright 2024 Kamerad Store. All rights reserved.
                </div>
                <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                    Designed by <a href="https://templatemo.com" class="tm-text-gray" rel="sponsored" target="_parent">TemplateMo</a>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="../../assets/js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>
</html>