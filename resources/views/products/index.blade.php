<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Products
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
  <div class="wrapper ">
    @extends('dashboard.master')
    @section('nav')
        @include('dashboard.nav')
    
    @endsection
    

    <div class="main-panel">
      <!-- Navbar -->
      @section('page-title', 'Products')
      @section('main')
          @include('dashboard.main')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">List Products</h4>
                  <a href="{{route('products.create')}}"><span class="card-category btn-sm btn btn-gradient-primary">+add new item</span></a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="">No</th>
                          <th class="">Categories</th>
                          <th class="">Product</th>
                          <th class="">Description</th>
                          <th class="">Price</th>
                          <th class="">Stok_Quantity</th>
                          <th class="">Image1</th>
                          <th class="">Image2</th>
                          <th class="">Image3</th>
                          <th class="">Image4</th>
                          <th class="">Image5</th>
                          <th class="">Control</th>
                          <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th> -->
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($product as $idx => $data)
                          <tr>
                            <td>
                              <div class="d-flex px-2 py-1">
                                {{ $idx + 1 . "."}}
                              </div>
                            </td>
                            <td>{{ $data->category_name }}</td>
                            <td>{{ $data->product_name }}</td>
                            @if (strlen($data->description) > 8)
                            <td data-bs-toggle="tooltip" data-bs-placement="right"
                            data-bs-custom-class="custom-tooltip"
                            data-bs-title="{{ $data->description }}" style="cursor: help;">
                              {{ substr($data->description, 0, 8) . '...' }}
                            </td>
                            @else
                            <td>{{ $data->description }}</td>
                            @endif
                            <td>{{ $data->price }}</td>
                            <td>{{ $data->stok_quantity }}</td>
                            <td>
                              <img src="{{ asset($data->image1_url) }}" class="w-30 img-thumbnail zoom " data-bs-toggle="modal" data-bs-target="#fotoModal1{{ $data->id }}" alt="{{ $data->product_name }}" style="cursor: pointer;">
                            </td>

                            <td>
                              @if ($data->image2_url !== null)
                              <img src="{{ asset($data->image2_url) }}" class="w-30 img-thumbnail zoom" data-bs-toggle="modal" data-bs-target="#fotoModal2{{ $data->id }}"  style="cursor: pointer;">
                              @endif
                            </td>


                            <td>
                              @if ($data->image3_url !== null)
                              <img src="{{ asset($data->image3_url) }}" class="w-30 img-thumbnail zoom" data-bs-toggle="modal" data-bs-target="#fotoModal3{{ $data->id }}"  style="cursor: pointer;">
                              @endif
                            </td>

                            <td>
                              @if ($data->image4_url !== null)
                              <img src="{{ asset($data->image4_url) }}" class="w-30 img-thumbnail zoom" data-bs-toggle="modal" data-bs-target="#fotoModal4{{ $data->id }}"  style="cursor: pointer;">
                              @endif
                            </td>

                            <td>
                              @if ($data->image5_url !== null)
                              <img src="{{ asset($data->image5_url) }}" class="w-30 img-thumbnail zoom" data-bs-toggle="modal" data-bs-target="#fotoModal5{{ $data->id }}"  style="cursor: pointer;">
                              @endif
                            </td>

                            <!-- Modal foto1 -->
                            <div class="modal fade" id="fotoModal1{{ $data->id }}" tabindex="-1" aria-labelledby="fotoModalLabel{{ $data->id }}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-lg">               
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $data->product_name }}</h1>
                                      <button type="button" class="btn-sm btn btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
                                    </div>                      
                                    <div class="modal-body">
                                        <img src="{{ asset($data->image1_url) }}" class="img-fluid rounded mx-auto d-block">
                                    </div>
                                </div>
                              </div>
                            </div>
                            <!-- Modal foto2 -->
                            <div class="modal fade" id="fotoModal2{{ $data->id }}" tabindex="-1" aria-labelledby="fotoModalLabel{{ $data->id }}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content"> 
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $data->product_name }}</h1>
                                    <button type="button" class="btn-sm btn btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
                                  </div>     
                                  <div class="modal-body">
                                      <img src="{{ asset($data->image2_url) }}" class="img-fluid rounded mx-auto d-block">
                                  </div>
                                </div>
                              </di>
                            <!-- Modal foto3 -->
                            <div class="modal fade" id="fotoModal3{{ $data->id }}" tabindex="-1" aria-labelledby="fotoModalLabel{{ $data->id }}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content"> 
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $data->product_name }}</h1>
                                    <button type="button" class="btn-sm btn btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
                                  </div>     
                                  <div class="modal-body">
                                      <img src="{{ asset($data->image3_url) }}" class="img-fluid rounded mx-auto d-block">
                                  </div>
                                </div>
                              </di>
                            <!-- Modal foto4 -->
                            <div class="modal fade" id="fotoModal4{{ $data->id }}" tabindex="-1" aria-labelledby="fotoModalLabel{{ $data->id }}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">  
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $data->product_name }}</h1>
                                    <button type="button" class="btn-sm btn btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
                                  </div>    
                                  <div class="modal-body">
                                    <img src="{{ asset($data->image4_url) }}" class="img-fluid rounded mx-auto d-block">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Modal foto3 -->
                            <div class="modal fade" id="fotoModal5{{ $data->id }}" tabindex="-1" aria-labelledby="fotoModalLabel{{ $data->id }}" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-lg">
                                  <div class="modal-content">  
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $data->product_name }}</h1>
                                      <button type="button" class="btn-sm btn btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
                                    </div>    
                                    <div class="modal-body">
                                        <img src="{{ asset($data->image5_url) }}" class="img-fluid rounded mx-auto d-block">
                                    </div>
                                </div>
                              </div>
                            </div>

                            <td class="align-middle text-center text-sm">
                              <form action="{{ route('products.destroy', $data->id) }}" method="post" id="frmDelete{{ $data->id }}">
                                @csrf
                                @method('DELETE')
                              </form>
                              <a href="{{ route('products.edit', $data->id) }}" class="btn-sm btn btn-primary">Edit</a>
                              <a href="#" onclick="confirmDelete('{{ $data->product_name }}', {{ $data->id }})" class="btn-sm btn btn-danger">Delete</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
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
  
  <input type="hidden" id="sts" class="form-control" value="{{ $status ?? '' }}" />
  <input type="hidden" id="psn" class="form-control" value="{{ $pesan ?? '' }}" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    const body = document.getElementById("master");
    const sts = document.getElementById("sts");
    const psn = document.getElementById("psn");
  
    function pesanSimpan() {
      if (sts.value === 'simpan') {
        swal("Good job", psn.value, "success");
      }
    }
  
    body.onload = function() {
      pesanSimpan();
    };
  </script>
  <script>

    //delete allert
    function confirmDelete(categoryName, categoryId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to delete the category "' + categoryName + '". This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm' + categoryId).submit();
            }
        });
    }

</script>


</body>


</html>
