<div class="sidebar-wrapper h-auto p-3 fixed-top d-flex">
    <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
        aria-controls="offcanvasWithBothOptions"><i class="fa-solid fa-bars"></i></button>
</div>
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="sidebar"
    aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <button class="offcanvas-title btn btn-dark" id="offcanvasWithBothOptionsLabel"><i class="fa-solid fa-bars fs-5"
                data-bs-dismiss="offcanvas"></i></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('home') ? 'active' : '' }} fw-bold fs-4" aria-current="page"
                    href="{{ route('home') }}">
                    <i class="fa-solid fa-house"></i>
                    <small>Home</small>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link {{ Request::is('data') ? 'active' : '' }} fw-bold fs-4" aria-current="page" href="#">
                    <i class="fa-solid fa-list-check"></i>
                    <small>Data</small>
                </a>
            </li>
        </ul>
    </div>
</div>