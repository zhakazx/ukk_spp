
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <title>
    Login
  </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <link id="pagestyle" href="{{ asset('assets/css/corporate-ui-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
</head>

<body>
  <main class="main-content mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-md-6 d-flex flex-column justify-content-center">
              <div class="card card-plain mt-4">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-black text-dark display-6">Selamat Datang</h3>
                  <p class="mb-0">Selamat datang! Masukkan data Anda.</p>
                </div>
                <div class="card-body">
                  @if (session()->has('error'))
                  <div class="alert alert-danger alert-dismissible text-dark text-sm fade show" role="alert">
                      <span>{{ session('error') }}</span>
                      <button type="button" class="btn-close text-dark" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  <form action="{{ route('authenticate') }}" method="POST">
                    @csrf
                    <div class="form-group position-relative mb-3">
                      <label>Username</label>
                      <input type="text" class="form-control" placeholder="Masukkan username Anda" name="username">
                      @error('username')
                        <div class="text-danger text-sm">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="form-group position-relative mb-3">
                      <label>Password</label>
                      <input type="password" class="form-control" placeholder="Masukkan password Anda" name="password">
                      @error('password')
                        <div class="text-danger text-sm">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="d-flex align-items-center">
                      <a href="javascript:void(0)" class="text-xs font-weight-bold ms-auto">Lupa password</a>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-dark w-100 mt-4 mb-3">Masuk</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="position-absolute w-40 top-0 end-0 h-100 d-md-block d-none">
                <div class="oblique-image position-absolute fixed-top ms-auto h-100 z-index-0 bg-cover ms-n8" style="background-image:url('../assets/img/image-sign-in.jpg')">
                  <div class="blur mt-12 p-4 text-center border border-white border-radius-md position-absolute fixed-bottom m-4">
                    <h2 class="mt-3 text-dark font-weight-bold">SMKS Mutiara Ilmu Makassar</h2>
                    <h6 class="text-dark text-sm mt-5">Copyright © 2022 ZhakaZx</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/corporate-ui-dashboard.min.js?v=1.0.0') }}"></script>
</body>

</html>