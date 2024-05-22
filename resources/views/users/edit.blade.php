
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
       Edit | Users
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
      @section('page-title', 'Edit Users')
      @section('main')
          @include('dashboard.main')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Users</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $users->id) }}" method="POST" enctype="multipart/form-data" id="frmEditUser">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3 ms-3 me-3">
                            <label for="name" class="form-label">NAME</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $users->name) }}" placeholder="Name">
                        </div>

                        <div class="form-group mb-3 ms-3 me-3">
                            <label for="email" class="form-label">EMAIL</label>
                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $users->email) }}" placeholder="Email">
                        </div>

                        <div class="form-group mb-3 ms-3 me-3">
                            <label for="password" class="form-label">PASSWORD</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password">
                        </div>

                        <div class="form-group mb-3 ms-3 me-3">
                            <label for="roles" class="form-label">ROLES</label>
                            <select class="form-select" name="roles" id="roles">
                                <option value="" disabled>Select Roles</option>
                                <option value="admin" {{ $users->roles === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="owner" {{ $users->roles === 'owner' ? 'selected' : '' }}>Owner</option>
                            </select>
                        </div>

                        <div class="form-group mb-3 ms-3 me-3">
                            <label for="aktif" class="form-label">AKTIF</label>
                            <select class="form-select" name="aktif" id="aktif">
                                <option value="active" {{ $users->aktif === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="not active" {{ $users->aktif === 'not active' ? 'selected' : '' }}>Not Active</option>
                            </select>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-2">
                                <a href="{{ route('users.index') }}" class="btn bg-gradient-secondary w-100">Cancel</a>
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-primary w-100" id="update">Update</button>
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
    </div>
  </div>

  <!-- SweetAlert CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    const btnUpdate = document.getElementById("update");
    const formEdit = document.getElementById("frmEditUser");

    function update() {
        let name = document.getElementById("name").value;
        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;
        let roles = document.getElementById("roles").value;
        let aktif = document.getElementById("aktif").value;

        if (name.trim() === "") {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Name is still empty',
            });
            document.getElementById("name").focus();
        } else if (email.trim() === "") {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Email is still empty',
            });
            document.getElementById("email").focus();
        } else if (roles.trim() === "") {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Roles is required',
            });
            document.getElementById("roles").focus();
        } else {
            formEdit.submit();
        }
    }

    btnUpdate.onclick = function () {
        update();
    };

</script>

</body>

</html>

                                
                                
                                
                                
                                
    