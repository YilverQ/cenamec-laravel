@extends('student.layout')


@section('title', 'Detalles del curso')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/home.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/list.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/components/course.css') }}"><link rel="stylesheet" type="text/css" href="{{ asset('css/components/headerBackground.css') }}">
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
			<form 
            	action="{{ route('student.course.store', $course) }}" 
            	method="POST" 
            	class="headerBackground__buttons">
                
                @csrf
                @method('POST')
                <button type="submit" class="header__loginItem header__loginItem--contrast">
						Inscribirse
                </button>                
            </form>
		</header>
	</div>

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
					<div class="cardModule cardModule--student-block">
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
					</div>
					<div class="bar"></div>
				@endforeach
				</section>
			@endif
			<form 
            	action="{{ route('student.course.store', $course) }}" 
            	method="POST" 
            	class="bottonEnd">
                
                @csrf
                @method('POST')
                <button type="submit" class="header__loginItem header__loginItem--contrast">
                	Inscribirse
                </button>                
            </form>
		</article>
	</main>
@endsection

@section('scripts')

@endsection