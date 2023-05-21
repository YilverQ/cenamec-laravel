@extends('teacher.layout')


@section('title', 'Bienvenido Profesor')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
@endsection



@section('content')
	<!--Header-->
	<div class="header__background header__background--teacher">
		<header class="header">
			<img class="header__img" 
					src="{{ asset('img/teacher/header_icon.png') }}" 
					alt="Imagen de una profesora">

			<div class="header__information">
				<h2 class="header__title">
					¡Bienvenido {{ $teacher->name }}!
				</h2>
				<ul class="header__bottons">
					<a href="{{ route('teacher.edit') }}">
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
			<section class="teach">
				<img class="teach__img" 
						src="{{ asset('img/teacher/teach.png') }}" 
						alt="Profesor enseñando una materia">
				
				<div class="teach-description">
					<h2 class="teach-description__title">¿Te gusta enseñar?</h2>
					<h4 class="teach-description__subtitle">¡Aquí podrás crear tus cursos enfocados en la ciencia!</h4>
					<p class="teach-description__text">
						Mediante técnicas de estudios podrás enseñar de una forma fácil y entretenida. Conecta con tus estudiantes, aprovecha la tecnología y utilizala a tu favor.
					</p>
				</div>
				<div class="teach-card">
					<h2 class="teach-course__title">{{ $course->name }}</h2>
					<p class="teach-course__text">
						{{ $course->description }}
					</p>
					<ul class="list__actions">
						<a href="{{ route('teacher.course.show', $course) }}" title="Ver más" class="icon icon--show"><i class="fa-solid fa-eye"></i> Ver más</a> 
	                    <a href="{{ route('teacher.course.edit', $course) }}" title="Editar" class="icon icon--edit"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
					</ul>
				</div>
				<div class="box-bottoms">
					<a href="{{ route('teacher.course.create') }}">
						<li class="header__loginItem header__loginItem--contrast">
							Crear un curso
						</li>
					</a>
					<a href="{{ route('teacher.course.index') }}">
						<li class="header__loginItem">
							Ver mis cursos
						</li>
					</a>
				</div>
			</section>
		</article>


		<article class="article">
			<section class="tab">
				<img class="tab__img" 
						src="{{ asset('img/teacher/module.png') }}" 
						alt="Aprende con pequeños pasos">
				
				<div class="tab__information">
					<h2 class="tab__title">Crea <strong class="color-Text">módulos educativos</strong> para tus cursos</h2>
					<p class="tab__description">Los módulos educativos son representaciones de niveles acádemicos que tiene un curso, sirve para dividir la información en segmentos pequeños y dinámicos, cabe mencionar que estos están relacionados con los temas principales de tus cursos es por ello que podrás crear cuantos gustes y requieran tus cursos.</p>
					<ul class="header__bottons">
						<a href="{{ route('teacher.module.create') }}">
							<li class="header__loginItem header__loginItem--contrast">
								Crear módulo
							</li>
						</a>
						<a href="{{ route('teacher.module.index') }}">
							<li class="header__loginItem">
								Ver módulos
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
						src="{{ asset('img/teacher/note.png') }}" 
						alt="lápiz y libreta">
				
				<div class="tab__information">
					<h2 class="tab__title">
						Crea <strong class="color-Text">notas educativas</strong> para tus cursos
					</h2>
					<p class="tab__description">Las notas educativas son como su nombre lo indica, notas. Estos continen detalles importantes del tema de estudio. Al ser fragmentos de información permite al estudiante aprender en secciones y sin tener que abrumarse por la cantidad de información.</p>
				</div>
			</section>
		</article>

		<article class="article">
			<!--Information-->
			<section class="tab">
				<img class="tab__img" 
						src="{{ asset('img/teacher/question.png') }}" 
						alt="formulario">

				<div class="tab__information">
					<h2 class="tab__title">Crea <strong class="color-Text">cuestionarios</strong> para tus cursos</h2>
					<p class="tab__description">Los cuestionarios representa una parte fundamental para tus cursos, cada uno es un examen de selección, mediante preguntas y respuestas programadas podrás asegurarte que el estudiante ha aprendido lo necesario para aprobar el módulo.</p>
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
					<h2 class="teach-description__title"><i id="iconTeacher" class="fa-solid fa-chalkboard-user"></i> Profesor {{ $teacher->name }}</h2>
				</div>
				<div class="teach-card">
					<h2 class="teach-course__title">Tus datos</h2>
					<ul class="list__description">
						<li class="list__text">
							<b>Apellido: </b><p>{{ $teacher->lastname }}</p>
						</li>
						<li class="list__text">
							<b>Número de cédula: </b><p>{{ $teacher->identification_card }}</p>
						</li>
						<li class="list__text">
							<b>Correo Electrónico: </b><p>{{ $teacher->email }}</p>
						</li>
					</ul>
				</div>
				<div class="box-bottoms">
					<a href="{{ route('teacher.edit') }}">
						<li class="header__loginItem header__loginItem--contrast">
							Editar mis datos
						</li>
					</a>
					<a href="{{ route('teacher.profile') }}">
						<li class="header__loginItem">
							Ver mi perfil
						</li>
					</a>
				</div>
			</section>
		</article>
	</main>
@endsection

@section('scripts')

@endsection