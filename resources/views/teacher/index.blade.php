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
					<a href="{{ route('administrator.edit', $teacher) }}">
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
						<a href="#" title="Ver más" class="icon icon--show"><i class="fa-solid fa-eye"></i> Ver más</a> 
	                    <a href="#" title="Editar" class="icon icon--edit"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
					</ul>
				</div>
				<div class="box-bottoms">
					<a href="{{ route('admin.teacher.create') }}">
						<li class="header__loginItem header__loginItem--contrast">
							Crear un curso
						</li>
					</a>
					<a href="{{ route('admin.teacher.index') }}">
						<li class="header__loginItem">
							Ver tus cursos
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
					<p class="tab__description">El administrador es una persona capaz de gestionar a los profesores y estudiantes. Cuando hablamos de gestionar nos referimos a crear, actualizar y eliminar. Tu mismo eres un administrador, y si creas uno nuevo estarás permitiendo a otra persona hacer lo que tu puedes hacer.</p>
					<ul class="header__bottons">
						<a href="{{ route('administrator.create') }}">
							<li class="header__loginItem header__loginItem--contrast">
								Crear módulo
							</li>
						</a>
						<a href="{{ route('administrator.index') }}">
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
					<p class="tab__description">El profesor es una persona importante. Dicha persona está encargada de crear nuevos cursos y exponer los conocimientos que sean necesarios y que son relevantes para los estudiantes. Un profesor puede crear un curso, actualizarlo cuando guste y eliminarlo en caso de no ser necesario.</p>
					<ul class="header__bottons">
						<a href="{{ route('admin.teacher.create') }}">
							<li class="header__loginItem header__loginItem--contrast">
								Crear una nota
							</li>
						</a>
						<a href="{{ route('admin.teacher.index') }}">
							<li class="header__loginItem">
								Ver notas
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
						src="{{ asset('img/teacher/question.png') }}" 
						alt="formulario">

				<div class="tab__information">
					<h2 class="tab__title">Crea <strong class="color-Text">questionarios</strong> para tus cursos</h2>
					<p class="tab__description">El estudiante es la persona a quien va dirigido los curso y quien tiene la responsabilidad de aprender. Un estudiante puede cursar cualquier curso y al final obtener un certificado.</p>
					<ul class="header__bottons">
						<a href="{{ route('admin.student.create') }}">
							<li class="header__loginItem header__loginItem--contrast">
								Crear un questionario
							</li>
						</a>
						<a href="{{ route('admin.student.index') }}">
							<li class="header__loginItem">
								Ver questionarios
							</li>
						</a>
					</ul>
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
					<a href="{{ route('admin.teacher.create') }}">
						<li class="header__loginItem header__loginItem--contrast">
							Editar mis datos
						</li>
					</a>
					<a href="{{ route('admin.teacher.index') }}">
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