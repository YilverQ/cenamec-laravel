@extends('student.layout')


@section('title', 'Lista de cursos')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/course.css') }}">
@endsection



@section('content')
	<main class="container">
		<!--Information-->
		<article class="article">
			<section class="tab">
				<img class="tab__img" 
						src="{{ asset('img/student/course.png') }}" 
						alt="Laptop para ver cursos en la plataforma">

				<div class="tab__information">
					<h2 class="tab__title">
						Lista de <strong class="color-Text">cursos</strong>
					</h2>
					<p class="tab__description">Un cursos es el área de estudio, estos cuentan con módulos educativos, notas educativas y cuestionarios. Todo este conjuntos de herramientas pedagógicas permiten al estudiante descubrir temas nuevos, interesantes y divertidos.</p>
				</div>
			</section>
		</article>

		<!--Information-->
		@if (isset($myCourses[0]))
		<article class="article">
			<h2 class="tab__title--centered">
				Mis <strong class="color-Text">cursos</strong>
			</h2>
			<div class="containerCourses">
	        	@foreach ($myCourses as $key => $item)
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
						<a href="{{ route('student.course.display', $item) }}" title="Ver más" class="icon icon--show"><i class="fa-solid fa-eye"></i> Seguir</a> 
					</ul>
				</div>
	        	@endforeach
        	
			</div>
		</article>
		@endif

		<!--Information-->
		<article class="article">
			<h2 class="tab__title--centered">
				Explora otros <strong class="color-Text">cursos</strong>
			</h2>
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
						<a href="{{ route('student.course.show', $item) }}" title="Ver más" class="icon icon--show"><i class="fa-solid fa-eye"></i> Ver más</a> 
					</ul>
				</div>
	        	@endforeach
        	
			</div>
		</article>
	</main>	
@endsection

@section('scripts')

@endsection