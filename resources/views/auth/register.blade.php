<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Register</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="../../assets/css/mdb.min.css" />
</head>
<body>
  <!--Main Navigation-->
  <header>
    <style>
      #intro {
        background-image: url(../../assets/img/bg.jpg);
        height: 100vh;
      }

    </style>

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8 border-2">
                <form action="{{ route('register.save') }}" method="POST" class="bg-transparent rounded border border-white shadow-5-strong p-5">
                    @csrf
                    <!-- Name input -->
                    <div class="form-outline mb-3" data-mdb-input-init>
                        <input type="text" id="name" name="name" class="form-control" />
                        <label class="form-label" for="name">Name</label>
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Email input -->
                    <div class="form-outline mb-3" data-mdb-input-init>
                      <input type="email" id="email" name="email" class="form-control" />
                      <label class="form-label" for="email">Email address</label>
                      @error('email')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
    
                    <!-- Password input -->
                    <div class="form-outline mb-3" data-mdb-input-init>
                      <input type="password" name="password" id="password" class="form-control" />
                      <label class="form-label" for="password">Password</label>
                      @error('password')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
    
                    <!-- Password confirm -->
                    <div class="form-outline mb-3" data-mdb-input-init>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
                        <label class="form-label" for="password_confirmation">Password Confirm</label>
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <!-- Phone input -->
                    <div class="form-outline mb-3" data-mdb-input-init>
                        <input type="text" id="phone" name="phone" class="form-control" />
                        <label class="form-label" for="phone">Phone</label>
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <!-- Address1 input -->
                    <div class="form-outline mb-3" data-mdb-input-init>
                        <input type="text" id="address1" name="address1" class="form-control" />
                        <label class="form-label" for="address1">Address 1</label>
                        @error('address1')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <!-- Address2 input -->
                    <div class="form-outline mb-3" data-mdb-input-init>
                        <input type="text" id="address2" name="address2" class="form-control" />
                        <label class="form-label" for="address2">Address 2</label>
                        @error('address2')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <!-- Address3 input -->
                    <div class="form-outline mb-3" data-mdb-input-init>
                        <input type="text" id="address3" name="address3" class="form-control" />
                        <label class="form-label" for="address3">Address 3</label>
                        @error('address3')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <!-- Submit button -->
                    <button type="submit" class="mb-3 btn btn-danger btn-block">Register</button>
                  </div>
                </div>
                <div class="col text-center">
                  <!-- Simple link -->
                  <span>Have account? <a href="{{ route('login') }}">Login</a> Here</span>
            </div>
              </form>
              @if(session('error'))
              <div>{{ session('error') }}</div>
              @endif
      
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Background image -->
  </header>
  <!--Main Navigation-->

  
    <script type="text/javascript" src="../../assets/js/mdb.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(Session::has('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ Session::get('error') }}',
            });
        @endif
    </script>
</body>
</html>
