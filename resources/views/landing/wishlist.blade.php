<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wishlist</title>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="../../assets/text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">






    <style>
        .cart-wrap {
	padding: 40px 0;
	font-family: 'Open Sans', sans-serif;
}
.main-heading {
	font-size: 19px;
	margin-bottom: 20px;
}
.table-wishlist table {
    width: 100%;
}
.table-wishlist thead {
    border-bottom: 1px solid #e5e5e5;
    margin-bottom: 5px;
}
.table-wishlist thead tr th {
    padding: 8px 0 18px;
    color: #484848;
    font-size: 15px;
    font-weight: 400;
}
.table-wishlist tr td {
    padding: 25px 0;
    vertical-align: middle;
}
.table-wishlist tr td .img-product {
    width: 72px;
    float: left;
    margin-left: 8px;
    margin-right: 31px;
    line-height: 63px;
}
.table-wishlist tr td .img-product img {
	width: 100%;
}
.table-wishlist tr td .name-product {
    font-size: 15px;
    color: #484848;
    padding-top: 8px;
    line-height: 24px;
    width: 50%;
}
.table-wishlist tr td.price {
    font-weight: 600;
}
.table-wishlist tr td .quanlity {
    position: relative;
}

.total {
	font-size: 24px;
	font-weight: 600;
	color: #8660e9;
}
.display-flex {
	display: flex;
}
.align-center {
	align-items: center;
}
.round-black-btn {
	border-radius: 25px;
    background: #212529;
    color: #fff;
    padding: 5px 20px;
    display: inline-block;
    border: solid 2px #212529; 
    transition: all 0.5s ease-in-out 0s;
    cursor: pointer;
    font-size: 14px;
}
.round-black-btn:hover,
.round-black-btn:focus {
	background: transparent;
	color: #212529;
	text-decoration: none;
}
.mb-10 {
    margin-bottom: 10px !important;
}
.mt-30 {
    margin-top: 30px !important;
}
.d-block {
    display: block;
}
.custom-form label {
    font-size: 14px;
    line-height: 14px;
}
.pretty.p-default {
    margin-bottom: 15px;
}
.pretty input:checked~.state.p-primary-o label:before, 
.pretty.p-toggle .state.p-primary-o label:before {
    border-color: #8660e9;
}
.pretty.p-default:not(.p-fill) input:checked~.state.p-primary-o label:after {
    background-color: #8660e9 !important;
}
.main-heading.border-b {
    border-bottom: solid 1px #ededed;
    padding-bottom: 15px;
    margin-bottom: 20px !important;
}
.custom-form .pretty .state label {
    padding-left: 6px;
}
.custom-form .pretty .state label:before {
    top: 1px;
}
.custom-form .pretty .state label:after {
    top: 1px;
}
.custom-form .form-control {
    font-size: 14px;
    height: 38px;
}
.custom-form .form-control:focus {
    box-shadow: none;
}
.custom-form textarea.form-control {
    height: auto;
}
.mt-40 {
    margin-top: 40px !important; 
}
.in-stock-box {
	background: #ff0000;
	font-size: 12px;
	text-align: center;
	border-radius: 25px;
	padding: 4px 15px;
	display: inline-block;  
    color: #fff;
}
.trash-icon {
    font-size: 20px;
    color: #212529;
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
            <a href="" class="text-white-50">Wishlist</a>
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

<div class="cart-wrap">
    <div class="container">
        <nav class="nav nav-borders">
            <a class="nav-link" href="{{ route('profile') }}">Profile</a>
            <a class="nav-link" href="{{ route('landing.invoice') }}">Your Order</a>
            <a class="nav-link active ms-0" href="{{ route('wishlist.show') }}">Wishlist</a>
            <a class="nav-link" href="">Notifications</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="main-heading mb-10">My wishlist</div>
                <div class="table-wishlist">
                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <thead>
                            <tr>
                                <th width="45%">Product</th>
                                <th width="15%">Unit Price</th>
                                <th width="15%">Stock QTY</th>
                                <th width="15%"></th>
                                <th width="10%"></th>
                            </tr>
                        </thead>
                        <tbody id="wishlistItemsContainer">
                            @foreach($wishlistItems as $wishlistItem)
                            <tr id="wishlistItem{{ $wishlistItem->id }}">
                                <td width="45%">
                                    <div class="display-flex align-center">
                                        <div class="img-product">
                                            <img src="{{ $wishlistItem->product->image1_url }}" alt="{{ $wishlistItem->product->name }}" class="mCS_img_loaded">
                                        </div>
                                        <div class="name-product">
                                            {{ $wishlistItem->product->name }}
                                        </div>
                                    </div>
                                </td>
                                <td width="15%" class="price">Rp. {{ $wishlistItem->product->price }}</td>
                                <td width="15%"><span class="in-stock-box">{{ $wishlistItem->product->stok_quantity }}</span></td>
                                <td width="15%" class="text-center">
                                    <button type="button" class="btn-sm btn-danger btn rounded-pill" onclick="confirmDelete({{ $wishlistItem->id }})">Remove</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(itemId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ route("wishlist.remove", "") }}/' + itemId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if(response.success) {
                            $('#wishlistItem' + itemId).remove();
                            Swal.fire(
                                'Deleted!',
                                'Your item has been deleted.',
                                'success'
                            );
                        } else {
                            Swal.fire(
                                'Error!',
                                'Item could not be deleted.',
                                'error'
                            );
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'Error!',
                            'An error occurred. Please try again.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
        
    

</body>
</html>