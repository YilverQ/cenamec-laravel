@extends('teacher.layout')


@section('title', 'Curso')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/course.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/headerBackground.css') }}">
@endsection



@section('content')
	<!--Header-->
	<div class="containerHeader">
		<img src="{{ $course->img }}" alt="Imagen del curso {{ $course->name }}" class="headerBackground__img">
		<div class="sabana"></div>
		<header class="headerBackground">
			<div class="headerBackground__information">
				<div>
					<small class="descriptionContent">Título del curso:</small>
					<h2 class="headerBackground__title">{{ $course->name }}</h2>
				</div>
				<div>
					<small class="descriptionContent">Descripción del curso:</small>
					<p class="headerBackground__description">
						{{ $course->description }}
					</p>
				</div>
			</div>
			<ul class="headerBackground__buttons">
				<a href="{{ route('teacher.course.edit', $course) }}">
					<li class="header__loginItem header__loginItem--contrast">
						Editar curso
					</li>
				</a>
				<form 
	            	action="{{ route('teacher.course.destroy', $course) }}" 
	            	method="POST" 
	            	class="form__delete">
	                
	                @csrf
	                @method('DELETE')
	                <button type="submit" class="header__loginItem header__loginItem--delete">Eliminar curso</button>                
                </form>
			</ul>
		</header>
	</div>

	<article class="descriptionCard">
		<nav class="descriptionCard__nav">
			<a href="#" class="descriptionCard__item descriptionCard__item--checked">Introducción</a>
			<a href="#" class="descriptionCard__item">Objetivos</a>
			<a href="#" class="descriptionCard__item">Metodología</a>
		</nav>
		<section class="introduction">
			<h3 class="introduction__title">Introducción</h3>
			<p class="introduction__description">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</section>
		<section class="smallInformation">
			<h4 class="smallInformation__title">Profesor:</h4>
			<p class="smallInformation__text">{{ $teacher->name }} {{ $teacher->lastname }}</p>
		</section>
	</article>

	<main class="container">
		<!--Information-->
		<article class="article">
			<h2 class="tab__title--centered">
				Módulos del <strong class="color-Text">curso</strong>
			</h2>
			@if (empty($modules[0]))
				<h3>No hay módulos</h3>
			@else
				<section class="containerModules">
				@foreach ($modules as $key => $item)
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
				</section>
			@endif
			<a href="{{ route('teacher.module.create') }}">
				<li class="header__loginItem header__loginItem--contrast">
					Crear un módulo educativo nuevo
				</li>
			</a>
		</article>
	</main>
@endsection

@section('scripts')

@endsection