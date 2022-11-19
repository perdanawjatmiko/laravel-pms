<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partial.head')
</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fname.' '.Auth::user()->lname }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
            @include('layouts.partial.sidebar')

            @include('layouts.partial.header')

            <main id="main-container">
                @yield('content')
            </main>
            
            @include('layouts.partial.footer')
        
        </div>

    </div>

    <script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/be_pages_dashboard_v1.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/be_pages_projects_tasks.min.js') }}"></script>
    <!--
        Dashmix JS
        
      Core libraries and functionality
      webpack is putting everything together at assets/_js/main/app.js
    -->
    
    <!-- jQuery (required for jQuery Sparkline plugin) -->
    
    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/chart.js/chart.min.js') }}"></script> 
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/pages/be_comp_dialogs.min.js') }}"></script> --}}
    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- Page JS Helpers (BS Notify Plugin) -->
    {{-- <script>Dashmix.helpersOnLoad(['jq-notify']);</script> --}}
    @include('sweetalert::alert')

    <!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs + Password Strength Meter plugins) -->
    <script>Dashmix.helpersOnLoad(['js-flatpickr', 'jq-datepicker', 'jq-notify']);</script>
    
    <!-- Page JS Code -->

</body>
</html>
