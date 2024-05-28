<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Order</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/templatemo-style.css">

    <style>
        .card {
            border: none;
            margin-bottom: 20px; /* Penyesuaian margin antar kartu */
        }
        .card .card-body {
            padding: 0;
        }
        .invoice-heading {
            color: #7e8d9f;
            font-size: 20px;
        }
        .company-name {
            color: #8f8061;
        }
        .text-muted span {
            color: #8f8061;
        }
        .badge {
            background-color: #ffcc00;
            color: #000;
        }
        .subtotal, .shipping, .total-amount {
            font-size: 25px;
        }
        .order-actions {
            margin-top: 10px;
        }
    </style>
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
                        <a class="dropdown-item active" href="{{ route('landing.invoice') }}">Your Order</a>
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
    </nav>

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="../../assets/img/bglan.jpg"></div>


    <div class="container mt-5 mb-5">
      @foreach($orders as $order)
      <div class="card border border-danger rounded">
          <div class="card-body">
              <div class="container mb-3 mt-3">
                  <!-- Invoice Header -->
                  <div class="row d-flex align-items-baseline">
                      <div class="col-xl-9">
                          <p class="invoice-heading">Invoice</p>
                      </div>
                  </div>
                  <!-- Company Details -->
                  <div class="container">
                      <div class="col-md-12 text-center">
                        <i><img src="../../assets/img/logo.png" alt="" style="width: 90px; height: 90px;"></i>
                        <p class="pt-2 company-name">Kamerad Store</p>
                      </div>
                      <!-- Customer and Order Info -->
                      <div class="row">
                          <div class="col-xl-8">
                              <ul class="list-unstyled">
                                  <li class="text-muted">To: <span>{{ Auth::guard('customer')->user()->name }}</span></li>
                                  <li class="text-muted">Address: <span>{{ Auth::guard('customer')->user()->address1 }}</span></li>
                                  <li class="text-muted">City: <span>{{ Auth::guard('customer')->user()->address2 }}</span></li>
                                  <li class="text-muted">Country: <span>{{ Auth::guard('customer')->user()->address3 }}</span></li>
                                  <li class="text-muted">Phone: <span>{{ Auth::guard('customer')->user()->phone }}</span></li>
                                </ul>
                          </div>
                          <div class="col-xl-4">
                              <p class="text-muted">Invoice</p>
                              <ul class="list-unstyled">
                                  <li class="text-muted"><i class="fas fa-circle"></i> <span class="fw-bold">ID:</span>#{{ $order->id }}</li>
                                  <li class="text-muted"><i class="fas fa-circle"></i> <span class="fw-bold">Creation Date:</span> {{ $order->order_date }}</li>
                                  <li class="text-muted"><i class="fas fa-circle"></i> <span class="me-1 fw-bold">Status Payment:</span><span class="badge text-black fw-bold">{{ $order->status }}</span></li>
                              </ul>
                          </div>
                      </div>
                      <!-- Order Details -->
                      @foreach($order->orderDetails as $detail)
                      <div class="row my-2 mx-1 justify-content-center">
                          <div class="col-md-2 mb-4 mb-md-0">
                              <div class="bg-image ripple rounded-5 mb-4 overflow-hidden d-block" data-ripple-color="light">
                                  <img src="{{ $detail->product->image1_url }}" class="border" style="max-width: 100%; height: 150px;" alt="{{ $detail->product->product_name }}" />
                                  <a href="#!">
                                      <div class="hover-overlay">
                                          <div class="mask" style="background-color: hsla(0, 0%, 98.4%, 0.2);"></div>
                                      </div>
                                  </a>
                              </div>
                          </div>
                          <div class="col-md-7 mb-4 mb-md-0">
                              <p class="fw-bold">{{ $detail->product->product_name }}</p>
                              <p class="mb-1"><span class="text-muted me-2">Quantity:</span><span>{{ $detail->quantity }}</span></p>
                              <p><span class="text-muted me-2">Subtotal:</span><span>{{ $detail->subtotal }}</span></h5>
                              </div>
                          </div>
                          @endforeach
                          <!-- Order Actions -->
                          <div class="row order-actions">
                              <div class="col-md-12">
                                  <a href="{{ route('cancel.order', $order->id) }}" class="btn btn-danger">Cancel Order</a>
                              </div>
                          </div>
                          <hr>
                          <!-- Order Summary -->
                          <div class="row">
                              <div class="col-xl-8">
                                  <p class="ms-3">Add additional notes and payment information</p>
                              </div>
                              <div class="col-xl-3">
                                  <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span class="total-amount"> Rp.{{ $order->total_amount }}</span></p>
                              </div>
                          </div>
                            <!-- Delivery Info -->
                            <div class="row">
                              <div class="col-md-12">
                                  <p class="text-muted mt-3">Delivery Information</p>
                                  <ul class="list-unstyled">
                                      @if($order->delivery) <!-- Tambahkan pengecekan apakah delivery ada -->
                                          <li class="text-muted">Shipping Date: <span>{{ $order->delivery->shipping_date }}</span></li>
                                          <li class="text-muted">Tracking Code: <span>{{ $order->delivery->tracking_code }}</span></li>
                                          <li class="text-muted">Status: <span class="badge text-black fw-bold">{{ $order->delivery->status }}</span></li>
                                      @else
                                          <li class="text-muted">No delivery information available</li>
                                      @endif
                                  </ul>
                              </div>
                            </div>
                      </div>
                  </div>
              </div>
          </div>
          <hr>
          @endforeach
        </div>
    
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
    <script src="../../assets/js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
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
    
    </body>
    </html>
