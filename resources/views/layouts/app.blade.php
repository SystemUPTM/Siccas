<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SICCAS</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>

        localStorage.openpages = Date.now();
        var onLocalStorageEvent = function(e){
        if(e.key == "openpages"){
            // Emit that you're already available.
            localStorage.page_available = Date.now();
        }
        if(e.key == "page_available"){
            alert("Ya tiene abierta otra pestaña.");
            var win = window.open("about:blank", "_self");
            win.close();
        }
        };
        window.addEventListener('storage', onLocalStorageEvent, false);
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top"
            style="background-color: #a90000">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="#">
                        SICCAS
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Ingresar</a></li>
                        @else
                        <li>
                            <a href="{{ route('home') }}">
                                Inicio
                            </a>
                        </li>
                        @role('super-admin|admin')
                        <li>
                            <a href="{{ route('propietario/create') }}">
                                Inscripción
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                Inmuebles <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('impuestos') }}">
                                        Cálculo de Impuesto
                                    </a>
                                </li>
								<li>
                                    <a href="{{ route('notificaciones') }}">
                                        Notificaciones de Impuesto
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endrole
						<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                Reportes <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('reportes.inscripciones') }}">
                                        Inscripción Catastral
                                    </a>
                                </li>
								<li>
                                    <a href="#">
                                        Constancia de No Poseer Vivienda
                                    </a>
                                </li>
								<li>
                                    <a href="{{ route('reportes.constancias') }}">
                                        Constancias
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                Consultar <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('propietario') }}">
                                        Propietarios
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('inmuebles') }}">
                                        Inmuebles
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Registrados
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                Estadística <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('estadisticaDiaria') }}">
                                        Registros Diarios
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('estadisticaMensual') }}">
                                        Registros Mensuales
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('estadisticaAnual') }}">
                                        Registros Anuales
                                    </a>
                                </li>
                            </ul>
                        </li>

                        @role('super-admin')
                        <li>
                            <a href="{{ route('bitacora') }}">
                                Bitácora
                            </a>
                        </li>
                        @endrole
						<li>
                            <a href="../images/manual1.pdf" target="_blank" >
                                Ayuda
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                @role('super-admin')
                                <li>
                                    <a href="{{ route('users.create') }}">Registrar usuario</a>
                                </li>
                                <li>
                                    <a href="{{ route('database.backup') }}">Exportar bd</a>
                                </li>
                                @endrole
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">{{ Session::get('success') }}...</div>
        @endif
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
