<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('vendor/cone/assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('vendor/cone/assets/css/icons.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('vendor/cone/assets/css/app.min.css') }}"/>
</head>
<body>
<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="ml-1">
                    <i class="mdi mdi-earth"></i>
                    <i class="mdi mdi-chevron-down"></i>
                </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <div class="dropdown-item notify-item @if(App::currentLocale() == 'en') active @endif">
                        <a href="{{ route('cone-language', 'en') }}">
                            English
                        </a>
                    </div>
                    <div class="dropdown-item notify-item @if(App::currentLocale() == 'it') active @endif">
                        <a href="{{ route('cone-language', 'it') }}">
                            Italia
                        </a>
                    </div>
                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    {{--                <img src="assets/images/users/user-1.jpg" alt="user-image" class="rounded-circle">--}}
                    <span class="ml-1">
                    {{ auth()->user()->name }}
                    <i class="mdi mdi-chevron-down"></i>
                </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                    <!-- item-->
                    <form action="{{ route(config('cone.route-to-logout')) }}" method="POST">
                        @csrf

                        <button type="submit" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>{{ __('cone::license.logout') }}</span>
                        </button>
                    </form>
                </div>
            </li>
        </ul>

    </div>
    <!-- end Topbar -->

    <!-- end Topbar -->

    <div class="container-fluid">
        <div class="content">
            <div class="row align-items-center vh-100">
                <div class="col-12 col-md-6 col-lg-4 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            {{ __('cone::license.title') }}
                        </div>
                        <form action="{{ route('activate-license') }}" method="POST">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="key" class="form-label">{{ __('cone::license.form.key') }}</label>
                                    <input type="text" name="key" id="key" class="form-control @error('key') is-invalid @enderror" placeholder="{{ __('cone::license.form.key') }}"/>
                                    @error('key')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mx-auto" style="width: fit-content;">
                                    <button type="submit" class="btn btn-primary float-center">
                                        {{ __('cone::license.form.enter') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/cone/assets/js/vendor.js') }}"></script>
    <script src="{{ asset('vendor/cone/assets/js/app.min.js') }}"></script>
</div>
</body>
</html>
