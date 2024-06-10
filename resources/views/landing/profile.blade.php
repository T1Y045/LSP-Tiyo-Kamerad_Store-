<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
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
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
         <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">

 

    <style>
        body{margin-top:20px;
        background-color:#f2f6fc;
        color:#69707a;
        }
        .img-account-profile {
            height: 10rem;
        }
        .rounded-circle {
            border-radius: 50% !important;
        }
        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
        }
        .card .card-header {
            font-weight: 500;
        }
        .card-header:first-child {
            border-radius: 0.35rem 0.35rem 0 0;
        }
        .card-header {
            padding: 1rem 1.35rem;
            margin-bottom: 0;
            background-color: rgba(33, 40, 50, 0.03);
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
        }
        .form-control, .dataTable-input {
            display: block;
            width: 100%;
            padding: 0.875rem 1.125rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1;
            color: #69707a;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #c5ccd6;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.35rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .nav-borders .nav-link.active {
            color: #0061f2;
            border-bottom-color: #0061f2;
        }
        .nav-borders .nav-link {
            color: #69707a;
            border-bottom-width: 0.125rem;
            border-bottom-style: solid;
            border-bottom-color: transparent;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0;
            padding-right: 0;
            margin-left: 1rem;
            margin-right: 1rem;
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
            <a href="" class="text-white-50">Profile</a>
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
              <button class="btn btn-light text-primary dropdown-toggle" type="button" id="dropdownMenuButton" style="border-radius: 10px;"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::guard('customer')->user()->name }} ☭
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                <a class="dropdown-item" href="{{ route('landing.invoice') }}">Your Order</a>
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
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="{{ route('profile') }}">Profile</a>
            <a class="nav-link" href="{{ route('landing.invoice') }}">Your Order</a>
            <a class="nav-link" href="{{ route('wishlist.show') }}">Wishlist</a>
            <a class="nav-link" href="">Notifications</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="https://as1.ftcdn.net/v2/jpg/03/46/83/96/1000_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg" class="img img-rounded img-fluid" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to other users on the site)</label>
                                <input class="form-control" id="inputUsername" name="name" type="text" placeholder="Enter your username" value="{{ old('name', $customer->name ?? '') }}" required>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Email</label>
                                    <input class="form-control" id="inputFirstName" name="email" type="text" placeholder="Enter your first name" value="{{ old('email', $customer->email ?? '') }}" required>
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Password</label>
                                    <div class="input-group">
                                        <input class="form-control" id="inputLastName" name="password" type="text" placeholder="Enter your password" value="{{ old('password', $customer->password ?? '') }}" required>
                                        <button class="btn btn-outline-secondary" style="height: 35px" type="button" id="togglePassword">
                                            <i class="bi bi-eye" ></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Form Row -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name) -->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Phone</label>
                                    <input class="form-control" id="inputOrgName" name="phone" type="text" placeholder="Enter your organization name" value="{{ old('phone', $customer->phone ?? '') }}" required>
                                </div>
                                <!-- Form Group (location) -->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Location</label>
                                    <input class="form-control" id="inputLocation" name="location" type="text" placeholder="Enter your location" value="{{ old('location', $customer->location ?? '') }}">
                                </div>
                            </div>
                            <!-- Form Group (email address) -->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Address1</label>
                                <input class="form-control" id="inputEmailAddress" name="address1" type="text" placeholder="Enter your email address" value="{{ old('address1', $customer->address1 ?? '') }}" required>
                            </div>
                            <!-- Form Row -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number) -->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Address2</label>
                                    <input class="form-control" id="inputPhone" name="address2" type="text" placeholder="Enter your phone number" value="{{ old('address2', $customer->address2 ?? '') }}">
                                </div>
                                <!-- Form Group (birthday) -->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Address3</label>
                                    <input class="form-control" id="inputBirthday" name="address3" type="text" placeholder="Enter your birthday" value="{{ old('address3', $customer->address3 ?? '') }}">
                                </div>
                            </div>
                            <!-- Save changes button -->
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


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
    
    
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('inputLastName');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye');
            this.querySelector('i').classList.toggle('bi-eye-slash');
        });
    </script>
    

</body>
</html>