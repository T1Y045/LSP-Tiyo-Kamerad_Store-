<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Create | Users
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
      @section('page-title', 'Create Users')
      @section('main')
          @include('dashboard.main')
      <!-- End Navbar -->

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Create Users</h6>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="card border-1 m-3 pt-3">
                                <form action="{{route('users.store')}}" method="post" id="frmusers">
                                @csrf
                                    <div class="form-group mb-3 ms-3 me-3">
                                        <label for="name" class="form-label">NAME</label>
                                        <input type="text" name="name" id="name"class="form-control" placeholder="name" arial-label="name" aria-describedby="email-addon">
                                    </div>


                                    <div class="form-group mb-3 ms-3 me-3">
                                        <label for="email" class="form-label">EMAIL</label>
                                        <input type="text" name="email" id="email"class="form-control" placeholder="email" arial-label="email" aria-describedby="email-addon">
                                    </div>


                                    <div class="form-group mb-3 ms-3 me-3">
                                        <label for="password" class="form-label">PASSWORD</label>
                                        <input type="password" name="password" id="password"class="form-control" placeholder="password" arial-label="password" aria-describedby="email-addon">
                                    </div>

                                    <div class="form-group mb-3 ms-3 me-3">
                                        <label for="roles" class="form-label">ROLES</label>
                                        <select class="form-select" name="roles" id="roles">
                                            <option value="" selected disabled>Select Roles</option>
                                            <option value="admin">Admin</option>
                                            <option value="owner">Owner</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3 ms-3 me-3">
                                        <label for="aktif" class="form-label">AKTIF</label>
                                        <select class="form-select" name="aktif" id="aktif">
                                            <option value="1">Active</option>
                                            <option value="0">Not Active</option>
                                        </select>
                                    </div>

                                    <div class="row ms-3 me-3 justify-content-end">
                                        <div class="col-2">
                                            <a href="{{route('users.index')}}" class="btn bg-gradient-secondary w-100">Cancel</a>
                                        </div>
                                        <div class="col-2">
                                            <button type="button" class="btn btn-primary w-100" id="save">Save</button>
                                        </div>
                                    </div>
                                </form>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tutup Tabel -->

        <footer class="footer pt-5  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <script>
                                document.write(new Date().getFullYear())
                            </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.instagram.com/abel_10m35?igshid=qhq4hqteazpz" class="font-weight-bold" target="_blank">Frost Abel</a>
                                for a better web.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
    const btnSave = document.getElementById("save");
    const form = document.getElementById("frmusers");

    function simpan() {
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
        } else if (password.trim() === "") {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Password is still empty',
            });
            document.getElementById("password").focus();
        } else if (roles.trim() === "") {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Roles is required', 
            });
            document.getElementById("roles").focus();
        } else {
            form.submit();
        }
    }

    btnSave.onclick = function () {
        simpan();
    };
</script>

@endsection
