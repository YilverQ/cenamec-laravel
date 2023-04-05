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
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/nav.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/message.css') }}">
	@yield('styles')

	<!--Favicon-->
	<link rel="icon" href="./img/logo.png">

	<!--Fuentes-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato&family=Roboto&family=Quicksand&display=swap" rel="stylesheet"> 

	<!--Fuentes de Fontawesome-->
	<script src="https://kit.fontawesome.com/9d5a264107.js" crossorigin="anonymous"></script>
</head>
<body>
	<!--Navegación-->
  	<nav class="nav">
		<a href="{{ route('administrator.home') }}" class="nav__home">
		  <img src="{{ asset('img/logo.png') }}" class="nav__logo">
		  <h1 class="nav__title">CENAMEC</h1>
		</a>
		<ul class="nav__menu">
			<a href="{{ route('administrator.home') }}">
				<li class="nav__item">
					<i class="fa-solid fa-house"></i>
					<p>Inicio</p>
				</li>
			</a>
			<li class="nav__item nav__item--menu">
				<i class="fa-solid fa-list-check"></i>
				<p>Gestión</p>
					
				<!-- Este es el Submenu/Se puede añadir o eliminar elementos. -->
				<div class="menuMenu">
				<ul class="submenu">
					<a href="{{ route('administrator.index') }}" class="submenu__item">
						<li>Administradores</li>
					</a>
					<a href="{{ route('teacher.index') }}" class="submenu__item">
						<li>Profesores</li>
					</a>
					<a href="{{ route('student.index') }}" class="submenu__item">
						<li>Estudiantes</li>
					</a>
				</ul>
				</div>
			</li>
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
	@yield('scripts')
</body>
</html>