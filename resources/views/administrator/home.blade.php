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
						src="{{ asset('img/administrator/administrators.png') }}" 
						alt="Dos jovenes divertidos">
				
				<div class="tab__information">
					<h2 class="tab__title">Gestiona a otros <strong class="color-Text">administradores</strong></h2>
					<p class="tab__description">El administrador es una persona capaz de gestionar a los profesores y estudiantes. Cuando hablamos de gestionar nos referimos a crear, actualizar y eliminar. Tu mismo eres un administrador, y si creas uno nuevo estarás permitiendo a otra persona hacer lo que tu puedes hacer.</p>
				</div>
			</section>
		</article>

		<article class="article">
			<!--Information-->
			<section class="tab tab--reverse">
				<img class="tab__img tab__img--reverse" 
						src="{{ asset('img/administrator/teachers.png') }}" 
						alt="Profesora enseñando">
				
				<div class="tab__information">
					<h2 class="tab__title">
						<strong class="color-Text">Gestiona a los </strong>profesores
					</h2>
					<p class="tab__description">El profesor es una persona importante. Dicha persona está encargada de crear nuevos cursos y exponer los conocimientos que sean necesarios y que son relevantes para los estudiantes. Un profesor puede crear un curso, actualizarlo cuando guste y eliminarlo en caso de no ser necesario.</p>
				</div>
			</section>
		</article>

		<article class="article">
			<!--Information-->
			<section class="tab">
				<img class="tab__img" 
						src="{{ asset('img/administrator/students.png') }}" 
						alt="Estudiantes">

				<div class="tab__information">
					<h2 class="tab__title">Getiona a los <strong class="color-Text">estudiantes</strong></h2>
					<p class="tab__description">Los estudiantes son las personas a quienes van dirigidos los cursos y quienes tienen la responsabilidad de aprender. Un estudiante puede cursar cualquier curso y al final obtener un certificado.</p>
				</div>
			</section>
		</article>

		<article class="cta_container">
			<section class="cta">
				<div class="cta__info">
					<h2 class="cta__title"><strong class="color-Text">Observa las estadísticas de la aplicación</strong></h2>
					<p class="cta__description">Sumérgete en una nueva sección donde podrás explorar y analizar todos los datos relevantes de nuestra aplicación.</p>
					<ul class="header__bottons">
						<a href="#">
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