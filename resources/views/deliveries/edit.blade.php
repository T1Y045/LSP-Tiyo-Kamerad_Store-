<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Edit Delivery
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="dark-edition">
  <div class="wrapper ">
    @extends('dashboard.master')
    @section('nav')
        @include('dashboard.nav')
    @endsection

    <div class="main-panel">
      <!-- Navbar -->
      @section('page-title', 'Edit Delivery')
      @section('main')
          @include('dashboard.main')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Delivery</h4>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('deliveries.update', $delivery->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="order_id" class="bmd-label-floating">Order ID</label>
                      <input type="text" class="form-control" id="order_id" name="order_id" value="{{ $delivery->order_id }}" required>
                    </div>
                    <div class="form-group">
                      <label for="shipping_date" class="bmd-label-floating">Shipping Date</label>
                      <input type="date" class="form-control" id="shipping_date" name="shipping_date" value="{{ $delivery->shipping_date }}" required>
                    </div>
                    <div class="form-group">
                      <label for="tracking_code" class="bmd-label-floating">Tracking Code</label>
                      <input type="text" class="form-control" id="tracking_code" name="tracking_code" value="{{ $delivery->tracking_code }}" required>
                    </div>
                    <div class="form-group">
                      <label for="status" class="bmd-label-floating">Status</label>
                      <input type="text" class="form-control" id="status" name="status" value="{{ $delivery->status }}" required>
                    </div>
                    <a href="{{route('deliveries.index')}}" class="btn btn-sm bg-gradient-secondary">Cancel</a>
                    <button type="submit" class="btn btn-sm btn-primary">Update Delivery</button>
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
      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>
</body>
</html>
