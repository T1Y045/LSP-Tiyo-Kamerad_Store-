<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Create | Discount
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="../../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
<!-- CSS Datepicker Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
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
            @section('page-title', 'Create Discount')
            @section('main')
            @include('dashboard.main')
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">New Discount</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('discounts.store')}}" method="post" id="frmdiscount">
                                        @csrf
                                            <div class="mb-3 ms-3 me-3">
                                                <label for="discount_category_id" class="form-label">Discount Category</label>
                                                <select class="form-select" id="discount_category_id" name="discount_category_id" aria-label="discount_category_id">
                                                    <option value="">Select Discount Category</option>
                                                    @foreach($discountcategories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
        
        
                                            <div class="mb-3 ms-3 me-3">
                                                <label for="product_id" class="form-label">Name Product</label>
                                                <select class="form-select" id="product_id" name="product_id" aria-label="product_id">
                                                    <option value="">Select Product</option>
                                                    @foreach($product as $prod)
                                                    <option value="{{ $prod->id }}">{{ $prod->product_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
        
        
                                            <div class="form-group mb-3 ms-3 me-3">
                                                <label for="start_date" class="form-label">START DATE</label>
                                                <input type="datetime-local" name="start_date" id="start_date" class="form-control" placeholder="Enter start date" aria-label="start_date" required>
                                            </div>
        
                                            
                                            <div class="form-group mb-3 ms-3 me-3">
                                                <label for="end_date" class="form-label">END DATE</label>
                                                <input type="datetime-local" name="end_date" id="end_date" class="form-control" placeholder="Enter end date" aria-label="end_date" required>
                                            </div>
        
                                            
                                            <div class="form-group mb-3 ms-3 me-3">
                                                <label for="percentage" class="form-label">PERCENTAGE</label>
                                                <input type="number" name="percentage" id="percentage" class="form-control" placeholder="Percentage " aria-label="percentage" required>
                                            </div>
        
                                            <div class="row ms-3 me-3 justify-content-end">
                                                <div class="col-2">
                                                    <a href="{{route('discounts.index')}}" class="btn bg-gradient-secondary w-100">Cancel</a>
                                                </div>
                                                <div class="col-2">
                                                    <button type="button" class="btn bg-gradient-primary w-100" id="save">Save</button>
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
    <!-- SweetAlert library import -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap Datepicker library import -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!-- jQuery import -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- JavaScript code -->
    <script>
        const btnSave = document.getElementById("save");
        const form = document.getElementById("frmdiscount");
    
        function simpan() {
            let discount_category_id = document.getElementById("discount_category_id").value;
            let product_id = document.getElementById("product_id").value;
            let start_date = document.getElementById("start_date").value;
            let end_date = document.getElementById("end_date").value;
            let percentage = document.getElementById("percentage").value;
    
            if (discount_category_id.trim() === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Discount Categories still empty',
                });
                document.getElementById("discount_category_id").focus();
            } else if (product_id.trim() === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Name Product is still empty',
                });
                document.getElementById("product_id").focus();
            } else if (start_date.trim() === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Start Date is still empty',
                });
                document.getElementById("start_date").focus();
            } else if (end_date.trim() === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'End Date is required', 
                });
                document.getElementById("end_date").focus();
            } else if (percentage.trim() === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Percentage is required', 
                });
                document.getElementById("percentage").focus();
            } else {
                form.submit();
            }
        }
    
        btnSave.onclick = function () {
            simpan();
        };
    </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</body>

</html>
