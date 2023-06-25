<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layouts.sc_head')
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container">
            <a href="/" class="navbar-brand">
                <span class="brand-text font-weight-light"><b>A g e e</b></span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                {{-- <form class="form-inline ml-0 ml-md-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form> --}}
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('low') }}" class="nav-link">lowongan</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        class="nav-link dropdown-toggle">{{ @Auth::user()->name }}</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="{{ url('biodata') }}" class="dropdown-item">My Profile </a></li>
                        <li>
                            @if(auth()->check() && auth()->user()->isAdmin())
                                <a href="{{ url('dashboard') }}" class="dropdown-item">Dashboard</a>
                            @endif
                        </li>
                        <li><a href="{{ route('signout') }}" class="dropdown-item" style="color: red">Keluar </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    {{-- End Navbar --}}
    <br><br>
    <center>
    <div class="col-sm-4">
        @if (session("text"))
        <div id="alertMessage" class="alert alert-{{ session("type") }} text-center" style="width: 400px;"
            role="alert">
            {{ session("text") }}
        </div>
        @endif
    </div>
    </center>

    {{-- Content --}} 
    @yield('content')
    {{-- Content --}} 

    {{-- Footer --}}
    <footer class="fixed-bottom" style="background-color: #343a40; border-top: 1px solid #dee2e6; color: #869099; padding: 1rem;">
        <div class="float-right d-none d-sm-block">
            <b class="mr-3">Loker 1.0</b>
        </div>
        <strong class="ml-3">Copyright &copy; 2014-2021</strong>
    </footer>
    {{-- End Footer --}}
    @include('layouts.sc_footer')
</body>

</html>


