<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ asset('images/icon/dsk.png') }}" alt="khayangan" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a class="js-arrow" href="/dashboard">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                @can('admin')
                    <li>
                        <a class="js-arrow" href="/dashboard/fakultas">
                            <i class="fas fa-university"></i>Fakultas</a>
                            
                    </li>
                    <li>
                        <a class="js-arrow" href="{{route('admin.setting')}}">
                            <i class="fas fa-cogs"></i>Setting</a>
                    </li>
                    <li>
                        <a class="js-arrow" href="/dashboard/soal">
                            <i class="fas fa-file-alt"></i>Soal Ujian</a>
                    </li>
                    <li>
                        <a class="js-arrow" href="/dashboard/seleksi">
                            <i class="fas fa-check-circle"></i>Seleksi</a>
                    </li>
                @endcan
            </ul>
        </nav>
    </div>

</aside>
