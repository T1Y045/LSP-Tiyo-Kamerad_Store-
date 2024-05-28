<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Create | Delivery
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../../assets/demo/demo.css" rel="stylesheet" />
  <!-- Pastikan path file JavaScript dan CSS sesuai -->
  <link href="path/to/bootstrap-material-design.min.css" rel="stylesheet" />
  <script src="path/to/jquery.min.js"></script>
  <script src="path/to/popper.min.js"></script>
  <script src="path/to/bootstrap-material-design.min.js"></script>
  <!-- Sisipkan file JavaScript dan CSS yang dibutuhkan oleh halaman create Anda -->

</head>

<body class="dark-edition">
  <div class="wrapper ">
    @extends('dashboard.master')
    @section('nav')
      @include('dashboard.nav')
    @endsection

    <div class="main-panel">
      <!-- Navbar -->
      @section('page-title', 'Create Delivery')
      @section('main')
        @include('dashboard.main')
        <!-- End Navbar -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">New Delivery</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('deliveries.store') }}" id="formpc" method='POST'>
                      <div class="ms-3 mb-3 me-3">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ request()->query('order_id') }}">
                        <div class="form-group mb-3 ms-3 me-3">
                          <label for="shipping_date">Shipping Date</label>
                          <input type="date" name="shipping_date" id="shipping_date" class="form-control" required>
                        </div>
                        <div class="form-group mb-3 ms-3 me-3">
                          <label for="status">Status</label>
                          <input type="text" name="status" id="status" class="form-control" placeholder="Status" required>
                        </div>
                        <input type="hidden" name="tracking_code" value="{{ strtoupper(substr(md5(rand()), 0, 10)) }}">
                        <div class="row ms-3 me-3 justify-content-end">
                          <div class="col-2">
                            <a href="{{ route('deliveries.index') }}" class="btn btn-sm bg-gradient-secondary w-100">Cancel</a>
                          </div>
                          <div class="col-2">
                            <button type="button" class="btn btn-sm btn-primary w-100" id="save">Save</button>
                          </div>
                        </div>
                      </div>
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
    <script>
      const btnSave = document.getElementById('save');
      const form = document.getElementById('formpc');
      
      function simpan() {
        let shippingDate = document.getElementById('shipping_date').value;
        let status = document.getElementById('status').value;
        let pesan = "";
        
        if (shippingDate == "") {
          pesan = "Shipping Date is still empty!";
        } else if (status == "") {
          pesan = "Status is still empty!";
        }
        
        if (pesan.length > 0) {
          if (shippingDate == "") {
            document.getElementById('shipping_date').focus();
          } else if (status == "") {
            document.getElementById('status').focus();
          }
          swal("Error!", pesan, "error");
        } else {
          form.submit();
        }
      }
      
      btnSave.onclick = function() {
        simpan();
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
