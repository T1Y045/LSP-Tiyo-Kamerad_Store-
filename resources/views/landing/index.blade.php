<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamerad Store ☭</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/templatemo-style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

    <!-- Link ke jQuery (diperlukan oleh Magnific Popup) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Link ke JavaScript Magnific Popup -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="../../assets/text/css" href="../../assets/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="../../assets/text/css" href="../../assets/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="../../assets/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="../../assets/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="../../assets/text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  -->
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
    <link rel="stylesoeet" href="../../assets/css/owl.theme.default.min.css">
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS for styling -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .fashion_taital {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 40px;
            font-size: 2.5em;
            color: #333;
        }
        .box_main {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 5px;
        }
        .price_text {
            font-size: 1.2em;
            margin-bottom: 10px;
        }
        .tshirt_img img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .btn_main {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .carousel-inner {
            border-radius: 5px;
        }
        .modal-header {
            border-bottom: none;
        }
        .modal-footer {
            border-top: none;
        }
    </style>

     {{-- style untuk next page --}}
    <style>
        .tm-paging-col {
            margin-top: 20px;
        }
        
        .pagination {
            margin: 0;
        }

        .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }

        .page-link {
            color: #007bff;
        }

        .page-link:hover {
            color: #0056b3;
        }
    </style>


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
                {{-- <span class="text-white-50 mx-2"> > </span>
                <a href="" class="text-white-50">Library</a>
                <span class="text-white-50 mx-2"> > </span>
                <a href="" class="text-white"><u>Data</u></a> --}}
              </h6>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-1 active text-light" aria-current="page" href="{{ route('landing.index') }}">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-2 text-light" href="{{ route('landing.video') }}">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-3 text-light" href="{{ route('landing.about') }}">About</a>
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
                        <a class="dropdown-item" href="{{ route('landing.invoice') }}">Your Order</a>
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
        <button type="button" class="btn btn-danger d-flex" style="border-radius: 10px;" data-toggle="modal" data-target="#wishlistModal" onclick="loadWishlistModal()">
            <span class="material-symbols-outlined">
                credit_card_heart
            </span>
        </button>

        <form class="d-flex ml-3">
            <button class="btn btn-warning d-flex btn-cart" style="border-radius: 10px;" type="button">
                <i class="bi-cart-fill me-1"></i>
                <span class="material-symbols-outlined">
                    shopping_cart
                </span>
                <span id="cartItemCount" class="badge bg-dark text-white rounded-pill">{{ count(session('cart', [])) }}</span>
            </button>
        </form>      
    </nav>


