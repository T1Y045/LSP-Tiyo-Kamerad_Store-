<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
       Edit | Product
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
      @section('page-title', 'Edit Products')
      @section('main')
          @include('dashboard.main')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Products</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST" id="updateForm" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 ms-3 me-3">
                                <label for="product_category_id" class="form-label">Product Category</label>
                                <select class="form-select custom-select" id="product_category_id" name="product_category_id" aria-label="product_category_id">
                                    <option value="">Select Category</option>
                                    @foreach($productcategories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->product_category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('product_category_id')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3 ms-3 me-3">
                                <label for="product_name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Name" aria-label="product_name"  value="{{ $product->product_name }}">
                                @error('product_name')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3 ms-3 me-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description" aria-label="description">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3 ms-3 me-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Price" aria-label="price" value="{{ $product->price }}">
                                @error('price')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3 ms-3 me-3">
                                <label for="stok_quantity" class="form-label">Stock Quantity</label>
                                <input type="number" class="form-control" id="stok_quantity" name="stok_quantity" placeholder="Stock Quantity" aria-label="stok_quantity" value="{{ $product->stok_quantity }}">
                                @error('stok_quantity')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3 ms-3 me-3">
                                <label for="image1_url" id="image1_label" class="form-label">Image 1</label>
                                <input type="file" class="form-control" id="image1_url" name="image1_url" accept="image/*" aria-label="image1_url">
                                @error('image1_url')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                @if($product->image1_url)
                                <div id="image1_label" class="mt-2 text-white">{{ basename($product->image1_url) }}</div>
                                <input type="hidden" name="old_image1_url" value="{{ $product->image1_url }}">
                                @endif
                            </div>


                            <div class="mb-3 ms-3 me-3">
                                <label for="image2_url" class="form-label">Image 2</label>
                                <input type="file" class="form-control" id="image2_url" name="image2_url" accept="image/*" aria-label="image2_url">
                                @error('image2_url')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                @if($product->image2_url)
                                <div id="image1_label" class="mt-2 text-white">{{ basename($product->image2_url) }}</div>
                                <input type="hidden" name="old_image2_url" value="{{ $product->image2_url }}">
                                @endif
                            </div>


                            <div class="mb-3 ms-3 me-3">
                                <label for="image3_url" class="form-label">Image 3</label>
                                <input type="file" class="form-control" id="image3_url" name="image3_url" accept="image/*" aria-label="image3_url">
                                @error('image3_url')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                @if($product->image3_url)
                                <div id="image1_label" class="mt-2 text-white">{{ basename($product->image3_url) }}</div>
                                <input type="hidden" name="old_image3_url" value="{{ $product->image3_url }}">
                                @endif
                            </div>


                            <div class="mb-3 ms-3 me-3">
                                <label for="image4_url" class="form-label">Image 4</label>
                                <input type="file" class="form-control" id="image4_url" name="image4_url" accept="image/*" aria-label="image4_url">
                                @error('image4_url')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                @if($product->image4_url)
                                <div id="image1_label" class="mt-2 text-white">{{ basename($product->image4_url) }}</div>
                                <input type="hidden" name="old_image4_url" value="{{ $product->image4_url }}">
                                @endif
                            </div>


                            <div class="mb-3 ms-3 me-3">
                                <label for="image5_url" class="form-label">Image 5</label>
                                <input type="file" class="form-control" id="image5_url" name="image5_url" accept="image/*" aria-label="image5_url" >
                                @error('image5_url')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                @if($product->image5_url)
                                <div id="image1_label" class="mt-2 text-white">Old Image: {{ basename($product->image5_url) }}</div>
                                <input type="hidden" name="old_image5_url" value="{{ $product->image5_url }}">
                                @endif
                            </div>


                            <a href="{{route('products.index')}}" class="btn btn-sm bg-gradient-secondary">Cancel</a>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil elemen input file yang ingin Anda ubah
        const inputImage1 = document.getElementById('image1_url');
        const inputImage2 = document.getElementById('image2_url');
        const inputImage3 = document.getElementById('image3_url');
        const inputImage4 = document.getElementById('image4_url');
        const inputImage5 = document.getElementById('image5_url');

        // Buat fungsi untuk menampilkan nama file yang dipilih pada label
        function updateFileName(input, label) {
            input.addEventListener('change', function () {
                const fileName = this.files[0].name;
                label.textContent = fileName;
            });
        }

        // Panggil fungsi untuk setiap input file yang ingin Anda ubah
        updateFileName(inputImage1, document.getElementById('image1_label'));
        updateFileName(inputImage2, document.getElementById('image2_label'));
        updateFileName(inputImage3, document.getElementById('image3_label'));
        updateFileName(inputImage4, document.getElementById('image4_label'));
        updateFileName(inputImage5, document.getElementById('image5_label'));
    });
</script>
</body>

</html>
