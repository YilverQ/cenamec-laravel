@extends('teacher.layout')


@section('title', 'Bienvenido Profesor')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/course.css') }}">
@endsection



@section('content')
	<!--Contenedor-->
	<main class="container">
		<!--Information-->
		<article class="article">
			<section class="tab">
				<img class="tab__img" 
						src="{{ asset('img/teacher/course.png') }}" 
						alt="Computadora con un curso online">

				<div class="tab__information">
					<h2 class="tab__title">
						Administra tus <strong class="color-Text">cursos</strong>
					</h2>
					<p class="tab__description">El estudiante es la persona a quien va dirigido los curso y quien tiene la responsabilidad de aprender. Un estudiante puede cursar cualquier curso y al final obtener un certificado.</p>
					<ul class="header__bottons">
						<a href="#">
							<li class="header__loginItem header__loginItem--contrast">
								Crear curso
							</li>
						</a>
					</ul>
				</div>
			</section>
		</article>

		<!--Information-->
		<article class="article">
			<h2 class="tab__title--centered">
				Lista de <strong class="color-Text">cursos</strong>
			</h2>
			<div class="containerCourses">
				
	        	@foreach ($courses as $key => $item)
				<div class="cardCourse">
					<img class="cardCourse__img" 
						src="{{ asset('img/teacher/courses/'. $item->img ) }}" 
						alt="curso inicial de física">

					<h2 class="cardCourse__title">{{ $item->name }}</h2>
					<p class="cardCourse__info">
						<i class="fa-solid fa-book"></i>
						{{ $item->modules_count }} módulos
					</p>
					<ul class="list__actions list__actions--cardCourse">
						<a href="#" title="Ver más" class="icon icon--show"><i class="fa-solid fa-eye"></i> Ver más</a> 
	                    <a href="#" title="Editar" class="icon icon--edit"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
					</ul>
				</div>
	        	@endforeach
        	
			</div>
		</article>
	</main>
@endsection

@section('scripts')

@endsection