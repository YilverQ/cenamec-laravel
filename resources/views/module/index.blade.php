@extends('teacher.layout')


@section('title', 'Curso')
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
						src="{{ asset('img/teacher/module.png') }}" 
						alt="Dos estudiantes divertidos">

				<div class="tab__information">
					<h2 class="tab__title">
						Lista de todos los <strong class="color-Text">módulos</strong>
					</h2>
					<p class="tab__description">Los módulos educativos son representaciones de niveles acádemicos que tiene un curso, sirve para dividir la información en segmentos pequeños y dinámicos, cabe mencionar que estos están relacionados con los temas principales de tus cursos es por ello que podrás crear cuantos gustes y requieran tus cursos.</p>
					<ul class="header__bottons">
						<a href="{{ route('teacher.module.create') }}">
							<li class="header__loginItem header__loginItem--contrast">
								Crear un módulo
							</li>
						</a>
					</ul>
				</div>
			</section>
		</article>

		<!--Information-->
		@foreach ($listItem as $nameCourse => $value)
		<article class="article">
			<h2 class="tab__title--centered boxExpand">
				Curso: <strong class="color-Text">{{ $nameCourse }}</strong>
				<i class="expandContent fa-solid fa-caret-down"></i>
			</h2>
			<section class="containerModules containerModules--hidden">
			@if (empty($value[0]))
				<h3>No hay módulos</h3>
			@else
			@foreach ($value as $key => $item)

				<div class="cardModule">
					<span class="cardModule__number">{{ $item->level }}</span>
					<h3 class="cardModule__title">{{ $item->name }}</h3>
					<p class="cardModule__item cardModule__item--note">
						<i class="fa-solid fa-note-sticky"></i>
						Notas educativas: {{ $item->notes_count }}
					</p>
					<p class="cardModule__item cardModule__item--question">
						<i class="fa-solid fa-clipboard-question"></i>
						Preguntas: {{ $item->questionnaires_count }}
					</p>
					<ul class="list__actions list__actions--course">
						<a href="{{ route('teacher.module.show', $item) }}" title="Ver más" class="icon icon--show"><i class="fa-solid fa-eye"></i> Ver más</a> 
	                    <a href="{{ route('teacher.module.edit', $item) }}" title="Editar" class="icon icon--edit"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
						<form 
	                    	action="{{ route('teacher.module.destroy', $item) }}" 
	                    	method="POST" 
	                    	class="form__delete">
	                        
	                        @csrf
	                        @method('DELETE')
	                        <button type="submit" class="icon icon--delete"><i title="Eliminar" class="fa-solid fa-trash"></i> Eliminar</button>                
	                    </form> 
					</ul>
				</div>
				<div class="bar"></div>
			@endforeach
			<a href="{{ route('teacher.course.show', $item->course_id) }}">
				<li class="header__loginItem header__loginItem--contrast">
					Ver detalles del curso
				</li>
			</a>
			</section>
			@endif
		</article>
		@endforeach
	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/module/expandContent.js') }}"></script>
@endsection