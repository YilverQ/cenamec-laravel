<!DOCTYPE html>
<html>
<head>
	<!--Meta-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--Title-->
	<title>@yield('title') - CENAMEC</title>

	<!--Estilos-->
	<link rel="stylesheet" type="text/css" href="./css/normalize.css">
	<link rel="stylesheet" type="text/css" href="./css/main.css">
	<link rel="stylesheet" type="text/css" href="./css/login/nav.css">
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
		<a href="/home" class="nav__home">
		  <img src="./img/logo.png" class="nav__logo">
		  <h1 class="nav__title">CENAMEC</h1>
		</a>
		<ul class="nav__menu">
			<a href="/home">
				<li class="nav__item">
					<i class="fa-solid fa-house"></i>
					<p>Inicio</p>
				</li>
			</a>
			<a href="/login">
				<li class="nav__item">
					<i class="fa-solid fa-arrow-right-to-bracket"></i>
					<p>Ingresar</p>
				</li>
			</a>
			<a href="/signup">
				<li class="nav__item">
					<i class="fa-solid fa-user-plus"></i>
					<p>Registrar</p>
				</li>
			</a>
		</ul>
	</nav>

	@yield('content')


	<!--Scripts-->
	<script type="module" src="./js/login/navItemSelected.js"></script>
	@yield('scripts')
</body>
</html>