<!-- Modal for Wishlist -->
<div class="modal fade" id="wishlistModal" tabindex="-1" role="dialog" aria-labelledby="wishlistModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="wishlistModalLabel">Product Wishlist</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="wishlistModalBody">
                <ul id="wishlistitems" class="list-group">
                    <!-- Wishlist items will be displayed here -->
                    @foreach($wishlistitems as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <img src="{{ asset($item->product->image1_url) }}" alt="{{ $item->product->product_name }}" style="width: 50px; height: 50px; object-fit: cover;">
                                {{ $item->product->product_name }}
                            </div>
                            <div>
                                <button class="btn btn-danger btn-sm" onclick="removeFromWishlist({{ $item->id }})">Remove</button>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


        {{-- modal chart --}}
        <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cartModalLabel">Your Cart</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="cartModalBody">
                        <!-- Cart items will be displayed here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form id="checkoutForm" action="{{ route('checkout') }}" method="POST" class="d-flex mr-5">
                            @csrf
                            <button type="submit" class="btn btn-outline-dark d-flex btn-cart" style="border-radius: 10px; display:none;">Checkout</button>
                        </form>                                              
                    </div>
                </div>
            </div>
        </div>

    
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="../../assets/img/bglan.jpg">
        <form id="searchForm" class="d-flex tm-search-form">
            <input id="searchInput" class="form-control text-danger tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button id="searchButton" class="btn bg-primary btn-primary tm-search-btn" style="height: 40px" type="button">
                <i class="fas fa-search"></i>
            </button>
        </form>
            </div>    



    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 text-primary">
                Product List
            </h2>
            
            <div class="col-6 d-flex justify-content-end align-items-center">
                <!-- Example split danger button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Filter Price</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" onclick="filterProducts('lowest')">Lowest Price</a>
                        <a class="dropdown-item" href="#" onclick="filterProducts('highest')">Highest Price</a>
                        <a class="dropdown-item" href="#" onclick="filterProducts('normal')">Normal</a>
                    </div>
                </div>      
                <form id="pagingForm" class="ml-4 text-primary">
                    Page <input type="number" id="pageInput" value="1" min="1" max="200" size="1" class="tm-input-paging tm-text-primary" onchange="goToPage(this.value)">of 200
                </form>    
            </div>
        </div>      
    

            

<!-- Fashion section start -->
<div class="fashion_section mt-5">
    <div class="container-fluid">
        <div id="main_slider" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="fashion_section_2">
                            <div class="row">
                                @foreach($products as $data)
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="card mb-4">
                                        <img src="{{ asset($data->image1_url) }}" class="card-img-top" style="height: 350px" alt="{{ $data->product_name }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $data->product_name }}</h5>
                                            @php
                                                $discount = $data->discount;
                                                $discountedPrice = $data->price;
                                            @endphp
                                            @if ($discount)
                                                @php
                                                    $discountedPrice = $data->price - ($data->price * ($discount->percentage / 100));
                                                @endphp
                                                <p class="card-text">Price: <span style="color: #262626;">Rp. <s>{{ $data->price }}</s> <strong>{{ $discountedPrice }}</strong></span></p>
                                            @else
                                                <p class="card-text">Price: <span style="color: #262626;">Rp. {{ $data->price }}</span></p>
                                            @endif
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#productModal{{$data->id}}">View more</button>
                                                    <a href="{{ route('landing.show', $data->id) }}" class="btn btn-sm btn-outline-secondary">Detail Product</a>
                                                </div>
                                                <button class="btn btn-sm btn-primary" onclick="addToWishlist({{ $data->id }})">Wishlist</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="productModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="productModal{{$data->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="productModal{{$data->id}}Label">{{$data->product_name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div id="carouselExampleControls{{$data->id}}" class="carousel slide" data-ride="carousel">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <img class="d-block w-100" src="{{ asset($data->image1_url) }}" alt="First slide">
                                                                </div>
                                                                @if($data->image2_url)
                                                                <div class="carousel-item">
                                                                    <img class="d-block w-100" src="{{ asset($data->image2_url) }}" alt="Second slide">
                                                                </div>
                                                                @endif
                                                                @if($data->image3_url)
                                                                <div class="carousel-item">
                                                                    <img class="d-block w-100" src="{{ asset($data->image3_url) }}" alt="Third slide">
                                                                </div>
                                                                @endif
                                                                @if($data->image4_url)
                                                                <div class="carousel-item">
                                                                    <img class="d-block w-100" src="{{ asset($data->image4_url) }}" alt="Fourth slide">
                                                                </div>
                                                                @endif
                                                                @if($data->image5_url)
                                                                <div class="carousel-item">
                                                                    <img class="d-block w-100" src="{{ asset($data->image5_url) }}" alt="Fifth slide">
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <a class="carousel-control-prev" href="#carouselExampleControls{{$data->id}}" role="button" data-slide="prev">
                                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                            <a class="carousel-control-next" href="#carouselExampleControls{{$data->id}}" role="button" data-slide="next">
                                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><strong>Description:</strong>
                                                            @if (strlen($data->description) > 100)
                                                                <span id="desc{{$data->id}}">{{ substr($data->description, 0, 100) }}</span>
                                                                <span id="dots{{$data->id}}" style="display: inline;">...</span>
                                                                <span id="more{{$data->id}}" style="display: none;">{{ substr($data->description, 100) }}</span>
                                                                <button onclick="toggleDescription({{ $data->id }})" id="readMoreBtn{{$data->id}}" class="btn btn-link">Read more</button>
                                                            @else
                                                                {{ $data->description }}
                                                            @endif
                                                        </p>
                                                        @if ($discount)
                                                            <p>Price: Rp. <s>{{ $data->price }}</s> <strong>{{ $discountedPrice }}</strong></p>
                                                        @else
                                                            <p>Price: Rp. {{ $data->price }}</p>
                                                        @endif
                                                        <span class="tm-text-gray-light">{{ $data->created_at->format('d M Y') }}</span>
                                                        <p><strong>Stock Quantity:</strong> {{$data->stok_quantity}}</p>
                                                        <div class="input-group mb-3 d-flex">
                                                            <input type="number" id="inputQuantity{{ $data->id }}" class="form-control" value="1" min="1">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary" onclick="addToCart({{ $data->id }})">Add to Cart</button>
                                                            </div>
                                                        </div>
                                                        <form action="" method="POST" id="reviewForm{{$data->id}}">
                                                            @csrf
                                                            <input type="hidden" name="productId" value="{{ $data->id }}">
                                                            <div class="form-group">
                                                                <label for="reviewText{{$data->id}}">Review:</label>
                                                                <textarea class="form-control" id="reviewText{{$data->id}}" name="reviewText" rows="3"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="rating{{$data->id}}">Rating:</label>
                                                                <select class="form-control" style="height: 50px" id="rating{{$data->id}}" name="rating">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                </select>
                                                            </div>
                                                            <button type="submit" class="px-2 py-1 btn btn-primary">Submit Review</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fashion section end -->

<div class="row tm-mb-90">
    <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
        @if ($products->onFirstPage())
            <a href="javascript:void(0);" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
        @else
            <a href="{{ $products->previousPageUrl() }}" class="btn btn-primary tm-btn-prev mb-2">Previous</a>
        @endif

        @if ($products->lastPage() > 1)
            <div class="tm-paging d-flex">
                @for ($i = 1; $i <= min(2, $products->lastPage()); $i++)
                    <a href="{{ $products->url($i) }}" class="tm-paging-link @if ($i === $products->currentPage()) active @endif">{{ $i }}</a>
                @endfor
            </div>
        @endif
            @if ($products->hasMorePages())
            <a href="{{ $products->nextPageUrl() }}" class="btn btn-primary tm-btn-next">Next Page</a>
        @else
            <a href="javascript:void(0);" class="btn btn-primary tm-btn-next disabled">Next Page</a>
        @endif
    </div>
</div>

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">About Kamerad Store</h3>
                    <p>Kamerad Store is free <a rel="sponsored" href="https://v5.getbootstrap.com/">Bootstrap 5</a> Alpha 2 HTML Template for video and photo websites. You can freely use this TemplateMo layout for a front-end integration with any kind of CMS website.</p>
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
                    Copyright 2020 Kamerad Store Company. All rights reserved.
                </div>
                <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                    Designed by <a href="https://templatemo.com" class="tm-text-gray" rel="sponsored" target="_parent">TemplateMo</a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="../../assets/js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
        <script>
            // Ambil parameter URL untuk mengecek apakah pengguna login berhasil ke halaman utama atau landing
            const urlParams = new URLSearchParams(window.location.search);
            const success = urlParams.get('success');
    
            // Jika parameter 'success' ada dan bernilai 'true', tampilkan alert
            if (success === 'true') {
                alert('Login berhasil');
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            function confirmLogout() {
                Swal.fire({
                    title: 'Logout Confrmation',
                    text: 'Are you sure want logout?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Logout',
                    cancelButtonText: 'Nope'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('logout-form').submit();
                    }
                });
            }
        </script>
    <script>
        $(document).ready(function () {
            $('.modal').on('show.bs.modal', function (e) {
                var productId = $(e.relatedTarget).data('product-id');
    
                $.ajax({
                    type: 'GET',
                    url: '{{ route('products.show', '') }}' + '/' + productId,
                    success: function (data) {
                        $('#productModal' + productId + ' .modal-body').html(data);
                    }
                });
            });
        });
    </script>
        

        <!-- Script JavaScript untuk mengontrol Read More -->
<script>
    function toggleDescription(productId) {
        var dots = document.getElementById("dots" + productId);
        var moreText = document.getElementById("more" + productId);
        var btnText = document.getElementById("readMoreBtn" + productId);

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
        }
    }
</script>


<script>
    function goToPage(pageNumber) {
        window.location.href = "{{ url()->current() }}?page=" + pageNumber;
    }
</script>

<script>
    $(document).ready(function() {
        $('.modal-body .img-fluid').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out'
            }
        });
    });
</script>

<script>
function submitReview(productId) {
    function submitReview(productId) {
    var reviewText = $('#reviewText' + productId).val();
    var rating = $('#rating' + productId).val();

    $.ajax({
        type: 'POST',
        url: '',
        data: {
            productId: productId,
            reviewText: reviewText,
            rating: rating,
            _token: '{{ csrf_token() }}'
        },
        success: function (response) {
            Swal.fire('Success', 'Review submitted successfully', 'success');
            $('#reviewForm' + productId)[0].reset();
        },
        error: function (xhr, status, error) {
            if (xhr.status == 401) {
                Swal.fire('Error', 'You must be logged in to submit a review', 'error');
            } else {
                Swal.fire('Error', 'Failed to submit review. Please try again later.', 'error');
            }
        }
    });
}
}

</script>

<script>
    $(window).on("load", function() {
        $('body').addClass('loaded');
    });

    function confirmLogout() {
        Swal.fire({
            title: 'Logout Confirmation',
            text: 'Are you sure you want to logout?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Logout',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }

    function toggleDescription(productId) {
        var dots = document.getElementById("dots" + productId);
        var moreText = document.getElementById("more" + productId);
        var btnText = document.getElementById("readMoreBtn" + productId);

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more"; 
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less"; 
            moreText.style.display = "inline";
        }
    }
</script>

@if(session('success'))
<script>
    Swal.fire('Success', '{{ session('success') }}', 'success');
</script>
@elseif(session('error'))
<script>
    Swal.fire('Error', '{{ session('error') }}', 'error');
</script>
@endif

<script>
    $(document).ready(function() {
        // Initialize cart item count on page load
        updateCartCount({!! json_encode(session('cart', [])) !!});

        // Show or hide checkout button on page load
        var cart = {!! json_encode(session('cart', [])) !!};
        if (Object.keys(cart).length > 0) {
            $('#checkoutForm button').show();
        } else {
            $('#checkoutForm button').hide();
        }

        // Add to cart
        window.addToCart = function(productId) {
            var quantity = $('#inputQuantity' + productId).val();
            $.ajax({
                type: 'POST',
                url: '{{ route('add_to_cart') }}',
                data: {
                    productId: productId,
                    quantity: quantity,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    updateCartCount(response.cart);
                    Swal.fire('Success', 'Product added to cart', 'success');
                },
                error: function(xhr, status, error) {
                    Swal.fire('Error', 'Failed to add product to cart', 'error');
                }
            });
        }

        // Remove from cart
        window.removeFromCart = function(productId) {
            $.ajax({
                type: 'POST',
                url: '{{ route('remove_from_cart') }}',
                data: {
                    productId: productId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    updateCartCount(response.cart);
                    displayCart(response.cart);
                    Swal.fire('Success', 'Product removed from cart', 'success');
                },
                error: function(xhr, status, error) {
                    Swal.fire('Error', 'Failed to remove product from cart', 'error');
                }
            });
        }

        // Update cart count
        function updateCartCount(cart) {
            var totalQuantity = 0;
            var uniqueProductIds = {}; 
            var totalUniqueProducts = 0; 
            for (var productId in cart) {
                if (cart.hasOwnProperty(productId)) {
                    var item = cart[productId];
                    if (!uniqueProductIds[productId]) {
                        totalUniqueProducts++; 
                        uniqueProductIds[productId] = true; 
                    }
                    totalQuantity += item.quantity; 
                }
            }
            $('.badge').text(totalUniqueProducts); 
            $('#cartItemCount').text(totalUniqueProducts); 

            if (totalUniqueProducts > 0) {
                $('#checkoutForm button').show();
            } else {
                $('#checkoutForm button').hide();
            }
        }

        // Get cart contents and display in modal
        $('.btn-cart').click(function() {
            $.ajax({
                type: 'GET',
                url: '{{ route('get_cart') }}',
                success: function(response) {
                    displayCart(response.cart);
                },
                error: function(xhr, status, error) {
                    Swal.fire('Error', 'Failed to load cart', 'error');
                }
            });
        });

        function displayCart(cart) {
            var cartItems = '';
            var uniqueProductIds = {}; 
            for (var productId in cart) {
                if (cart.hasOwnProperty(productId)) {
                    var item = cart[productId];
                    if (!uniqueProductIds[productId]) {
                        var discountedPrice = item.price;
                        if (item.discount && item.discount > 0) {
                            var discountAmount = (item.discount) / 100;
                            discountedPrice -= discountAmount;
                        }

                        var formattedPrice = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(item.price);
                        var formattedDiscountedPrice = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(discountedPrice);

                        cartItems += '<div class="cart-item mb-3">' +
                                        '<div class="d-flex align-items-center">' +
                                            '<img src="' + item.image + '" alt="' + item.name + '" style="width: 50px; height: 50px;">' +
                                            '<div class="ms-3">' +
                                                '<h5>' + item.name + '</h5>' +
                                                '<p>Quantity: ' + item.quantity + '</p>' +
                                                '<p>Price: ' + formattedPrice + '</p>';

                        if (item.discount && item.discount > 0) {
                            cartItems += '<p class="discounted-price">Discounted Price: ' + formattedDiscountedPrice + '</p>';
                            cartItems += '<p class="discount-info">Discount: ' + item.discount + '%</p>';
                        }

                        cartItems += '<button class="btn btn-danger btn-sm" onclick="removeFromCart(' + productId + ')">Remove</button>';
                        cartItems += '</div>' +
                                    '</div>' +
                                '</div>';
                        uniqueProductIds[productId] = true; 
                    }
                }
            }

            $('#cartModalBody').html(cartItems);
            $('#cartModal').modal('show');

            if (Object.keys(cart).length > 0) {
                $('#checkoutForm button').show();
            } else {
                $('#checkoutForm button').hide();
            }
        }
    });
</script>

{{-- wishlist js --}}

<script>
function addToWishlist(productId) {
    fetch('{{ route("wishlist.store") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            product_id: productId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire('Success', 'Product added to wishlist', 'success');
            loadWishlistItems();
        } else {
            Swal.fire('Error', 'Failed to add product to wishlist', 'error');
        }
    })
    .catch(error => console.error('Error:', error));
}


