<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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


</head>
<body>
@section('nav')
    @include('landing.nav')
@show

<div class="container-fluid tm-container-content tm-mt-60">
    @yield('content')
</div>




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
                alert('Product added to wishlist');
                loadWishlistItems(); // Reload wishlist items to update the DOM
            } else {
                alert('Failed to add product to wishlist');
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
                alert('Item removed from wishlist');
                loadWishlistItems(); // Reload wishlist items to update the DOM
            } else {
                alert('Failed to remove item from wishlist');
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
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>