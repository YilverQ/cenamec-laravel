<!DOCTYPE html>
<html>
<head>
	<!--Meta-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--Title-->
	<title>@yield('title') - CENAMEC</title>

	<!--Estilos-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/message.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/nav.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/windowsAlert.css') }}">
	@yield('styles')

	<!--Favicon-->
	<link rel="icon" href="{{ asset('img/logo.jpeg') }}">

	<!--Fuentes-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato&family=Roboto&family=Quicksand&display=swap" rel="stylesheet"> 

	<!--Fuentes de Fontawesome-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/solid.css') }}">

</head>
<body>
	<!--Ventana de alerta-->
	<div class="sheetWindows sheetWindows--hidden">
		<article class="windows">
			<p class="closeText"><i class="fa-solid fa-xmark"></i></p>
			<div class="windows__message">
				<i class="fa-solid fa-circle-exclamation iconTitle iconTitle--danger"></i>
				<h4 class="windows__title">¿Quieres eliminar el elemento?</h4>
				<ul class="header__bottons">
					<span class="windows__confirm">
						<li class="header__loginItem header__loginItem--contrast">
							Si, eliminar
						</li>
					</span>
					<span class="windows__cancel">
						<li class="header__loginItem">
							No
						</li>
					</span>
				</ul>
			</div>
		</article>
	</div>

	<!--Navegación-->
  	<nav class="nav">
		<a href="{{ route('administrator.home') }}" class="nav__home">
		  <img src="{{ asset('img/logo.jpeg') }}" class="nav__logo">
		</a>
		<ul class="nav__menu">
			<a href="{{ route('administrator.home') }}">
				<li class="nav__item">
					<i class="fa-solid fa-house"></i>
					<p>Inicio</p>
				</li>
			</a>
			<a href="{{ route('administrator.index') }}">
				<li class="nav__item">
					<i class="fa-solid fa-users"></i>
					<p>Usuarios</p>
				</li>
			</a>
			<a href="#administrator.statistics">
				<li class="nav__item">
					<i class="fa-solid fa-chart-simple"></i>
					<p>Estadísticas</p>
				</li>
			</a>
			<a href="{{ route('login.logout') }}">
				<li class="nav__item">
					<i class="fa-solid fa-door-open"></i>
					<p>Salir</p>
				</li>
			</a>
		</ul>
	</nav>

	<!-- Messages -->
	@if (session('message-error'))
        <p class="message message--error">{{ session('message-error') }} 
			<i class="close-message fa-solid fa-xmark"></i></i>
		</p>
    @endif	
    @if (session('message-success'))
        <p class="message message--success">{{ session('message-success') }} 
        	<i class="close-message fa-solid fa-xmark"></i></i>
        </p>
    @endif	
	@if (session('message-warning'))
        <p class="message message--warning">{{ session('message-warning') }} 
        	<i class="close-message fa-solid fa-xmark"></i></i>
        </p>
    @endif

	@yield('content')


	<!--Scripts-->
	<script type="module" src="{{ asset('js/components/navItemSelected.js') }}"></script>
	<script type="module" src="{{ asset('js/components/message.js') }}"></script>
	<script type="module" src="{{ asset('js/components/windowsAlert.js') }}"></script>
	@yield('scripts')
</body>
</html>