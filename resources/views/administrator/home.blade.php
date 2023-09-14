@extends('administrator.layout')


@section('title', 'Inicio')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
@endsection



@section('content')
	<!--Header-->
	<div class="header__background header__background--admin">
		<header class="header">
			<img class="header__img" 
					src="{{ $admin->profileimg->url }}" 
					alt="Imagen principal, wallpaper de un laboratorio">

			<div class="header__information">
				<h2 class="header__title">
					¡Bienvenido {{ $admin->firts_name }}!
				</h2>
				<ul class="header__bottons">
					<a href="{{ route('administrator.edit', $admin) }}">
						<li class="header__loginItem header__loginItem--contrast">
							Editar mi perfil
						</li>
					</a>
				</ul>
			</div>
		</header>
	</div>


	<!--Contenedor-->
	<main class="container">
		<!--GRID Article-->
		<article class="bigGrid">


		<!--Information-->
		<article class="article">
			<section class="tab">
				<img class="tab__img" 
						src="{{ asset('img/administrator/users.png') }}" 
						alt="Dos jovenes divertidos">
				
				<div class="tab__information">
					<h2 class="tab__title">Gestiona a los <strong class="color-Text">usuarios</strong></h2>
					<p class="tab__description">En este bloque encontrarás a todas las personas que forman parte de nuestra aplicación. Desde los administradores, encargados de gestionar y dar acceso a los demás usuarios, hasta los profesores, responsables de crear cursos y transmitir conocimientos relevantes. También encontrarás a los estudiantes, quienes tienen la responsabilidad de aprender y pueden acceder a los cursos que deseen para obtener un certificado al finalizar.</p>
					<ul class="header__bottons">
						<a href="{{ route('administrator.index') }}">
							<li class="header__loginItem header__loginItem--contrast">
								Ver usuarios
							</li>
						</a>
					</ul>
				</div>
			</section>
		</article>

		<article class="cta_container">
			<section class="cta">
				<div class="cta__info">
					<h2 class="cta__title"><strong class="color-Text">Observa las estadísticas de la aplicación</strong></h2>
					<p class="cta__description">Sumérgete en una nueva sección donde podrás explorar y analizar todos los datos relevantes de nuestra aplicación.</p>
					<ul class="header__bottons">
						<a href="{{ route('administrator.statistics') }}">
							<li class="header__loginItem">
								Ver estadísticas
							</li>
						</a>
					</ul>
				</div>
				<div class="cta__imgContainer">
					<img class="cta__img cta__img--height" 
						src="{{ asset('img/administrator/height.jpg') }}" 
						alt="Dos jovenes divertidos">
					<img class="cta__img cta__img--widthTop" 
						src="{{ asset('img/administrator/collage.jpg') }}" 
						alt="Dos jovenes divertidos">
					<img class="cta__img cta__img--widthDown" 
						src="{{ asset('img/administrator/collage1.jpg') }}" 
						alt="Dos jovenes divertidos">
				</div>
			</section>
		</article>


		<article class="article">
			<!--Information-->
			<section class="teach teach--inversed">
				<img class="teach__img" 
						src="{{ asset('img/teacher/profile.png') }}" 
						alt="Profesor editando una cuenta">
				
				<div class="teach-description teach-description--colored">
					<h2 class="teach-description__title"><i id="iconTeacher" class="fa-solid fa-chalkboard-user"></i> Administrador {{ $admin->name }}</h2>
				</div>
				<div class="teach-card">
					<h2 class="teach-course__title">Mis datos</h2>
					<ul class="list__description">
						<li class="list__text">
							<b>Número de teléfono: </b><p>{{ $admin->number_phone }}</p>
						</li>
						<li class="list__text">
							<b>Número de cédula: </b><p>{{ $admin->identification_card }}</p>
						</li>
						<li class="list__text">
							<b>Correo Electrónico: </b><p>{{ $admin->email }}</p>
						</li>
					</ul>
				</div>
				<div class="box-bottoms">
					<a href="{{ route('administrator.edit', $admin) }}">
						<li class="header__loginItem header__loginItem--contrast">
							Editar mi perfil
						</li>
					</a>
					<a href="{{ route('administrator.index') }}">
						<li class="header__loginItem">
							Ver lista de usuarios
						</li>
					</a>
				</div>
			</section>
		</article>

		</article>
	</main>
@endsection