<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('dashboard/assets/images/favicon.ico')}}">

        <!-- Bootstrap Css -->
        <link href="{{asset('dashboard/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('dashboard/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('dashboard/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-primary bg-pattern">
        <div class="home-btn d-none d-sm-block" style="width: 70%;margin: auto;position: sticky;">
            <a href="index.html"><i class="mdi mdi-home-variant h2 text-white"></i></a>
            <div class="dropdown" style="float: right;">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Languages <i class="mdi mdi-chevron-down"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <a href="index.html" class="logo"><img src="{{asset('dashboard/assets/images/logo-light.png')}}" height="24" alt="logo"></a>
                            <h5 class="font-size-16 text-white-50 mb-4">Responsive Bootstrap 4 Admin Dashboard</h5>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-xl-5 col-sm-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <h5 class="mb-5 text-center">{{__('dashboard/home.welcome_msg')}}</h5>
                                    @if(session()->has('auth_error'))
                                        <div class="alert alert-danger mb-0" role="alert">{{ session()->get('auth_error') }}</div>
                                    @endif
                                    <form class="form-horizontal" action="{{ route('admin-login') }}" method="post" novalidate>
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input name="username" type="text" class="form-control" id="username">
                                                    <label for="username">Email or username</label>
                                                    @error('username')
                                                    <div class="invalid-feedback" style="display: block;text-align: right;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group form-group-custom mb-4">
                                                    <input name="password" type="password" class="form-control" id="userpassword">
                                                    <label for="userpassword">Password</label>
                                                    @error('password')
                                                    <div class="invalid-feedback" style="display: block;text-align: right;">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="custom-control custom-checkbox">
                                                            <input name="remember_me" type="checkbox" class="custom-control-input" id="customControlInline">
                                                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="text-md-right mt-3 mt-md-0">
                                                            <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <button name="login" class="btn btn-success btn-block waves-effect waves-light" type="submit">Log In</button>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <a href="auth-register.html" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Create an account</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end row -->
            </div>
        </div>

        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="{{asset('dashboard/assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('dashboard/assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('dashboard/assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('dashboard/assets/libs/node-waves/waves.min.js')}}"></script>

        <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

        <script src="{{asset('dashboard/assets/js/app.js')}}"></script>

    </body>
</html>
