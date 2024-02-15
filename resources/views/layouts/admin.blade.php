<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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

        <div class="admin p-3">
            {{-- header --}}
            <header class="navbar container sticky-top flex-md-nowrap py-3 px-5 rounded-4">
                <div class="cont">
                    <a class="d-none d-md-block col-md-3 col-lg-2 me-0 px-3" href="/">Portfolio</a>
                    <button class="menu d-md-none collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
                <div class="navbar-nav">
                    <div class="nav-item text-nowrap ms-2">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </header>
            {{-- /header --}}

            <div class="container h-100">
                <div class="row h-100">
                    {{-- sidebar --}}
                    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collaps rounded-4 mt-3">
                        <div class="position-sticky py-3">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                                        href="{{ route('admin.dashboard') }}">
                                        <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                                        href="{{ route('admin.projects.index') }}">
                                        <i class="fa-solid fa-diagram-project fa-lg fa-fw"></i> Visualizza Progetti
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                                        href="{{ route('admin.types.index') }}">
                                        <i class="fa-solid fa-code fa-lg fa-fw"></i> Visualizza Tipi
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                                        href="{{ route('admin.technologies.index') }}">
                                        <i class="fa-solid fa-layer-group fa-lg fa-fw"></i> Vis. Tecnologie
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    {{-- /sidebar --}}

                    {{-- main --}}
                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                        @yield('content')
                    </main>
                    {{-- /main --}}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
