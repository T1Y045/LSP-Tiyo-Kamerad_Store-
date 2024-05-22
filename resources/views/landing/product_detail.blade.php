<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Item - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/templatemo-style.css">
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
    <form class="d-flex mr-5">
        <button class="btn btn-outline-dark d-flex" style="border-radius: 10px;" type="submit">
            <i class="bi-cart-fill me-1"></i>
            Chart
            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
        </button>
    </form>
</nav>

<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0" src="{{ asset($pd->image1_url) }}" alt="{{ $pd->product_name }}" />
            </div>
            <div class="col-md-6">
                <h1 class="display-5 fw-bolder">{{ $pd->product_name }}</h1>
                <div class="fs-5 mb-5">
                    <span class="">Rp. {{ $pd->old_price }}</span>
                    <span>${{ $pd->price }}</span>
                </div>
                <p class="lead">{{ $pd->description }}</p>
                <div class="d-flex">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                    <form action="" method="POST">
                        @csrf
                        <button class="btn btn-outline-dark flex-shrink-0" style="height: 50px; border-radius: 5px;" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
                    </form>
                </div>
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
        	            <span class="float-right text-success"><i>Rating: {{ $review->rating }}</i></span>
        	       </p>
        	       <div class="clearfix"></div>
        	        <p>{{ $review->comment }}</p>
        	    </div>
                @endforeach
                <form action="{{ route('reviews.store') }}" method="POST" id="reviewForm{{$pd->id}}">
                    @csrf
                    <input type="hidden" name="productId" value="{{ $pd->id }}">
                    <div class="form-group">
                        <label for="reviewText{{$pd->id}}">Review:</label>
                        <textarea class="form-control" id="reviewText{{$pd->id}}" name="reviewText" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="rating{{$pd->id}}">Rating:</label>
                        <select class="form-control" style="height: 50px" id="rating{{$pd->id}}" name="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
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



                                                                     
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
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

    

</body>