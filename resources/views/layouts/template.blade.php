<!DOCTYPE html>
{{--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
--}}
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Loker</title>
    <link rel="website icon" type="JPEG" href="dist/img/icon.png">

    @include('layouts.sc_head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('layouts.navbar')
        @include('layouts.sidebar')

        {{-- Content Wrapper. Contains page content --}}
        <div class="content-wrapper">
            {{-- Content Header (Page header) --}}
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h1 class="m-0">@yield('page-title')</h1>
                        </div>{{-- /.col --}}
                        <div class="col-sm-4">
                            @if (session("text"))
                            <div id="alertMessage" class="alert alert-{{ session("type") }} text-center" style="width: 400px;"
                                role="alert">
                                {{ session("text") }}
                            </div>
                            @endif
                        </div>
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">@yield('page-title')</li>
                            </ol>
                        </div>{{-- /.col --}}
                        {{-- Notif --}}
                    </div>{{-- /.row --}}
                </div>{{-- /.container-fluid --}}
            </div>
            {{-- /.content-header --}}

            {{-- Main content --}}
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>{{-- /.container-fluid --}}
            </div>
            {{-- /.content --}}
        </div>
        {{-- /.content-wrapper --}}

        {{-- Control Sidebar --}}
        <aside class="control-sidebar control-sidebar-dark">
            {{-- Control sidebar content goes here --}}
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        {{-- /.control-sidebar --}}

        {{-- Main Footer --}}
        <footer class="main-footer">
            {{-- To the right --}}
            <div class="float-right d-none d-sm-inline">
                <strong>CREATE BY ... :3</strong>
            </div>
            {{-- Default to the left --}}
            <strong>Copyright &copy; {{ date('Y') }} - Loker </strong>
        </footer>
    </div>
    {{-- ./wrapper --}}
    @include('layouts.sc_footer')

</body>

</html>
