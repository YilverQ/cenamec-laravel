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
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/footer.css') }}">

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
	<!--Navegación-->
  	<nav class="nav">
  		<div class="nav__contentLogos">
			<a href="{{ route('login.home') }}" class="nav__home">
			  <img src="{{ asset('img/logo1.png') }}" class="nav__logo">
			</a>
  		</div>
		<ul class="nav__menu">
			<a href="{{ route('login.home') }}">
				<li class="nav__item">
					<i class="fa-solid fa-house"></i>
					<p>Inicio</p>
				</li>
			</a>
			<a href="{{ route('login.login') }}">
				<li class="nav__item">
					<i class="fa-solid fa-arrow-right-to-bracket"></i>
					<p>Ingresar</p>
				</li>
			</a>
			<a href="{{ route('login.signup') }}">
				<li class="nav__item">
					<i class="fa-solid fa-user-plus"></i>
					<p>Registrar</p>
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


	<!-- Footer -->
	<footer class="footer">
		<div class="endTitle">
			<h3 class="endTitle__title">Aprende Ciencias con el CENAMEC</h3>
			<ul class="header__bottons">
				<a href="{{ route('login.signup') }}">
					<li class="header__loginItem">
						Empieza ahora
					</li>
				</a>
			</ul>
		</div>
		<div class="endSections">
			<div class="endSection">
				<h4 class="endSection__title">Aprende más</h4>
				<ul class="endSection__itemBox">
					<li class="endSection__item"><a target="_blank" href="https://linktr.ee/fundacioncenamec">Libros</a></li>
					<li class="endSection__item">
						<a target="_blank" href="https://www.youtube.com/@DiplomadoenCienciayCalidadEduc">
							Diplomado en ciencia y calidad educativa
						</a>
					</li>
				</ul>
			</div>
			<div class="endSection">
				<h4 class="endSection__title">Otras Páginas</h4>
				<ul class="endSection__itemBox">
					<li class="endSection__item">
						<a target="_blank" href="http://me.gob.ve/">
							MPPPE
						</a>
					</li>
					<li class="endSection__item">
						<a target="_blank" href="https://www.instagram.com/fundacioncenamec/">
							CENAMEC
						</a>
					</li>
					<li class="endSection__item">
						<a target="_blank" href="https://twitter.com/vs_cites">
							CITES
						</a>
					</li>
					<li class="endSection__item">
						<a target="_blank" href="#">
							Observatorio de la calidad educativa
						</a>
					</li>
					<li class="endSection__item">
						<a target="_blank" href="https://www.unesco.org/es/countries/ve">
							UNESCO
						</a>
					</li>
					<li class="endSection__item">
						<a target="_blank" href="https://www.instagram.com/somos_unem/">
							UNEM
						</a>
					</li>
					<li class="endSection__item">
						<a target="_blank" href="#">
							Científicos en acción
						</a>
					</li>
				</ul>
			</div>
			<div class="endSection">
				<h4 class="endSection__title">Redes Sociales</h4>
				<ul class="endSection__itemBox">
					<li class="endSection__item"><a target="_blank" href="https://www.instagram.com/fundacioncenamec/">Instagram</a></li>
					<li class="endSection__item"><a target="_blank" href="https://www.facebook.com/CENAMEC.FUNDACION/">Facebook</a></li>
					<li class="endSection__item"><a target="_blank" href="https://twitter.com/Funda_cenamec1">Twitter</a></li>
					<li class="endSection__item"><a target="_blank" href="https://www.youtube.com/channel/UCpU6O2dZSh9IgBd6sVzPiPg">Youtube</a></li>
				</ul>
			</div>
		</div>
	</footer>


	<!--Scripts-->
	<script type="module" src="{{ asset('js/components/navItemSelected.js') }}"></script>
	<script type="module" src="{{ asset('js/components/message.js') }}"></script>
	@yield('scripts')
</body>
</html>