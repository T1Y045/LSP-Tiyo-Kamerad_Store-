<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Customer List
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
      @section('page-title', 'Customer List')
      @section('main')
          @include('dashboard.main')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Customer List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>NO.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Phone</th>
                        <th>Address1</th>
                        <th>Address2</th>
                        <th>Address3</th>
                        <th class="text-center">Control</th>
                      </thead>
                      <tbody>
                        @foreach ($customer as $idx => $data)
                        <tr>
                          <td>
                            {{ $idx + 1 . " . " }}
                          </td>
                          <td>
                            {{ $data->name }}
                          </td>
                          <td>
                            {{ $data->email }}
                          </td>
                          @if (strlen($data->password) > 8)
                          <td data-bs-toggle="tooltip" data-bs-placement="right"
                          data-bs-custom-class="custom-tooltip"
                          data-bs-title="{{ $data->password }}" style="cursor: help;">
                            {{ substr($data->password, 0, 8) . '...' }}
                          </td>
                          @else
                          <td>{{ $data->password }}</td>
                          @endif
                          <td>
                            {{ $data->phone }}
                          </td>
                          <td>
                            {{ $data->address1 }}
                          </td>
                          <td>
                            {{ $data->address2 }}
                          </td>
                          <td>
                            {{ $data->address3 }}
                          </td>
                          <td class="align-middle text-center text-sm">
                            <form action="{{ route('customer.destroy', $data->id) }}" method="post" id="frmDelete{{ $data->id }}">
                            @csrf
                            @method('DELETE')
                            </form>
                            <a href="#" onclick="confirmDelete('{{ $data->name }}', {{ $data->id }})" class="btn-sm btn btn-danger">Delete</a>
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
    function confirmDelete(name, nameId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to delete ' + name + '. This action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna mengklik 'Yes', submit form untuk menghapus data
                document.getElementById('frmDelete' + nameId).submit();
            }
        });
    }
</script>

</body>


</html>
