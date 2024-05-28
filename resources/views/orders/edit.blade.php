<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
       Edit | Orders
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
      @section('page-title', 'Edit Orders')
      @section('main')
          @include('dashboard.main')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Orders</h4>
                </div>
                <div class="card-body">
                    <form id="editForm" method="POST" action="{{ route('orders.update', $order->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="customer_id">Customer ID</label>
                            <input type="text" class="form-control" id="customer_id" name="customer_id" value="{{ $order->customer_id }}" required>
                        </div>
                        <div class="form-group">
                            <label for="order_date">Order Date</label>
                            <input type="date" class="form-control" id="order_date" name="order_date" value="{{ $order->order_date }}" required>
                        </div>
                        <div class="form-group">
                            <label for="total_amount">Total Amount</label>
                            <input type="number" class="form-control" id="total_amount" name="total_amount" value="{{ $order->total_amount }}" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" name="status" value="{{ $order->status }}" required>
                        </div>
                        <a href="{{ route('orders.index') }}" class="btn btn-sm bg-gradient-secondary">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary">Update Order</button>
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
      const originalValue = "{{ $order->category_name }}";

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
