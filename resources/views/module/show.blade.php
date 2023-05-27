@extends('teacher.layout')


@section('title', 'Módulo educativo')
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
						src="{{ asset('img/teacher/module.png') }}" 
						alt="Computadora con un curso online">

				<div class="tab__information">
					<p class="tab__subtitle tab__subtitle--bold">
						Curso: {{ $course->name }}
					</p>
					<h2 class="tab__title">
						Módulo: <strong class="color-Text">{{ $module->name }}</strong>
					</h2>
					<p>
						{{ $module->description }}
					</p>
					<div class="tab__iconsDescription">
						<p class="cardModule__item cardModule__item--note">
							<i class="fa-solid fa-note-sticky"></i>
							Notas educativas: {{ $module->notes_count }}
						</p>
						<p class="cardModule__item cardModule__item--question">
							<i class="fa-solid fa-clipboard-question"></i>
							Preguntas: {{ $module->questionnaires_count }}
						</p>
					</div>
					<ul class="header__bottons">
						<a href="{{ route('teacher.course.show', $course) }}">
							<li class="header__loginItem header__loginItem--contrast">
								Ver detalles del curso
							</li>
						</a>
					</ul>
				</div>
			</section>
		</article>

		<!--Information-->
		<article class="article">
			<h2 class="tab__title--centered boxExpand">
				<strong class="color-Text"> 
					<i class="fa-solid fa-note-sticky"></i>
				</strong> 
				Notas educativas:
				<i class="expandContent fa-solid fa-caret-down"></i>
			</h2>
			<section class="containerModules">
			@if (empty($notes[0]))
				<h3>No hay notas educativas</h3>
			@else
			<div class="cardNoteContent">
			@foreach ($notes as $key => $item)
				<div class="cardNote">
					<img class="cardNote__img" src="{{ $item->img }}">
					<div class="cardNote__content">
						<h3 class="cardNote__number">{{ $item->level }}°</h3>
						<h3 class="cardNote__title">Lección</h3>
					</div>
					<p class="cardNote__description">{{ $item->title }}</p>
					<ul class="list__actions list__actions--module"> 
	                    <a href="{{ route('teacher.note.edit', $item) }}" title="Editar" class="icon icon--edit"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
						<form 
	                    	action="{{ route('teacher.note.destroy', $item) }}" 
	                    	method="POST" 
	                    	class="form__delete">
	                        
	                        @csrf
	                        @method('DELETE')
	                        <button type="submit" class="icon icon--delete"><i title="Eliminar" class="fa-solid fa-trash"></i> Eliminar</button>                
	                    </form> 
					</ul>
				</div>
			@endforeach
			</div>				
			</section>
			@endif
			<div class="bottonEnd">
				<a href="{{ route('teacher.note.create') }}">
					<li class="header__loginItem header__loginItem--contrast">
						Crear una nota educativa
					</li>
				</a>
				<a href="#">
					<li class="header__loginItem">
						Previsualizar notas
					</li>
				</a>
			</div>
		</article>


		<!--Information-->
		<article class="article">
			<h2 class="tab__title--centered boxExpand">
				<strong class="color-Text"> 
					<i class="fa-solid fa-clipboard-question"></i>
				</strong> 
				Cuestionario educativos:
				<i class="expandContent fa-solid fa-caret-down"></i>
			</h2>
			<section class="containerModules">
			@if (empty($questionnaires[0]))
				<h3>No hay cuestionarios educativos</h3>
			@else
			<div class="cardQuestionContent">				
			@foreach ($questionnaires as $key => $item)
				<div class="cardQuestion">
					<div class="cardQuestion__contentMiniCard">
						<h3 class="cardQuestion__number">{{ $item->level }}°</h3>
						<h3 class="cardQuestion__super-text">Pregunta</h3>
					</div>
						
					<h2 class="cardQuestion__ask">{{ $item->ask }}</h2>
					<div class="cardQuestion__contentAnswer">
						<p class="cardQuestion__answer cardQuestion__answer--true">{{ $item->answer }}</p>
						<p class="cardQuestion__answer">{{ $item->bad1 }}</p>
						<p class="cardQuestion__answer">{{ $item->bad2 }}</p>
						<p class="cardQuestion__answer">{{ $item->bad3 }}</p>
					</div>
					<ul class="list__actions list__actions--question">
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
			@endforeach
			</div>
			@endif
			<div class="bottonEnd">
				<a href="{{ route('teacher.note.create') }}">
					<li class="header__loginItem header__loginItem--contrast">
						Crear un cuestionario educativo
					</li>
				</a>
				<a href="#">
					<li class="header__loginItem">
						Previsualizar cuestionarios
					</li>
				</a>
			</div>
		</article>


	</main>
@endsection

@section('scripts')
	<script type="module" src="{{ asset('js/module/expandContent.js') }}"></script>
@endsection