function removeFromWishlist(itemId) {
    fetch(`/wishlist/${itemId}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire('Success', 'Item removed from wishlist', 'success');
            loadWishlistItems();
        } else {
            Swal.fire('Error', 'Failed to remove item from wishlist', 'error');
        }
    })
    .catch(error => console.error('Error:', error));
}

function loadWishlistItems() {
    fetch('/wishlist-get', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        const wishlistItems = document.getElementById('wishlistitems');
        wishlistItems.innerHTML = '';

        data.forEach(item => {
            const li = document.createElement('li');
            li.className = 'list-group-item d-flex justify-content-between align-items-center';
            li.innerHTML = `
                <div>
                    <img src="${item.product.image1_url}" alt="${item.product.product_name}" style="width: 50px; height: 50px; object-fit: cover;">
                    ${item.product.product_name}
                </div>
                <div>
                    <button class="btn btn-danger btn-sm" onclick="removeFromWishlist(${item.id})">Remove</button>
                </div>
            `;
            wishlistItems.appendChild(li);
        });
    })
    .catch(error => console.error('Error:', error));
}

function loadWishlistModal() {
    loadWishlistItems();
    $('#wishlistModal').modal('show');
}


function addAllToCart() {
    fetch('/wishlist-get', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        const cartItems = [];
        data.forEach(item => {
            cartItems.push({
                productId: item.product.id,
                quantity: 1 // Jika Anda ingin menambahkan semua item dengan jumlah yang sama
            });
        });
        
        // Kirim data ke endpoint yang sesuai untuk menambahkan item ke keranjang belanja
        fetch('{{ route("add_to_cart") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ cartItems })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('All items added to cart successfully');
                // Perbarui tampilan jumlah item di keranjang belanja
                updateCartCount(data.cart);
            } else {
                alert('Failed to add items to cart');
            }
        })
        .catch(error => console.error('Error:', error));
    })
    .catch(error => console.error('Error:', error));
}

</script>

{{-- seach bar js --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const products = document.querySelectorAll('.fashion_section_2 .card');

        // Fungsi untuk menyaring produk berdasarkan input pencarian
        function filterProducts(searchTerm) {
            products.forEach(product => {
                const productName = product.querySelector('.card-title').innerText.toLowerCase();
                if (productName.includes(searchTerm.toLowerCase())) {
                    product.style.display = 'block'; // Tampilkan produk yang sesuai
                } else {
                    product.style.display = 'none'; // Sembunyikan produk yang tidak sesuai
                }
            });
        }

        // Event listener untuk tombol pencarian
        const searchButton = document.getElementById('searchButton');
        searchButton.addEventListener('click', function () {
            const searchTerm = searchInput.value.trim();
            filterProducts(searchTerm);
        });

        // Event listener untuk input pencarian (jika ingin menyaring secara real-time saat pengguna mengetik)
        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.trim();
            filterProducts(searchTerm);
        });
    });
</script>

{{-- price filter --}}
<script>
    function filterProducts(sortType) {
        var url = "{{ route('landing.index') }}";
        if (sortType === 'lowest') {
            url += "?sort=asc";
        } else if (sortType === 'highest') {
            url += "?sort=desc";
        }
        window.location.href = url;
    }
</script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>
</html>