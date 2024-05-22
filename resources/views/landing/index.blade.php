<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamerad Store ☭</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/templatemo-style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

    <!-- Link ke jQuery (diperlukan oleh Magnific Popup) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Link ke JavaScript Magnific Popup -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

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
                    <a class="nav-link nav-link-1 active text-light" aria-current="page" href="index.html">Menu</a>
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
                        <a class="dropdown-item" href="#" onclick="confirmLogout()">Logout</a>
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
        <button type="button" class="btn btn-secondary d-flex" style="border-radius: 10px;" data-toggle="modal" data-target="#wishlistModal">
            <span class="material-symbols-outlined">
                credit_card_heart
            </span>
        </button>
    </nav>


    <!-- Modal for Wishlist -->
    <div class="modal fade" id="wishlistModal" tabindex="-1" role="dialog" aria-labelledby="wishlistModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="wishlistModalLabel">Product Wishlist</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="wishlistModalBody">
                    <ul id="wishlistItems">
                        <!-- Wishlist items will be displayed here -->
                    </ul>
                </div>
                                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-success btn-add-to-chart" onclick="addAllToChart()">Add All to Chart</button>
                </div>
            </div>
        </div>
    </div>


    
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="../../assets/img/bglan.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control text-danger tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn bg-danger btn-primary tm-search-btn" style="height: 40px" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Product List
            </h2>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <form action="" class="tm-text-primary">
                    Page <input type="text" value="1" size="1" class="tm-input-paging tm-text-primary"> of 200
                </form>
            </div>
        </div>

        <form class="d-flex mr-5">
            <button class="btn btn-outline-dark d-flex btn-cart" style="border-radius: 10px;" type="button">
                <i class="bi-cart-fill me-1"></i>
                Cart
                <span id="cartItemCount" class="badge bg-dark text-white ms-1 rounded-pill">{{ count(session('cart', [])) }}</span>
            </button>
        </form>        
    
        {{-- modal chart --}}
        <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
            <div class="modal-dialog">
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
                            @if(count(session('cart', [])) > 0)
                            <button type="submit" class="btn btn-outline-dark d-flex btn-cart" style="border-radius: 10px;">Checkout</button>
                            @endif
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
            

        <div class="row tm-mb-90 tm-gallery">
            @foreach($product as $data)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <canvas id="salesChart{{$data->id}}" width="100" height="100"></canvas>
                <figure class="effect-ming tm-video-item">
                    <a href="#" data-toggle="modal" data-target="#productModal{{$data->id}}">
                        <img src="{{ asset($data->image1_url) }}" alt="{{ $data->product_name }}" style="max-width: 100%; height: 300px;" class="img-fluid">
                    </a>
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>{{ $data->product_name }}</h2>
                        <a href="#" data-toggle="modal" data-target="#productModal{{$data->id}}">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <p>Price: Rp. {{ $data->price }}</p> 
                    <span class="tm-text-gray-light">{{ $data->created_at->format('d M Y') }}</span>
                </div>
                <button class="btn-sm btn btn-primary px-2 py-1">Wishlist</button>
                <a href="{{ route('landing.show', $data->id) }}">Detail Product</a>
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
                                    <p><strong>Price:</strong> Rp. {{$data->price}}</p>
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
                                <a href="{{ route('landing.show', $data->id) }}">Detail Product</a>

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
        
        <!-- row -->
    
        <div class="row tm-mb-90">
            <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
                <a href="javascript:void(0);" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
                <div class="tm-paging d-flex">
                    <a href="javascript:void(0);" class="active tm-paging-link">1</a>
                    <a href="javascript:void(0);" class="tm-paging-link">2</a>
                    <a href="javascript:void(0);" class="tm-paging-link">3</a>
                    <a href="javascript:void(0);" class="tm-paging-link">4</a>
                </div>
                <a href="javascript:void(0);" class="btn btn-primary tm-btn-next">Next Page</a>
            </div>            
        </div>
    </div> <!-- container-fluid, tm-container-content -->

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

        // Update cart count
        function updateCartCount(cart) {
            var totalQuantity = 0;
            var uniqueProductIds = {}; // Object to track unique product IDs
            var totalUniqueProducts = 0; // Number of unique products
            for (var productId in cart) {
                if (cart.hasOwnProperty(productId)) {
                    var item = cart[productId];
                    // Check if the product with the same ID is already in the cart
                    if (!uniqueProductIds[productId]) {
                        totalUniqueProducts++; // Increment the number of unique products
                        uniqueProductIds[productId] = true; // Mark the product as unique
                    }
                    totalQuantity += item.quantity; // Add the total quantity of products
                }
            }
            $('.badge').text(totalUniqueProducts); // Display the number of unique products in the badge
            $('#cartItemCount').text(totalUniqueProducts); // Display the number of unique products above the cart modal
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
            var uniqueProductIds = {}; // Object to track unique product IDs
            for (var productId in cart) {
                if (cart.hasOwnProperty(productId)) {
                    var item = cart[productId];
                    // Check if the product with the same ID is already in the cart
                    if (!uniqueProductIds[productId]) {
                        cartItems += '<div class="cart-item">' +
                                        '<img src="' + item.image + '" alt="' + item.name + '" style="width: 50px; height: 50px;">' +
                                        '<div>' +
                                            '<h5>' + item.name + '</h5>' +
                                            '<p>Quantity: ' + item.quantity + '</p>' +
                                            '<p>Price: Rp. ' + (item.price * item.quantity) + '</p>' +
                                        '</div>' +
                                    '</div>';
                        uniqueProductIds[productId] = true; // Mark the product as unique
                    }
                }
            }
            $('#cartModalBody').html(cartItems);
            $('#cartModal').modal('show');
        }
    });
</script>

{{-- wishlist js --}}



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>