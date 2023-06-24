<!-- Main Sidebar Container -->
<aside class="sidebar-info elevation-1">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu" >
                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ url('biodata') }}" class="nav-link {{ ($title=='Biodata') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Biodata
                        </p>
                    </a>
                </li>
                {{-- Pengalaman --}}
                <li class="nav-item">
                    <a href="{{ url('pengalaman') }}" class="nav-link {{ ($title=='Pengalaman') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Pengalaman
                        </p>
                    </a>
                </li>
                {{-- Pendidikan --}}
                <li class="nav-item">
                    <a href="{{ url('pendidikan') }}" class="nav-link {{ ($title=='Pendidikan') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Pendidikan
                        </p>
                    </a>
                </li>
                {{-- Resume --}}
                <li class="nav-item">
                    <a href="{{ url('resume') }}" class="nav-link {{ ($title=='resume') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-upload"></i>
                        <p>
                            Resume
                        </p>
                    </a>
                </li>
                {{-- History --}}
                <li class="nav-item">
                    <a href="{{ url('history') }}" class="nav-link {{ ($title=='history') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            History
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
