<div class="sidebar-wrapper h-auto p-3 fixed-top d-flex w-25">
    <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
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
                <a class="nav-link {{ Request::is('home') ? 'active' : '' }} fw-bold fs-4 " aria-current="page"
                    href="{{ route('home') }}">
                    <i class="fa-solid fa-house"></i>
                    <small>Home</small>
                </a>
            </li>
            <div type="button" class="dropdown-toggle fw-bold fs-4" data-bs-toggle="dropdown">
                <i class="fa-solid fa-list-check"></i>
                <small>Data</small>
            </div>
            <ul class="dropdown-menu nav-item">
                <a href="/data" class="dropdown-item {{ Request::is('data') ? 'active' : '' }} fw-bold">Data
                    List</a>
                <a href="/data/create"
                    class="dropdown-item {{ Request::is('data/create*') ? 'active' : '' }} fw-bold">Create
                    Data</a>
                <a href="/data/edit" class="dropdown-item fw-bold">Edit Data</a>
            </ul>

        </ul>
    </div>
    <div class="btn-group dropend">

    </div>
    <div class="offcanvas-footer d-flex gap-2 p-2">
        <i class="fa-solid fa-user"></i>
        <small class="fw-bold text-capitalize">{{ $user->name }}</small>
        <a class="nav-link fw-bold ms-auto" href="{{ route('logout') }}">Logout<span class="m-2"><i
                    class="fa-solid fa-right-from-bracket"></i></span></a>
    </div>
</div>