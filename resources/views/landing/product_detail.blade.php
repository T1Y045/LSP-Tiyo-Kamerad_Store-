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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


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
              <a href="" class="text-white-50">Product Detail</a>
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
            <aside class="col-lg-6">
                <div class="border rounded-4 mb-3 d-flex justify-content-center">
                    <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="{{ asset($pd->image1_url) }}">
                        <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{ asset($pd->image1_url) }}" />
                    </a>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="{{ asset($pd->image2_url) }}" class="item-thumb">
                        <img width="60" height="60" class="rounded-2" src="{{ asset($pd->image2_url) }}" />
                    </a>
                    <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="{{ asset($pd->image3_url) }}" class="item-thumb">
                        <img width="60" height="60" class="rounded-2" src="{{ asset($pd->image3_url) }}" />
                    </a>
                    <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="{{ asset($pd->image4_url) }}" class="item-thumb">
                        <img width="60" height="60" class="rounded-2" src="{{ asset($pd->image4_url) }}" />
                    </a>
                    <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="{{ asset($pd->image5_url) }}" class="item-thumb">
                        <img width="60" height="60" class="rounded-2" src="{{ asset($pd->image5_url) }}" />
                    </a>
                </div>
                <!-- thumbs-wrap.// -->
                <!-- gallery-wrap .end// -->
            </aside>
            <main class="col-lg-6">
                <div class="ps-lg-3">
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

                    <div class="row mb-4">
                        <div class="col-md-4 col-6">
                            <label class="mb-2">Category</label>
                            <div class="input-group mb-3" style="width: 170px;">
                                <input type="text" class="form-control text-center border border-secondary" value="{{ $pd->category->category_name }}" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly />
                            </div>
                        </div>
                        <!-- col.// -->
                        <div class="col-md-4 col-6 mb-3">
                            <label class="mb-2 d-block">Quantity</label>
                            <div class="input-group mb-3" style="width: 170px;">
                                <input type="text" class="form-control text-center border border-secondary" value="{{ $pd->stok_quantity }}" aria-label="Example text with button addon" aria-describedby="button-addon1" readonly/>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('landing.index') }}" class="btn btn-warning shadow-0">Back to Checkout</a>
                    <a href="#" class="btn btn-primary shadow-0" onclick="addToCart({{ $pd->id }}, 1)">
                        <i class="me-1 fa fa-shopping-basket"></i> Add to cart
                    </a>
                    <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3" onclick="addToWishlist({{ $pd->id }})">
                        <i class="me-1 fa fa-heart fa-lg"></i> Wishlist
                    </a>
                </div>
            </main>
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
                    @if(Auth::guard('customer')->check() && Auth::guard('customer')->user()->id === $review->customer_id)
                        <form action="{{ route('reviews.coremove', $review->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-secondary">Delete Comment</button>
                        </form>
                    @endif
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

{{-- add to chart js --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// JavaScript code to add product to cart
function addToCart(productId, quantity) {
    // Kirim permintaan AJAX ke route 'add_to_cart'
    fetch('{{ route("add_to_cart") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({ productId: productId, quantity: quantity }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // SweetAlert untuk memberikan notifikasi sukses
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Product added to cart successfully!',
            }).then(() => {
                // Refresh halaman atau lakukan tindakan lain sesuai kebutuhan Anda
                window.location.reload();
            });
        } else {
            // SweetAlert untuk memberikan notifikasi gagal
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Failed to add product to cart.',
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // SweetAlert untuk memberikan notifikasi error
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'An error occurred while adding product to cart.',
        });
    });
}
</script>

{{-- wishlist add js --}}

<script>
function addToWishlist(productId) {
    fetch('{{ route("wishlist.store") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({ product_id: productId }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Product added to wishlist successfully!',
            }).then(() => {
                // Refresh halaman atau lakukan tindakan lain sesuai kebutuhan Anda
                window.location.reload();
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Failed to add product to wishlist.',
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'An error occurred while adding product to wishlist.',
        });
    });
}

</script>


</body>