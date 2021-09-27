<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Dashboard - Login</title>

    <meta name="description" content="Dashboard">
    <meta name="author" content="Dashboard">
    <meta name="robots" content="Dashboard, Dashboard">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Dashboard - Dashboard">
    <meta property="og:site_name" content="Dashboard">
    <meta property="og:description" content=" ">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('backend/assets/media/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('backend/assets/media/favicons/apple-touch-icon-180x180.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('backend/assets/css/dashmix.min.css')}}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
    <!-- END Stylesheets -->
  </head>
  <body>
   
    <div id="page-container">

      <!-- Main Container -->
      <main id="main-container">

        <!-- Page Content -->
        <div class="row g-0 justify-content-center bg-body-dark">
          <div class="hero-static col-sm-10 col-md-8 col-xl-6 d-flex align-items-center p-2 px-sm-0">
            <!-- Sign In Block -->
            <div class="block block-rounded block-transparent block-fx-pop w-100 mb-0 overflow-hidden bg-image" style="background-image: url('backend/assets/media/photos/photo20@2x.jpg');">
              <div class="row g-0">
                <div class="col-md-6 order-md-1 bg-body-extra-light">
                  <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                    <!-- Header -->
                    <div class="mb-2 text-center">
                      <a class="link-fx fw-bold fs-1" href="index.html">
                        <span class="text-dark">KI</span><span class="text-primary">BO</span>
                      </a>
                      <p class="text-uppercase fw-bold fs-sm text-muted">Sign In</p>
                    </div>
                    <!-- END Header -->

                   

                    <!-- Sign In Form -->
                    <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <form class="js-validation-signin" method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="mb-4">
                        <input  type="email"  class="form-control form-control-alt" id="email" required  name="email" placeholder="email">
                      </div>
                      <div class="mb-4">
                        <input type="password" class="form-control form-control-alt" id="login-password" name="password" placeholder="Password">
                      </div>
                      <div class="mb-4">
                        <button type="submit" class="btn w-100 btn-hero btn-primary">
                          <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Se Connecter
                        </button>
                      </div>
                    </form>
                    <!-- END Sign In Form -->
                  </div>
                </div>
                <div class="col-md-6 order-md-0 bg-primary-dark-op d-flex align-items-center">
                  <div class="block-content block-content-full px-lg-5 py-md-5 py-lg-6">
                    <div class="d-flex">
                      <a class="flex-shrink-0 img-link me-3" href="javascript:void(0)">
                        <img class="img-avatar img-avatar-thumb" src="{{ asset('backend/assets/media/avatars/avatar14.jpg')}}" alt="">
                      </a>
                      <div class="flex-grow-1">
                        <p class="text-white fw-semibold mb-1">
                          Se connecter pour continuer!
                        </p>
                        <x-jet-validation-errors class="alert alert-danger" />
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END Sign In Block -->
          </div>
        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!--
      Dashmix JS

      Core libraries and functionality
      webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="{{ asset('backend/assets/js/dashmix.app.min.js')}}"></script>

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="{{ asset('backend/assets/js/lib/jquery.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('backend/assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('backend/assets/js/pages/op_auth_signin.min.js')}}"></script>
  </body>
</html>
