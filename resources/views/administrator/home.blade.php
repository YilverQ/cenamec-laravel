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
					src="{{ asset('img/administrator/header_icon.png') }}" 
					alt="Imagen principal, wallpaper de un laboratorio">

			<div class="header__information">
				<h2 class="header__title">
					¡Bienvenido {{ $admin->name }}!
				</h2>
				<ul class="header__bottons">
					<a href="{{ route('administrator.edit', $admin) }}">
						<li class="header__loginItem header__loginItem--contrast">
							Editar mis datos
						</li>
					</a>
				</ul>
			</div>
		</header>
	</div>


	<!--Contenedor-->
	<main class="container">
		<!--Information-->
		<article class="article">
			<section class="tab">
				<img class="tab__img" 
						src="{{ asset('img/administrator/administrators.png') }}" 
						alt="Dos jovenes divertidos">
				
				<div class="tab__information">
					<h2 class="tab__title">Gestiona a otros <strong class="color-Text">administradores</strong></h2>
					<p class="tab__description">El administrador es una persona capaz de gestionar a los profesores y estudiantes. Cuando hablamos de gestionar nos referimos a crear, actualizar y eliminar. Tu mismo eres un administrador, y si creas uno nuevo estarás permitiendo a otra persona hacer lo que tu puedes hacer.</p>
					<ul class="header__bottons">
						<a href="{{ route('administrator.create') }}">
							<li class="header__loginItem header__loginItem--contrast">
								Crear un administrador
							</li>
						</a>
						<a href="{{ route('administrator.index') }}">
							<li class="header__loginItem">
								Ver administradores
							</li>
						</a>
					</ul>
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
					<ul class="header__bottons">
						<a href="{{ route('admin.teacher.create') }}">
							<li class="header__loginItem header__loginItem--contrast">
								Crear un profesor
							</li>
						</a>
						<a href="{{ route('admin.teacher.index') }}">
							<li class="header__loginItem">
								Ver profesores
							</li>
						</a>
					</ul>
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
					<ul class="header__bottons">
						<a href="{{ route('admin.student.create') }}">
							<li class="header__loginItem header__loginItem--contrast">
								Crear un estudiante
							</li>
						</a>
						<a href="{{ route('admin.student.index') }}">
							<li class="header__loginItem">
								Ver estudiantes
							</li>
						</a>
					</ul>
				</div>
			</section>
		</article>
	</main>
@endsection