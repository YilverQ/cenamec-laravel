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
					@if ($item->state == "active")
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
							<a href="{{ route('student.module.study', $item) }}" title="Ver más" class="icon icon--show"><i class="fa-solid fa-eye"></i> Estudiar</a>
						</ul>
					</div>
					<div class="bar"></div>
					@elseif($item->state == "finished")
					<div class="cardModule cardModule--finished">
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
						<ul class="list__actions list__actions--course list__actions--course-white">
							<a href="{{ route('student.module.study', $item) }}" title="Ver más" class="icon icon--show icon--repeat"><i class="fa-solid fa-eye"></i> Repetir</a>
						</ul>
					</div>
					<div class="bar"></div>
					@else
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
						<ul class="list__actions list__actions--course">
							<li class="icon icon--lock">
								<i class="fa-solid fa-lock iconBlockCourse"></i> 
							</li>
						</ul>
					</div>
					<div class="bar"></div>
					@endif
				@endforeach
				</section>
			@endif
			<div class="bottonEnd">
				@if ($certificate)
				<a href="#">
					<li class="bottonEnd__text bottonEnd__text--contrast">
						Generar certificado
					</li>
				</a>
				@else
				<a>
					<li class="bottonEnd__text">
						Generar certificado
					</li>
				</a>
				@endif
			</div>
		</article>
	</main>
@endsection

@section('scripts')

@endsection