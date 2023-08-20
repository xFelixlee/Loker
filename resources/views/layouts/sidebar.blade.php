<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('dashboard') }}" class="brand-link">
        <img src="{{ asset('dist/img/logo.jpg') }}" alt="mylogo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">Agee</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img id="profile-image" src="{{ asset('dist/img/profile.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="javascript:void(0)" class="d-block ml-2">{{ @Auth::user()->name }} ( {{ @Auth::user()->level }} ) </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ url('dashboard') }}" class="nav-link {{ ($title=='Dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- End Dashboard --}}

                {{--  Data Lowongan  --}}
                <li class="nav-item">
                    <a href="#" class="nav-link {{ ($title=='Lowongan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Lowongan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url("lowongan") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url("lowongan/form") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End Data Category  --}}

                {{--  Data Category  --}}
                <li class="nav-item">
                    <a href="#" class="nav-link {{ ($title=='Category') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url("category") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url("category/form") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End Data Category  --}}

                {{--  Data User  --}}
                <li class="nav-item">
                    <a href="#" class="nav-link {{ ($title=='User') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url("user") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url("user/form") }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah Data</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- End Data User  --}}

                {{-- Lamar --}}
                <li class="nav-item">
                    <a href="{{ url('lamar') }}" class="nav-link {{ ($title=='lamar') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-paste"></i>
                        <p>
                            Lamar
                        </p>
                    </a>
                </li>
                {{-- End Lamar --}}

                {{--  Data User  --}}
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            Front End
                        </p>
                    </a>
                </li>
                {{-- End Data User  --}}

                <li class="nav-item">
                    <a href="#" class="nav-link text-danger" onclick="return confirmLogout()">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Log out
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin keluar?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Lanjutkan dengan proses logout di sini
                window.location.href = "{{ route('signout') }}";
            }
        });
        return false; // Hindari aksi logout langsung dari tautan
    }
</script>














