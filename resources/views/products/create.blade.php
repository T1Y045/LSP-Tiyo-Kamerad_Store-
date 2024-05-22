<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Create | Product
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
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
      @section('page-title', 'Create Product')
      @section('main')
          @include('dashboard.main')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">New Products</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('products.store') }}" method="post" id="formpc" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3 ms-3 me-3">
                          <label for="product_category_id" class="form-label">Product Category</label>
                          <select class="form-select custom-select" id="product_category_id" name="product_category_id" aria-label="product_category_id">
                            <option value="">Select Category</option>
                            @foreach($productcategories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                          </select>
                          @error('product_category_id')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="mb-3 ms-3 me-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Name" aria-label="product_name">
                            @error('product_name')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3 ms-3 me-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Description" aria-label="description"></textarea>
                            @error('description')
                            <div class="error-message">{{ $message }}</div>
                                @enderror
                        </div>


                        <div class="mb-3 ms-3 me-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Price" aria-label="price">
                            @error('price')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3 ms-3 me-3">
                            <label for="stok_quantity" class="form-label">Stock Quantity</label>
                            <input type="number" class="form-control" id="stok_quantity" name="stok_quantity" placeholder="Stock Quantity" aria-label="stok_quantity">
                            @error('stok_quantity')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3 ms-3 me-3">
                            <label for="image1_url" class="form-label">Image 1</label>
                            <input class="form-control" type="file" id="image1_url" name="image1_url" accept="image/*" aria-label="image1_url">
                            @error('image1_url')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3 ms-3 me-3">
                            <label for="image2_url" class="form-label">Image 2</label>
                            <input type="file" class="form-control" id="image2_url" name="image2_url" accept="image/*" aria-label="image2_url">
                            @error('image2_url')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3 ms-3 me-3">
                            <label for="image3_url" class="form-label">Image 3</label>
                            <input type="file" class="form-control" id="image3_url" name="image3_url" accept="image/*" aria-label="image3_url">
                            @error('image3_url')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3 ms-3 me-3">
                            <label for="image4_url" class="form-label">Image 4</label> 
                            <input type="file" class="form-control" id="image4_url" name="image4_url" accept="image/*" aria-label="image4_url">
                            @error('image4_url')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="mb-3 ms-3 me-3">
                            <label for="image5_url" class="form-label">Image 5</label>
                            <input type="file" class="form-control" id="image5_url" name="image5_url" accept="image/*" aria-label="image5_url">
                            @error('image5_url')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

    
                        <div class="row ms-3 me-3 justify-content-end">
                            <div class="col-3">
                                <a href="{{ route('products.index') }}" class="btn btn-sm btn-secondary w-100">Cancel</a>
                            </div>
                            <div class="col-3">
                                <button type="button" id="save" class="btn btn-sm btn-primary w-100">Create</button>
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
        let pc = document.getElementById('product_category_id').value;
        let pesan = "";
        if (pc == "") {
            pesan = "Product Category is still empty!";
        }
        if (pesan.length > 0) {
            document.getElementById("product_category_id").focus();
            swal("Error!", pesan, "error");
        } else {
            form.submit();
        }
    }

    btnSave.onclick = function () {
        simpan();
    };
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
