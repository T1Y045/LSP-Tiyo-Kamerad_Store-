<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
       Edit | Purchase Order
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
      @section('page-title', 'Edit Purchase Order')
      @section('main')
          @include('dashboard.main')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Purchase Order</h4>
                </div>
                <div class="card-body">
                  <form id="editForm" method="POST" action="{{ route('purchase.update', $purchaseOrder->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                      <label for="distributor_id">Distributor</label>
                      <select class="form-control" id="distributor_id" name="distributor_id" required>
                        @foreach ($distributors as $distributor)
                          <option value="{{ $distributor->id }}" {{ $distributor->id == $purchaseOrder->distributor_id ? 'selected' : '' }}>
                            {{ $distributor->name }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="total_amount">Total Amount</label>
                      <input type="text" class="form-control" id="total_amount" name="total_amount" value="{{ $purchaseOrder->total_amount }}" required>
                    </div>
                    <div class="form-group">
                      <label for="status">Status</label>
                      <input type="text" class="form-control" id="status" name="status" value="{{ $purchaseOrder->status }}" required>
                    </div>
                    <a href="{{ route('purchase.index') }}" class="btn btn-sm bg-gradient-secondary">Cancel</a>
                    <button type="submit" class="btn btn-sm btn-primary">Update Purchase Order</button>
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
      const distributorIdInput = document.getElementById('distributor_id');
      const totalAmountInput = document.getElementById('total_amount');
      const statusInput = document.getElementById('status');
      const originalDistributorId = "{{ $purchaseOrder->distributor_id }}";
      const originalTotalAmount = "{{ $purchaseOrder->total_amount }}";
      const originalStatus = "{{ $purchaseOrder->status }}";

      if (distributorIdInput.value === originalDistributorId && totalAmountInput.value === originalTotalAmount && statusInput.value === originalStatus) {
        e.preventDefault();
        Swal.fire({
          title: 'No Changes Detected',
          text: 'The purchase order details remain the same.',
          icon: 'info',
          confirmButtonText: 'OK'
        });
      }
    });
  </script>
</body>

</html>
