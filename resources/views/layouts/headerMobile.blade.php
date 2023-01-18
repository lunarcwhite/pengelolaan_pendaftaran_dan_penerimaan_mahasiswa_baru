<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="{{ asset('images/icon/dsk.png') }}" alt="Khayangan" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
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
                    <a class="js-arrow" href="/dashboard/soal">
                        <i class="fas fa-file-alt"></i>Soal Ujian</a>
                </li>
                <li>
                    <a class="js-arrow" href="/dashboard/seleksi">
                        <i class="fas fa-check-circle"></i>Seleksi</a>
                </li>
                <li>
                    <a class="js-arrow" href="{{route('admin.setting')}}">
                        <i class="fas fa-cogs"></i>Setting</a>
                </li>
                @endcan
            </ul>
        </div>
    </nav>
</header>