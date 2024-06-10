<!-- resources/views/dashboard/nav.blade.php -->
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

<!-- Modal for Cart -->
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

