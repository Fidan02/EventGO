<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | EventGO</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="main-bg m-0 p-0">

        
    <div class="row m-0 p-0">
        <div class="col-2 m-0 p-0">

                <!-- Navigation Side Bar -->
            <div style="height: 100vh" class="d-flex flex-column flex-shrink-0 p-3 navbarP" style="width: 280px;">
                <a href="{{ route('home.index') }}" class="d-flex w-100 align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <div class="d-flex align-items-center justify-content-center mt-2 w-100">
                    <img src="{{ asset('images/Logologosm.png') }}" alt="Logo">
                    <span class="fs-4 fw-bold text-light ms-2">EventGO</span>
                </div>
                </a>
                <br>
                <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('home.index') }}" class="@if (\Request::route()->getName() == 'home.index')  navbarLinksCustomActive @endif @if (\Request::route()->getName() !== 'home.index')  navbarLinksCustom @endif" aria-current="page">
                    <i class="fa-solid fa-house me-2"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('gallery-forum.index') }}" class="@if (\Request::route()->getName() == 'gallery-forum.index')  navbarLinksCustomActive @endif @if (\Request::route()->getName() !== 'gallery-forum.index')  navbarLinksCustom @endif">
                    <i class="fa-solid fa-images me-2"></i>
                    Gallery
                    </a>
                </li>
                <li>
                    <a href="{{ route('attending-events', ['id' => Auth::user()->id]) }}" class="@if (\Request::route()->getName() == 'attending-events')  navbarLinksCustomActive @endif @if (\Request::route()->getName() !== 'attending-events')  navbarLinksCustom @endif">
                    <i class="fa-solid fa-check-to-slot me-2"></i>
                    Attending
                    </a>
                </li>
                <li>
                    <a href="{{ route('home.create') }} " class="@if (\Request::route()->getName() == 'home.create')  navbarLinksCustomActive @endif @if (\Request::route()->getName() !== 'home.create')  navbarLinksCustom @endif">
                    <i class="fa-solid fa-square-plus me-2"></i>
                    Create Event
                    </a>
                </li>
                <li>
                    <a href="{{ route('gallery-forum.create') }}" class="@if (\Request::route()->getName() == 'gallery-forum.create')  navbarLinksCustomActive @endif @if (\Request::route()->getName() !== 'gallery-forum.create')  navbarLinksCustom @endif">
                    <i class="bi bi-columns-gap me-2"></i>
                    Create Gallery
                    </a>
                </li>
                <li>
                    <a href="{{ route('chat') }}" class="@if (\Request::route()->getName() == 'chat')  navbarLinksCustomActive @endif @if (\Request::route()->getName() !== 'chat')  navbarLinksCustom @endif">
                    <i class="fa-solid fa-message me-2"></i>
                    Messages
                    </a>
                </li>
                <li>
                    <a href="{{ route('friends') }} " class="@if (\Request::route()->getName() == 'friends')  navbarLinksCustomActive @endif @if (\Request::route()->getName() !== 'friends')  navbarLinksCustom @endif">
                    <i class="fa-solid fa-user me-2"></i>
                        Friends
                    </a>
                </li>
                </ul>
                <hr>
                <div class="dropdown">
                <a href="#" class="d-flex align-items-center navbarLinksCustom text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('storage/avatars/'.Auth::user()->image) }}" alt="" width="32" height="32" class="rounded-circle me-2 object-fit-cover">
                    <strong>{{ Auth::user()->name }}</strong>
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="{{ route('settings') }}">Settings</a></li>
                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <button href="{{ route('logout') }}" class="dropdown-item">
                            Log-out
                        </button>
                    </form>
                    </li>
                </ul>
                </div>
            </div>
        </div>

        <div class="col-10">
            <!-- Page Content -->
            <div class="m-0 p-0">
                @yield('content')
            </div>
        </div>
    </div>



        








        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        <script src=""></script>
</body>
</html>