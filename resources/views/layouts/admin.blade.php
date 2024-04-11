<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ecit Store') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        <header>

            <nav class=" w-100 navbar navbar-expand-lg  shadow sticky-top">
                <div class="w-100 d-flex justify-content-between">
                    <div class="mx-3" style="width:5%">
                        <img src="{{ Vite::asset("resources/img/logo.jpg") }}" alt="" style="max-width: 100%">
                    </div>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarScroll">
                        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll d-flex justify-content-between"
                            style="--bs-scroll-height: 100px;">

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Home</a>
                            </li>

                            <li class="nav-item text-nowrap ms-2">
                                <a class="nav-link text-dark " href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                    </div>
                </div>
            </nav>
        </header>

        <div class="container-fluid vh-100">
            <div class="row h-100">

                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block navbar-dark sidebar collapse shadow" style="background-color: #359ed0">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('admin.profile') }}">
                                    <i class="fa-solid fa-user fa-lg fa-fw"></i> Profile
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('admin.items.index') }}">
                                    <i class="fa-solid fa-object-group fa-style fa-lg fa-fw text-white"></i> Items
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('admin.items.index') }}">
                                    <i class="fa-solid fa-layer-group fa-style fa-lg fa-fw text-white"></i> Category
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('admin.tags.index') }}">
                                    <i class="fa-solid fa-tags fa-style fa-lg fa-fw text-white"></i> Tags
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('admin.items.trashed') }}"">
                                    <i class="fa-solid fa-trash fa-style fa-lg fa-fw text-white"></i> Deleted Items
                                </a>
                            </li>
                        </ul>


                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>
