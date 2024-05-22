<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
       Edit | Discount
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="../../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="dark-edition">
  <div class="wrapper">
    @extends('dashboard.master')
    @section('nav')
        @include('dashboard.nav')
    @endsection

    <div class="main-panel">
      <!-- Navbar -->
      @section('page-title', 'Edit Discount')
      @section('main')
          @include('dashboard.main')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Discount</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('discounts.update', $discount->id) }}" method="post" id="frmdiscount">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 ms-3 me-3">
                            <label for="discount_category_id" class="form-label">Discount Category</label>
                            <select class="form-select" id="discount_category_id" name="discount_category_id" aria-label="discount_category_id">
                                <option selected>Select Discount Category</option>
                                @foreach($discountcategories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $discount->category_discount_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3 ms-3 me-3">
                            <label for="product_id" class="form-label">Name Product</label>
                            <select class="form-select" id="product_id" name="product_id" aria-label="product_id">
                                <option selected>Select Product</option>
                                @foreach($product as $prod)
                                <option value="{{ $prod->id }}" {{ $prod->id == $discount->product_id ? 'selected' : '' }}>{{ $prod->product_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3 ms-3 me-3">
                            <label for="start_date" class="form-label">START DATE</label>
                            <input type="datetime-local" name="start_date" id="start_date" class="form-control" value="{{ $discount->start_date }}" placeholder="Enter start date" aria-label="start_date" required>
                        </div>
                            
                            <div class="form-group mb-3 ms-3 me-3">
                                <label for="end_date" class="form-label">END DATE</label>
                                <input type="datetime-local" name="end_date" id="end_date" class="form-control" value="{{ $discount->end_date }}" placeholder="Enter end date" aria-label="end_date" required>
                            </div>

                            
                            <div class="form-group mb-3 ms-3 me-3">
                                <label for="percentage" class="form-label">PERCENTAGE</label>
                                <input type="number" name="percentage" id="percentage" class="form-control" value="{{ $discount->percentage }}" placeholder="Percentage " aria-label="percentage" required>
                            </div>
                        <a href="{{route('discounts.index')}}" class="btn btn-sm bg-gradient-secondary">Cancel</a>
                         <button type="submit" class="btn btn-sm btn-primary">Update Category</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
            <nav class="float-left">
              <ul>
                <li>
                  <a href="https://www.creative-tim.com">
                    Creative Tim
                  </a>
                </li>
                <li>
                  <a href="https://creative-tim.com/presentation">
                    About Us
                  </a>
                </li>
                <li>
                  <a href="http://blog.creative-tim.com">
                    Blog
                  </a>
                </li>
                <li>
                  <a href="https://www.creative-tim.com/license">
                    Licenses
                  </a>
                </li>
              </ul>
            </nav>
            <div class="copyright float-right" id="date">
              , made with <i class="material-icons">favorite</i> by
              <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
            </div>
          </div>
      </footer>
    </div>
  </div>

  <!-- SweetAlert CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    // Check if the form data is unchanged before submitting
    document.getElementById('editForm').addEventListener('submit', function(e) {
      const categoryInput = document.getElementById('category_name');
      const originalValue = "{{ $category->category_name }}";

      if (categoryInput.value === originalValue) {
        e.preventDefault();
        Swal.fire({
          title: 'No Changes Detected',
          text: 'The category name remains the same.',
          icon: 'info',
          confirmButtonText: 'OK'
        });
      }
    });
  </script>
</body>

</html>
