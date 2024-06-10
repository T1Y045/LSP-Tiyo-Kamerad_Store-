<div class="logo"><a href="" class="simple-text logo-normal">
  <img src="../../assets/img/logo.png" style="width: 35px" alt="">
    Kamerad Store
  </a></div>
<div class="sidebar-wrapper">
  <ul class="nav">
    <li class="nav-item  ">
      <a class="nav-link" href="{{route('dashboard.chart')}}">
        <i class="material-icons">dashboard</i>
        <p class="text-white">Dashboard</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{route('users.index')}}" onclick="highlightNavItem(this)">
        <i class="material-icons">person</i>
        <p class="text-white">User Profile</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{route('customer.index')}}" onclick="highlightNavItem(this)">
        <i class="material-icons">groups</i>
        <p class="text-white">Customers</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{route('product_categories.index')}}" onclick="highlightNavItem(this)">
        <i class="material-icons">category</i>
        <p class="text-white">Product Categories</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{route('products.index')}}" onclick="highlightNavItem(this)">
        <i class="material-icons">inventory</i>
        <p class="text-white">Products</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{route('discount_categories.index')}}" onclick="highlightNavItem(this)">
        <i class="material-icons">emoji_symbols</i>
        <p class="text-white">Discount Categories</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{route('discounts.index')}}" onclick="highlightNavItem(this)">
        <i class="material-icons">percent</i>
        <p class="text-white">Discounts</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{route('orders.index')}}" onclick="highlightNavItem(this)">
        <i class="material-icons">notifications</i>
        <p class="text-white">Orders</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{route('wishlisti.index')}}" onclick="highlightNavItem(this)"> 
        <i class="material-icons">favorite</i>
        <p class="text-white">Wishlist</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{route('bayar.index')}}" onclick="highlightNavItem(this)">
        <i class="material-icons">payments</i>
        <p class="text-white">Payments</p>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('deliveries.index')}}" onclick="highlightNavItem(this)">
          <i class="material-icons">local_shipping</i>
          <p class="text-white">Deliveries</p>
      </a>
  </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{route('review.index')}}" onclick="highlightNavItem(this)">
        <i class="material-icons">forum</i>
        <p class="text-white">Review</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{route('distributor.index')}}" onclick="highlightNavItem(this)">
        <i class="material-icons">support_agent</i>
        <p class="text-white">Distributor</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{route('purchase_item.index')}}" onclick="highlightNavItem(this)">
        <i class="material-icons">place_item</i>
        <p class="text-white">Purchase Order Items</p>
      </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{route('purchase.index')}}" onclick="highlightNavItem(this)">
        <i class="material-icons">shop_two</i>
        <p class="text-white">Purchase Order</p>
      </a>
    </li>
  </ul>
</div>
<!-- Focusing when on load and active color -->
<script>
  function markActiveLinkAndScroll() {
    document.querySelectorAll(".nav-link").forEach((link) => {
      if (link.href === window.location.href) {
        link.classList.add("bg-primary");
        link.setAttribute("aria-current", "page");
        link.scrollIntoView();
      }
    });
  }

  function highlightNavItem(clickedItem) {
    document.querySelectorAll('.nav-item').forEach(function(navItem) {
      navItem.classList.remove('active');
    });
    clickedItem.closest('.nav-item').classList.add('active');
  }

  window.addEventListener("load", markActiveLinkAndScroll);
</script>
