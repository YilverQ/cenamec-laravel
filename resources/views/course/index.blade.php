@extends('teacher.layout')


@section('title', 'Mis cursos')
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
						Mis <strong class="color-Text">cursos</strong>
					</h2>
					<p class="tab__description">
						Un cursos es el área de estudio, estos cuentan con módulos educativos, notas educativas y cuestionarios. Todo este conjuntos de herramientas pedagógicas permiten al estudiante descubrir temas nuevos, interesantes y divertidos.
					</p>
					<ul class="header__bottons">
						<a href="{{ route('teacher.course.create') }}">
							<li class="header__loginItem header__loginItem--contrast">
								Crear un curso
							</li>
						</a>
					</ul>
				</div>
			</section>
		</article>

		<!--Information-->
		<article class="article">
			<div class="containerCourses">
				
	        	@foreach ($courses as $key => $item)
				<div class="cardCourse">
					<img class="cardCourse__img" 
						src="{{ $item->img }}" 
						alt="curso inicial de física">

					<h2 class="cardCourse__title">{{ $item->name }}</h2>
					<p class="cardCourse__info">
						<i class="fa-solid fa-book"></i>
						{{ $item->modules_count }} módulos
					</p>
					<ul class="list__actions list__actions--cardCourse">
						<a href="{{ route('teacher.course.show', $item) }}" title="Ver más" class="icon icon--show"><i class="fa-solid fa-eye"></i> Ver más</a> 
	                    <a href="{{ route('teacher.course.edit', $item) }}" title="Editar" class="icon icon--edit"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
					</ul>
				</div>
	        	@endforeach
        	
			</div>
		</article>
	</main>
@endsection

@section('scripts')

@endsection