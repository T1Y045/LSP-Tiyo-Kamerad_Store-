<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Product Detail</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/templatemo-style.css">

    <style>
        .rating {
            display: flex;
            direction: row-reverse;
            justify-content: center;
            }

            .rating input {
            display: none;
            }

            .rating label {
            font-size: 2rem;
            color: #ddd;
            cursor: pointer;
            }

            .rating label:hover,
            .rating label:hover ~ label,
            .rating input:checked ~ label {
            color: #ffca08;
            }

            .rating-display {
                font-size: 1.5rem;
                color: #ffca08;
                }
                .rating-display .star {
                color: #ddd;
                }
                .rating-display .star.checked {
                color: #ffca08;
                }


    </style>
    
</head>
<body>

<nav class="navbar navbar-expand-lg bg-danger">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="#">
            <i><img src="../../assets/img/logo.png" alt="" style="width: 50px; height: 50px;"></i>
            Kamerad Store ☭
        </a>
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
                <button class="btn btn-light text-danger dropdown-toggle" type="button" id="dropdownMenuButton" style="border-radius: 10px;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::guard('customer')->user()->name }} ☭
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                </div>
            </div>
        @else
            <a class=" btn btn-light text-danger" style="border-radius: 10px;" href="{{ route('login') }}">
                Login 
            </a>
        @endif
            </div>
        </div>
    </div>
</nav>

<div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll"><img style="width: 100%; height: 300px;" src="../../assets/img/bglan.jpg" alt=""></div>

<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0" src="{{ asset($pd->image1_url) }}" alt="{{ $pd->product_name }}" />
            </div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bolder">{{ $pd->product_name }}</h1>
                <div class="fs-5 mb-5">
                    @php
                        $discount = $pd->discount;
                        $discountedPrice = $pd->price;
                    @endphp
                    @if ($discount)
                        @php
                            $discountedPrice = $pd->price - ($pd->price * ($discount->percentage / 100));
                        @endphp
                        <p class="card-text">Price: <span style="color: #262626;">Rp. <s>{{ $pd->price }}</s> <strong>{{ $discountedPrice }}</strong></span></p>
                    @else
                        <p class="card-text">Price: <span style="color: #262626;">Rp. {{ $pd->price }}</span></p>
                    @endif
                </div>
                <p class="lead">{{ $pd->description }}</p>
            </div>
        </div>
    </div>
</section>

<div class="container mb-5">
	<h2 class="text-center">Reviews</h2>
    @if ($reviews->isEmpty())
        <p>No reviews available.</p>
    @else

	<div class="card">
	    <div class="card-body">
	        <div class="row">
                @foreach ($reviews as $review)
        	    <div class="col-md-2">
        	        <img src="https://as1.ftcdn.net/v2/jpg/03/46/83/96/1000_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg" class="img img-rounded img-fluid"/>
        	        <p class="text-secondary text-center">{{ $review->created_at->format('d M Y') }}</p>
        	    </div>
                <div class="col-md-10">
                    <p>
                        <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>{{ $review->customer_name }}</strong></a>
                        <span class="float-right text-success">
                            <div class="rating-display">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="star{{ $i <= $review->rating ? ' checked' : '' }}">&#9733;</span>
                                @endfor
                            </div>
                        </span>
                    </p>
                    <div class="clearfix"></div>
                    <p>{{ $review->comment }}</p>
                </div>                
                @endforeach
                <hr>
                <form action="{{ route('reviews.store') }}" method="POST" id="reviewForm{{$pd->id}}">
                    @csrf
                    <input type="hidden" name="productId" value="{{ $pd->id }}">
                    <div class="form-group">
                        <label for="reviewText{{$pd->id}}">Review:</label>
                        <div class="form-group">
                            <div class="rating">
                                <input type="radio" id="star5{{$pd->id}}" name="rating" value="5" /><label for="star5{{$pd->id}}" title="5 stars">☆</label>
                                <input type="radio" id="star4{{$pd->id}}" name="rating" value="4" /><label for="star4{{$pd->id}}" title="4 stars">☆</label>
                                <input type="radio" id="star3{{$pd->id}}" name="rating" value="3" /><label for="star3{{$pd->id}}" title="3 stars">☆</label>
                                <input type="radio" id="star2{{$pd->id}}" name="rating" value="2" /><label for="star2{{$pd->id}}" title="2 stars">☆</label>
                                <input type="radio" id="star1{{$pd->id}}" name="rating" value="1" /><label for="star1{{$pd->id}}" title="1 star">☆</label>
                            </div>
                        </div>
                        <textarea class="form-control" id="reviewText{{$pd->id}}" name="reviewText" rows="3"></textarea>
                    </div>
                    <button type="submit" class="px-2 py-1 btn btn-primary">Submit Review</button>
                </form>                
                <a class="text-primary mt-4" href="{{ route('landing.index') }}">Go back to menu</a>
	        </div>
	    </div>
	</div>
</div>
@endif

<button onclick="scrollToTop()" id="scrollTopBtn" class="btn btn-primary" title="Go to top">
    <i class="bi-arrow-up-short"> Back To Top</i>
</button>
                                                  
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
    <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../../assets/js/scripts.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Fungsi untuk menggulir ke atas halaman
    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // Logika untuk menampilkan/menyembunyikan tombol saat menggulir
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("scrollTopBtn").style.display = "block";
        } else {
            document.getElementById("scrollTopBtn").style.display = "none";
        }
    }
</script>

</script>

    

</body>